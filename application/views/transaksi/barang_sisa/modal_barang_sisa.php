<?php echo form_open("transaksi/add_barang_sisa", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        
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