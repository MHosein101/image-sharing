<?php

function is_email($input)
{
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}

function str_between($input, $min, $max)
{
    $len = strlen($input);
    return $len >= $min && $len <= $max;
}

function num_between($input, $min, $max)
{
    return $input >= $min && $input <= $max;
}

function is_unique($dbc, $table, $column, $input)
{
    $sql = "SELECT * FROM $table WHERE $column = ?";

    $result = db_query($dbc, $sql, [ $input ]);

    return count($result) == 0;
}

function is_image($file)
{
    $types =
    [
        'image/jpeg' ,
        'image/jpg' ,
        'image/gif' ,
        'image/png'
    ];

    return in_array(files($file)['type'], $types);
}

function file_size($file, $min, $max)
{
    $size = files($file)['size'];
    return $size >= ($min * 1024) && $size <= ($max * 1024);
}