<?php
    $subscription_footer_images = json_decode(get_setting('subscription_footer_images', null, $lang), true);
    $sliders = get_slider_images($subscription_footer_images);
    $subscription_footer_title = get_setting('subscription_footer_title', null, $lang);
    $subscription_footer_description = get_setting('subscription_footer_description', null, $lang);
?>

<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="newsletter_section">
        <img width="100%"
            src="<?php echo e($slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
            alt="">

        <div class="news_letter_overlay">
            <div class="news_title">
                <?php echo e(isset(json_decode($subscription_footer_title, true)[$key]) ? json_decode($subscription_footer_title, true)[$key] : ''); ?>

            </div>
            <div class="news_desc">
                <?php echo e(isset(json_decode($subscription_footer_description, true)[$key]) ? json_decode($subscription_footer_description, true)[$key] : ''); ?>

            </div>
            <div class="subs_news">
                <?php if(get_setting('newsletter_activation')): ?>
                    <div class="mb-3">
                        <form method="POST" action="<?php echo e(route('subscribers.store')); ?>" class="position-relative d-flex">
                            <?php echo csrf_field(); ?>
                            <div style="max-width: 500px; width: 100%; position: relative;">
                                <input type="email" class="form-control shadow-sm"
                                    placeholder="<?php echo e(translate('Enter your e-mail')); ?>" name="email" required
                                    style="border-radius: 25px; padding: 12px 15px; padding-right: 100px; border: 1px solid #ccc;">
                                <button type="submit" class="btn btn-success text-white position-absolute"
                                    style="right: 10px; top: 50%; transform: translateY(-50%); border-radius: 8px; padding: 5px 15px; font-size: 14px;">
                                    <?php echo e(translate('Subscribe')); ?>

                                </button>
                            </div>
                        </form>



                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/classic/partials/newsletter.blade.php ENDPATH**/ ?>