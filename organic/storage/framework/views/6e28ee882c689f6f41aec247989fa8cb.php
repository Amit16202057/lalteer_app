

<?php $__env->startSection('meta_title'); ?><?php echo e($detailedProduct->meta_title); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?><?php echo e($detailedProduct->meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keywords'); ?><?php echo e($detailedProduct->tags); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <?php
        $availability = 'out of stock';
        $qty = 0;
        if ($detailedProduct->variant_product) {
            foreach ($detailedProduct->stocks as $key => $stock) {
                $qty += $stock->qty;
            }
        } else {
            $qty = optional($detailedProduct->stocks->first())->qty;
        }
        if ($qty > 0) {
            $availability = 'in stock';
        }
    ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($detailedProduct->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($detailedProduct->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(uploaded_asset($detailedProduct->meta_img)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($detailedProduct->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($detailedProduct->meta_description); ?>">
    <meta name="twitter:creator"
        content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(uploaded_asset($detailedProduct->meta_img)); ?>">
    <meta name="twitter:data1" content="<?php echo e(single_price($detailedProduct->unit_price)); ?>">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($detailedProduct->meta_title); ?>" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="<?php echo e(route('product', $detailedProduct->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(uploaded_asset($detailedProduct->meta_img)); ?>" />
    <meta property="og:description" content="<?php echo e($detailedProduct->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(get_setting('meta_title')); ?>" />
    <meta property="og:price:amount" content="<?php echo e(single_price($detailedProduct->unit_price)); ?>" />
    <meta property="product:brand" content="<?php echo e($detailedProduct->brand ? $detailedProduct->brand->name : env('APP_NAME')); ?>">
    <meta property="product:availability" content="<?php echo e($availability); ?>">
    <meta property="product:condition" content="new">
    <meta property="product:price:amount" content="<?php echo e(number_format($detailedProduct->unit_price, 2)); ?>">
    <meta property="product:retailer_item_id" content="<?php echo e($detailedProduct->slug); ?>">
    <meta property="product:price:currency"
        content="<?php echo e(get_system_default_currency()->code); ?>" />
    <meta property="fb:app_id" content="<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
  $bradcamp = \App\Models\Page::where('page_name','product_details')->first();
?>
    <section style="background-image: url('<?php echo e(static_asset('assets/img/p_details_bg.jpg')); ?>'); background-size: cover; background-position: center;">
        <section class="mb-1 pt-3">
            <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
                <img src="<?php echo e(uploaded_asset($bradcamp->bradcamp_image)??static_asset('assets/img/Frame 1171276523.png')); ?>" alt="" style="width: 100%; height: 200px;">
                <h2 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;"><?php echo e(translate('Product Details')); ?></h2>
            </div>        
        </section>
    
        <section class="mb-4">
            <div class="container">
                <div class="py-3">
                    <div class="row">
                        <!-- Product Image Gallery -->
                        <div class="col-xl-5 col-lg-6 mb-4 bg-white border rounded-lg">
                            <?php echo $__env->make('frontend.product_details.image_gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
    
                        <!-- Product Details -->
                        <div class="col-xl-7 col-lg-6">
                            <?php echo $__env->make('frontend.product_details.details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="mb-4">
            <div class="container">
                <?php if($detailedProduct->auction_product): ?>
                    <!-- Reviews & Ratings -->
                    <?php echo $__env->make('frontend.product_details.review_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <!-- Description, Video, Downloads -->
                    <?php echo $__env->make('frontend.product_details.description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <!-- Product Query -->
                    <?php echo $__env->make('frontend.product_details.product_queries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <div class="row gutters-16">
                        <!-- Left side -->
                        <div class="col-lg-3">
                            <!-- Seller Info -->
                            <?php echo $__env->make('frontend.product_details.seller_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
                            <!-- Top Selling Products -->
                           
                        </div>
    
                        <!-- Right side -->
                        <div class="col-lg-12">
                            <!-- Nav Pills -->
                            <ul class="nav nav-pills mb-3 d-flex flex-row justify-content-between p-2" id="pills-tab" role="tablist" style="background-color: #D9EDC4;">
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-primary border-0 rounded-2 active btn-add-specification-tab" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                        <?php echo e(translate('Specification')); ?>

                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-primary border-0 rounded-2 btn-add-specification-tab" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                        <?php echo e(translate('Description')); ?>

                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-primary border-0 rounded-2 btn-add-specification-tab" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                                        <?php echo e(translate('Reviews')); ?>

                                    </button>
                                </li>
                            </ul>
                        
                            <!-- Tab Content -->
                            <div class="tab-content" id="pills-tabContent">
                                
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                  <?php echo $__env->make('frontend.product_details.specification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <?php echo $__env->make('frontend.product_details.description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <?php echo $__env->make('frontend.product_details.review_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        
                            <!-- Additional Product Sections -->
                            
                        
                            <!-- Top Selling Products for Mobile -->
                            <div class="mt-4">
                                <?php echo $__env->make('preorder.frontend.product_details.related_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <!-- Image Modal -->
    <div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="p-4">
                    <div class="size-300px size-lg-450px">
                        <img class="img-fit h-100 lazyload"
                            src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                            data-src=""
                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Modal -->
    <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title fw-600 h5"><?php echo e(translate('Any query about this product')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="<?php echo e(route('conversations.store')); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($detailedProduct->id); ?>">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3 rounded-0" name="title"
                                value="<?php echo e($detailedProduct->name); ?>" placeholder="<?php echo e(translate('Product Name')); ?>"
                                required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control rounded-0" rows="8" name="message" required
                                placeholder="<?php echo e(translate('Your Question')); ?>"><?php echo e(route('product', $detailedProduct->slug)); ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary fw-600 rounded-0"
                            data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                        <button type="submit" class="btn btn-primary fw-600 rounded-0 w-100px"><?php echo e(translate('Send')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bid Modal -->
    <?php if($detailedProduct->auction_product == 1): ?>
        <?php 
            $highest_bid = $detailedProduct->bids->max('amount');
            $min_bid_amount = $highest_bid != null ? $highest_bid+1 : $detailedProduct->starting_bid; 
        ?>
        <div class="modal fade" id="bid_for_detail_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Bid For Product')); ?> <small>(<?php echo e(translate('Min Bid Amount: ') . $min_bid_amount); ?>)</small> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo e(route('auction_product_bids.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($detailedProduct->id); ?>">
                            <div class="form-group">
                                <label class="form-label">
                                    <?php echo e(translate('Place Bid Price')); ?>

                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="amount" min="<?php echo e($min_bid_amount); ?>" placeholder="<?php echo e(translate('Enter Amount')); ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary transition-3d-hover mr-1"><?php echo e(translate('Submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- Product Review Modal -->
    <div class="modal fade" id="product-review-modal">
        <div class="modal-dialog">
            <div class="modal-content" id="product-review-modal-content">

            </div>
        </div>
    </div>

    <!-- Size chart show Modal -->
    <?php echo $__env->make('modals.size_chart_show_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Product Warranty Modal -->
    <div class="modal fade" id="warranty-note-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6"><?php echo e(translate('Warranty Note')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body c-scrollbar-light">
                    <?php if($detailedProduct->warranty_note_id != null): ?>
                        <p><?php echo e($detailedProduct->warrantyNote->getTranslation('description')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Refund Modal -->
    <div class="modal fade" id="refund-note-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6"><?php echo e(translate('Refund Note')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body c-scrollbar-light">
                    <?php if($detailedProduct->refund_note_id != null): ?>
                        <p><?php echo e($detailedProduct->refundNote->getTranslation('description')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            getVariantPrice();
        });

        function CopyToClipboard(e) {
            var url = $(e).data('url');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            try {
                document.execCommand("copy");
                AIZ.plugins.notify('success', '<?php echo e(translate('Link copied to clipboard')); ?>');
            } catch (err) {
                AIZ.plugins.notify('danger', '<?php echo e(translate('Oops, unable to copy')); ?>');
            }
            $temp.remove();
            // if (document.selection) {
            //     var range = document.body.createTextRange();
            //     range.moveToElementText(document.getElementById(containerid));
            //     range.select().createTextRange();
            //     document.execCommand("Copy");

            // } else if (window.getSelection) {
            //     var range = document.createRange();
            //     document.getElementById(containerid).style.display = "block";
            //     range.selectNode(document.getElementById(containerid));
            //     window.getSelection().addRange(range);
            //     document.execCommand("Copy");
            //     document.getElementById(containerid).style.display = "none";

            // }
            // AIZ.plugins.notify('success', 'Copied');
        }

        function show_chat_modal() {
            <?php if(Auth::check()): ?>
                $('#chat_modal').modal('show');
            <?php else: ?>
                $('#login_modal').modal('show');
            <?php endif; ?>
        }

        // Pagination using ajax
        $(window).on('hashchange', function() {
            if(window.history.pushState) {
                window.history.pushState('', '/', window.location.pathname);
            } else {
                window.location.hash = '';
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.product-queries-pagination .pagination a', function(e) {
                getPaginateData($(this).attr('href').split('page=')[1], 'query', 'queries-area');
                e.preventDefault();
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.product-reviews-pagination .pagination a', function(e) {
                getPaginateData($(this).attr('href').split('page=')[1], 'review', 'reviews-area');
                e.preventDefault();
            });
        });

        function getPaginateData(page, type, section) {
            $.ajax({
                url: '?page=' + page,
                dataType: 'json',
                data: {type: type},
            }).done(function(data) {
                $('.'+section).html(data);
                location.hash = page;
            }).fail(function() {
                alert('Something went worng! Data could not be loaded.');
            });
        }
        // Pagination end

        function showImage(photo) {
            $('#image_modal img').attr('src', photo);
            $('#image_modal img').attr('data-src', photo);
            $('#image_modal').modal('show');
        }

        function bid_modal(){
            <?php if(isCustomer() || isSeller()): ?>
                $('#bid_for_detail_product').modal('show');
          	<?php elseif(isAdmin()): ?>
                AIZ.plugins.notify('warning', '<?php echo e(translate('Sorry, Only customers & Sellers can Bid.')); ?>');
            <?php else: ?>
                $('#login_modal').modal('show');
            <?php endif; ?>
        }

        // function product_review(product_id) {
        //     <?php if(isCustomer()): ?>
        //         <?php if($review_status == 1): ?>
        //             $.post('<?php echo e(route('product_review_modal')); ?>', {
        //                 _token: '<?php echo e(@csrf_token()); ?>',
        //                 product_id: product_id
        //             }, function(data) {
        //                 $('#product-review-modal-content').html(data);
        //                 $('#product-review-modal').modal('show', {
        //                     backdrop: 'static'
        //                 });
        //                 AIZ.extra.inputRating();
        //             });
        //         <?php else: ?>
        //             AIZ.plugins.notify('warning', '<?php echo e(translate('Sorry, You need to buy this product to give review.')); ?>');
        //         <?php endif; ?>
        //     <?php elseif(Auth::check() && !isCustomer()): ?>
        //         AIZ.plugins.notify('warning', '<?php echo e(translate('Sorry, Only customers can give review.')); ?>');
        //     <?php else: ?>
        //         $('#login_modal').modal('show'); <?php endif; ?>
        // }

        function showSizeChartDetail(id, name){
            $('#size-chart-show-modal .modal-title').html('');
            $('#size-chart-show-modal .modal-body').html('');
            if (id == 0) {
                AIZ.plugins.notify('warning', '<?php echo e(translate('Sorry, There is no size guide found for this product.')); ?>');
                return false;
            }
            $.ajax({
                type: "GET",
        url: "<?php echo e(route('size-charts-show', '')); ?>/" +id, data: {}, success: function(data) { $('#size-chart-show-modal
        .modal-title').html(name); $('#size-chart-show-modal .modal-body').html(data);
        $('#size-chart-show-modal').modal('show'); } }); } </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/product_details.blade.php ENDPATH**/ ?>