<?php

function db_connection()
{
    $server   = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'image_sharing_website';

    try 
    {
        $connection = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $username, $password);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }
    catch(Exception $e) 
    {
        die("Database connection failed");
    }
}

function db_query($connection, $sql, $inputs = []){
    try 
    {
        $prepared = $connection->prepare($sql);
        $prepared->execute($inputs);
        $prepared->setFetchMode(PDO::FETCH_BOTH);
        return $prepared->fetchAll() ?? [];
    }
    catch(Exception $e) 
    {
        die("Database query failed :  [ $sql ] >>> {$e->getMessage()}");
    }
}

function db_execute($connection, $sql, $inputs = []){
    try 
    {
        $prepared = $connection->prepare($sql);
        $prepared->execute($inputs);
        return $prepared->rowCount() > 0;
    }
    catch(Exception $e) 
    {
        die("Database query failed :  [ $sql ] >>> {$e->getMessage()}");
    }
}

function db_find($connection, $table, $data)
{
    $columns = array_keys($data);

    $conditions = [];

    foreach($columns as $col)
    {
        $conditions[] = "$col = :$col";
    }
        
    $conditions = implode(' AND ', $conditions);

    $results = db_query($connection, "SELECT * FROM $table WHERE $conditions", $data);

    return count($results) > 0 ? $results[0] : null;
}

function db_insert($connection, $table, $data)
{
    $columns = array_keys($data);

    $placeholders = [];

    foreach($columns as $col)
    {
        $placeholders[] = ":$col";
    }

    $columns = implode(',', $columns);
    $placeholders = implode(',', $placeholders);

    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

    db_execute($connection, $sql, $data);
}

function db_update($connection, $table, $id, $data)
{
    $sets = [];

    $columns = array_keys($data);

    foreach($columns as $col)
    {
        $sets[] = "$col = :$col";
    }

    $sets = implode(' , ', $sets);

    $sql = "UPDATE $table SET $sets WHERE id = :id";

    $data['id'] = $id;

    db_execute($connection, $sql, $data);
}

function db_delete($connection, $table, $id)
{
    $sql = "DELETE FROM $table WHERE id = ?";

    db_execute($connection, $sql, [ $id ]);
}