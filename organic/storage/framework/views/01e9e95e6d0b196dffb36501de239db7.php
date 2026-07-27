

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('auth.'.get_setting('authentication_layout_select').'.forgot_password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    <?php if(addon_is_activated('otp_system')): ?>
        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if (country.iso2 == 'bd') {
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "<?php echo e(static_asset('assets/js/intlTelutils.js')); ?>?1590403638580",
            onlyCountries: <?php
                echo json_encode(
                    \App\Models\Country::where('status', 1)
                        ->pluck('code')
                        ->toArray(),
                );
            ?>,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if (selectedCountryData.iso2 == 'bd') {
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });

        function toggleEmailPhone(el) {
            if (isPhoneShown) {
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                $('input[name=phone]').val(null);
                isPhoneShown = false;
                $(el).html('<i>*<?php echo e(translate('Use Phone Number Instead')); ?></i>');
            } else {
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                $('input[name=email]').val(null);
                isPhoneShown = true;
                $(el).html('<i>*<?php echo e(translate('Use Email Instead')); ?></i>');
            }
        }
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('auth.layouts.authentication', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>