<?php

function session_has($key) 
{
    return isset($_SESSION[$key]);
}

function session_get($key, $default = null) 
{
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
}

function session_set($key, $value = true) 
{
    $_SESSION[$key] = $value;
}

function session_delete($key) 
{
    unset($_SESSION[$key]);
}

function session_clear() 
{
    session_unset();
    session_destroy();
}