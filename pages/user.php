<?php

function get_user($dbc)
{
    $current_user = session_get('user');
    
    $user = db_find($dbc, 'users', [ 'id' => query('id') ]);

    if(!$user)
    {
        redirect('profile');
    }
    
    $posts = db_query($dbc, "SELECT * FROM posts WHERE user_id = {$user['id']}");
    
    $i = 0;
    foreach($posts as $p)
    {
        $likes = db_query($dbc, 'SELECT * FROM user_activities WHERE type = ? AND post_id = ?', [ 'liked' , $p['id'] ]);

        $posts[$i]['likes'] = count($likes);

        $i++;
    }

    load_view( 'profile' ,
    [ 
        '__title' => 'کاربر' ,
        'user' => $user ,
        'posts' => $posts ,
        'is_profile' => $current_user && $user['id'] == $current_user['id']
    ]);
}