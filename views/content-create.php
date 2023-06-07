<?php load_view('form_errors', [], false) ?>

<div id="content">

    <?php load_view('header', [], false); ?>

    <h1> پست جدید </h1>
    <hr class="v" />

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="field">
            <label for="image"> عکس محتوا </label>
            <input type="file" name="image" required id="image" accept="image/*" />
        </div>  

        <hr class="v" />

        <div class="field">
            <label for="caption"> توضیحات </label>
            <textarea name="caption" id="caption" maxlength="200" required><?=prefill('caption', false)?></textarea>
        </div>

        <hr class="v x2" />

        <button class="btn"> ساخت پست </button>

    </form>

</div>