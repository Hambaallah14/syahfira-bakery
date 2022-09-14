<div class="modal-header bg-pink">
    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">Memindai Persediaan Barang</h4>
</div>
<?php echo form_open("transaksi/add_barang_sisa", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>                
<div class="modal-body">
    <div class="body table-responsive">
        <table class="table table-bordered">
            <thead>
                <input type="text" class="modal-id-transaksi" name="id-transaksi" value="<?= $data_modal[0]["id_transaksi"];?>">
                <input type="text" class="modal-id-barang" name="id-barang" value="<?= $data_modal[0]["id_barang"];?>">
                <input type="text" class="modal-qty" name="qty" value="<?= $data_modal[0]["qty"];?>">
                
                <tr>
                    <th>ID Barang</th>
                    <th>:</th>
                    <th><?php echo $data_modal[0]["id_barang"];?></th>
                </tr>
                
            </thead>
            
            <tbody>
                <tr>
                    <td>Barang</td>
                    <td>:</td>
                    <td><?php echo $data_modal[0]["barang"];?></td>
                </tr>
                
                <tr>
                    <td>Qty</td>
                    <td>:</td>
                    <td><?php echo $data_modal[0]["qty"];?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
        
<div class="modal-footer">
    <button type="submit" class="btn bg-pink waves-effect btn-simpan">Pindai Stok</button>
    <?php echo form_close(); ?>
    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
</div>


                        
        