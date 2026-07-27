<?php
    $cart_added = [];
    $choiceOptions = [];
    if ($product->choice_options != null) {
        $choiceOptions = json_decode($product->choice_options, true) ?? [];
    }

    $firstVariation = $choiceOptions[0]['values'][0] ?? null;

    $displayBasePrice = $firstVariation
        ? home_price_cart($product, true, $firstVariation)
        : home_base_price($product);
    $displayDiscountedPrice = $firstVariation
        ? home_discounted_price_cart($product, $firstVariation)
        : home_discounted_base_price($product);

    $basePriceForPercent = $firstVariation
        ? home_price_cart($product, false, $firstVariation)
        : home_base_price($product, false);
    $discountedPriceForPercent = $firstVariation
        ? home_discounted_price_cart($product, $firstVariation, false)
        : home_discounted_base_price($product, false);

    $cardDiscountPercent = 0;
    if ($basePriceForPercent > 0 && $discountedPriceForPercent < $basePriceForPercent) {
        $cardDiscountPercent = round((($basePriceForPercent - $discountedPriceForPercent) * 100) / $basePriceForPercent);
    } else {
        $cardDiscountPercent = discount_in_percentage($product);
    }
?>
<div class="aiz-card-box h-auto bg-white py-3 hov-scale-img box_padding ">
    <div class="position-relative img-fit overflow-hidden border">
        <?php
            $product_url = route('product', $product->slug);
            if ($product->auction_product == 1) {
                $product_url = route('auction-product', $product->slug);
            }
        ?>
        <!-- Image -->
        <a href="<?php echo e($product_url); ?>" class="d-block">
            <img class="lazyload mx-auto img-fit has-transition" src="<?php echo e(get_image($product->thumbnail)); ?>"
                alt="<?php echo e($product->getTranslation('name')); ?>" title="<?php echo e($product->getTranslation('name')); ?>"
                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
        </a>
        <!-- Discount percentage tag -->
        <?php if($cardDiscountPercent > 0): ?>
            <span class="absolute-top-left bg-primary ml-1 mt-1 fs-11 fw-700 text-white w-35px text-center"
            style="padding-top:2px;padding-bottom:2px;">-<?php echo e($cardDiscountPercent); ?>%</span>
        <?php endif; ?>
        <!-- Wholesale tag -->
        <?php if($product->wholesale_product): ?>
            <span class="absolute-top-left fs-11 text-white fw-700 px-2 lh-1-8 ml-1 mt-1"
                style="background-color: #455a64; <?php if($cardDiscountPercent > 0): ?> top:25px; <?php endif; ?>">
                <?php echo e(translate('Wholesale')); ?>

            </span>
        <?php endif; ?>
        <?php if($product->auction_product == 0): ?>
            <!-- wishlisht & compare icons -->
            <div class="absolute-top-right aiz-p-hov-icon">
                <a href="javascript:void(0)" class="hov-svg-white" onclick="addToWishList(<?php echo e($product->id); ?>)"
                    data-toggle="tooltip" data-title="<?php echo e(translate('Add to wishlist')); ?>" data-placement="left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.4" viewBox="0 0 16 14.4">
                        <g id="_51a3dbe0e593ba390ac13cba118295e4" data-name="51a3dbe0e593ba390ac13cba118295e4"
                            transform="translate(-3.05 -4.178)">
                            <path id="Path_32649" data-name="Path 32649"
                                d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                transform="translate(0 0)" fill="#919199" />
                            <path id="Path_32650" data-name="Path 32650"
                                d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                transform="translate(0 0)" fill="#919199" />
                        </g>
                    </svg>
                </a>
                <a href="javascript:void(0)" class="hov-svg-white" onclick="addToCompare(<?php echo e($product->id); ?>)"
                    data-toggle="tooltip" data-title="<?php echo e(translate('Add to compare')); ?>" data-placement="left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea"
                            d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                            transform="translate(-2.037 -2.038)" fill="#919199" />
                    </svg>
                </a>
            </div>
            <!-- add to cart -->
            
        <?php endif; ?>
        <?php if(
            $product->auction_product == 1 &&
                $product->auction_start_date <= strtotime('now') &&
                $product->auction_end_date >= strtotime('now')): ?>
            <!-- Place Bid -->
            <?php
                $carts = get_user_cart();
                if (count($carts) > 0) {
                    $cart_added = $carts->pluck('product_id')->toArray();
                }
                $highest_bid = $product->bids->max('amount');
                $min_bid_amount = $highest_bid != null ? $highest_bid + 1 : $product->starting_bid;
            ?>
            <a class="cart-btn absolute-bottom-left w-100 h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column justify-content-center align-items-center <?php if(in_array($product->id, $cart_added)): ?> active <?php endif; ?>"
                href="javascript:void(0)" onclick="bid_single_modal(<?php echo e($product->id); ?>, <?php echo e($min_bid_amount); ?>)">
                <span class="cart-btn-text"><?php echo e(translate('Place Bid')); ?></span>
                <span><i class="las la-2x la-gavel"></i></span>
            </a>
        <?php endif; ?>
        <div class="product-overlay">
            <div class="overlay-content">
                <div class="d-flex justify-content-between align-items-center">
                    <div style="font-weight:100 " class="category_nam text-white">
                        <?php echo e(getCategoryName($product->category_id)); ?></div>
                    <div class="text-white fs-16 fw-700 text-right"><?php echo e($displayDiscountedPrice); ?>

                        <?php if($displayBasePrice != $displayDiscountedPrice): ?>
                            <sup> <del class="fw-400 text-secondary mr-1"><?php echo e($displayBasePrice); ?></del></sup>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="main_box ">
                    <h3 class="text-white fs-32 mb-1 text-left"><?php echo e($product->getTranslation('name')); ?>

                        
                    </h3>
                    <span class="fs-12 mr-3 text-white"><i class="fa-solid fa-star f-12 pr-2"
                            style="color: #f0bc00;"></i>(<?php echo e($product->rating); ?>)</span>
                </div>
                <div class="buy_now d-flex justify-content-center">
                    <button class="btn btn-primary" onclick="showAddToCartModal(<?php echo e($product->id); ?>)"><?php echo e(translate('Buy Now')); ?></button>
                </div>
            </div>
        </div>


    </div>
    <div class="pro_size d-flex justify-content-center align-items-center">
        <h5 class="mb-0 text-dark pr-2 product-box-size-responsive"><?php echo e(translate('Size : ')); ?></h5>

        <div class="size_btn product-box-size-responsive-btn" onclick="showAddToCartModal(<?php echo e($product->id); ?>)">
            <?php echo e(translate($firstVariation)); ?><span><img width="30px"
                    src="<?php echo e(static_asset('assets/img/down-arrow-5-svgrepo-com.svg')); ?>" alt=""></span>
        </div>
    </div>

    
</div>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/classic/partials/product_box_1.blade.php ENDPATH**/ ?>