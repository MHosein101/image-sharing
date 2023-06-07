<?php

function post_liked_remove($dbc)
{
    $user = session_get('user');
    $pid = query('id');

    $check = db_find($dbc, 'user_activities', 
    [
        'type'    => 'liked' ,
        'user_id' => $user['id'] ,
        'post_id' => $pid
    ]);

    if($check)
    {
        db_delete($dbc, 'user_activities', $check['id']);
    }
    
    redirect('post', [ 'id' => $pid ]);
}