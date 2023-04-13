<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">
                        <h4>Cetak Laporan Makanan / Minuman</h4>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control show-tick id_jenis" id="id_jenis" name="id_jenis" required>
                                            <option value="0">--Pilih Jenis Makanan/Minuman--</option>
                                            <option value="all">Semua Jenis</option>
                                            <?php
                                            foreach ($jenis as $jen) {
                                                echo "<option value='" . $jen["id"] . "'>" . $jen['jenis'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn bg-teal waves-effect btnFilterMasterMakananMinuman float-right">
                                    <i class="material-icons">search</i>
                                    <span>Filter</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="header">
                        <h4>DAFTAR LAPORAN MAKANAN / MINUMAN</h4>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hasilCetak"></div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn bg-teal waves-effect btnCetak float-right">
                                    <i class="material-icons">print</i>
                                    <span>CETAK</span>
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>