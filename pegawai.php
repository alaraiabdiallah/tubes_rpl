<?php
    require_once "lib/bootstrap.php";
    require_once "src/pegawai.php";
    if(isAdd() || isEdit())
        require_once "views/form_pegawai.php";
    else
        require_once "views/pegawai.php";

?>