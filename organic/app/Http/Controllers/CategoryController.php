<?php

namespace App\Http\Controllers;

use Cache;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Utility\CategoryUtility;
use App\Models\CategoryTranslation;

class CategoryController extends Controller
{
    public function __construct()
    {
        // Staff Permission Check
        $this->middleware(['permission:view_product_categories'])->only('index');
        $this->middleware(['permission:add_product_category'])->only('create');
        $this->middleware(['permission:edit_product_category'])->only('edit');
        $this->middleware(['permission:delete_product_category'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $categories = Category::orderBy('order_level', 'desc');
        if ($request->has('search')) {
            $sort_search = $request->search;
            $categories = $categories->where('name', 'like', '%' . $sort_search . '%');
        }
        $categories = $categories->paginate(15);
        return view('backend.product.categories.index', compact('categories', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        return view('backend.product.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->order_level = $request->order_level ?? 0;
        $category->digital = $request->digital;
        $category->banner = $request->banner;
        $category->icon = $request->icon;
        $category->cover_image = $request->cover_image;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;

        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1;
        }

        $category->slug = $request->slug
            ? preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug))
            : preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)) . '-' . Str::random(5);

        $category->commision_rate = $request->commision_rate;

        // Store FAQs
        $category->faq_questions = json_encode($request->faq_questions);
        $category->faq_answers = json_encode($request->faq_answers);

        $category->save();

        $category->attributes()->sync($request->filtering_attributes);

        $category_translation = CategoryTranslation::firstOrNew([
            'lang' => env('DEFAULT_LANGUAGE'),
            'category_id' => $category->id
        ]);
        $category_translation->name = $request->name;
        $category_translation->save();

        flash(translate('Category has been inserted successfully'))->success();
        return redirect()->route('categories.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $lang = $request->lang;
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', 0)
            ->where('digital', $category->digital)
            // ->with('childrenCategories')
            // ->whereNotIn('id', CategoryUtility::children_ids($category->id, true))->where('id', '!=' , $category->id)
            ->with([
                'childrenCategories' => function ($query) use ($category) {
                    $query->whereNotIn('id', CategoryUtility::children_ids($category->id, true))
                        ->where('id', '!=', $category->id);
                }
            ])
            ->orderBy('name', 'asc')
            ->get();

        return view('backend.product.categories.edit', compact('category', 'categories', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        if ($request->lang == env("DEFAULT_LANGUAGE")) {
            $category->name = $request->name;
        }

        if ($request->order_level != null) {
            $category->order_level = $request->order_level;
        }

        $category->digital = $request->digital;
        $category->banner = $request->banner;
        $category->icon = $request->icon;
        $category->cover_image = $request->cover_image;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;

        $previous_level = $category->level;

        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1;
        } else {
            $category->parent_id = 0;
            $category->level = 0;
        }

        // if($category->level > $previous_level){
        //     CategoryUtility::move_level_down($category->id);
        // }
        // elseif ($category->level < $previous_level) {
        //     CategoryUtility::move_level_up($category->id);
        // }

        if ($request->slug != null) {
            $category->slug = strtolower($request->slug);
        } else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)) . '-' . Str::random(5);
        }

        // Handle commission_rate: check if it's provided in the request
        if ($request->has('commision_rate')) {
            $category->commision_rate = $request->commision_rate;
        }

        // Store FAQs if provided
        if ($request->has('faq_questions') && $request->has('faq_answers')) {
            $category->faq_questions = json_encode($request->faq_questions);
            $category->faq_answers = json_encode($request->faq_answers);
        }

        $category->save();

        // Updating child categories' level
        CategoryUtility::update_child_level($category->id);

        // Sync attributes
        $category->attributes()->sync($request->filtering_attributes);

        // Handle category translation
        $category_translation = CategoryTranslation::firstOrNew(['lang' => $request->lang, 'category_id' => $category->id]);
        $category_translation->name = $request->name;
        $category_translation->save();

        // Clear cache for featured categories
        Cache::forget('featured_categories');

        flash(translate('Category has been updated successfully'))->success();
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->attributes()->detach();

        // Category Translations Delete
        foreach ($category->category_translations as $key => $category_translation) {
            $category_translation->delete();
        }

        foreach (Product::where('category_id', $category->id)->get() as $product) {
            $product->category_id = null;
            $product->save();
        }

        CategoryUtility::delete_category($id);
        Cache::forget('featured_categories');

        flash(translate('Category has been deleted successfully'))->success();
        return redirect()->route('categories.index');
    }

    public function updateFeatured(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->featured = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }

    public function categoriesByType(Request $request)
    {
        $categories = Category::where('parent_id', 0)
            ->where('digital', $request->digital)
            ->with('childrenCategories')
            ->get();

        return view('backend.product.categories.categories_option', compact('categories'));
    }

    public function categoriesWiseProductDiscount(Request $request)
    {
        $sort_search = null;
        $categories = Category::orderBy('order_level', 'desc');
        if ($request->has('search')) {
            $sort_search = $request->search;
            $categories = $categories->where('name', 'like', '%' . $sort_search . '%');
        }
        $categories = $categories->paginate(15);
        return view('backend.product.category_wise_discount.set_discount', compact('categories', 'sort_search'));
    }
}
