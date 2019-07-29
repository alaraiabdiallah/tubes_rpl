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
                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                    <input type="date" required class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" value="<?php echo $tanggal_transaksi ?>">
                </div>
                <div class="form-group">
                  <label for="konsumen_id">Konsumen</label>
                  <select class="form-control" name="konsumen_id" id="konsumen_id">
                    <option value="">--PILIH KONSUMEN--</option>
                    <?php foreach($konsumen as $r): ?>
                        <option value="<?php echo $r->id ?>"><?php echo $r->nama ?> (<?php echo $r->no_hp ?>)</option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div id="trx_details">
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="addNewRow()"><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                    <?php $i=0;foreach($details as $detail): ?>
                        <div class="row" id="row-<?php echo $i ?>">
                            <input type="hidden" class="harga-hidden" name="details[<?php echo $i; ?>][harga]">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="layanan_id">Layanan</label>
                                    <select class="form-control service-form" name="details[<?php echo $i; ?>][layanan_id]" id="layanan_id" onchange="selectService('<?php echo $i?>',this.value)">
                                        <option value="">--PILIH Layanan--</option>
                                        <?php foreach($layanan as $r): ?>
                                            <option value="<?php echo $r->id ?>" <?php echo $detail['layanan_id'] == $r->id ? 'selected' : '' ?>><?php echo $r->nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" required class="form-control qty-form" name="details[<?php echo $i; ?>][jumlah]" id="jumlah">
                                </div>
                            </div>
                            <div class="col-lg-2" style="margin-top: 40px;">
                                <span class="satuan"><?php echo empty($detail['harga']) ? $detail['harga'] : "Rp.".$detail['harga']."/".$detail['satuan'] ?></span>
                            </div>
                            <div class="col-lg-1" style="margin-top: 35px;">
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow('#row-<?php echo $i ?>')"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    <?php endforeach ?>
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