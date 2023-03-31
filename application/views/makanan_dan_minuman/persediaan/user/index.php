<div class="flash-data" data-target="Persediaan Bahan Baku" data-flashdata="<?= $this->session->flashdata('status_persediaan'); ?>"></div>
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Bahan Baku</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">

                        <?php if ($user[0]["h_akses"] == "admin") { ?>
                            <a href="<?= base_url(); ?>bahan_baku/review_persediaan_cabang" class="btn bg-teal waves-effect">LIHAT DATA PERSEDIAAN CABANG</a>
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
                                    foreach ($makanan_minuman as $persediaan) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $persediaan["id_persediaan"] . "</td>";
                                        echo "<td>" . $persediaan["makanan_minuman"] . "</td>";
                                        echo "<td>" . $persediaan["qty"] . " " . $persediaan["satuan"] . "</td>";
                                        echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tgl_persediaan"])) . "</td>";

                                        $tanggal_expired = date('d F Y', strtotime('+' . $persediaan["durasi_expired"] . 'days', strtotime($persediaan["tgl_persediaan"])));
                                        echo "<td class='text-center'>" . $tanggal_expired . "</td>";

                                        echo "<td class='text-center'>" . $persediaan["keterangan"] . "</td>";

                                        $tanggal_expired2 = date('Y-m-d', strtotime('+' . $persediaan["durasi_expired"] . 'days', strtotime($persediaan["tgl_persediaan"])));
                                        if (date('Y-m-d') > $tanggal_expired2) {
                                            echo "<td class='text-center'>";
                                            echo "<button type='button' class='btn btn-danger waves-effect'>";
                                            echo "<i class='material-icons'>cancel</i>";
                                            echo "<span>EXPIRED</span>";
                                            echo "</button>";
                                            echo "</td>";
                                        } else {
                                            // JIKA PESANAN DI PROSES
                                            if ($persediaan["status_persediaan"] == 0) {
                                                echo "<td class='text-center'>";
                                                echo "<button type='button' class='btn btn-primary waves-effect btnPesananPersediaanBahanBaku' data-toggle='modal' data-target='#defaultModal' data-id='" . $persediaan["id_persediaan"] . "'>";
                                                echo "<i class='material-icons'>query_builder</i>";
                                                echo "<span>PESANAN</span>";
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

    <!-- Modal -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">PESANAN</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("bahan_baku/UpdateStatusPersediaan", array('enctype' => 'multipart/form-data', 'id' => 'form_validation')); ?>

                    <input type="hidden" name="id_persediaan" id="id_persediaan">
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