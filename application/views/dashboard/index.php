<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-green">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">USER</div>
                            <div class="number"><?= $jumlah_user; ?></div>
                        </div>
                    </div>

                   
                </div>
               
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-blue">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="text">MAKANAN RINGAN</div>
                            <div class="number"><?= $jumlah_makanan_ringan; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-deep-orange">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">MINUMAN</div>
                            <div class="number"><?= $jumlah_minuman; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-amber">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">ANEKA BOLU</div>
                            <div class="number"><?= $jumlah_bolu; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-amber">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">ANEKA ROTI</div>
                            <div class="number"><?= $jumlah_roti; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-amber">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">ANEKA KUE TRADISIONAL</div>
                            <div class="number"><?= $jumlah_kue_tradisional; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-amber">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">BAHAN BAKU</div>
                            <div class="number"><?= $jumlah_bahan_baku; ?></div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- #END# Widgets -->
        </div>
    </section>



 <!-- Large Size -->
 <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel"><div id="plat"></div></h4>
                        </div>
                        <div class="modal-body">
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Plat</th>
                                        <th>Merk</th>
                                        <th>Masa Berlaku Pajak</th>
                                        <th>Masa Berlaku STNK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td><div class="no"></div></td>
                                        <td><div class="merk"></div></td>
                                        <td><div class="pajak"></div></td>
                                        <td><div class="stnk"></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>