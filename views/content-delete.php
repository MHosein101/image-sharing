<?php load_view('form_errors', [], false) ?>

<div id="content">

    <?php load_view('header', [], false); ?>
    
    <h1> آیا از حذف این پست اطمینان دارید ؟ </h1>
    <hr class="v" />

    <form action="<?= route('content-delete', [ 'id' => $post['id'] ]) ?>" method="POST">

        <div class="field">
            <img src="<?=$post['image_url']?>" alt="new_image" style="display: block; width: 75%; border-radius: 7px;" />
        </div>  

        <hr class="v" />

        <div class="field">
            <?=$post['caption']?>
        </div> 

        <hr class="v x2" />

        <button class="btn red"> تایید و حذف </button>

    </form>

</div>