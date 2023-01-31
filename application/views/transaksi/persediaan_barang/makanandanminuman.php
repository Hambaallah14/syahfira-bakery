<div class="flash-data" data-target="Persediaan Barang" data-flashdata="<?= $this->session->flashdata('makanandanminuman'); ?>"></div>
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Makanan dan Minuman</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">
                        <button type="button" class="btn bg-teal waves-effect" data-toggle="modal" data-target="#defaultModal">Tambah Persediaan Barang</button>

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
                                <?php
                                if ($user[0]["h_akses"] == "admin") { ?>
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama User</th>
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
                                            echo "<td><a href='" . base_url() . "transaksi/persediaan_makanandanminuman/" . $user["id_user"] . "'><i class='material-icons'>visibility</i></a></td>";
                                            echo "<tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>



                                    <!-- UNTUK USER -->
                                <?php } else { ?>
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
                                        foreach ($persediaan_barang as $persediaan) {
                                            echo "<tr>";
                                            echo "<td>" . $no . "</td>";
                                            echo "<td>" . $persediaan["barang"] . "</td>";
                                            echo "<td>" . $persediaan["qty"] . " " . $persediaan["satuan"] . "</td>";
                                            echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tanggal_transaksi"])) . "</td>";

                                            echo "<td class='text-center'>" . date('d F Y', strtotime($persediaan["tgl_expired"])) . "</td>";
                                            echo "<td class='text-center'>" . $persediaan["ket"] . "</td>";

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
                                            echo "</tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                <?php } ?>
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
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">Tambah Persediaan Barang</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("transaksi/add_persediaan_barang/makanandanminuman", array('enctype' => 'multipart/form-data', 'id' => 'form_validation')); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" name="id_user" value="<?= $user[0]["id_user"]; ?>">
                                    <select id="id_barang" class="form-control show-tick id_barang" name="id_barang" required>
                                        <option value="-">--Pilih Barang--</option>
                                        <?php
                                        foreach ($daftar_barang as $brg) {
                                            echo "<option value='" . $brg["id_barang"] . "'>" . $brg['barang'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                    <div id="harga"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>Tanggal Persediaan</b>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="date" class="datepicker form-control tgl-transaksi" placeholder="Pilih Tanggal" name="tgl-transaksi" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Tanggal Expired</b>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="date" class="datepicker form-control tgl-expired" placeholder="Pilih Tanggal" name="tgl-expired" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control qty" name="qty" required min="0">
                                    <label class="form-label">Qty</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control ket" placeholder="Pilih Keterangan" name="ket" required>
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