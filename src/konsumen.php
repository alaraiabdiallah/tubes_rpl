<?php
    redirectWhenGuest('login.php');
    $konsumen = [];
    $konsumenQuery = $db->query("SELECT * FROM konsumen ;");
    while($r = $konsumenQuery->fetch_object())
        $konsumen[] = $r;

    $nama = $db->escape_string(postReq('nama'));
    $no_hp = $db->escape_string(postReq('no_hp'));

    if(isEdit()){
        $id = $db->escape_string(getReq('id'));
        $konsumen = $db->query("SELECT * FROM konsumen WHERE id = '$id';")->fetch_object();
        $nama = $db->escape_string(postReq('nama',$konsumen->nama));
        $no_hp = $db->escape_string(postReq('no_hp',$konsumen->no_hp));
    }

    if(isDelete()){
        $id = $db->escape_string(getReq('id'));
        $db->query("DELETE FROM konsumen WHERE id = '$id';");
        header('location: konsumen.php');
    }

    if(isButtonSubmit()){
        if(isEdit())
            $db->query("UPDATE konsumen SET nama = '$nama', no_hp = '$no_hp' WHERE id = '$id';");
        
        if(isAdd())
            $db->query("INSERT konsumen(nama, no_hp) VALUES('$nama','$no_hp');");
        header('location: konsumen.php');
    }
?>