<?php

function router($routes)
{
    extract($routes); // $valid_pages , $public_pages

    if(session_has('user'))
    {
        $page = query('page', 'profile');

        if(in_array($page, ['signup', 'login']) || ! in_array($page, $valid_pages))
        {
            redirect('profile');
        }

        start_page($page);
    }
    else
    {
        $page = query('page', 'login');

        if( ! in_array($page, $public_pages))
        {
            redirect('login');
        }

        start_page($page);
    }
}

function start_page($page)
{
    $file = "./pages/$page.php";
    
    check_file($file);

    require_once($file);

    $page = str_replace('-', '_', $page);
    
    $function = method() . "_$page";
    
    check_function($function);

    $dbc = db_connection();

    $function($dbc);

    if(session_has('prefill_data'))
    {
        session_delete('prefill_data');
    }
}

function load_view($file, $data = [], $base = true)
{
    $file = str_replace('.', '/', $file);

    $__view = "./views/$file.php";

    check_file($__view);

    extract($data);

    if($base)
    {
        require_once('./views/base.php');
    }
    else
    {
        require_once($__view);
    }
}

function prefill($key, $attr = true)
{
    if(session_has('prefill_data'))
    {
        $value = session_get('prefill_data')[$key];
        
        if($attr)
        {
            echo "value='$value'";
        }
        else
        {
            echo $value;
        }
    }
}

function make_hash($str)
{
    return password_hash($str, PASSWORD_BCRYPT);
}

function upload($key, $default = '')
{
    $file = files($key);

    if(! $file) 
    {
        return $default;
    }
        
    extract(pathinfo($file['name']));
    
    $new_name = hash('md2', $filename) . ".$extension";

    $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $new_name;

    $ok = move_uploaded_file($file["tmp_name"], $path);

    return $ok ? "/uploads/$new_name" : $default;
}

function redirect_on_error($dbc, $page, $prefill = false)
{
    $errors = validate_input($dbc);
    
    if(count($errors) > 0)
    {
        if($prefill)
        {
            session_set('prefill_data', post());
        }
        session_set('errors', $errors);
        redirect($page);
    }
}