

<?php $__env->startSection('panel_content'); ?>
    <div class="card shadow-none rounded-0 border">
        <div class="card-header border-bottom-0">
            <h5 class="mb-0 fs-20 fw-700 text-dark"><?php echo e(translate('Purchase History')); ?></h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead class="text-gray fs-12">
                    <tr>
                        <th class="pl-0"><?php echo e(translate('Code')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Date')); ?></th>
                        <th><?php echo e(translate('Amount')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Delivery Status')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Payment Status')); ?></th>
                        <th class="text-right pr-0"><?php echo e(translate('Options')); ?></th>
                    </tr>
                </thead>
                <tbody class="fs-14">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($order->orderDetails) > 0): ?>
                            <tr>
                                <!-- Code -->
                                <td class="pl-0">
                                    <a href="<?php echo e(route('purchase_history.details', encrypt($order->id))); ?>"><?php echo e($order->code); ?></a>
                                </td>
                                <!-- Date -->
                                <td class="text-secondary"><?php echo e(date('d-m-Y', $order->date)); ?></td>
                                <!-- Amount -->
                                <td class="fw-700">
                                    <?php
                                        $subtotal = $order->orderDetails->sum(fn($d) => $d->price * $d->quantity);
                                        $shipping = $order->orderDetails->sum('shipping_cost'); 
                                        $tax      = $order->orderDetails->sum('tax');
                                        $coupon   = $order->coupon_discount ?? 0;

                                        $total = $subtotal + $shipping + $tax - $coupon;
                                        $total = round($total);
                                    ?>

                                    <?php echo e(single_price($total)); ?>

                                </td>

                                <!-- Delivery Status -->
                                <td class="fw-700">
                                    <?php echo e(translate(ucfirst(str_replace('_', ' ', $order->delivery_status)))); ?>

                                    <?php if($order->delivery_viewed == 0): ?>
                                        <span class="ml-2" style="color:green"><strong>*</strong></span>
                                    <?php endif; ?>
                                </td>
                                <!-- Payment Status -->
                                <td>
                                    <?php if($order->payment_status == 'paid'): ?>
                                        <span class="badge badge-inline badge-success p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;"><?php echo e(translate('Paid')); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-inline badge-danger p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;"><?php echo e(translate('Unpaid')); ?></span>
                                    <?php endif; ?>
                                    <?php if($order->payment_status_viewed == 0): ?>
                                        <span class="ml-2" style="color:green"><strong>*</strong></span>
                                    <?php endif; ?>
                                </td>
                                <!-- Options -->
                                <td class="text-right pr-0">
                                    <!-- Re-order -->
                                    <a class="btn-soft-white rounded-3 btn-sm mr-1" href="<?php echo e(route('re_order', encrypt($order->id))); ?>">
                                        <?php echo e(translate('Reorder')); ?>

                                    </a>
                                    <!-- Cancel -->
                                    <?php if($order->delivery_status == 'pending' && $order->payment_status == 'unpaid'): ?>
                                        <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm hov-svg-white mt-2 mt-sm-0 confirm-delete" data-href="<?php echo e(route('purchase_history.destroy', $order->id)); ?>" title="<?php echo e(translate('Cancel')); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9.202" height="12" viewBox="0 0 9.202 12">
                                                <path id="Path_28714" data-name="Path 28714" d="M15.041,7.608l-.193,5.85a1.927,1.927,0,0,1-1.933,1.864H9.243A1.927,1.927,0,0,1,7.31,13.46L7.117,7.608a.483.483,0,0,1,.966-.032l.193,5.851a.966.966,0,0,0,.966.929h3.672a.966.966,0,0,0,.966-.931l.193-5.849a.483.483,0,1,1,.966.032Zm.639-1.947a.483.483,0,0,1-.483.483H6.961a.483.483,0,1,1,0-.966h1.5a.617.617,0,0,0,.615-.555,1.445,1.445,0,0,1,1.442-1.3h1.126a1.445,1.445,0,0,1,1.442,1.3.617.617,0,0,0,.615.555h1.5a.483.483,0,0,1,.483.483ZM9.913,5.178h2.333a1.6,1.6,0,0,1-.123-.456.483.483,0,0,0-.48-.435H10.516a.483.483,0,0,0-.48.435,1.6,1.6,0,0,1-.124.456ZM10.4,12.5V8.385a.483.483,0,0,0-.966,0V12.5a.483.483,0,1,0,.966,0Zm2.326,0V8.385a.483.483,0,0,0-.966,0V12.5a.483.483,0,1,0,.966,0Z" transform="translate(-6.478 -3.322)" fill="#d43533"/>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <!-- Details -->
                                    <a href="<?php echo e(route('purchase_history.details', encrypt($order->id))); ?>" class="btn btn-soft-info btn-icon btn-circle btn-sm hov-svg-white mt-2 mt-sm-0" title="<?php echo e(translate('Order Details')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10">
                                            <g id="Group_24807" data-name="Group 24807" transform="translate(-1339 -422)">
                                                <rect id="Rectangle_18658" data-name="Rectangle 18658" width="12" height="1" transform="translate(1339 422)" fill="#3490f3"/>
                                                <rect id="Rectangle_18659" data-name="Rectangle 18659" width="12" height="1" transform="translate(1339 425)" fill="#3490f3"/>
                                                <rect id="Rectangle_18660" data-name="Rectangle 18660" width="12" height="1" transform="translate(1339 428)" fill="#3490f3"/>
                                                <rect id="Rectangle_18661" data-name="Rectangle 18661" width="12" height="1" transform="translate(1339 431)" fill="#3490f3"/>
                                            </g>
                                        </svg>
                                    </a>
                                    <!-- Invoice -->
                                    <a class="btn btn-soft-secondary-base btn-icon btn-circle btn-sm hov-svg-white mt-2 mt-sm-0" href="<?php echo e(route('invoice.download', $order->id)); ?>" title="<?php echo e(translate('Download Invoice')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12.001" viewBox="0 0 12 12.001">
                                            <g id="Group_24807" data-name="Group 24807" transform="translate(-1341 -424.999)">
                                              <path id="Union_17" data-name="Union 17" d="M13936.389,851.5l.707-.707,2.355,2.355V846h1v7.1l2.306-2.306.707.707-3.538,3.538Z" transform="translate(-12592.95 -421)" fill="#f3af3d"/>
                                              <rect id="Rectangle_18661" data-name="Rectangle 18661" width="12" height="1" transform="translate(1341 436)" fill="#f3af3d"/>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="aiz-pagination mt-2">
                <?php echo e($orders->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <!-- Delete modal -->
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.user_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/user/purchase_history.blade.php ENDPATH**/ ?>