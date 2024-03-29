<div class="flash-data" data-target="Persediaan Makanan dan Minuman" data-flashdata="<?= $this->session->flashdata('status_persediaan'); ?>"></div>
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Makanan dan Minuman</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">

                        <?php if ($user[0]["h_akses"] == "admin") { ?>
                            <a href="<?= base_url(); ?>makanan_dan_minuman/review_persediaan_cabang" class="btn bg-teal waves-effect">LIHAT RINCIAN PERSEDIAAN CABANG</a>
                        <?php } ?>

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
                                        <th class="text-center">Makanan / Minuman</th>
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
                                    foreach ($makanan_minuman as $persediaan) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $persediaan["id_persediaan"] . "</td>";
                                        echo "<td>" . $persediaan["makanan_minuman"] . "</td>";
                                        echo "<td>" . $persediaan["qty"] . " " . $persediaan["satuan"] . "</td>";
                                        echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tgl_persediaan"])) . "</td>";

                                        $tanggal_expired = date('d F Y', strtotime('+' . $persediaan["durasi_expired"] - 1 . 'days', strtotime($persediaan["tgl_persediaan"])));
                                        echo "<td class='text-center'>" . $tanggal_expired . "</td>";
                                        echo "<td class='text-center'>" . $persediaan["keterangan"] . "</td>";


                                        // 1. JIKA PESANAN BELUM DI DITERIMA DARI CABANG PRODUKSI MAKA TAMPILKAN BUTTON PESANAN
                                        if ($persediaan["status_persediaan"] == 0) {
                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-primary waves-effect btnPesananPersediaanMakananMinum' data-toggle='modal' data-target='#defaultModal' data-id='" . $persediaan["id_persediaan"] . "'>";
                                            echo "<i class='material-icons'>query_builder</i>";
                                            echo "<span>PESANAN</span>";
                                            echo "</button>";
                                            echo "</td>";
                                        }

                                        // 3. JIKA PESANAN DITOLAK DARI CABANG PRODUKSI MAKA TAMPILKAN BUTTON PESANAN DITOLAK
                                        else if ($persediaan["status_persediaan"] == 2) {
                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-danger waves-effect' data-container='body' data-toggle='popover'
                                            data-placement='top' title='Informasi' data-content='" . $persediaan["status_keterangan"] . "'>";
                                            echo "<i class='material-icons'>cancel</i>";
                                            echo "<span>PESANAN DITOLAK</span>";
                                            echo "</button>";
                                            echo "</td>";
                                        }

                                        // 4. JIKA PESANAN BELUM DI VALIDASI OLEH CABANG PUSAT MAKA TAMPILKAN BUTTON PESANAN
                                        else if ($persediaan["status_persediaan"] == 3) {
                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-primary waves-effect'>";
                                            echo "<i class='material-icons'>query_builder</i>";
                                            echo "<span>[BARANG SISA] PESANAN SEDANG DIPROSES OLEH CABANG PUSAT</span>";
                                            echo "</button>";
                                            echo "</td>";
                                        }

                                        // 4.1. JIKA PESANAN DITERIMA OLEH CABANG PUSAT MAKA TAMPILKAN BUTTON PESANAN DISETUJUI
                                        else if ($persediaan["status_persediaan"] == 4) {
                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-success waves-effect'>";
                                            echo "<i class='material-icons'>query_builder</i>";
                                            echo "<span>[BARANG SISA] PESANAN DISETUJUI OLEH CABANG PUSAT</span>";
                                            echo "</button>";
                                            echo "</td>";
                                        }

                                        // 4.2. JIKA PESANAN DITOLAK OLEH CABANG PUSAT MAKA TAMPILKAN BUTTON PESANAN DITOLAK
                                        else if ($persediaan["status_persediaan"] == 5) {

                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-danger waves-effect' data-container='body' data-toggle='popover'
                                            data-placement='top' title='Informasi' data-content='" . $persediaan["status_keterangan"] . "'>";
                                            echo "<i class='material-icons'>cancel</i>";
                                            echo "<span>[BARANG SISA] PESANAN DITOLAK OLEH CABANG PUSAT</span>";
                                            echo "</button>";

                                            echo "<button type='button' class='btn bg-orange waves-effect mb-2 btnPesananPersediaanMakananMinum' data-toggle='modal' data-target='#defaultModalPindahStok' data-id='" . $persediaan["id_persediaan"] . "'>";
                                            echo "<i class='material-icons'>edit</i>";
                                            echo "</button>";
                                        } else {
                                            // 2. JIKA PESANAN SUDAH TERIMA DARI CABANG PRODUKSI MAKA TAMPILKAN BUTTON PINDAH STOK
                                            if ($persediaan["status_persediaan"] == 1) {
                                                // 5. JIKA SUDAH DIVALIDASI, MAKA LIHAT KONDISI APAKAH QTY < 0
                                                if ($persediaan["qty"] == 0) {
                                                    echo "<td class='text-center'>";
                                                    echo "<button type='button' class='btn btn-danger waves-effect'>";
                                                    echo "<i class='material-icons'>cancel</i>";
                                                    echo "<span>STOK HABIS</span>";
                                                    echo "</button>";
                                                    echo "</td>";
                                                } else {
                                                    $tanggal_expired2     = date('Y-m-d', strtotime('+' . $persediaan["durasi_expired"] - 1 . 'days', strtotime($persediaan["tgl_persediaan"])));
                                                    $tanggal_pengembalian = date('Y-m-d', strtotime('+' . 1 . 'days', strtotime($persediaan["tgl_persediaan"])));


                                                    // 6. JIKA QTY > 0, MAKA EXPIRED 
                                                    if (date('Y-m-d') > $tanggal_expired2) {
                                                        echo "<td class='text-center'>";
                                                        echo "<button type='button' class='btn btn-danger waves-effect'>";
                                                        echo "<i class='material-icons'>cancel</i>";
                                                        echo "<span>EXPIRED</span>";
                                                        echo "</button>";
                                                        echo "</td>";
                                                    }

                                                    // 7. JIKA TANGGAL > TANGGAL PENGEMBALIAN DAN TANGGAL < TANGGAL EXPIRED
                                                    else if (date('Y-m-d') >= $tanggal_pengembalian && date('Y-m-d') <= $tanggal_expired2) {
                                                        echo "<td class='text-center'>";
                                                        echo "<button type='button' class='btn bg-orange waves-effect btnPesananPersediaanMakananMinum' data-toggle='modal' data-target='#defaultModalPindahStok' data-id='" . $persediaan["id_persediaan"] . "'>";
                                                        echo "<i class='material-icons'>input</i>";
                                                        echo "<span>PINDAH STOK</span>";
                                                        echo "</button>";
                                                        echo "</td>";
                                                    } else {
                                                        echo "<td class='text-center'>";
                                                        echo "<a href='" . base_url() . "makanan_dan_minuman/pindahStok/p/" . $persediaan["id_persediaan"] . "' class='btn btn-success waves-effect'>";
                                                        echo "<i class='material-icons'>input</i>";
                                                        echo "<span>PINDAH STOK</span>";
                                                        echo "</a>";
                                                        echo "</td>";
                                                    }
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

    <!-- Modal -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">PESANAN</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("makanan_dan_minuman/UpdateStatusPersediaan", array('enctype' => 'multipart/form-data', 'id' => 'form_validation')); ?>

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




    <!-- Modal -->
    <div class="modal fade" id="defaultModalPindahStok" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">PESANAN</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            echo "<a href='" . base_url() . "makanan_dan_minuman/pindahStok/e/" . $persediaan["id_persediaan"] . "' class='btn bg-orange' style='width:100%;margin-bottom:20px;'>";
                            echo "<i class='material-icons'>input</i>";
                            echo "<span>PINDAH STOK KE CABANG PUSAT</span>";
                            echo "</a>";
                            ?>
                        </div>
                        <div class="col-md-12">
                            <?php
                            echo "<a href='" . base_url() . "makanan_dan_minuman/pindahStok/p/" . $persediaan["id_persediaan"] . "' class='btn bg-orange' style='width:100%;'>";
                            echo "<i class='material-icons'>input</i>";
                            echo "<span>PINDAH STOK KE TERJUAL</span>";
                            echo "</a>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>