<?php echo form_open("transaksi/add_barang_sisa", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        
    <div class="body table-responsive">
        <table class="table table-bordered">
            <thead>
                <input type="text" class="modal-id-transaksi" name="id-transaksi">
                <input type="text" class="modal-id-barang" name="id-barang">
                <input type="text" class="modal-qty" name="qty">
                
                <tr>
                    <th>ID Barang</th>
                    <th>:</th>
                    <th><div id="id-barang"></div></th>
                </tr>
                
            </thead>
            
            <tbody>
                <tr>
                    <td>Barang</td>
                    <td>:</td>
                    <td><div id="barang"></div></td>
                </tr>
                
                <tr>
                    <td>Qty</td>
                    <td>:</td>
                    <td><div id="qty"></div></td>
                </tr>
            </tbody>
        </table>
    </div>      