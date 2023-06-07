<div id="content">

    <?php load_view('header', [], false); ?>

    <h1> پست های ذخیره شده </h1>
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
                    
                    <form action="<?=route('saved-remove', [ 'id' => $p['id'] , 'to_list' => 1 ])?>" method="POST">
                        <a class="delete" onclick="this.parentNode.submit()" style="cursor: pointer;"> حذف از لیست </button>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
        
    </div>

</div>