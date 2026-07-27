<div class="text-left">
    <span class="opacity-60"><?php echo e(translate(getCategoryName($detailedProduct->category_id))); ?></span>
    <!-- Product Name -->
    <h1 class="mb-2 mt-2 fs-1 fw-700 text-success">
        <?php echo e($detailedProduct->getTranslation('name')); ?>

    </h1>

    <div class="row align-items-center mb-3">
        <!-- Review -->
        <?php if($detailedProduct->auction_product != 1): ?>
            <div class="col-12">
                <?php
                    $total = 0;
                    $total += $detailedProduct->reviews->where('status', 1)->count();
                ?>
                <span class="rating rating-mr-2 text-warning">
                    <?php echo e(renderStarRating($detailedProduct->rating)); ?>

                </span>
                <span class="ml-1 opacity-50 fs-14">(<?php echo e($total); ?>

                    <?php echo e(translate('Customer Review ')); ?>)</span>
            </div>
        <?php endif; ?>
        <!-- Estimate Shipping Time -->
        <?php if($detailedProduct->est_shipping_days): ?>
            <div class="col-auto fs-14 mt-1">
                <small class="mr-1 opacity-50 fs-14"><?php echo e(translate('Estimate Shipping Time')); ?>:</small>
                <span class="fw-500"><?php echo e($detailedProduct->est_shipping_days); ?> <?php echo e(translate('Days')); ?></span>
            </div>
        <?php endif; ?>
        <!-- In stock -->
        <?php if($detailedProduct->digital == 1): ?>
            <div class="col-12 mt-1">
                <span class="badge badge-md badge-inline badge-pill badge-success"><?php echo e(translate('In stock')); ?></span>
            </div>
        <?php endif; ?>
    </div>
    


    <!-- Brand Logo & Name -->
    <?php if($detailedProduct->brand != null): ?>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <span class="text-secondary fs-14 fw-400 mr-4 w-80px"><?php echo e(translate('Brand')); ?></span><br>
            <a href="<?php echo e(route('products.brand', $detailedProduct->brand->slug)); ?>"
                class="text-reset hov-text-primary fs-14 fw-700"><?php echo e($detailedProduct->brand->name); ?></a>
        </div>
    <?php endif; ?>

    
    <?php if($detailedProduct->has_warranty == 1 && $detailedProduct->warranty_id != null): ?>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <span class="text-secondary fs-14 fw-400 mr-4 w-80px"><?php echo e(translate('Warranty')); ?></span><br>
            <img src="<?php echo e(uploaded_asset($detailedProduct->warranty->logo)); ?>" height="40">
            <span class="border border-secondary-base btn fs-12 ml-3 px-3 py-1 rounded-1 text-secondary">
                <?php echo e($detailedProduct->warranty->getTranslation('text')); ?>

                <?php if($detailedProduct->warranty_note_id != null): ?>
                    <span href="javascript:void(1);" data-toggle="modal" data-target="#warranty-note-modal"
                        class="border-bottom border-bottom-4 ml-2 text-secondary-base">
                        <?php echo e(translate('View Details')); ?>

                    </span>
                <?php endif; ?>
            </span>
        </div>
    <?php endif; ?>

    <!-- Seller Info -->
    

    <!-- For auction product -->
    <?php if($detailedProduct->auction_product): ?>
        <div class="row no-gutters mb-3">
            <div class="col-sm-2">
                <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('Auction Will End')); ?></div>
            </div>
            <div class="col-sm-10">
                <?php if($detailedProduct->auction_end_date > strtotime('now')): ?>
                    <div class="aiz-count-down align-items-center"
                        data-date="<?php echo e(date('Y/m/d H:i:s', $detailedProduct->auction_end_date)); ?>"></div>
                <?php else: ?>
                    <p><?php echo e(translate('Ended')); ?></p>
                <?php endif; ?>

            </div>
        </div>

        <div class="row no-gutters mb-3">
            <div class="col-sm-2">
                <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('Starting Bid')); ?></div>
            </div>
            <div class="col-sm-10">
                <span class="opacity-50 fs-20">
                    <?php echo e(single_price($detailedProduct->starting_bid)); ?>

                </span>
                <?php if($detailedProduct->unit != null): ?>
                    <span class="opacity-70">/<?php echo e($detailedProduct->getTranslation('unit')); ?></span>
                <?php endif; ?>
            </div>
        </div>

        <?php if(Auth::check() && Auth::user()->product_bids->where('product_id', $detailedProduct->id)->first() != null): ?>
            <div class="row no-gutters mb-3">
                <div class="col-sm-2">
                    <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('My Bidded Amount')); ?></div>
                </div>
                <div class="col-sm-10">
                    <span class="opacity-50 fs-20">
                        <?php echo e(single_price(Auth::user()->product_bids->where('product_id', $detailedProduct->id)->first()->amount)); ?>

                    </span>
                </div>
            </div>
            <hr>
        <?php endif; ?>

        <?php $highest_bid = $detailedProduct->bids->max('amount'); ?>
        <div class="row no-gutters my-2 mb-3">
            <div class="col-sm-2">
                <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('Highest Bid')); ?></div>
            </div>
            <div class="col-sm-10">
                <strong class="h3 fw-600 text-primary">
                    <?php if($highest_bid != null): ?>
                        <?php echo e(single_price($highest_bid)); ?>

                    <?php endif; ?>
                </strong>
            </div>
        </div>
    <?php else: ?>
        <!-- Without auction product -->
        <?php if($detailedProduct->wholesale_product == 1): ?>
            <!-- Wholesale -->
            <table class="table mb-3">
                <thead>
                    <tr>
                        <th class="border-top-0"><?php echo e(translate('Min Qty')); ?></th>
                        <th class="border-top-0"><?php echo e(translate('Max Qty')); ?></th>
                        <th class="border-top-0"><?php echo e(translate('Unit Price')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $detailedProduct->stocks->first()->wholesalePrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wholesalePrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($wholesalePrice->min_qty); ?></td>
                            <td><?php echo e($wholesalePrice->max_qty); ?></td>
                            <td><?php echo e(single_price($wholesalePrice->price)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
        <?php endif; ?>
    <?php endif; ?>

    <div>

    </div>

    <?php if($detailedProduct->auction_product != 1): ?>
        <form id="option-choice-form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($detailedProduct->id); ?>">

            <?php if($detailedProduct->digital == 0): ?>
                <!-- Choice Options -->
                <?php if($detailedProduct->choice_options != null): ?>
                    <?php $__currentLoopData = json_decode($detailedProduct->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row no-gutters mb-1">
                            <div class="col-sm-12">
                                <div class="text-success fs-14 mt-2 mb-2">
                                    
                                    <?php echo e(translate('Variants')); ?>

                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="aiz-radio-inline">
                                    <?php $__currentLoopData = $choice->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $variantBasePrice = home_price_cart($detailedProduct, true, $value);
                                            $variantDiscountedPrice = home_discounted_price_cart($detailedProduct, $value);
                                        ?>
                                        <label class="aiz-megabox pl-0 mr-2 mb-0">
                                            <input type="radio" name="attribute_id_<?php echo e($choice->attribute_id); ?>"
                                                value="<?php echo e($value); ?>"
                                                <?php if($key == 0): ?> checked <?php endif; ?>>
                                            <span
                                                class="bg-white rounded-2 d-flex align-items-center justify-content-center py-3 px-3 variants-sm-col-price">
                                                <span class="text-primary text-bold fs-22">
                                                    <?php echo e($value); ?>

                                                </span>
                                                <sup class="fs-12 opacity-80">
                                                    <?php if($variantBasePrice != $variantDiscountedPrice): ?>
                                                        <del class="text-secondary"><?php echo e($variantBasePrice); ?></del>
                                                    <?php endif; ?>
                                                    <?php echo e($variantDiscountedPrice); ?>

                                                </sup>
                                            </span>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <!-- Color Options -->
                <?php if($detailedProduct->colors != null && count(json_decode($detailedProduct->colors)) > 0): ?>
                    <div class="row no-gutters mb-3">
                        <div class="col-sm-2">
                            <div class="text-secondary fs-14 fw-400 mt-2"><?php echo e(translate('Color')); ?></div>
                        </div>
                        <div class="col-sm-10">
                            <div class="aiz-radio-inline">
                                <?php $__currentLoopData = json_decode($detailedProduct->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="aiz-megabox pl-0 mr-2 mb-0" data-toggle="tooltip"
                                        data-title="<?php echo e(get_single_color_name($color)); ?>">
                                        <input type="radio" name="color"
                                            value="<?php echo e(get_single_color_name($color)); ?>"
                                            <?php if($key == 0): ?> checked <?php endif; ?>>
                                        <span
                                            class="aiz-megabox-elem rounded-0 d-flex align-items-center justify-content-center p-1">
                                            <span class="size-25px d-inline-block rounded"
                                                style="background: <?php echo e($color); ?>;"></span>
                                        </span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Quantity + Add to cart -->
                <div class="row no-gutters mb-3">
                    
                    <div class="col-sm-12">
                        <div class="product-quantity d-flex align-items-center">
                            <div class="row no-gutters align-items-center aiz-plus-minus mr-3 bg-white p-2 rounded-2"
                                style="width: 130px;">
                                <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button"
                                    data-type="minus" data-field="quantity" disabled="">
                                    <i class="las la-minus"></i>
                                </button>
                                <input type="number" name="quantity"
                                    class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1"
                                    value="<?php echo e($detailedProduct->min_qty); ?>" min="<?php echo e($detailedProduct->min_qty); ?>"
                                    max="10" lang="en">
                                <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button"
                                    data-type="plus" data-field="quantity">
                                    <i class="las la-plus"></i>
                                </button>
                            </div>
                            <?php
                                $qty = 0;
                                foreach ($detailedProduct->stocks as $key => $stock) {
                                    $qty += $stock->qty;
                                }
                            ?>
                            <div class="avialable-amount opacity-60">
                                <?php if($detailedProduct->stock_visibility_state == 'quantity'): ?>
                                    (<span id="available-quantity"><?php echo e($qty); ?></span>
                                    <?php echo e(translate('available')); ?>)
                                <?php elseif($detailedProduct->stock_visibility_state == 'text' && $qty >= 1): ?>
                                    (<span id="available-quantity"><?php echo e(translate('In Stock')); ?></span>)
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Quantity -->
                <input type="hidden" name="quantity" value="1">
            <?php endif; ?>

            <!-- Total Price -->
            <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                <div class="col-sm-2">
                    <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('Total Price')); ?></div>
                </div>
                <div class="col-sm-10">
                    <div class="product-price">
                        <strong id="chosen_price" class="fs-20 fw-700 text-primary">

                        </strong>
                    </div>
                </div>
            </div>

        </form>
    <?php endif; ?>

    <?php if($detailedProduct->auction_product): ?>
        <?php
            $highest_bid = $detailedProduct->bids->max('amount');
            $min_bid_amount = $highest_bid != null ? $highest_bid + 1 : $detailedProduct->starting_bid;
        ?>
        <?php if($detailedProduct->auction_end_date >= strtotime('now')): ?>
            <div class="mt-4">
                <?php if(Auth::check() && $detailedProduct->user_id == Auth::user()->id): ?>
                    <span
                        class="badge badge-inline badge-danger"><?php echo e(translate('Seller cannot Place Bid to His Own Product')); ?></span>
                <?php else: ?>
                    <button type="button" class="btn btn-primary buy-now  fw-600 min-w-150px rounded-0"
                        onclick="bid_modal()">
                        <i class="las la-gavel"></i>
                        <?php if(Auth::check() && Auth::user()->product_bids->where('product_id', $detailedProduct->id)->first() != null): ?>
                            <?php echo e(translate('Change Bid')); ?>

                        <?php else: ?>
                            <?php echo e(translate('Place Bid')); ?>

                        <?php endif; ?>
                    </button>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php else: ?>

    <?php
        $lang = app()->getLocale(); // Get the current language (Laravel's way)
    ?>

        <?php
            $exclusive_shipping_images = json_decode(get_setting('exclusive_shipping_images', null, $lang), true);
            $sliders = get_slider_images($exclusive_shipping_images);
            $exclusive_shipping_links = get_setting('exclusive_shipping_links', null, $lang);
            $exclusive_shipping_title1 = get_setting('exclusive_shipping_title1', null, $lang);
            $exclusive_shipping_description = get_setting('exclusive_shipping_description', null, $lang);
        ?>

        <div>
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-2">
                    <span>
                        <img src="<?php echo e($slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                            alt="" class="" style="width: 28px; height: 18px;">
                    </span>
                    <span class="text-primary" style="margin-left: 10px;">
                        <?php echo e(isset(json_decode($exclusive_shipping_title1, true)[$key]) ? json_decode($exclusive_shipping_title1, true)[$key] : ''); ?>

                    </span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


        <!-- Add to cart & Buy now Buttons -->
        <div class="mt-3">
            <?php if($detailedProduct->digital == 0): ?>
                <?php if(
                    (get_setting('product_external_link_for_seller') == 1 &&
                        $detailedProduct->added_by == 'seller' &&
                        $detailedProduct->external_link != null) ||
                        ($detailedProduct->added_by != 'seller' && $detailedProduct->external_link != null)): ?>
                    <a type="button" class="btn btn-primary buy-now fw-600 add-to-cart px-4 rounded-0"
                        href="<?php echo e($detailedProduct->external_link); ?>">
                        <i class="la la-share"></i> <?php echo e(translate($detailedProduct->external_link_btn)); ?>

                    </a>
                <?php else: ?>
                    <button type="button"
                        class="btn btn-primary mr-2 add-to-cart fw-600 rounded-2 text-white btn-add-to-cart-size mb-2"
                        <?php if(Auth::check() || get_Setting('guest_checkout_activation') == 1): ?> onclick="addToCart()" <?php else: ?> onclick="showLoginModal()" <?php endif; ?>>
                        <i class="las la-shopping-bag"></i> <?php echo e(translate('Add to cart')); ?>

                    </button>
                    <button type="button"
                        class="btn btn-danger buy-now fw-600 add-to-cart rounded-2 btn-add-to-cart-size"
                        <?php if(Auth::check() || get_Setting('guest_checkout_activation') == 1): ?> onclick="addToCart()" <?php else: ?> onclick="showLoginModal()" <?php endif; ?>>
                        <i class="la la-shopping-cart"></i> <?php echo e(translate('Buy Now')); ?>

                    </button>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled>
                    <i class="la la-cart-arrow-down"></i> <?php echo e(translate('Out of Stock')); ?>

                </button>
            <?php elseif($detailedProduct->digital == 1): ?>
                <button type="button"
                    class="btn btn-primary mr-2 add-to-cart fw-600 min-w-150px rounded-2 text-white btn-add-to-cart-size"
                    <?php if(Auth::check() || get_Setting('guest_checkout_activation') == 1): ?> onclick="addToCart()" <?php else: ?> onclick="showLoginModal()" <?php endif; ?>>
                    <i class="las la-shopping-bag"></i> <?php echo e(translate('Add to cart')); ?>

                </button>
                <button type="button"
                    class="btn btn-danger buy-now fw-600 add-to-cart min-w-150px rounded-2 btn-add-to-cart-size"
                    <?php if(Auth::check() || get_Setting('guest_checkout_activation') == 1): ?> onclick="addToCart()" <?php else: ?> onclick="showLoginModal()" <?php endif; ?>>
                    <i class="la la-shopping-cart"></i> <?php echo e(translate('Buy Now')); ?>

                </button>
            <?php endif; ?>
        </div>

        <!-- Promote Link -->
        <div class="d-table width-100 mt-3">
            <div class="d-table-cell">
                <?php if(Auth::check() &&
                        addon_is_activated('affiliate_system') &&
                        get_affliate_option_status() &&
                        Auth::user()->affiliate_user != null &&
                        Auth::user()->affiliate_user->status): ?>
                    <?php
                        if (Auth::check()) {
                            if (Auth::user()->referral_code == null) {
                                Auth::user()->referral_code = substr(Auth::user()->id . Str::random(10), 0, 10);
                                Auth::user()->save();
                            }
                            $referral_code = Auth::user()->referral_code;
                            $referral_code_url =
                                URL::to('/product') .
                                '/' .
                                $detailedProduct->slug .
                                "?product_referral_code=$referral_code";
                        }
                    ?>
                    <div>
                        <button type="button" id="ref-cpurl-btn" class="btn btn-secondary w-200px rounded-0"
                            data-attrcpy="<?php echo e(translate('Copied')); ?>" onclick="CopyToClipboard(this)"
                            data-url="<?php echo e($referral_code_url); ?>"><?php echo e(translate('Copy the Promote Link')); ?></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Refund -->
        <?php
            $refund_sticker = get_setting('refund_sticker');
        ?>
        <?php if(addon_is_activated('refund_request')): ?>
            <div class="row no-gutters mt-3">
                <div class="col-sm-2">
                    <div class="text-secondary fs-14 fw-400 mt-2"><?php echo e(translate('Refund')); ?></div>
                </div>
                <div class="col-sm-10">
                    <?php if($detailedProduct->refundable == 1): ?>
                        <a href="<?php echo e(route('returnpolicy')); ?>" target="_blank">
                            <?php if($refund_sticker != null): ?>
                                <img src="<?php echo e(uploaded_asset($refund_sticker)); ?>" height="36">
                            <?php else: ?>
                                <img src="<?php echo e(static_asset('assets/img/refund-sticker.jpg')); ?>" height="36">
                            <?php endif; ?>
                        </a>
                        <?php if($detailedProduct->refund_note_id != null): ?>
                            <span href="javascript:void(1);" data-toggle="modal" data-target="#refund-note-modal"
                                class="border-bottom border-bottom-4 ml-2 text-secondary-base">
                                <?php echo e(translate('Refund Note')); ?>

                            </span>
                        <?php endif; ?>

                        <a href="<?php echo e(route('returnpolicy')); ?>" class="text-blue hov-text-primary fs-14 ml-3"
                            target="_blank"><?php echo e(translate('View Policy')); ?></a>
                    <?php else: ?>
                        <div class="text-dark fs-14 fw-400 mt-2"><?php echo e(translate('Not Applicable')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Seller Guarantees -->
        <?php if($detailedProduct->digital == 1): ?>
            <?php if($detailedProduct->added_by == 'seller'): ?>
                <div class="row no-gutters mt-3">
                    <div class="col-2">
                        <div class="text-secondary fs-14 fw-400"><?php echo e(translate('Seller Guarantees')); ?></div>
                    </div>
                    <div class="col-10">
                        <?php if($detailedProduct->user->shop->verification_status == 1): ?>
                            <span class="text-success fs-14 fw-700"><?php echo e(translate('Verified seller')); ?></span>
                        <?php else: ?>
                            <span class="text-danger fs-14 fw-700"><?php echo e(translate('Non verified seller')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Share -->
    
</div>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/product_details/details.blade.php ENDPATH**/ ?>