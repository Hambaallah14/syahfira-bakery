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
                                        echo "<td>" . $persediaan["barang"] . "</td>";
                                        echo "<td>" . $persediaan["qty"] . " " . $persediaan["satuan"] . "</td>";
                                        echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tanggal_transaksi"])) . "</td>";

                                        echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tgl_expired"])) . "</td>";
                                        echo "<td class='text-center'>" . $persediaan["ket"] . "</td>";

                                        if ($persediaan["status_verifikasi"] == 0) {
                                            echo "<td class='text-center'><a href='" . base_url() . "transaksi/pindai_stok/barang_sisa/" . $persediaan["id_transaksi"] . "' class='btn bg-pink btn-barang-sisa'>Verifikasi</a></td>";
                                        } else {
                                            if (date('Y-m-d') > $persediaan["tgl_expired"]) {
                                                echo "<td class='text-center'><a href='" . base_url() . "transaksi/pindai_stok/barang_sisa/" . $persediaan["id_transaksi"] . "' class='btn bg-pink btn-barang-sisa'>Pindai Stok</a></td>";
                                            } else if (date('Y-m-d') == $persediaan["tgl_expired"]) {
                                                echo "<td class='text-center'><a href='" . base_url() . "transaksi/pindai_stok/barang_sisa/" . $persediaan["id_transaksi"] . "' class='btn bg-orange btn-barang-sisa'>Pindai Stok</a></td>";
                                            } else {
                                                if ($persediaan["qty"] == 0) {
                                                    echo "<td class='text-center'><a href='" . base_url() . "transaksi/delete_persediaan_barang/" . $persediaan["id_transaksi"] . "' class='btn bg-teal'><i class='material-icons'>delete</i></a></td>";
                                                } else {
                                                    echo "<td class='text-center'><a href='" . base_url() . "transaksi/pindai_stok/status_barang/" . $persediaan["id_transaksi"] . "' class='btn bg-teal btn-status-barang'>Pindai Stok</a></td>";
                                                }
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