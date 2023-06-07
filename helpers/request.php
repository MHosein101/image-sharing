<?php

function query($key = null, $default = null) 
{
    if($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    return $_GET;
}

function post($key = null, $default = null) 
{
    if($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    return $_POST;
}

function has_file($key) 
{
    return isset($_FILES[$key]) && $_FILES[$key]['name'] != '';
}

function files($key = null) 
{
    if($key)
    {
        return has_file($key) ? $_FILES[$key] : null;
    }

    return $_FILES;
}

function method() 
{
    return strtolower($_SERVER['REQUEST_METHOD']);
}

function route($page, $params = [])
{
    $query = [];

    $query[] = "page=$page";

    foreach($params as $k => $v)
    {
        $query[] = "$k=$v";
    }
    
    $query = implode('&', $query);

    return "/index.php?$query";
}

function redirect($page, $params = [])
{
    $url = route($page, $params);

    header("Location: $url", true, 302);

    die();
}