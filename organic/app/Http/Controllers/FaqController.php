<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Utility\CategoryUtility;

class FaqController extends Controller
{
    public function Faq()
    {
        $categories = Category::latest()->get();

        // Decode JSON data
        foreach ($categories as $category) {
            $category->faq_questions = json_decode($category->faq_questions, true);
            $category->faq_answers = json_decode($category->faq_answers, true);
        }

        return view('frontend.faq.faq', compact('categories'));
    }


    public function getCategoryFaqs($id)
    {
        $category = Category::findOrFail($id);

        $faqData = [];
        $questions = json_decode($category->faq_questions, true);
        $answers = json_decode($category->faq_answers, true);

        if ($questions && $answers) {
            foreach ($questions as $index => $question) {
                $faqData[] = [
                    'question' => $question,
                    'answer' => $answers[$index] ?? 'No answer available',
                ];
            }
        }

        return response()->json($faqData);
    }



}
