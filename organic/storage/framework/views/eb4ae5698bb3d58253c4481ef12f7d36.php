<?php $__currentLoopData = get_activate_payment_methods(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($payment_method->name); ?>"><?php echo e(ucfirst(translate($payment_method->name))); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/partials/online_payment_options.blade.php ENDPATH**/ ?>