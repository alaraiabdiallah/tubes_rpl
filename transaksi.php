<?php
    require_once "lib/bootstrap.php";
    require_once "src/transaksi.php";
    if(isAdd())
        require_once "views/form_transaksi.php";
    else if(isEdit())
        require_once "views/form_edit_transaksi.php";
    else
        require_once "views/transaksi.php";

?>