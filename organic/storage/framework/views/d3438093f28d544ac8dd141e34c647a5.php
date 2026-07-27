

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('SMTP Settings')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="MAIL_DRIVER">
                        <label class="col-md-3 col-form-label"><?php echo e(translate('Type')); ?></label>
                        <div class="col-md-9">
                            <select class="form-control aiz-selectpicker mb-2 mb-md-0" name="MAIL_DRIVER" onchange="checkMailDriver()">
                                <option value="sendmail" <?php if(env('MAIL_DRIVER') == "sendmail"): ?> selected <?php endif; ?>><?php echo e(translate('Sendmail')); ?></option>
                                <option value="smtp" <?php if(env('MAIL_DRIVER') == "smtp"): ?> selected <?php endif; ?>><?php echo e(translate('SMTP')); ?></option>
                                <option value="mailgun" <?php if(env('MAIL_DRIVER') == "mailgun"): ?> selected <?php endif; ?>><?php echo e(translate('Mailgun')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div id="smtp">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAIL HOST')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_HOST" value="<?php echo e(env('MAIL_HOST')); ?>" placeholder="<?php echo e(translate('MAIL HOST')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_PORT">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAIL PORT')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_PORT" value="<?php echo e(env('MAIL_PORT')); ?>" placeholder="<?php echo e(translate('MAIL PORT')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_USERNAME">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAIL USERNAME')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_USERNAME" value="<?php echo e(env('MAIL_USERNAME')); ?>" placeholder="<?php echo e(translate('MAIL USERNAME')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAIL PASSWORD')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_PASSWORD" value="<?php echo e(env('MAIL_PASSWORD')); ?>" placeholder="<?php echo e(translate('MAIL PASSWORD')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAIL ENCRYPTION')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="<?php echo e(env('MAIL_ENCRYPTION')); ?>" placeholder="<?php echo e(translate('MAIL ENCRYPTION')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAIL FROM ADDRESS')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="MAIL_FROM_ADDRESS" value="<?php echo e(env('MAIL_FROM_ADDRESS')); ?>" placeholder="<?php echo e(translate('MAIL FROM ADDRESS')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAIL FROM NAME')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAIL_FROM_NAME" value="<?php echo e(env('MAIL_FROM_NAME')); ?>" placeholder="<?php echo e(translate('MAIL FROM NAME')); ?>">
                            </div>
                        </div>
                    </div>
                    <div id="mailgun">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAILGUN_DOMAIN">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAILGUN DOMAIN')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAILGUN_DOMAIN" value="<?php echo e(env('MAILGUN_DOMAIN')); ?>" placeholder="<?php echo e(translate('MAILGUN DOMAIN')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAILGUN_SECRET">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('MAILGUN SECRET')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="MAILGUN_SECRET" value="<?php echo e(env('MAILGUN_SECRET')); ?>" placeholder="<?php echo e(translate('MAILGUN SECRET')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('Save Configuration')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Test SMTP configuration')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('test.smtp')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <input type="email" class="form-control" name="email" value="<?php echo e(auth()->user()->email); ?>" placeholder="<?php echo e(translate('Enter your email address')); ?>">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary"><?php echo e(translate('Send test email')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Instruction')); ?></h5>
            </div>
            <div class="card-body">
                <p class="text-danger"><?php echo e(translate('Please be carefull when you are configuring SMTP. For incorrect configuration you will get error at the time of order place, new registration, sending newsletter.')); ?></p>
                <h6 class="text-muted"><?php echo e(translate('For Non-SSL')); ?></h6>
                <ul class="list-group">
                    <li class="list-group-item text-dark"><?php echo e(translate('Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver ')); ?></li>
                    <li class="list-group-item text-dark"><?php echo e(translate('Set Mail Host according to your server Mail Client Manual Settings')); ?></li>
                    <li class="list-group-item text-dark"><?php echo e(translate('Set Mail port as 587')); ?></li>
                    <li class="list-group-item text-dark"><?php echo e(translate('Set Mail Encryption as ssl if you face issue with tls')); ?></li>
                </ul>
                <br>
                <h6 class="text-muted"><?php echo e(translate('For SSL')); ?></h6>
                <ul class="list-group mar-no">
                    <li class="list-group-item text-dark"><?php echo e(translate('Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver')); ?></li>
                    <li class="list-group-item text-dark"><?php echo e(translate('Set Mail Host according to your server Mail Client Manual Settings')); ?></li>
                    <li class="list-group-item text-dark"><?php echo e(translate('Set Mail port as 465')); ?></li>
                    <li class="list-group-item text-dark"><?php echo e(translate('Set Mail Encryption as ssl')); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            checkMailDriver();
        });
        function checkMailDriver(){
            if($('select[name=MAIL_DRIVER]').val() == 'mailgun'){
                $('#mailgun').show();
                $('#smtp').hide();
            }
            else{
                $('#mailgun').hide();
                $('#smtp').show();
            }
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/backend/setup_configurations/smtp_settings.blade.php ENDPATH**/ ?>