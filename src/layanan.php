<?php
    redirectWhenGuest('login.php');
    $layanan = [];
    $layananQuery = $db->query("SELECT * FROM layanan ;");
    while($r = $layananQuery->fetch_object())
        $layanan[] = $r;

    $nama = $db->escape_string(postReq('nama'));
    $harga = $db->escape_string(postReq('harga'));
    $satuan = $db->escape_string(postReq('satuan'));

    if(isEdit()){
        $id = $db->escape_string(getReq('id'));
        $layanan = $db->query("SELECT * FROM layanan WHERE id = '$id';")->fetch_object();
        $nama = $db->escape_string(postReq('nama',$layanan->nama));
        $harga = $db->escape_string(postReq('harga',$layanan->harga));
        $satuan = $db->escape_string(postReq('satuan',$layanan->satuan));
    }

    if(isDelete()){
        $id = $db->escape_string(getReq('id'));
        $db->query("DELETE FROM layanan WHERE id = '$id';");
        header('location: layanan.php');
    }

    if(isButtonSubmit()){
        if(isEdit())
            $db->query("UPDATE layanan SET nama = '$nama', satuan = '$satuan', harga = '$harga' WHERE id = '$id';");
        
        if(isAdd())
            $db->query("INSERT layanan(nama,harga,satuan) VALUES('$nama','$harga','$satuan');");
        header('location: layanan.php');
    }
?>