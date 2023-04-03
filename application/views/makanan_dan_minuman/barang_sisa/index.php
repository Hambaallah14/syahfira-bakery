<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Persediaan Sisa Cabang</h2>
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
                                        <th class="text-center">Tanggal Masuk</th>
                                        <th class="text-center">Cabang</th>
                                        <th class="text-center">ID Persediaan</th>
                                        <th class="text-center">Makanan / Minuman</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Tanggal Persediaan</th>
                                        <th class="text-center">Tanggal Expired</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                foreach ($makanan_minuman as $persediaan) {
                                    echo "<tr>";
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . date('d F Y', strtotime($persediaan["tanggal"])) . "</td>";
                                    echo "<td>" . $persediaan["nama"] . "</td>";
                                    echo "<td>" . $persediaan["id_persediaan"] . "</td>";
                                    echo "<td>" . $persediaan["makanan_minuman"] . "</td>";
                                    echo "<td>" . $persediaan["qty"] . " " . $persediaan["satuan"] . "</td>";
                                    echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tgl_persediaan"])) . "</td>";

                                    $tanggal_expired = date('d F Y', strtotime('+' . $persediaan["durasi_expired"] . 'days', strtotime($persediaan["tgl_persediaan"])));
                                    echo "<td class='text-center'>" . $tanggal_expired . "</td>";

                                    $tanggal_expired2 = date('Y-m-d', strtotime('+' . $persediaan["durasi_expired"] . 'days', strtotime($persediaan["tgl_persediaan"])));

                                    $tanggal_expired3 = date('Y-m-d', strtotime('+' . ($persediaan["durasi_expired"] - 1) . 'days', strtotime($persediaan["tgl_persediaan"])));
                                    $no++;

                                    //jika tgl expired sudah lewat
                                    if (date('Y-m-d') > $tanggal_expired2) {
                                        echo "<td class='text-center'>";
                                        echo "<button type='button' class='btn btn-danger waves-effect'>";
                                        echo "<i class='material-icons'>cancel</i>";
                                        echo "<span>EXPIRED</span>";
                                        echo "</button>";
                                        echo "</td>";
                                    }

                                    //jika tgl 1 hari seblum expired
                                    else if (date('Y-m-d') == $tanggal_expired3) {
                                        echo "<td class='text-center'>";
                                        echo "<a href='" . base_url() . "makanan_dan_minuman/pindahStok/e/" . $persediaan["id_persediaan"] . "' class='btn bg-orange'>";
                                        echo "<i class='material-icons'>input</i>";
                                        echo "<span>PINDAH STOK</span>";
                                        echo "</a>";
                                        echo "</td>";
                                    } else {
                                        if ($persediaan["qty"] == 0) {
                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-danger waves-effect'>";
                                            echo "<i class='material-icons'>cancel</i>";
                                            echo "<span>STOK HABIS</span>";
                                            echo "</button>";
                                            echo "</td>";
                                        } else {
                                            // JIKA PESANAN DI PROSES
                                            if ($persediaan["status_persediaan"] == 0) {
                                                echo "<td class='text-center'>";
                                                echo "<button type='button' class='btn btn-primary waves-effect btnPesananPersediaanMakananMinum' data-toggle='modal' data-target='#defaultModal' data-id='" . $persediaan["id_persediaan"] . "'>";
                                                echo "<i class='material-icons'>query_builder</i>";
                                                echo "<span>PESANAN</span>";
                                                echo "</button>";
                                                echo "</td>";
                                            }

                                            // JIKA PESANAN DITERIMA
                                            else if ($persediaan["status_persediaan"] == 1) {
                                                echo "<td class='text-center'>";
                                                echo "<a href='" . base_url() . "makanan_dan_minuman/pindahStok/p/" . $persediaan["id_persediaan"] . "' class='btn btn-success waves-effect'>";
                                                echo "<i class='material-icons'>input</i>";
                                                echo "<span>PINDAH STOK</span>";
                                                echo "</a>";
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
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>