<div class="">
    <div class="mt-3">
        <!-- Sliders -->
        <div class="home-slider position-relative">
            <?php if(get_setting('home_slider_images', null, $lang) != null): ?>
                <div class="aiz-carousel dots-inside-bottom" data-autoplay="true" data-infinite="true">
                    <?php
                        $decoded_slider_images = json_decode(get_setting('home_slider_images', null, $lang), true);
                        $sliders = get_slider_images($decoded_slider_images);
                        $home_slider_links = get_setting('home_slider_links', null, $lang);
                        $home_slider_title1 = get_setting('home_slider_title1', null, $lang);
                        $home_slider_description = get_setting('home_slider_description', null, $lang);
                        $home_slider_btn1 = get_setting('home_slider_btn1', null, $lang);
                        $home_slider_btn2 = get_setting('home_slider_btn2', null, $lang);
                    ?>
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-box position-relative">
                            <a
                                href="<?php echo e(isset(json_decode($home_slider_links, true)[$key]) ? json_decode($home_slider_links, true)[$key] : ''); ?>">
                                <img class="d-block mw-100 img-fit overflow-hidden h-180px h-md-320px h-lg-460px home-top-slider-img"
                                    src="<?php echo e($slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                                    alt="<?php echo e(env('APP_NAME')); ?> promo"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                            </a>

                            <!-- Overlay Content -->
                            <div class="slider-overlay">
                                <h2 class="slider-heading">
                                    <?php echo e(isset(json_decode($home_slider_title1, true)[$key]) ? json_decode($home_slider_title1, true)[$key] : ''); ?>

                                </h2>
                                <p class="slider-description">
                                    <?php echo e(isset(json_decode($home_slider_description, true)[$key]) ? json_decode($home_slider_description, true)[$key] : ''); ?>

                                </p>
                                <div class="slider-buttons">
                                    <a href="<?php echo e(isset(json_decode($home_slider_btn1, true)[$key]) ? json_decode($home_slider_btn1, true)[$key] : ''); ?>"
                                        class="btn btn-primary"><?php echo e(translate('Shop Now')); ?></a>
                                    <a href="<?php echo e(isset(json_decode($home_slider_btn2, true)[$key]) ? json_decode($home_slider_btn2, true)[$key] : ''); ?>"
                                        class="btn btn-light text-dark ml-2"><?php echo e(translate('Contact Us')); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
    $bannerImage = \App\Models\BusinessSetting::where('type', 'home_banner3_images')->first();
    $value = $bannerImage ? json_decode($bannerImage->value, true) : null;
    $firstValue = $value && isset($value[0]) ? $value[0] : null;
