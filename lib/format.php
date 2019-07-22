<?php

function numberFormatID($value){
    return number_format($value,0,',','.');
}

function currencyID($value){
    return "Rp. ".numberFormatID($value);
}