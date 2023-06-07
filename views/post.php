<div id="content">

    <?php load_view('header', [], false); ?>

    <div id="post">

        <img src="<?=$post['image_url']?>" alt="" />

        <hr class="v" />

        <div class="split">

            <div class="caption">
                &hearts; <?=$post['likes']?> 
                <br />
                <?=$post['caption']?>
            </div>
                
            <div class="user">
                <h2> <a href="<?=route('user', [ 'id' => $user['id'] ])?>" target="_blank" class="link"> <?=$user['name']?> </a> </h2>
                <img src="<?=$user['profile_url']?>" alt="" />
            </div>

        </div>
        
        <?php if($is_actions): ?>
            <hr class="v" />
            <hr />
            <hr class="v" />

            <div class="actions">

                <?php if($is_saved): ?>
                    <form action="<?=route('saved-remove', [ 'id' => $post['id'] ])?>" method="POST">
                        <button class="btn red"> حذف از ذخیره شده ها </button>
                    </form>
                <?php else: ?>
                    <form action="<?=route('saved-add', [ 'id' => $post['id'] ])?>" method="POST">
                        <button class="btn green"> ذخیره </button>
                    </form>
                <?php endif; ?>

                <?php if($is_liked): ?>
                    <form action="<?=route('liked-remove', [ 'id' => $post['id'] ])?>" method="POST">
                        <button class="btn red"> حذف لایک </button>
                    </form>
                <?php else: ?>
                    <form action="<?=route('liked-add', [ 'id' => $post['id'] ])?>" method="POST">
                        <button class="btn pink"> لایک </button>
                    </form>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    </div>

</div>