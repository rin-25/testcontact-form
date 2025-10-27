<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/contact.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="contact-wrapper">
    <h1 class="brand">FashionablyLate</h1>
    <hr>
    <h2 class="title">Contact</h2>

    <form action="<?php echo e(route('contact.confirm')); ?>" method="POST" class="contact-form">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>お名前 <span class="required">※</span></label>
            <div class="name-fields">
                <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>" placeholder="例）山田" class="input-box">
                <input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>" placeholder="例）太郎" class="input-box">
            </div>
        </div>
        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="form-group">
            <label>性別 <span class="required">※</span></label>
            <div class="gender-group">
                <label><input type="radio" name="gender" value="1">男性</label>
                <label><input type="radio" name="gender" value="2">女性</label>
                <label><input type="radio" name="gender" value="3">その他</label>
        </div>

        </div>
        <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="form-group">
            <label>メールアドレス <span class="required">※</span></label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="例）test@example.com" class="input-box full">
        </div>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="form-group">
            <label>電話番号 <span class="required">※</span></label>
            <div class="tel-fields">
                <input type="text" name="tel1" value="<?php echo e(old('tel1')); ?>" maxlength="4" placeholder="080" class="input-box tel">
                <span class="tel-dash">ー</span>
                <input type="text" name="tel2" value="<?php echo e(old('tel2')); ?>" maxlength="4" placeholder="1234" class="input-box tel">
                <span class="tel-dash">ー</span>
                <input type="text" name="tel3" value="<?php echo e(old('tel3')); ?>" maxlength="4" placeholder="5678" class="input-box tel">
            </div>
        </div>

        <?php if($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3')): ?>
            <p class="error-message">電話番号を入力してください</p>
        <?php endif; ?>


        <div class="form-group">
            <label>住所 <span class="required">※</span></label>
            <input type="text" name="address" value="<?php echo e(old('address')); ?>" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" class="input-box full">
        </div>
        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="<?php echo e(old('building')); ?>" placeholder="例）千駄ヶ谷マンション101" class="input-box full">
        </div>

        <div class="form-group">
            <label>お問い合わせの種類 <span class="required">※</span></label>
            <select name="category_id" class="input-box full">
                <option value="">選択してください</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->content); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="form-group">
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <textarea name="detail" class="input-box full textarea" placeholder="お問い合わせ内容をご記入ください"><?php echo e(old('detail')); ?></textarea>
        </div>
        <?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="button-area">
            <button type="submit" class="btn-confirm">確認画面へ</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/contact/index.blade.php ENDPATH**/ ?>