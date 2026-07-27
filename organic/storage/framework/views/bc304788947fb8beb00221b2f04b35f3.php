<div class="mb-4">
    <div class="p-3 p-sm-4">
        <?php
            $total = 0;
            $total += $detailedProduct->reviews->where('status', 1)->count();
        ?>
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="ml-1 fs-20 fw-700"><?php echo e(translate('REVIEWS')); ?> (<?php echo e($total); ?>)</h1>
            </div>
            <div style="margin-left: 10px;">
                <a href="javascript:void(0);" onclick="product_review('<?php echo e($detailedProduct->id); ?>')"
                    class="btn btn-secondary-base fw-400 rounded-0 text-white">
                    <span class="d-md-inline-block">
                        <?php echo e(translate('Rate this Products')); ?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Ratting -->
    

    <script>
        function product_review(product_id) {
            // Check if user is authenticated
            <?php if(Auth::check()): ?>
                $.post('<?php echo e(route('product_review_modal')); ?>', {
                    _token: '<?php echo e(@csrf_token()); ?>',
                    product_id: product_id
                }, function(data) {
                    $('#product-review-modal-content').html(data);
                    $('#product-review-modal').modal('show', {
                        backdrop: 'static'
                    });
                    AIZ.extra.inputRating();
                });
            <?php else: ?>
                // Show login modal if the user is not authenticated
                $('#login_modal').modal('show');
            <?php endif; ?>
        }
    </script>
    <!-- Reviews -->
    <?php echo $__env->make('frontend.product_details.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/product_details/review_section.blade.php ENDPATH**/ ?>