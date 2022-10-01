<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Tanggal Persediaan</th>
                <th class="text-center">Barang</th>
                <th class="text-center">Qty</th>
            </tr>    
        </thead>
        
        <tbody>
        <?php
            $no = 1;
            
            if($barang_sisa){
                foreach($barang_sisa as $b){
                    echo"<tr>";
                        echo"<td class='text-center'>".$no."</td>";
                        echo"<td class='text-center'>".date('d F Y', strtotime($b["tanggal"]))."</td>";
                        echo"<td class='text-center'>".date('d F Y', strtotime($b["tanggal_transaksi"]))."</td>";
                        echo"<td>".$b["barang"]."</td>";
                        echo"<td class='text-right'>".$b["qty"]." ".$b["satuan"]."</td>";
                    echo"</tr>";
                    $no++;
                }
            }
            else{
                echo"<tr>";
                    echo"<td colspan=4>Data tidak ditemukan</td>";
                echo"</tr>";
            }
        ?>
        </tbody>                        
    </table>
</div>


