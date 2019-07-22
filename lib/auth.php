<?php

session_start();

function setUser($user){
    $_SESSION["user"] = [
        "id" => $user->id,
        "nama" => $user->nama,
        "username" => $user->username
    ];
}

function getUserInfo($key){
    $data = $_SESSION["user"][$key];
    return isset($_SESSION["user"][$key])? $data : null;
}

function isAuthenticated(){
    return isset($_SESSION['user']);
}

function isGuest(){
    return !isAuthenticated();
}

function redirectWhenAuthenticated($location){
    if(isAuthenticated())
        header("location: $location");
}

function redirectWhenGuest($location){
    if(!isAuthenticated())
        header("location: $location");
}

function redirectWhenNotAdmin($location){
    if(isAuthenticated() && (getUserInfo('role') != "ADMIN"))
        header("location: $location");
}