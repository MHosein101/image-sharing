<?php

function get_content_create($dbc)
{
    load_view( 'content-create' ,
    [ 
        '__title' => 'محتوای جدید' 
    ]);
}

function post_content_create($dbc)
{
    redirect_on_error($dbc, 'content-create', true);
    
    extract(post());

    $user = session_get('user');

    db_insert($dbc, 'posts', 
    [
        'caption'   => $caption ,
        'image_url' => upload('image') ,
        'user_id'   => $user['id']
    ]);

    redirect('profile');
}

function validate_input($dbc)
{
    $errors = [];

    if(! has_file('image'))
    {
        $errors[] = 'عکس ضروری است';
    }
    if(! is_image('image'))
    {
        $errors[] = 'فایل ارسالی باید عکس باشد';
    }
    else if(! file_size('image', 4, 2048))
    {
        $errors[] = 'حداکثر حجم مجاز عکس 2 مگابایت است';
    }

    if( ! post('caption') )
    {
        $errors[] = 'متن توصیحات ضروری است';
    }
    else if( strlen(post('caption', '')) > 200 )
    {
        $errors[] = 'متن توصیحات طولانی است';
    }

    return $errors;
}