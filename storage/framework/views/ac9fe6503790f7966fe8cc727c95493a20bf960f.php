<?php $__env->startSection('content'); ?>
<div class="register-page">
    <!-- ヘッダー -->
    <div class="header">
        <div class="brand-box">
            <h1 class="brand">FashionablyLate</h1>
        </div>
        <a href="<?php echo e(route('login')); ?>" class="login-link">login</a>
    </div>

    <!-- タイトル -->
    <div class="title-box">
        <h2 class="title">Register</h2>
    </div>

    <!-- フォーム本体 -->
    <div class="form-container">
        <form method="POST" action="<?php echo e(route('register.store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label>お名前</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="例: 山田 太郎">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label>メールアドレス</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="例: test@example.com">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" placeholder="例: coachtech1106">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="button-area">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</div>

<style>
/* =====================
   Register Page Styles
===================== */
body {
    margin: 0;
    font-family: 'Helvetica Neue', 'Yu Gothic', 'Hiragino Kaku Gothic ProN', sans-serif;
    background-color: #f4efea;
    color: #7b5b46;
}

/* ヘッダー部分 */
.header {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ffffff;
    border-bottom: 1px solid #ddd;
    position: relative;
    height: 90px;
}

/* ロゴタイトル中央固定 */
.brand {
    font-size: 36px;              /* 少し大きく */
    font-weight: 300;             /* 細字 */
    letter-spacing: 1px;          /* 少し広げて上品に */
    color: #7b5b46;
    margin: 0;
    text-align: center;
    font-family: "Times New Roman", "Noto Serif JP", serif; /* 上品なセリフ体 */
}

/* loginボタン（右上固定） */
.login-link {
    position: absolute;
    right: 80px;
    top: 30px;
    text-decoration: none;
    border: 1px solid #c4b2a4;
    color: #c3b5a4;
    padding: 5px 18px;
    border-radius: 2px;
    font-size: 20px;
    font-weight: 300;
    font-family: "Times New Roman", "Noto Serif JP", serif;
    letter-spacing: 0.5px;
    background-color: transparent;
    transition: 0.2s;
}

.login-link:hover {
    background-color: #c4b2a4;
    color: #fff;
}

/* Registerタイトル中央に完全揃え */
.title-box {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}
.title {
    font-size: 28px;              /* 少し大きめ */
    font-weight: 300;             /* 細字 */
    letter-spacing: 1px;
    color: #7b5b46;
    margin: 0;
    text-align: center;
    font-family: "Times New Roman", "Noto Serif JP", serif;
}

/* フォームカード */
.form-container {
    background-color: #ffffff;
    width: 420px;
    margin: 40px auto 80px auto;
    padding: 50px 50px 40px;
    border-radius: 8px;
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.15);
}

/* フォーム要素 */
.form-group {
    margin-bottom: 25px;
}
.form-group label {
    display: block;
    font-size: 15px;
    margin-bottom: 8px;
    color: #7b5b46;
}
.form-group input {
    width: 100%;
    padding: 10px;
    background-color: #f3f3f3;
    border: none;
    font-size: 14px;
    color: #7b5b46;
}
.form-group input::placeholder {
    color: #c4b2a4;
}

/* エラーメッセージ */
.error {
    color: red;
    font-size: 13px;
    margin-top: 5px;
}

/* 登録ボタン */
.button-area {
    text-align: center;
    margin-top: 20px;
}
.button-area button {
    background-color: #7b5b46;
    color: #fff;
    border: none;
    padding: 8px 40px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 2px;
}
.button-area button:hover {
    background-color: #634839;
}

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/register.blade.php ENDPATH**/ ?>