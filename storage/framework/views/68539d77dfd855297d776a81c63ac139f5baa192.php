<?php $__env->startSection('content'); ?>
<div class="thanks-wrapper">
    <h1 class="background-text">Thank you</h1>
    <div class="thanks-content">
        <p class="message">お問い合わせありがとうございました</p>
        <a href="<?php echo e(route('contact.index')); ?>" class="home-button">HOME</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/contact/thanks.blade.php ENDPATH**/ ?>