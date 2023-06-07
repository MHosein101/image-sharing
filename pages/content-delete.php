<?php

function get_content_delete($dbc)
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

    load_view( 'content-delete' ,
    [ 
        '__title' => 'حذف محتوا' ,
        'post' => $post
    ]);
}

function post_content_delete($dbc)
{
    db_delete($dbc, 'posts', query('id'));

    redirect('profile');
}