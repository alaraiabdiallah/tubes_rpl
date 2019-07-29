<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container">
    <div class="row">
        <div class="col-2 col-lg-2 col-md-2 no-padding my-menu">
            <?php require_once "partials/menu.php";  ?>
        </div>
        <div class="col-10 col-lg-10 col-md-10 my-content">
            <div class="pull-right space-bottom">
                <a class="btn btn-primary" href="?action=add" role="button"><i class="fa fa-plus"></i></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Transaksi</th>
                        <th>Tgl Transaksi</th>
                        <th>Tgl Ambil</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($transaksi as $r): ?>
                    <tr>
                        <td scope="row"><?php echo $i++; ?></td>
                        <td><?php echo $r->kode_transaksi ?></td>
                        <td><?php echo formatDate($r->tanggal_transaksi) ?></td>
                        <td><?php echo formatDate($r->tanggal_ambil) ?></td>
                        <td><?php echo statusTrasaction($r->status) ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="?id=<?php echo $r->kode_transaksi ?>&action=edit" role="button"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once "partials/footer.php"; ?>