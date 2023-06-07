<?php

$links = [];

if(session_has('user'))
{
    $links =
    [
        'profile' => 'پروفایل' ,
        'profile-edit' => 'ویرایش پروفایل' ,
        'content-create'  => 'پست جدید' ,
        'explore' => 'اکسپلور' ,
        'saved' => 'پست های ذخیره شده' ,
        'logout' => 'خروج' ,
    ];
}
else
{
    $links =
    [
        'login' => 'ورود' ,
        'signup' => 'ثبت نام' ,
    ];
}

?>

<div id="header">

    <?php foreach($links as $page => $text): 

        $active = $page == query('page') ? 'active' : ''; ?>

        <a href="<?=route($page)?>" class="btn <?=$active?>"> <?=$text?> </a>

    <?php endforeach; ?> 

</div>