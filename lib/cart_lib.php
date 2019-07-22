<?php

$_SESSION['carts'] = $_SESSION['carts'] ?? [];

function isCartItemExists($id){
    foreach($_SESSION['carts'] as $cart){
        if($cart['id'] && $cart['id'] == $id) return true;
    }
    return false;
}

function searchCartItemById($id){
    $i = 0;
    foreach($_SESSION['carts'] as $cart){
        if($cart['id'] && $cart['id'] == $id) return $i;
        $i++;
    }
    return null;
}

function getCart($id){
    $index = searchCartItemById($id);
    return $_SESSION['carts'][$index];
}

function updateCartQty($id,$qty){
    $index = searchCartItemById($id);
    $_SESSION['carts'][$index]['qty'] = $qty;
}

function deleteCartItem($id){
    $index = searchCartItemById($id);
    unset($_SESSION['carts'][$index]);
}

function addCartItem($data){
    array_push($_SESSION['carts'],$data);
}

function getCarts(){
    return $_SESSION['carts'];
}

function cartsTotal(){
    $total = 0;
    foreach($_SESSION['carts'] as $cart)
        $total += ($cart['qty'] * $cart['price']);
    return $total;
}