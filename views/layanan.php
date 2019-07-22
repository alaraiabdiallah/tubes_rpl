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
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($layanan as $r): ?>
                    <tr>
                        <td scope="row"><?php echo $i++; ?></td>
                        <td><?php echo $r->nama; ?></td>
                        <td><?php echo $r->harga; ?></td>
                        <td><?php echo $r->satuan; ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="?id=<?php echo $r->id ?>&action=edit" role="button"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="?id=<?php echo $r->id ?>&action=delete" role="button" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once "partials/footer.php"; ?>