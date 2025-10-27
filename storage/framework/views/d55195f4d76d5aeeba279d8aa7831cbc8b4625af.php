<?php $__env->startSection('content'); ?>
<div class="confirm-wrapper">
  <h1 class="brand">FashionablyLate</h1>
  <hr class="full-line">
  <h2 class="title">Confirm</h2>

    <form action="<?php echo e(route('contact.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <table class="confirm-table">
            <tr><th>お名前</th><td><?php echo e($inputs['first_name']); ?>　<?php echo e($inputs['last_name']); ?></td></tr>
            <tr><th>性別</th><td><?php if($inputs['gender']==1): ?>男性<?php elseif($inputs['gender']==2): ?>女性<?php else: ?>その他<?php endif; ?></td></tr>
            <tr><th>メールアドレス</th><td><?php echo e($inputs['email']); ?></td></tr>
            <tr><th>電話番号</th><td><?php echo e($inputs['tel']); ?></td></tr>
            <tr><th>住所</th><td><?php echo e($inputs['address']); ?></td></tr>
            <tr><th>建物名</th><td><?php echo e($inputs['building'] ?? ''); ?></td></tr>
            <tr><th>お問い合わせの種類</th><td><?php echo e($category->content ?? ''); ?></td></tr>
            <tr><th>お問い合わせ内容</th><td><?php echo e($inputs['detail']); ?></td></tr>
        </table>

        <?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="button-area">
            <button type="submit" class="btn-confirm" name="action" value="submit">送信</button>
            <button type="submit" class="btn-back" name="action" value="back">修正</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/contact/confirm.blade.php ENDPATH**/ ?>