<?php

function get_login($dbc)
{
    load_view( 'login' ,
    [ 
        '__title' => 'ورود' 
    ]);
}

function post_login($dbc)
{
    redirect_on_error($dbc, 'login', true);

    extract(post()); // $email , $password

    $user = db_find($dbc, 'users',
    [
        'email' => $email ,
    ]);

    if( ! $user || ! password_verify($password, $user['password']) )
    {
        session_set('errors', [ 'کاربری با این اطلاعات وجود ندارد' ]);
        redirect('login');
    }

    unset($user['password']);

    session_set('user', $user);

    redirect('profile');
}

function validate_input($dbc)
{
    $errors = [];

    if( ! is_email(post('email', 'xxx')))
    {
        $errors[] = 'ایمیل وارد شده صحیح نیست';
    }

    if( ! str_between(post('password', ''), 6, 20))
    {
        $errors[] = 'رمز عبور ضروری است و باید حداقل 6 حرف باشد';
    }

    return $errors;
}