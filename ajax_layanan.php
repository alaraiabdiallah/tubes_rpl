<?php
    require_once "lib/bootstrap.php";
    $id = getReq("id");
    $queryLayanan = $db->query("SELECT * FROM layanan WHERE id='$id' ");
    $row = $queryLayanan->fetch_object();
    header('Content-Type: application/json');
    echo json_encode([
        "id" => $row->id,
        "nama" => $row->nama,
        "harga" => $row->harga,
        "satuan" => $row->satuan,
    ]);
?>