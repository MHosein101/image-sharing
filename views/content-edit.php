<?php load_view('form_errors', [], false) ?>

<div id="content">

    <?php load_view('header', [], false); ?>
    
    <h1> ویرایش پست </h1>
    <hr class="v" />

    <form action="<?= route('content-edit', [ 'id' => $post['id'] ]) ?>" method="POST">

        <div class="field">
            <img src="<?=$post['image_url']?>" alt="new_image" style="display: block; width: 75%; border-radius: 7px;" />
        </div>  

        <hr class="v" />

        <div class="field">
            <label for="caption"> توضیحات </label>
            <textarea name="caption" id="caption" maxlength="200" required><?=$post['caption']?></textarea>
        </div>

        <hr class="v x2" />

        <button class="btn"> ذخیره تغییرات </button>

    </form>

</div>