<?php

function get_post($dbc)
{

    if(query('id') == null)
    {
        redirect('explore');
    }

    $post = db_find($dbc, 'posts', [ 'id' => query('id') ]);
    
    if($post == null)
    {
        redirect('explore');
    }

    $current_user = session_get('user');

    $user = db_find($dbc, 'users', [ 'id' => $post['user_id'] ]);
    
    $states = 
    [
        'saved' => false ,
        'liked' => false ,
    ];

    if($current_user)
    {
        foreach($states as $k => $_)
        {  
            $check = db_find($dbc, 'user_activities', 
            [
                'type' => $k ,
                'user_id' => $current_user['id'] ,
                'post_id' => $post['id']
            ]);

            $states[$k] = $check != null;
        }
    }

    $likes = db_query($dbc, 'SELECT * FROM user_activities WHERE type = ? AND post_id = ?', [ 'liked' , $post['id'] ]);

    $post['likes'] = count($likes);

    extract($states);

    load_view( 'post' ,
    [ 
        '__title' => $post['caption'] ,
        'post' => $post ,
        'user' => $user ,
        'is_saved' => $saved ,
        'is_liked' => $liked ,
        'is_actions' => $current_user && ( $current_user['id'] != $post['user_id'] ),
    ]);
}