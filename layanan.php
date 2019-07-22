<?php
    require_once "lib/bootstrap.php";
    require_once "src/layanan.php";
    if(isAdd() || isEdit())
        require_once "views/form_layanan.php";
    else
        require_once "views/layanan.php";

?>