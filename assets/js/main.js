var layanan_field_html = '';
for(let lay of layanan){
    layanan_field_html += `
        <option value="${lay.id}">${lay.nama}</option>
    `;
}
function addNewRow(){
    let r = Math.random().toString(36).substring(7);
    let trx_row = `
    <div class="row" id="row-${r}">
        <input type="hidden" class="harga-hidden" name="details[${r}][harga]">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="layanan_id">Konsumen</label>
                <select class="form-control service-form" name="details[${r}][layanan_id]" id="layanan_id" onchange="selectService('${r}',this.value)">
                    <option value="">--PILIH Layanan--</option>
                    ${layanan_field_html}
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" required class="form-control qty-form" name="details[${r}][jumlah]" id="jumlah">
            </div>
        </div>
        <div class="col-lg-1" style="margin-top: 40px;">
            <span class="satuan"></span>
        </div>
        <div class="col-lg-2" style="margin-top: 35px;">
            <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow('#row-${r}')"><i class="fa fa-trash"></i></button>
        </div>
    </div>
    `;
    $("#trx_details").append(trx_row);
}

function deleteRow(selector){
    $(selector).remove();
}


function selectService(rowid,value){
    let rowSelector = '#row-'+rowid;
    $(rowSelector).find('.satuan').text("")
    $(rowSelector).find('.qty-form').val("");
    $(rowSelector).find('.harga-hidden').val("");
    if(value != ""){
        fetch(`ajax_layanan.php?id=${value}`)
        .then(res => res.json())
        .then((res) => {
            $(rowSelector).find('.satuan').text(`Rp. ${res.harga}/${res.satuan}`)
            $(rowSelector).find('.qty-form').val(1);
            $(rowSelector).find('.harga-hidden').val(res.harga);
        })
        .catch(console.error)
    }

}