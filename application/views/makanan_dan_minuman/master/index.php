<div class="flash-data" data-target="Makanan dan Minuman" data-flashdata="<?= $this->session->flashdata('makanan_minuman'); ?>"></div>
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Makanan dan Minuman</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">
                        <button type="button" class="btn bg-teal waves-effect btn-tambah-makanan" data-toggle="modal" data-target="#bahan_baku">Tambah Data</button>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable"><!--dataTable js-exportable" -->
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Makanan / Minuman</th>
                                        <th>Harga</th>
                                        <th>Durasi Expired</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($makanan_minuman as $barang) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $barang["id"] . "</td>";
                                        echo "<td>" . $barang["makanan_minuman"] . "</td>";
                                        echo "<td>Rp. " . number_format($barang["harga"], 0, ',', '.') . "</td>";
                                        echo "<td>" . $barang["durasi_expired"] . " Hari</td>";

                                        echo "<td>";
                                        echo "<div class='demo-google-material-icon'>";
                                        echo "<a class='btn-hapus' href='" . base_url() . "makanan_dan_minuman/delete/" . $barang["id"] . "' title='Hapus'>";
                                        echo "<i class='material-icons'>delete</i> ";
                                        echo "</a>";

                                        echo "<a class='btn-edit-barang' href='" . base_url() . "makanan_dan_minuman/review/" . $barang["id"] . "' title='Review Barang'>";
                                        echo "<i class='material-icons'>edit</i>";
                                        echo "</a>";
                                        echo "</div>";
                                        echo "</td>";

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

    <div class="modal fade" id="bahan_baku" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">Tambah Bahan Baku</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("makanan_dan_minuman/insert", array('enctype' => 'multipart/form-data', 'id' => 'form_validation')); ?>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control id" name="id" value="<?= $kode_makanan; ?>" readonly required>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control makanan_minuman" name="makanan_minuman" required>
                            <label class="form-label">Makanan/Minuman</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick id_jenis" name="id_jenis" required>
                                        <option value="-">--Pilih Jenis Makanan/Minuman--</option>
                                        <?php
                                        foreach ($jenis as $jen) {
                                            echo "<option value='" . $jen["id"] . "'>" . $jen['jenis'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick id_satuan" name="id_satuan" required>
                                        <option value="-">--Pilih Satuan--</option>
                                        <?php
                                        foreach ($satuan as $sat) {
                                            echo "<option value='" . $sat["id"] . "'>" . $sat['satuan'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control harga" name="harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                                    <label class="form-label">Harga</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control durasi_expired" name="durasi_expired">
                                    <label class="form-label">Durasi Expired</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect btn-simpan">Simpan data</button>
                    <?php echo form_close(); ?>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</section>