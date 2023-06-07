<?php

function get_profile($dbc)
{
    $user = session_get('user');

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
        '__title' => 'پروفایل' ,
        'user' => $user ,
        'posts' => $posts ,
        'is_profile' => true
    ]);
}