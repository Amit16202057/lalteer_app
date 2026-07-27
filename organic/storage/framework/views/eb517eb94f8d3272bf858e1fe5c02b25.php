

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Google Login Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="GOOGLE_CLIENT_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('Client ID')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="GOOGLE_CLIENT_ID"
                                    value="<?php echo e(env('GOOGLE_CLIENT_ID')); ?>" placeholder="<?php echo e(translate('Google Client ID')); ?>"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="GOOGLE_CLIENT_SECRET">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('Client Secret')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="GOOGLE_CLIENT_SECRET"
                                    value="<?php echo e(env('GOOGLE_CLIENT_SECRET')); ?>"
                                    placeholder="<?php echo e(translate('Google Client Secret')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Facebook Login Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="FACEBOOK_CLIENT_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('App ID')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="FACEBOOK_CLIENT_ID"
                                    value="<?php echo e(env('FACEBOOK_CLIENT_ID')); ?>"
                                    placeholder="<?php echo e(translate('Facebook Client ID')); ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="FACEBOOK_CLIENT_SECRET">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('App Secret')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="FACEBOOK_CLIENT_SECRET"
                                    value="<?php echo e(env('FACEBOOK_CLIENT_SECRET')); ?>"
                                    placeholder="<?php echo e(translate('Facebook Client Secret')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Twitter Login Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWITTER_CLIENT_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('Client ID')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="TWITTER_CLIENT_ID"
                                    value="<?php echo e(env('TWITTER_CLIENT_ID')); ?>"
                                    placeholder="<?php echo e(translate('Twitter Client ID')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWITTER_CLIENT_SECRET">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('Client Secret')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="TWITTER_CLIENT_SECRET"
                                    value="<?php echo e(env('TWITTER_CLIENT_SECRET')); ?>"
                                    placeholder="<?php echo e(translate('Twitter Client Secret')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Apple Login Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="types[]" value="SIGN_IN_WITH_APPLE_LOGIN">
                        <input type="hidden" name="SIGN_IN_WITH_APPLE_LOGIN" value="<?php echo e(url('/users/login')); ?>"
                            required>
                        <input type="hidden" name="types[]" value="SIGN_IN_WITH_APPLE_REDIRECT">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SIGN_IN_WITH_APPLE_REDIRECT">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('Callback URL')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="SIGN_IN_WITH_APPLE_REDIRECT" value="<?php echo e(url('/apple-callback')); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SIGN_IN_WITH_APPLE_CLIENT_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('Client ID')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="SIGN_IN_WITH_APPLE_CLIENT_ID"
                                    value="<?php echo e(env('SIGN_IN_WITH_APPLE_CLIENT_ID')); ?>"
                                    placeholder="<?php echo e(translate('Apple Client ID')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SIGN_IN_WITH_APPLE_CLIENT_SECRET">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('Client Secret')); ?></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="SIGN_IN_WITH_APPLE_CLIENT_SECRET"
                                    value="<?php echo e(env('SIGN_IN_WITH_APPLE_CLIENT_SECRET')); ?>"
                                    placeholder="<?php echo e(translate('Apple Client Secret')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/backend/setup_configurations/social_login.blade.php ENDPATH**/ ?>