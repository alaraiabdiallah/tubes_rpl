<?php
    require_once "lib/bootstrap.php";
    require_once "src/transaksi.php";
    if(isAdd() || isEdit())
        require_once "views/form_transaksi.php";
    else
        require_once "views/transaksi.php";

?>