
    <table class="table table-bordered table-striped table-hover dataTable js-basic-example" id="dataTable"><!--dataTable js-exportable" -->
        <thead>
            <tr>
                <th>NIP</th>
                <th><?php echo $a[0]["nip"]; ?></th>
            </tr>
            <tr>
                <th>Pilihan Opsi</th>
                <th>
                    <?php
                        if($a[0]["opsi"] == "Hapus"){
                            echo"Hapus Data";
                        }
                        else{
                            echo"Edit Data";
                        }
                    ?>
                </th>
            </tr>
            <tr>
                <th>Status Verifikasi</th>
                <th><span class="badge bg-blue"><?php echo $a[0]["status_v"]; ?></span></th>
            </tr>
            <tr>
                <th>Keterangan</th>
                <th><?php echo"<i>".$a[0]["keterangan"]."</i>"; ?></th>
            </tr>
        </thead>

        <tbody> 
            
        </tbody>
        <tfooter>
           
        </tfooter>
    </table>
