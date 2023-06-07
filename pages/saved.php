<?php

function get_saved($dbc)
{
    $user = session_get('user');
    
    $activities = db_query($dbc, "SELECT * FROM user_activities WHERE type = 'saved' AND user_id = {$user['id']}");

    $posts = [];

    foreach($activities as $i)
    {
        $post = db_find($dbc, 'posts', [ 'id' => $i['post_id'] ]);

        $user = db_find($dbc, 'users', [ 'id' => $post['user_id'] ]);
        $likes = db_query($dbc, 'SELECT * FROM user_activities WHERE type = ? AND post_id = ?', [ 'liked' , $i['post_id'] ]);

        $post['user'] = $user;
        $post['likes'] = count($likes);

        $posts[] = $post;
    }

    load_view( 'saved' ,
    [ 
        '__title' => 'پست های ذخیره شده' ,
        'posts' => $posts
    ]);
}