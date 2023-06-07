<div id="content">

    <?php load_view('header', [], false); ?>

    <form id="search" action="" method="GET">
        <input type="hidden" name="page" value="explore" />
        <input type="text" name="q" placeholder="جست و جو" value="<?=query('q', '')?>" />

        <?php if(query('q')): ?>
            <a href="<?=route('explore')?>" class="link"> پاک سازی فیلتر </a>
        <?php endif; ?>
    </form>

    <hr class="v" />
    
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
                    <div class="user">
                        <img src="<?=$p['user']['profile_url']?>" alt="" />
                        <a href="<?=route('user', [ 'id' => $p['user_id'] ])?>" target="_blank"> <?=$p['user']['name']?> </a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        
    </div>

</div>