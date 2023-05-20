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

                                    $tanggal_expired = date('d F Y', strtotime('+' . $persediaan["durasi_expired"] - 1 . 'days', strtotime($persediaan["tgl_persediaan"])));
                                    echo "<td class='text-center'>" . $tanggal_expired . "</td>";


                                    // 1. JIKA BELUM DI VALIDASI MAKA TAMPILKAN BUTTON PESANAN
                                    if ($persediaan["status_persediaan"] == 3) {
                                        echo "<td class='text-center'>";
                                        echo "<button type='button' class='btn btn-primary waves-effect btnValidasiBarangSisaMakanMinum' data-toggle='modal' data-target='#defaultModal' data-id='" . $persediaan["id_persediaan"] . "'>";
                                        echo "<i class='material-icons'>query_builder</i>";
                                        echo "<span>PESANAN</span>";
                                        echo "</button>";
                                        echo "</td>";
                                    } else {
                                        // 2. JIKA SUDAH DIVALIDASI, MAKA LIHAT KONDISI APAKAH QTY < 0
                                        if ($persediaan["qty"] == 0) {
                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-danger waves-effect'>";
                                            echo "<i class='material-icons'>cancel</i>";
                                            echo "<span>STOK HABIS</span>";
                                            echo "</button>";
                                            echo "</td>";
                                        } else {
                                            $tanggal_expired2 = date('Y-m-d', strtotime('+' . $persediaan["durasi_expired"] - 1 . 'days', strtotime($persediaan["tgl_persediaan"])));
                                            $tanggal_pengembalian = date('Y-m-d', strtotime('+' . 1 . 'days', strtotime($persediaan["tgl_persediaan"])));

                                            // 3. JIKA QTY > 0, MAKA LIHAT KONDISI RANGE MASA EXPIRED > TANGGAL EXPIRED
                                            if (date('Y-m-d') > $tanggal_expired2) {
                                                echo "<td class='text-center'>";
                                                echo "<button type='button' class='btn btn-danger waves-effect'>";
                                                echo "<i class='material-icons'>cancel</i>";
                                                echo "<span>EXPIRED</span>";
                                                echo "</button>";
                                                echo "</td>";
                                            }
                                            // 4. JIKA TANGGAL > TANGGAL PENGEMBALIAN DAN TANGGAL < TANGGAL EXPIRED
                                            else if (date('Y-m-d') >= $tanggal_pengembalian && date('Y-m-d') <= $tanggal_expired2) {
                                                echo "<td class='text-center'>";
                                                echo "<a href='" . base_url() . "makanan_dan_minuman/pindahStokSisa/" . $persediaan["id_persediaan"] . "' class='btn bg-orange'>";
                                                echo "<i class='material-icons'>input</i>";
                                                echo "<span>JUAL STOK SISA</span>";
                                                echo "</a>";
                                                echo "</td>";
                                            }
                                        }
                                    }
                                    echo "</tr>";
                                    $no++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">PESANAN BARANG SISA</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("makanan_dan_minuman/UpdateStatusBarangSisa", array('enctype' => 'multipart/form-data', 'id' => 'form_validation')); ?>

                    <input type="hidden" name="id_persediaan" id="id_persediaanMM">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select id="status_persediaan" class="form-control show-tick status_persediaan" name="status_persediaan" required>
                                        <option value="-">--Pilih Status--</option>
                                        <option value="1">PESANAN DITERIMA</option>
                                        <option value="2">PESANAN DITOLAK</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control status_keterangan" placeholder="Keterangan" name="status_keterangan" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect btn-simpan">Simpan</button>
                    <?php echo form_close(); ?>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</section>