?>
<div style="background-image: url('<?php echo e($firstValue ? uploaded_asset($firstValue) : asset('default-placeholder-image.jpg')); ?>');"
    class="below_slider_wrapper">


    <?php
        $exclusive_shipping_images = json_decode(get_setting('exclusive_shipping_images', null, $lang), true);
        $sliders = get_slider_images($exclusive_shipping_images);
        $exclusive_shipping_links = get_setting('exclusive_shipping_links', null, $lang);
        $exclusive_shipping_title1 = get_setting('exclusive_shipping_title1', null, $lang);
        $exclusive_shipping_description = get_setting('exclusive_shipping_description', null, $lang);
    ?>

    <div class="container below_slider">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item_1">
                <img height="60px" width="60px" src="<?php echo e($slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                    alt="">
                <div class="ex_shipping">
                    <?php echo e(isset(json_decode($exclusive_shipping_title1, true)[$key]) ? json_decode($exclusive_shipping_title1, true)[$key] : ''); ?>

                </div>
                <div class="ex_description">
                    <?php echo e(isset(json_decode($exclusive_shipping_description, true)[$key]) ? json_decode($exclusive_shipping_description, true)[$key] : ''); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php
        $titles = json_decode(get_setting('sister_concern_title', null, $lang), true) ?? [];
        $links = json_decode(get_setting('sister_concern_link', null, $lang), true) ?? [];
    ?>

    <div class="exclusive_btn">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none"
            id="toggleDropdown" class="exclusive_btn_svg">
            <path d="M25.5 33L35.5 23H15.5L25.5 33ZM25.5 50.5C22.0417 50.5 18.7917 49.8433 15.75 48.53C12.7083 47.2166 10.0625 45.4358 7.8125 43.1875C5.5625 40.9391 3.78167 38.2933 2.47 35.25C1.15834 32.2066 0.50167 28.9566 0.500003 25.5C0.498336 22.0433 1.155 18.7933 2.47 15.75C3.785 12.7067 5.56583 10.0608 7.8125 7.8125C10.0592 5.56416 12.705 3.78333 15.75 2.47C18.795 1.15667 22.045 0.5 25.5 0.5C28.955 0.5 32.205 1.15667 35.25 2.47C38.295 3.78333 40.9408 5.56416 43.1875 7.8125C45.4341 10.0608 47.2158 12.7067 48.5325 15.75C49.8491 18.7933 50.505 22.0433 50.5 25.5C50.495 28.9566 49.8383 32.2066 48.53 35.25C47.2216 38.2933 45.4408 40.9391 43.1875 43.1875C40.9341 45.4358 38.2883 47.2175 35.25 48.5325C32.2116 49.8475 28.9617 50.5033 25.5 50.5Z" fill="white" />
        </svg>
        <p><?php echo e(translate('Download Catalogue')); ?></p>
        </div>
    <div class="dropdown-menu" id="dropdownMenu">
            <?php if(is_array($titles) && count($titles) > 0): ?>
                <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $link = $links[$index] ?? '#'; ?>
                    <a href="<?php echo e(uploaded_asset($link)); ?>" class="dropdown-item" data-file="<?php echo e(uploaded_asset($link)); ?>">
                        <?php echo e($title); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

            <div>
                <button id="downloadBtn" class="btn btn-primary exclusive_btn-download"><?php echo e(translate('Download')); ?></button>
                <button id="previewBtn" class="btn btn-secondary exclusive_btn-download"><?php echo e(translate('Preview')); ?></button>
            </div>
    </div>

</div>

<style>
    #catalogSelect {
        border: none;
        font-size: 21px
    }
    .dropdown-menu {
        display: none;
        position: absolute;
        background: white;
        border: 1px solid #ddd;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 10px;
        min-width: 200px;
        z-index: 1000;
    }

    .dropdown-item {
        display: block;
        padding: 8px 12px;
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    .item_1 img{
        width: 60px !important;
        height: 60px !important;
    }
</style>

<script>
document.getElementById('toggleDropdown').addEventListener('click', function(event) {
    var dropdown = document.getElementById('dropdownMenu');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    event.stopPropagation(); // Prevents click event from propagating
});

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    var dropdown = document.getElementById('dropdownMenu');
    var button = document.getElementById('toggleDropdown');
    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.style.display = 'none';
    }
});



    document.getElementById('downloadBtn').addEventListener('click', function () {
    var selectedItem = document.querySelector('.dropdown-item.selected');

    if (selectedItem) {
        var link = selectedItem.getAttribute('data-file'); // Fetch file link
        var anchor = document.createElement('a');
        anchor.href = link;
        anchor.setAttribute('download', '');
        document.body.appendChild(anchor);
        anchor.click();
        document.body.removeChild(anchor);
    } else {
        alert('Please select a catalogue first.');
    }
});

// Mark selected dropdown item
document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default link behavior

        // Remove 'selected' and 'active' classes from all items
        document.querySelectorAll('.dropdown-item').forEach(i => {
            i.classList.remove('selected');
            i.classList.remove('active');
        });

        // Add 'selected' and 'active' classes to the clicked item
        this.classList.add('selected');
        this.classList.add('active');
    });
});



    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        var dropdown = document.getElementById('dropdownMenu');
        var button = document.getElementById('toggleDropdown');
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

document.getElementById('previewBtn').addEventListener('click', function () {
    var selectedItem = document.querySelector('.dropdown-item.selected');

    if (selectedItem) {
        var link = selectedItem.getAttribute('data-file');
        window.open(link, '_blank');
    } else {
        alert('Please select a catalogue first.');
    }
});

</script>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/classic/slider.blade.php ENDPATH**/ ?>