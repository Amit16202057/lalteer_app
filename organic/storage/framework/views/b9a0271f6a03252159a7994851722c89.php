

<?php $__env->startSection('content'); ?>
    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="<?php echo e(static_asset('assets/img/Frame 1171276523.png')); ?>" alt=""
                style="width: 100%; height: 200px;">
            <h2
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                <?php echo e(translate('Track Order')); ?></h2>
        </div>
    </section>

    
    <section class=""
        style="background-image: url('<?php echo e(static_asset('assets/img/p_details_bg.jpg')); ?>'); background-size: cover; background-position: center;">
        <div class="container text-left pt-4 pb-4">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-8 mx-auto">
                    <form class="" action="<?php echo e(route('orders.track')); ?>" method="GET" enctype="multipart/form-data">
                        <div class="bg-white border rounded-0">
                            <div class="fs-15 fw-600 p-3 border-bottom text-center">
                                <?php echo e(translate('Check Your Order Status')); ?>

                            </div>
                            <div class="form-box-content p-3">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-0 mb-3"
                                        placeholder="<?php echo e(translate('Order Code')); ?>" name="order_code" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-primary rounded-0 w-150px"><?php echo e(translate('Track Order')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php if(isset($order)): ?>
                <div class="bg-white border rounded-0 mt-5">
                    <div class="fs-15 fw-600 p-3">
                        <?php echo e(translate('Order Summary')); ?>

                    </div>
                    <div class="p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Order Code')); ?>:</td>
                                        <td><?php echo e($order->code); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Customer')); ?>:</td>
                                        <td><?php echo e(json_decode($order->shipping_address)->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Email')); ?>:</td>
                                        <?php if($order->user_id != null): ?>
                                            <td><?php echo e($order->user->email); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Shipping address')); ?>:</td>
                                        <td><?php echo e(json_decode($order->shipping_address)->address); ?>,
                                            <?php echo e(json_decode($order->shipping_address)->city); ?>,
                                            <?php echo e(json_decode($order->shipping_address)->country); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Order date')); ?>:</td>
                                        <td><?php echo e(date('d-m-Y H:i A', $order->date)); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Total order amount')); ?>:</td>
                                        <td><?php echo e(single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax'))); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Shipping method')); ?>:</td>
                                        <td><?php echo e(translate('Flat shipping rate')); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Payment method')); ?>:</td>
                                        <td><?php echo e(translate(ucfirst(str_replace('_', ' ', $order->payment_type)))); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Delivery Status')); ?>:</td>
                                        <td><?php echo e(translate(ucfirst(str_replace('_', ' ', $order->delivery_status)))); ?></td>
                                    </tr>
                                    <?php if($order->tracking_code): ?>
                                        <tr>
                                            <td class="w-50 fw-600"><?php echo e(translate('Tracking code')); ?>:</td>
                                            <td><?php echo e($order->tracking_code); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $status = $order->delivery_status;
                    ?>
                    <div class="bg-white border rounded-0 mt-4">

                        <?php if($orderDetail->product != null): ?>
                            <div class="p-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0"><?php echo e(translate('Product Name')); ?></th>
                                            <th class="border-0"><?php echo e(translate('Quantity')); ?></th>
                                            <th class="border-0"><?php echo e(translate('Shipped By')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo e($orderDetail->product->getTranslation('name')); ?>

                                                (<?php echo e($orderDetail->variation); ?>)
                                            </td>
                                            <td><?php echo e($orderDetail->quantity); ?></td>
                                            <td><?php echo e($orderDetail->product->user->name); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/track_order.blade.php ENDPATH**/ ?>