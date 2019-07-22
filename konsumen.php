<?php
    require_once "lib/bootstrap.php";
    require_once "src/konsumen.php";
    if(isAdd() || isEdit())
        require_once "views/form_konsumen.php";
    else
        require_once "views/konsumen.php";

?>