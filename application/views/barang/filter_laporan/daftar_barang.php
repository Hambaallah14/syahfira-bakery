<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Rekap Daftar Barang</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control show-tick form-line"  name="rekap-barang" id="rekap-barang">
                                            <option value="-">-- Pilih Rekap --</option>
                                            <option value="semua-barang">Semua Barang</option>
                                            <option value="jenis-barang">Jenis Barang</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-float" id="jenis-barang">
                                    <div class="form-line">
                                        <select class="form-control show-tick form-line"  name="jenis-barang" id="level-2-jenis-brg">
                                            <option>--Pilih Jenis Barang--</option>
                                            <?php
                                                foreach($jenis_barang as $jenis){
                                                    echo"<option value='$jenis[id]'>".$jenis["jenis"]."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <button class="btn bg-brown waves-effect button-filter-daftar-barang" id="button-filter-daftar-barang" type="button">
                                    <i class="material-icons">search</i>    
                                    <span>Filter</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4" id="card-filter">
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
                        <div class="data-barang"></div>
                        <button target="blank" class="btn bg-brown waves-effect button-cetak-daftar-barang mt-3" type="button">
                            <i class="material-icons">print</i>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</section>