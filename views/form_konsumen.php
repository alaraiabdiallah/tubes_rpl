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
            <h3 align="center"><?php echo isEdit()?"Edit": "Tambah" ?> Data Konsumen</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" required class="form-control" name="nama" id="nama" value="<?php echo $nama ?>">
                </div>

                <div class="form-group">
                    <label for="no_hp">No Handphone</label>
                    <input type="text" required class="form-control" name="no_hp" id="no_hp" value="<?php echo $no_hp ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>


<?php require_once "partials/footer.php"; ?>