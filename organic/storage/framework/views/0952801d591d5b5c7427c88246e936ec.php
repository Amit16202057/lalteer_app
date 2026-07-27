<div class="z-3 sticky-top-lg">
    <div class="card rounded-2 border" style="background: linear-gradient(to bottom, #86C440, #245E1F);">

        <?php
            $inside_dhaka = (int) \App\Models\BusinessSetting::where('type', 'flat_rate_shipping_cost')->value('value');
            $outside_dhaka = (int) \App\Models\BusinessSetting::where('type', 'shipping_cost_admin')->value('value');

            $subtotal_for_min_order_amount = 0;
            $subtotal = 0;
            $tax = 0;
            $product_shipping_cost = 0;
            // Clear shipping session if cart is being viewed fresh (no selection made yet in this session)
            if (!session()->has('shipping_session_id') || session('shipping_session_id') !== session()->getId()) {
                session()->forget(['shipping_cost', 'shipping_location']);
                session(['shipping_session_id' => session()->getId()]);
            }

            $shipping = session('shipping_cost', 0);
            $coupon_code = null;
            $coupon_discount = 0;
            $total_point = 0;
            $selectedShippingLocation = session('shipping_location', null);

        ?>
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $product = get_single_product($cartItem['product_id']);
                $subtotal_for_min_order_amount +=
                    cart_product_price($cartItem, $cartItem->product, false, false) * $cartItem['quantity'];
                $subtotal += cart_product_price($cartItem, $product, false, false) * $cartItem['quantity'];
                $tax += cart_product_tax($cartItem, $product, false) * $cartItem['quantity'];
                $product_shipping_cost = session('shipping_cost', 0) / count($carts);
                // $shipping += $product_shipping_cost;
                if (get_setting('coupon_system') == 1 && $cartItem->coupon_applied == 1) {
                    $coupon_code = $cartItem->coupon_code;
                    $coupon_discount = $carts->sum('discount');
                }
                if (addon_is_activated('club_point')) {
                    $total_point += $product->earn_point * $cartItem['quantity'];
                }
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="card-header pt-4 pb-1 border-bottom-0">
            <div class="align-items-center">
                <h3 class="fs-18 fw-700 mb-0 text-white"><?php echo e(translate('Summary')); ?></h3>
            </div>



            <div class="text-right">
                <!-- Minimum Order Amount -->
                <?php if(get_setting('minimum_order_amount_check') == 1 &&
                        $subtotal_for_min_order_amount < get_setting('minimum_order_amount')): ?>
                    <span class="badge badge-inline badge-warning fs-12 rounded-0 px-2">
                        <?php echo e(translate('Minimum Order Amount') . ' ' . single_price(get_setting('minimum_order_amount'))); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body pt-2">

            <div class="row gutters-5">
                <!-- Total Products -->
                
                <?php if(addon_is_activated('club_point')): ?>
                    <!-- Total Clubpoint -->
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between bg-secondary-base p-2">
                            <span class="fs-13 text-white"><?php echo e(translate('Total Clubpoint')); ?></span>
                            <span class="fs-13 fw-700 text-white"><?php echo e(sprintf('%02d', $total_point)); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <input type="hidden" id="sub_total" value="<?php echo e($subtotal); ?>">

            <table class="table my-3 w-100">
                <tfoot>
                    <!-- Subtotal -->
                    <tr class="cart-subtotal">
                        <th class="pl-0 fs-15 fw-500 pt-0 pb-2 text-white border-0"><?php echo e(translate('Subtotal')); ?>

                            (<?php echo e(sprintf('%02d', count($carts))); ?> <?php echo e(translate('Products')); ?>)</th>
                        <td class="text-right pr-0 fs-16 pt-0 pb-2 text-white border-0">
                            <?php echo e(single_price($subtotal)); ?></td>
                    </tr>

                    <tr class="cart-subtotal">
                        <th class="pl-0 fs-15 fw-500 pt-0 pb-2 text-white border-0"><?php echo e(translate('Shipping')); ?></th>
                        <td class="text-right pr-0 fs-16 pt-0 pb-2 text-white border-0">
                            <span id="shipping_cost" class="">
                                <?php if($shipping > 0): ?>
                                    ৳<?php echo e($shipping); ?>

                                <?php else: ?>
                                    <span class="text-warning"><?php echo e(translate('Select location')); ?></span>
                                <?php endif; ?>
                            </span>
                        </td>

                    </tr>
                    <tr>
                        <td class="border-0 w-100" colspan="2">
                            <label class="text-white fw-500 fs-13 mb-1"><?php echo e(translate('Select Shipping Location')); ?> <span class="text-danger">*</span></label>
                            <select id="shipping_location" class="form-control" required>
                                <option value="">
                                    <?php echo e(translate('-- Select Location --')); ?>

                                </option>
                                <option value="inside_dhaka" <?php echo e($selectedShippingLocation === 'inside_dhaka' ? 'selected' : ''); ?>>
                                    <?php echo e(translate('Inside Dhaka')); ?> - ৳<?php echo e($inside_dhaka); ?>

                                </option>
                                <option value="outside_dhaka" <?php echo e($selectedShippingLocation === 'outside_dhaka' ? 'selected' : ''); ?>>
                                    <?php echo e(translate('Outside Dhaka')); ?> - ৳<?php echo e($outside_dhaka); ?>

                                </option>
                            </select>
                            <span id="location_error" class="d-none w-100 mt-2 p-2 rounded text-white fs-13"
                                  style="background-color: #ff4d4f; border-left: 4px solid #a8071a; box-shadow: 0 2px 6px rgba(0,0,0,0.15); display: block;">
                                <i class="las la-exclamation-circle"></i> <?php echo e(translate('Please select a shipping location before proceeding.')); ?>

                            </span>
                        </td>
                    </tr>



                    <!-- Tax -->
                    
                    <?php if($proceed != 1): ?>
                        <!-- Total Shipping -->
                        <tr class="cart-shipping">
                            <th class="pl-0 fs-14 fw-400 pt-0 pb-2 text-dark border-top-0">
                                <?php echo e(translate('Total Shipping')); ?></th>
                            <td class="text-right pr-0 fs-14 pt-0 pb-2 text-dark border-top-0">
                                <?php echo e(single_price($shipping)); ?></td>
                        </tr>
                    <?php endif; ?>
                    <!-- Redeem point -->
                    <?php if(Session::has('club_point')): ?>
                        <tr class="cart-club-point">
                            <th class="pl-0 fs-14 fw-400 pt-0 pb-2 text-dark border-top-0">
                                <?php echo e(translate('Redeem point')); ?></th>
                            <td class="text-right pr-0 fs-14 pt-0 pb-2 text-dark border-top-0">
                                <?php echo e(single_price(Session::get('club_point'))); ?></td>
                        </tr>
                    <?php endif; ?>
                    <!-- Coupon Discount -->
                    <?php if($coupon_discount > 0): ?>
                        <tr class="cart-coupon-discount">
                            <th class="pl-0 fs-14 fw-400 pt-0 pb-2 text-dark border-top-0">
                                <?php echo e(translate('Coupon Discount')); ?></th>
                            <td class="text-right pr-0 fs-14 pt-0 pb-2 text-dark border-top-0">
                                <?php echo e(single_price($coupon_discount)); ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php
                        $total = $subtotal + $tax + $shipping;
                        if (Session::has('club_point')) {
                            $total -= Session::get('club_point');
                        }
                        if ($coupon_discount > 0) {
                            $total -= $coupon_discount;
                        }
                    ?>
                    <!-- Total -->
                    <tr class="cart-total">
                        <th class="pl-0 fs-16 text-white fw-700 border-top-0 pt-3 text-uppercase">
                            <?php echo e(translate('Total')); ?></th>
                        <td class="text-right pr-0 fs-16 fw-700 text-white border-top-0 pt-3">
                            <?php echo e(single_price($total)); ?></td>
                    </tr>
                </tfoot>
            </table>

            <!-- Coupon System -->
            

            <?php if($proceed == 1): ?>
                <!-- Continue to Shipping -->
                <div class="mt-2 mb-5">
                    <button id="checkoutBtn"
                        class="btn btn-danger btn-block fs-16 fw-600 rounded-2 px-4 text-white"
                        disabled>
                        <?php echo e(translate('Checkout')); ?>

                    </button>
                    <small class="text-white-50 d-block text-center mt-1 fs-11" id="checkout_hint">
                        <?php echo e(translate('Please select a shipping location to continue')); ?>

                    </small>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<script>
    window.initCartSummary = function() {
        const shippingLocationSelect = document.getElementById("shipping_location");
        const shippingCostElement = document.getElementById("shipping_cost");
        const subtotalInput = document.getElementById("sub_total");
        const totalCell = document.querySelector(".cart-total td");
        const checkoutBtn = document.getElementById("checkoutBtn");
        const checkoutHint = document.getElementById("checkout_hint");
        const errorMsg = document.getElementById("location_error");
        const couponDiscount = parseFloat("<?php echo e($coupon_discount); ?>") || 0;

        const formatPrice = (amount) => {
            const numericAmount = isNaN(amount) ? 0 : Number(amount);
            try {
                return new Intl.NumberFormat("en-BD", {
                    style: "currency",
                    currency: "BDT",
                    minimumFractionDigits: 2,
                }).format(numericAmount);
            } catch (error) {
                return "৳" + numericAmount.toFixed(2);
            }
        };

        const showLocationError = () => {
            if (errorMsg) {
                errorMsg.classList.remove("d-none");
            }
        };

        const hideLocationError = () => {
            if (errorMsg) {
                errorMsg.classList.add("d-none");
            }
        };

        const toggleCheckoutButtonState = () => {
            if (!checkoutBtn) {
                return;
            }
            const hasLocationSelected = !!(shippingLocationSelect && shippingLocationSelect.value);

            if (hasLocationSelected) {
                checkoutBtn.disabled = false;
                checkoutBtn.classList.remove('btn-secondary');
                checkoutBtn.classList.add('btn-danger');
                if (checkoutHint) checkoutHint.style.display = 'none';
            } else {
                checkoutBtn.disabled = true;
                checkoutBtn.classList.remove('btn-danger');
                checkoutBtn.classList.add('btn-secondary');
                if (checkoutHint) checkoutHint.style.display = 'block';
            }
        };

        // Initial state check
        toggleCheckoutButtonState();

        if (shippingLocationSelect && shippingLocationSelect.dataset.initialized !== '1') {
            shippingLocationSelect.dataset.initialized = '1';
            shippingLocationSelect.addEventListener("change", function() {
                const location = this.value;

                if (!location) {
                    showLocationError();
                    toggleCheckoutButtonState();
                    return;
                }

                hideLocationError();

                // Immediately enable button on selection
                toggleCheckoutButtonState();

                fetch("<?php echo e(route('update-shipping')); ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
                        },
                        body: JSON.stringify({
                            location: location
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const shippingCost = parseFloat(data.shipping_cost) || 0;
                            if (shippingCostElement) {
                                shippingCostElement.innerHTML = '৳' + shippingCost;
                            }

                            const subtotal = subtotalInput ? parseFloat(subtotalInput.value) || 0 : 0;
                            const total = subtotal + shippingCost - couponDiscount;
                            if (totalCell) {
                                totalCell.innerText = formatPrice(total);
                            }

                            // Ensure button stays enabled after successful update
                            toggleCheckoutButtonState();
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        // Even on error, keep button enabled if location is selected
                        toggleCheckoutButtonState();
                    });
            });
        }

        if (checkoutBtn && checkoutBtn.dataset.initialized !== '1') {
            checkoutBtn.dataset.initialized = '1';
            checkoutBtn.addEventListener('click', function(e) {
                if (!shippingLocationSelect || !shippingLocationSelect.value) {
                    e.preventDefault();
                    showLocationError();
                    if (shippingLocationSelect) {
                        shippingLocationSelect.focus();
                        // Scroll to the select element
                        shippingLocationSelect.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return;
                }

                hideLocationError();
                // Add loading state to button
                checkoutBtn.disabled = true;
                checkoutBtn.innerHTML = '<i class="las la-spinner la-spin"></i> ' + '<?php echo e(translate("Processing...")); ?>';
                window.location.href = "<?php echo e(route('checkout')); ?>";
            });
        }
    };

    window.initCartSummary();
</script>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/partials/cart/cart_summary.blade.php ENDPATH**/ ?>