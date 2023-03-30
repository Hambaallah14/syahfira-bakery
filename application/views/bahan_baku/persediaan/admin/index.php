<div class="flash-data" data-target="Persediaan Bahan Baku" data-flashdata="<?= $this->session->flashdata('bahan_baku'); ?>"></div>
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Bahan Baku</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">
                        <button type="button" class="btn bg-teal waves-effect" data-toggle="modal" data-target="#defaultModal">Tambah Persediaan</button>

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
                                        <th class="text-center">Nama Cabang</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($daftar_user as $user) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $user["nama"] . "</td>";
                                        echo "<td><a href='" . base_url() . "bahan_baku/persediaan_cabang/" . $user["id_user"] . "'><i class='material-icons'>visibility</i></a></td>";
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
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">Tambah Bahan Baku</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("bahan_baku/InsertPersediaan", array('enctype' => 'multipart/form-data', 'id' => 'form_validation')); ?>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control id_persediaan" name="id_persediaan" value="<?= $kode_persediaan; ?>" readonly required>
                        </div>
                    </div>


                    <div class="form-group form-float">
                        <div class="form-line">
                            <select id="id_user" class="form-control show-tick id_user" name="id_user" required>
                                <option value="-">--Pilih Cabang--</option>
                                <?php
                                foreach ($daftar_user as $user) {
                                    echo "<option value='" . $user["id_user"] . "'>" . $user['nama'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select id="id_bahanbaku" class="form-control show-tick id_bahanbaku" name="id_bahanbaku" required>
                                        <option value="-">--Pilih Bahan Baku--</option>
                                        <?php
                                        foreach ($bahan_baku as $brg) {
                                            echo "<option value='" . $brg["id_bahanbaku"] . "'>" . $brg['bahanbaku'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                    <div id="harga"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control qty" name="qty" min="0" required>
                                    <label class="form-label">Qty</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>Tanggal Persediaan</b>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="date" class="datepicker form-control tgl_persediaan" placeholder="Pilih Tanggal" name="tgl_persediaan" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Tanggal Expired</b>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="date" class="datepicker form-control tgl_expired" placeholder="Pilih Tanggal" name="tgl_expired" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control keterangan" placeholder="Pilih Keterangan" name="keterangan" required>
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