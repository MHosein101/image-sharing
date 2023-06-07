<?php

session_start();

$helpers = 
[
    'debug' ,
    'errors' ,
    'request' ,
    'database' ,
    'session' ,
    'validation' ,
    'app' ,
];

foreach($helpers as $name)
{
    $file = "./helpers/$name.php";

    if( ! file_exists($file))
    {
        die("File [ $name.php ] not found");
    }

    require_once($file);
}

$routes =
[
    'valid_pages' =>
    [
        'signup' ,
        'login' ,
        'logout' ,

        'profile' ,
        'profile-edit' ,

        'saved' ,
        'saved-add' ,
        'saved-remove' ,

        'user' ,
        'explore' ,
        'post' ,
        'liked-add' ,
        'liked-remove' ,

        'content-create' ,
        'content-edit' ,
        'content-delete' ,
    ] ,
    'public_pages' => 
    [
        'signup' ,
        'login' , 
        
        'post' ,
        'user' ,
    ] ,
];

router($routes);