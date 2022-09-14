<div class="modal-header bg-teal">
    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">Memindai Persediaan Barang</h4>
</div>
<?php echo form_open("transaksi/add_status_barang", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>                
<div class="modal-body">

    <div class="body table-responsive">
        <div class="form-group form-float">
            <input type="hidden" name="id-transaksi" value="<?=$data_modal[0]["id_transaksi"];?>">
            <div class="form-line">
                <input type="text" class="form-control" name="id-barang" disabled value="<?=$data_modal[0]["id_barang"];?>">
            </div>

            <div class="form-line">
                <input type="text" class="form-control" name="barang" disabled value="<?=$data_modal[0]["barang"];?>">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="qty" disabled value="<?=$data_modal[0]["qty"]." ".$data_modal[0]["satuan"];?>">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="new-qty" required min="0" max="<?=$data_modal[0]["qty"];?>">
                            <label class="form-label">Qty</label>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
        
<div class="modal-footer">
    <button type="submit" class="btn bg-teal waves-effect btn-simpan">Pindai Stok</button>
    <?php echo form_close(); ?>
    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
</div>


                        
        