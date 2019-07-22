<?php 
require_once "lib/bootstrap.php"; 
redirectWhenAuthenticated("index.php");
if(isButtonSubmit()){
    try{
        $username = $db->escape_string(postReq('username'));
        $password = $db->escape_string(postReq('password'));
        $query = $db->query("SELECT * FROM user_login INNER JOIN pegawai ON user_login.pegawai_id = pegawai.id WHERE username = '$username' AND password = '$password' ");
        $result = $query->fetch_object();
        
        if($query->num_rows != 1)
            throw new Exception("Username dan password salah");


        setUser($result);

        $redirect = isset($_GET['from']) ? $_GET['from'] : "index.php";
        header("location: $redirect");
    }catch(Exception $e){
        $errors['auth'] = $e->getMessage();
    }
}

?>