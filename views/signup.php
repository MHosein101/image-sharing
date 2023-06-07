<?php load_view('form_errors', [], false) ?>

<form id="auth" action="<?=route('signup')?>" method="post">

    <h1> ثبت نام در سایت </h1>

    <div class="field">
        <label for="name">نام کاربری</label>
        <input type="text" name="name" id="name" required maxlength="50" <?php prefill('name') ?> />
    </div>

    <div class="field">
        <label for="email">ایمیل</label>
        <input type="email" name="email" id="email" required maxlength="50" <?php prefill('email') ?> />
    </div>

    <div class="field">
        <label for="password">رمز عبور</label>
        <input type="password" name="password" id="password" required maxlength="20" />
    </div>

    <button class="btn">ثبت نام</button>

    <div class="options">
        
        اگر حساب دارید
        <a href="<?=route('login')?>" class="link">وارد شوید</a>

    </div>

</form>