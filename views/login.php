<?php load_view('form_errors', [], false) ?>

<form id="auth" action="<?=route('login')?>" method="post">

    <h1> ورود به سایت </h1>

    <div class="field">
        <label for="email">ایمیل</label>
        <input type="email" name="email" id="email" required maxlength="25" />
    </div>

    <div class="field">
        <label for="password">رمز عبور</label>
        <input type="password" name="password" id="password" required maxlength="20" />
    </div>

    <button class="btn">ورود</button>

    <div class="options">
        
        اگر حساب ندارید
        <a href="<?=route('signup')?>" class="link"> ثبت نام کنید </a>

    </div>

</form>