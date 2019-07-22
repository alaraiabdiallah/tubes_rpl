<?php

function isButtonSubmit($name = 'submit'){
    return isset($_POST[$name]);
}

function postReq($name, $default = ''){
    return $_POST[$name] ?? $default; 
}

function getReq($name, $default = ''){
    return $_GET[$name] ?? $default; 
}

function isPost(){
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

function isGet(){
    return $_SERVER['REQUEST_METHOD'] == "GET";
}

function isEdit(){
    return getReq('action') == "edit";
}

function isAdd(){
    return getReq('action') == "add";
}

function isDelete(){
    return getReq('action') == "delete";
}