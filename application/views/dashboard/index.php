<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <?php if ($user[0]["h_akses"] == "admin") { ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-green">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">USERS</div>
                            <div class="number"><?= $jumlah_user; ?> User</div>
                        </div>
                    </div>


                </div>

            <?php } else { ?>
                <div class="col-md-12">
                    <div class="alert bg-teal">
                        Selamat Datang Admin
                    </div>
                </div>
            <?php } ?>
        </div>


        <!-- #END# Widgets -->
    </div>
</section>



<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">
                    <div id="plat"></div>
                </h4>
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
                                <td>
                                    <div class="no"></div>
                                </td>
                                <td>
                                    <div class="merk"></div>
                                </td>
                                <td>
                                    <div class="pajak"></div>
                                </td>
                                <td>
                                    <div class="stnk"></div>
                                </td>
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