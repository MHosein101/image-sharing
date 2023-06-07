<?php

function get_profile_edit($dbc)
{
    $user = session_get('user');

    load_view( 'profile-edit' ,
    [ 
        '__title' => 'ویرایش پروفایل' ,
        'user' => $user ,
    ]);
}

function post_profile_edit($dbc)
{
    redirect_on_error($dbc, 'profile-edit');
    
    extract(post());

    $user = session_get('user');

    db_update($dbc, 'users', $user['id'], 
    [
        'name'  => $name ,
        'email' => $email ,
        'biography'   => $biography ,
        'profile_url' => upload('new_image', $user['profile_url'])
    ]);

    $user = db_find($dbc, 'users',
    [
        'id' => $user['id'] ,
    ]);

    unset($user['password']);

    session_set('user', $user);

    redirect('profile');
}


function validate_input($dbc)
{
    $user = session_get('user');
    $errors = [];

    if(has_file('new_image'))
    {
        if(! is_image('new_image'))
        {
            $errors[] = 'فایل ارسالی باید عکس باشد';
        }
        else if(! file_size('new_image', 4, 2048))
        {
            $errors[] = 'حداکثر حجم مجاز عکس 2 مگابایت است';
        }
    }

    if( ! str_between(post('name', ''), 5, 50))
    {
        $errors[] = 'نام کاربری ضروری است و باید حداقل 5 حرف باشد';
    }

    if( ! is_email(post('email', 'xxx')))
    {
        $errors[] = 'ایمیل وارد شده صحیح نیست';
    }
    else if( $user['email'] != post('email') && ! is_unique($dbc, 'users', 'email', post('email')) )
    {
        $errors[] = 'این ایمیل قبلا در سایت ثبت شده است';
    }
    
    if(strlen(post('name', '')) > 150 )
    {
        $errors[] = 'متن درباره خود طولانی است';
    }

    return $errors;
}