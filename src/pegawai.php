<?php
    redirectWhenGuest('login.php');
    $pegawai = [];
    $pegawaiQuery = $db->query("SELECT * FROM user_login INNER JOIN pegawai ON user_login.pegawai_id = pegawai.id;");
    while($r = $pegawaiQuery->fetch_object())
        $pegawai[] = $r;

    $nama = $db->escape_string(postReq('nama'));
    $username = $db->escape_string(postReq('username'));
    $password = $db->escape_string(postReq('password'));
    $no_hp = $db->escape_string(postReq('no_hp'));

    if(isEdit()){
        $id = $db->escape_string(getReq('id'));
        $pegawai = $db->query("SELECT * FROM user_login INNER JOIN pegawai ON user_login.pegawai_id = pegawai.id WHERE pegawai.id = '$id';")->fetch_object();
        $nama = $db->escape_string(postReq('nama',$pegawai->nama));
        $username = $db->escape_string(postReq('username',$pegawai->username));
        $password = $db->escape_string(postReq('password'));
        $no_hp = $db->escape_string(postReq('no_hp',$pegawai->no_hp));
    }

    if(isDelete()){
        $id = $db->escape_string(getReq('id'));
        $db->query("DELETE FROM pegawai WHERE id = '$id';");
        $db->query("DELETE FROM user_login WHERE pegawai_id = '$id';");
        header('location: pegawai.php');
    }

    if(isButtonSubmit()){
        if(isEdit()){
            $db->query("UPDATE pegawai SET nama = '$nama', no_hp = '$no_hp' WHERE id = '$id';");
            if(empty($password))
                $db->query("UPDATE user_login SET username = '$username' WHERE pegawai_id = '$id';");
            else
                $db->query("UPDATE user_login SET username = '$username', password = '$password' WHERE pegawai_id = '$id';");

        }
        
        if(isAdd()){
            $db->query("INSERT pegawai(nama, no_hp) VALUES('$nama','$no_hp');");
            $db->query("INSERT user_login(username, password, pegawai_id) VALUES('$username','$password',LAST_INSERT_ID());");
        }
        header('location: pegawai.php');
    }
?>