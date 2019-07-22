<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "rpl_laundry";

$db = new mysqli($servername,$username,$password,$dbname);

function fetchToArray($query){
    $data = [];
    while($row = $query->fetch_object()) $data[] = $row;
    return $data;
}

function DBInsert($db,$data, $table, $except = 'id'){
    $columns = [];
    $values = [];
    foreach($data as $column => $value){
        if($column == $except) continue;
        $columns[] = $column;
        $values[] = "'".$db->escape_string($value)."'";
    }
    $sql = "INSERT INTO $table(". implode(',',$columns) .") VALUES (".implode(',',$values).");";
    $query = $db->query($sql);
    return $query;
}

function DBUpdate($db,$data, $table, $primaryKey = 'id'){
    $whitelist = [];
    foreach($data as $column => $value){
        if($column == $primaryKey) continue;
        $whitelist[] = $column."='".$db->escape_string($value)."'";
    }
    $sql = "UPDATE $table SET ".implode(',',$whitelist)." WHERE $primaryKey = '".$data[$primaryKey]."';";
    $query = $db->query($sql);
    return $query;
}

function DBDelete($db, $value, $table, $primaryKey = 'id'){
    $value = $db->escape_string($value);
    return $db->query("DELETE FROM $table WHERE $primaryKey = '$value';");
}