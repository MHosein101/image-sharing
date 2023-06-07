<?php

function get_signup($dbc)
{
    load_view( 'signup' ,
    [ 
        '__title' => 'ثبت نام' 
    ]);
}
function post_signup($dbc)
{
    redirect_on_error($dbc, 'signup', true);

    extract(post()); // $name , $email , $password

    $user = 
    [
        'name'  => $name ,
        'email' => $email ,
        'password'    => make_hash($password) ,
        'profile_url' => './uploads/default-user.png' ,
    ];

    db_insert($dbc, 'users', $user);

    $user = db_find($dbc, 'users',
    [
        'email' => $email ,
    ]);
    
    unset($user['password']);

    session_set('user', $user);

    redirect('profile');
}

function validate_input($dbc)
{
    $errors = [];

    if( ! str_between(post('name', ''), 5, 50))
    {
        $errors[] = 'نام کاربری ضروری است و باید حداقل 5 حرف باشد';
    }

    if( ! is_email(post('email', 'xxx')))
    {
        $errors[] = 'ایمیل وارد شده صحیح نیست';
    }
    else if( ! is_unique($dbc, 'users', 'email', post('email')) )
    {
        $errors[] = 'این ایمیل قبلا در سایت ثبت شده است';
    }

    if( ! str_between(post('password', ''), 6, 20))
    {
        $errors[] = 'رمز عبور ضروری است و باید حداقل 6 حرف باشد';
    }

    return $errors;
}
