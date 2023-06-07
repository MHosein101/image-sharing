<?php

function post_saved_remove($dbc)
{
    $user = session_get('user');
    $pid = query('id');

    $check = db_find($dbc, 'user_activities', 
    [
        'type'    => 'saved' ,
        'user_id' => $user['id'] ,
        'post_id' => $pid
    ]);

    if($check)
    {
        db_delete($dbc, 'user_activities', $check['id']);
    }
    
    if(query('to_list'))
    {
        redirect('saved');
    }
    
    redirect('post', [ 'id' => $pid ]);
}