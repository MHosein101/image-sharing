<?php

function post_saved_add($dbc)
{
    $user = session_get('user');
    $pid = query('id');

    $check = db_find($dbc, 'user_activities', 
    [
        'type'    => 'saved' ,
        'user_id' => $user['id'] ,
        'post_id' => $pid
    ]);

    if(!$check)
    {
        db_insert($dbc, 'user_activities', 
        [
            'type'    => 'saved' ,
            'user_id' => $user['id'] ,
            'post_id' => $pid
        ]);
    }
    
    redirect('post', [ 'id' => $pid ]);
}