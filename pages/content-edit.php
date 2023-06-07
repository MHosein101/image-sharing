<?php

function get_content_edit($dbc)
{
    if(query('id') == null)
    {
        redirect('profile');
    }

    $post = db_find($dbc, 'posts', [ 'id' => query('id') ]);
    
    if($post == null)
    {
        redirect('profile');
    }
    

    load_view( 'content-edit' ,
    [ 
        '__title' => 'ویرایش محتوا' ,
        'post' => $post
    ]);
}

function post_content_edit($dbc)
{
    redirect_on_error($dbc, 'content-edit', true);

    db_update($dbc, 'posts', query('id'), [ 'caption' => post('caption') ]);

    redirect('profile');
}

function validate_input($dbc)
{
    $errors = [];

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