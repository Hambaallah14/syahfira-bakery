<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Memindai Persediaan Makanan dan Minuman</h2>
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
                        <?php echo form_open("makanan_dan_minuman/InsertPenjualanBarang", array('enctype' => 'multipart/form-data', 'id' => 'form_validation')); ?>
                        <input type="hidden" name="id_user" value="<?= $user[0]["id_user"]; ?>">
                        <input type="hidden" name="id_makan_minum" value="<?= $makanan_minuman[0]["id_makan_minum"]; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="id_persediaan">ID Persediaan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="id_persediaan" class="form-control" name="id_persediaan" readonly value="<?= $makanan_minuman[0]["id_persediaan"]; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="mkn_mnm">Makanan / Minuman</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="mkn_mnm" class="form-control" readonly value="<?= $makanan_minuman[0]["makanan_minuman"]; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="harga">Harga</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="harga" class="form-control" name="harga" readonly value="<?= $makanan_minuman[0]["harga"]; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="qty">Qty tersedia</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="qty" class="form-control" readonly value="<?= $makanan_minuman[0]["qty"] . " " . $makanan_minuman[0]["satuan"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="new-qty">Qty</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="new-qty" class="form-control" max="<?= $makanan_minuman[0]["qty"]; ?>" min="0" name="new-qty">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-teal waves-effect btn-simpan">Pindai Stok</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>