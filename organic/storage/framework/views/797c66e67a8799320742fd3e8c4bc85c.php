<div class="mb-4 p-3 p-sm-4">
    <!-- Tabs -->
    <div class="nav aiz-nav-tabs">
        <a href="#tab_default_1" data-toggle="tab"
            class="mr-5 pb-2 fs-16 fw-700 text-reset active show"><?php echo e(translate('Description')); ?></a>
        <?php if($detailedProduct->video_link != null): ?>
            <a href="#tab_default_2" data-toggle="tab"
                class="mr-5 pb-2 fs-16 fw-700 text-reset"><?php echo e(translate('Video')); ?></a>
        <?php endif; ?>
        <?php if($detailedProduct->pdf != null): ?>
            <a href="#tab_default_3" data-toggle="tab"
                class="mr-5 pb-2 fs-16 fw-700 text-reset"><?php echo e(translate('Downloads')); ?></a>
        <?php endif; ?>
    </div>

    <!-- Description -->
    <div class="tab-content pt-0">
        <!-- Description -->
        <div class="tab-pane fade active show" id="tab_default_1">
            <div class="py-5">
                <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                    <?php echo $detailedProduct->getTranslation('description'); ?>
                </div>
            </div>
        </div>

        <!-- Video -->
        <div class="tab-pane fade" id="tab_default_2">
            <div class="py-5">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php if($detailedProduct->video_provider == 'youtube' && isset(explode('=', $detailedProduct->video_link)[1])): ?>
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/<?php echo e(get_url_params($detailedProduct->video_link, 'v')); ?>"></iframe>
                    <?php elseif($detailedProduct->video_provider == 'dailymotion' && isset(explode('video/', $detailedProduct->video_link)[1])): ?>
                        <iframe class="embed-responsive-item"
                            src="https://www.dailymotion.com/embed/video/<?php echo e(explode('video/', $detailedProduct->video_link)[1]); ?>"></iframe>
                    <?php elseif($detailedProduct->video_provider == 'vimeo' && isset(explode('vimeo.com/', $detailedProduct->video_link)[1])): ?>
                        <iframe
                            src="https://player.vimeo.com/video/<?php echo e(explode('vimeo.com/', $detailedProduct->video_link)[1]); ?>"
                            width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen
                            allowfullscreen></iframe>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Download -->
        <div class="tab-pane fade" id="tab_default_3">
            <div class="py-5 text-center ">
                <a href="<?php echo e(uploaded_asset($detailedProduct->pdf)); ?>"
                    class="btn btn-primary"><?php echo e(translate('Download')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/product_details/description.blade.php ENDPATH**/ ?>