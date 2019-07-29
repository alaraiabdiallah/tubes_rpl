<?php

function numberFormatID($value){
    return number_format($value,0,',','.');
}

function currencyID($value){
    return "Rp. ".numberFormatID($value);
}

function formatDate($date){
    if(is_null($date) || empty($date) || $date == "0000-00-00" || $date == "0000-00-00 00:00:00")
        return "-";

    return date("d F Y",strtotime($date));
}

function statusTrasaction($status){
    switch($status){
        case 1:
        return "On Progress";
        case 2:
        return "Ready Pickup";
        case 3:
        return "Complete";
    }
}