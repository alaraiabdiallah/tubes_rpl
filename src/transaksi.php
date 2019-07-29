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

    

    $default_details = [
        [
            "layanan_id" => "",
            "satuan" => "",
            "harga" => "",
            "jumlah" => 0
        ],
    ];

    $pegawai_id  = getUserInfo("pegawai_id");
    $konsumen_id = $db->escape_string(postReq("konsumen_id"));
    $tanggal_transaksi = $db->escape_string(postReq('tanggal_transaksi',date('Y-m-d')));
    $details = postReq('details',$default_details);

    if(isEdit()){
        $id = $db->escape_string(getReq('id'));
        $transaksi = $db->query("SELECT * FROM transaksi WHERE kode_transaksi = '$id';")->fetch_object();
        $tanggal_ambil = formatDate($transaksi->tanggal_ambil) == "-" ? date("Y-m-d") : date("Y-m-d",strtotime($transaksi->tanggal_ambil));
        $tanggal_ambil = $db->escape_string(postReq('tanggal_ambil',$tanggal_ambil));
        $status = $db->escape_string(postReq('status',$transaksi->status));
        $statuses = [1,2,3];
    }

    if(isButtonSubmit()){
        if(isEdit()){
            $id = $db->escape_string(getReq('id'));
            $db->query("UPDATE transaksi SET tanggal_ambil = '$tanggal_ambil', status = '$status' WHERE kode_transaksi = '$id';");
            header("location: transaksi.php");
        }
        
        if(isAdd()){
            try{
                $code    = "TRX-".substr(md5(date('ymdhisa').$user_id),0,10); 
                $db->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
                $total = 0;

                foreach($details as $detail)
                    $total += ($detail['jumlah'] * $detail['harga']);
                
                $transaksiQuery = $db->query("INSERT transaksi(kode_transaksi, konsumen_id,pegawai_id,tanggal_transaksi,total) 
                        VALUES('$code','$konsumen_id', '$pegawai_id','$tanggal_transaksi','$total');
                ");

                $last_id = $db->insert_id;

                if(!$transaksiQuery)
                    throw new Exception("Insert transaksi Failed"); 

                $values = [];
                foreach($details as $detail)
                    $values[] = "(NULL, '$code', '".$detail['layanan_id']."', '".$detail['jumlah']."')";

                $transaksiDetailQuery = $db->query("INSERT detail_transaksi VALUES ".implode(',',$values).";");

                if(!$transaksiDetailQuery)
                    throw new Exception("Insert detail transaksi failed");
                $db->commit();
                header('location: transaksi.php');
            }catch(Exception $e){
                $db->rollback();
                $error['query'] = $e->getMessage();
                header('location: transaksi.php?action=add');
            }
        }
    }
?>