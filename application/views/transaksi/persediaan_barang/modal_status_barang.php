<div class="modal-header bg-teal">
    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">Memindai Persediaan Barang</h4>
</div>
<?php echo form_open("transaksi/add_status_barang", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>                
<div class="modal-body">

    <div class="body table-responsive">
        <table class="table table-bordered">
            <thead>
                <input type="hidden" name="id-transaksi" value="<?=$data_modal[0]["id_transaksi"];?>"> 
                <tr>
                    <th>Pilih Menu</th>
                    <th>:</th>
                    <th>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control" name="pilih-menu">
                                    <option value="">-Pilih Menu-</option>
                                    <option value="Barang Keluar">Barang Keluar</option>
                                    <option value="Barang Terjual">Barang Terjual</option>
                                </select>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>ID Barang</td>
                    <td>:</td>
                    <td>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id-barang" disabled value="<?=$data_modal[0]["id_barang"];?>">
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Barang</td>
                    <td>:</td>
                    <td>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="barang" disabled value="<?=$data_modal[0]["barang"];?>">
                            </div>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td>Qty tersedia</td>
                    <td>:</td>
                    <td>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="qty" disabled value="<?=$data_modal[0]["qty"]." ".$data_modal[0]["satuan"];?>">
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>:</td>
                    <td>
                        <div class="form-group form-float">
                            <div class="form-line">
                            <input type="number" class="form-control" name="new-qty" required min="0" max="<?=$data_modal[0]["qty"];?>" value="0">
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
        
<div class="modal-footer">
    <button type="submit" class="btn bg-teal waves-effect btn-simpan">Pindai Stok</button>
    <?php echo form_close(); ?>
    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
</div>


                        
        