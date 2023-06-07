<?php

function get_explore($dbc)
{
    $user = session_get('user');

    $posts = db_query($dbc, "SELECT * FROM posts WHERE user_id != ? AND caption LIKE ? ORDER BY created_at DESC", 
    [
       $user['id'] ,
       '%' . query('q', '') . '%'
    ]);

    $i = 0;
    foreach($posts as $p)
    {
        $user = db_find($dbc, 'users', [ 'id' => $p['user_id'] ]);
        
        $likes = db_query($dbc, 'SELECT * FROM user_activities WHERE type = ? AND post_id = ?', [ 'liked' , $p['id'] ]);

        $posts[$i]['user'] = $user;
        $posts[$i]['likes'] = count($likes);

        $i++;
    }

    load_view( 'explore' ,
    [ 
        '__title' => 'اکسپلور' ,
        'posts' => $posts
    ]);
}