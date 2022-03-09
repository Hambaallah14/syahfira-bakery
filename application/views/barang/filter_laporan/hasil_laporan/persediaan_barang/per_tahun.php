<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Barang</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Qty</th>
                <th class="text-center">Total</th>
            </tr>    
        </thead>
        
        <tbody>
        <?php
            $no = 1;
            $total = 0;
            if($barang){
                foreach($barang as $b){
                    echo"<tr>";
                        echo"<td class='text-center'>".$no."</td>";
                        echo"<td class='text-center'>".date('d F Y', strtotime($b["tanggal_persediaan"]))."</td>";
                        echo"<td>".$b["barang"]."</td>";
                        echo"<td class='text-right'>".number_format($b["harga"],0,',','.')."</td>";
                        echo"<td class='text-right'>".$b["qty"]." ".$b["satuan"]."</td>";
                        echo"<td class='text-right'>".number_format($b["harga"]*$b["qty"],0,',','.')."</td>";
                        $total += $b["harga"]*$b["qty"];
                    echo"</tr>";
                    $no++;
                }
                    echo"<tr>";
                        echo"<td colspan='5' class='text-center'><strong>GRAND TOTAL (Rp.)</strong></td>";
                        echo"<td class='text-right text-uppercase'><strong>".number_format($total,0,',','.')."</strong></td>";
                    echo"</tr>";
            }
            else{
                echo"<tr>";
                    echo"<td colspan=6>Data tidak ditemukan</td>";
                echo"</tr>";
            }
        ?>
        </tbody>                        
    </table>
</div>


