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
            <h3 align="center"><?php echo isEdit()?"Edit": "Tambah" ?> Data Layanan</h3>
            <form action="<?php echo getCurrentUrl() ?>" method="post">
                <div class="form-group">
                    <label for="tanggal_ambil">Tanggal Ambil</label>
                    <input type="date" required class="form-control" name="tanggal_ambil" id="tanggal_ambil" value="<?php echo $tanggal_ambil ?>">
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" id="status">
                    <option>--PILIH STATUS--</option>
                    <?php foreach($statuses as $sts):?>
                        <option value="<?php echo $sts?>" <?php echo $sts == $status ? "selected":""?> ><?php echo statusTrasaction($sts);?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    var layanan = JSON.parse('<?php echo json_encode($layanan) ?>');
</script>

<?php require_once "partials/footer.php"; ?>