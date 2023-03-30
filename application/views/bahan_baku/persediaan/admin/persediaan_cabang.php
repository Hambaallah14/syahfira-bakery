<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Bahan Baku</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <!--UNTUK ADMIN -->

                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">ID Persediaan</th>
                                        <th class="text-center">Barang</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Tanggal Persediaan</th>
                                        <th class="text-center">Tanggal Expired</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bahan_baku as $persediaan) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $persediaan["id_persediaan"] . "</td>";
                                        echo "<td>" . $persediaan["bahanbaku"] . "</td>";
                                        echo "<td>" . $persediaan["qty"] . " " . $persediaan["satuan"] . "</td>";
                                        echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tgl_persediaan"])) . "</td>";
                                        echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tgl_expired"])) . "</td>";
                                        echo "<td class='text-center'>" . $persediaan["keterangan"] . "</td>";
                                        $tanggal_expired = date('Y-m-d', strtotime($persediaan["tgl_expired"]));
                                        if (date('Y-m-d') > $tanggal_expired) {
                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-danger waves-effect'>";
                                            echo "<i class='material-icons'>cancel</i>";
                                            echo "<span>EXPIRED</span>";
                                            echo "</button>";
                                            echo "</td>";
                                        } else {
                                            if ($persediaan["status_persediaan"] == 0) {
                                                echo "<td class='text-center'>";
                                                echo "<button type='button' class='btn btn-primary waves-effect'>";
                                                echo "<i class='material-icons'>query_builder</i>";
                                                echo "<span>PESANAN DIPROSES</span>";
                                                echo "</button>";
                                                echo "</td>";
                                            }

                                            // JIKA PESANAN DITERIMA
                                            else if ($persediaan["status_persediaan"] == 1) {
                                                echo "<td class='text-center'>";
                                                echo "<button type='button' class='btn btn-success waves-effect'>";
                                                echo "<i class='material-icons'>done</i>";
                                                echo "<span>PESANAN DITERIMA</span>";
                                                echo "</button>";
                                                echo "</td>";
                                            }

                                            // JIKA PESANAN DITOLAK
                                            else if ($persediaan["status_persediaan"] == 2) {
                                                echo "<td class='text-center'>";
                                                echo "<button type='button' class='btn btn-danger waves-effect' data-container='body' data-toggle='popover'
                                                data-placement='top' title='Informasi' data-content='" . $persediaan["status_keterangan"] . "'>";
                                                echo "<i class='material-icons'>cancel</i>";
                                                echo "<span>PESANAN DITOLAK</span>";
                                                echo "</button>";
                                                echo "</td>";
                                            }
                                        }

                                        echo "</tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>