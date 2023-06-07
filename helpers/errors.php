<?php

function check_function($function)
{
    if( ! function_exists($function) || ! is_callable($function))
    {
        die("Function [ $function ] not defined or not callable");
    }
}

function check_file($file)
{
    if( ! file_exists($file))
    {
        die("File [ $file ] not found");
    }
}