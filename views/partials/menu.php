<?php
    $menus = [
        "index.php" => "Beranda",
        "pegawai.php" => "Pegawai",
        "konsumen.php" => "Konsumen",
        "layanan.php" => "Layanan",
        "transaksi.php" => "Transaksi",
        "logout.php" => "Keluar",
    ];
?>


<div class="nav flex-column nav-pills"role="tablist" aria-orientation="vertical">
    <?php foreach($menus as $file => $menuName):?>
        <a class="nav-link <?php echo $file == currScript() ? "active" : ""; ?>" href="<?php echo $file ?>" role="tab"><?php echo $menuName ?></a>
    <?php endforeach; ?>
</div>