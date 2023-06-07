<?php load_view('form_errors', [], false) ?>

<div id="content">

    <?php load_view('header', [], false); ?>

    <h1> ویرایش پروفایل </h1>
    <hr class="v" />

    <form action="" method="POST" enctype="multipart/form-data">
        
        <div class="field">
            <img src="<?=$user['profile_url']?>" alt="new_image" style="display: block; margin-bottom: 10px; border-radius: 50%; width: 140px; height: 140px;" />
            <label for="new_image"> آپلود عکس جدید </label>
            <input type="file" name="new_image" id="new_image" accept="image/*" />
        </div>  

        <hr class="v" />

        <div class="field">
            <label for="name"> نام کاربری </label>
            <input type="text" name="name" id="name" required maxlength="50" value="<?=$user['name']?>" />
        </div>   

        <hr class="v" />

        <div class="field">
            <label for="email"> ایمیل </label>
            <input type="email" name="email" id="email" required maxlength="50" value="<?=$user['email']?>" />
        </div>   

        <hr class="v" />

        <div class="field">
            <label for="biography"> درباره خود </label>
            <textarea name="biography" id="biography" maxlength="150"><?=$user['biography']?></textarea>
        </div>   

        <hr class="v x2" />

        <button class="btn"> ذخیره تغییرات </button>

    </form>

</div>