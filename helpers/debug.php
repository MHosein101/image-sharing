<?php

function dump($data, $exit = TRUE) 
{
    echo '<code><pre>';

    var_dump($data);
    
    echo '</pre></code>';

    if($exit)
    {
        die();
    }
}

function dd(...$data) 
{
    foreach($data as $d)
    {
        dump($d, FALSE);
    }

    die();
}