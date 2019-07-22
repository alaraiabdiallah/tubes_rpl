<?php

    redirectWhenGuest('login.php');
    $transaksi = [];
    $transaksiQuery = $db->query("SELECT * FROM transaksi ;");
    while($r = $transaksiQuery->fetch_object())$transaksi[] = $r;

    $konsumen = [];
    $konsumenQuery = $db->query("SELECT * FROM konsumen ;");
    while($r = $konsumenQuery->fetch_object())$konsumen[] = $r;
    
    $layanan = [];
    $layananQuery = $db->query("SELECT * FROM layanan ;");
    while($r = $layananQuery->fetch_object()) $layanan[] = $r;

    $tanggal_transaksi = $db->escape_string(postReq('tanggal_transaksi',date('Y-m-d')));

    $default_details = [
        [
            "layanan_id" => "",
            "satuan" => "",
            "jumlah" => 0
        ],
    ];

    $details = $_SESSION['keranjang'] ?? $default_details;

    if(isEdit()){
        $id = $db->escape_string(getReq('id'));
        $transaksi = $db->query("SELECT * FROM transaksi WHERE id = '$id';")->fetch_object();
        $tanggal_transaksi = $db->escape_string(postReq('tanggal_transaksi',$transaksi->tanggal_transaksi));
    }

    if(isDelete()){
        $id = $db->escape_string(getReq('id'));
        $db->query("DELETE FROM transaksi WHERE id = '$id';");
        header('location: transaksi.php');
    }

    if(isButtonSubmit()){
        if(isEdit())
            $db->query("UPDATE transaksi SET nama = '$nama', no_hp = '$no_hp' WHERE id = '$id';");
        
        if(isAdd())
            $db->query("INSERT transaksi(nama, no_hp) VALUES('$nama','$no_hp');");
        header('location: transaksi.php');
    }
?>