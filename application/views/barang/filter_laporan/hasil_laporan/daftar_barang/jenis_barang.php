<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Barang</th>
                <th>Barang</th>
            </tr>    
        </thead>
        
        <tbody>
        <?php
            $no = 1;
            if($barang){
                foreach($barang as $b){
                    echo"<tr>";
                        echo"<td>".$no."</td>";
                        echo"<td>".$b["id_barang"]."</td>";
                        echo"<td>".$b["barang"]."</td>";
                    echo"</tr>";
                    $no++;
                }
            }
            else{
                echo"<tr>";
                    echo"<td colspan=3>Data tidak ditemukan</td>";
                echo"</tr>";
            } 
        ?>
        </tbody>                        
    </table>
</div>


