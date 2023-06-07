<div id="content">

    <?php load_view('header', [], false); ?>

    <div class="info">
        <img src="<?=$user['profile_url']?>" alt="<?=$user['name']?>" />
        
        <div>
            <h1> <?=$user['name']?> </h1>
            <b> <?=$user['biography']?> </b>
        </div>
    </div>

    <?php if(count($posts) == 0): ?>
        <div class="nothing"> پستی وجود ندارد ! </div>
    <?php endif; ?>
    
    <div class="posts">

        <?php foreach($posts as $p): ?>

            <div class="post">
                <a href="<?=route('post', [ 'id' => $p['id'] ])?>" target="_blank" class="image">
                    <img src="<?=$p['image_url']?>" alt="<?=$p['caption']?>" />
                </a>
                <div class="content">
                    <div class="text">
                        <span> <?=$p['likes']?> &hearts; ~ </span>
                        <span> <?=$p['caption']?> </span>
                    </div>

                    <?php if($is_profile): ?>
                        <a href="<?= route('content-edit', [ 'id' => $p['id'] ]) ?>" class="edit"> ویرایش </a>
                        <a href="<?= route('content-delete', [ 'id' => $p['id'] ]) ?>" class="delete"> حذف </a>
                    <?php endif; ?>
                </div>
            </div>

        <?php endforeach; ?>
        
    </div>

</div>