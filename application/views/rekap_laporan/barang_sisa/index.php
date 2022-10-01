<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Rekap Laporan Barang Sisa</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control show-tick form-line"  name="rekap-barang-sisa" id="rekap-barang-sisa">
                                            <option value="-">-- Pilih Rekap --</option>
                                            <option value="per-tanggal">Per Tanggal</option>
                                            <option value="per-bulan">Per Bulan</option>
                                            <option value="per-tahun">Per Tahun</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" id="per-tanggal-barang-sisa">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="date" class="form-control" name="dr-tgl" id="dr-tgl-barang-sisa">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="date" class="form-control" name="sm-tgl" id="sm-tgl-barang-sisa">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="per-bulan-barang-sisa">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control show-tick form-line"  name="per-bulan" id="bulan-brg-sisa">
                                                    <option>--Pilih Bulan--</option>
                                                    <?php
                                                        $bln = [
                                                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                                        ];
                                                        for($i=1;$i<=12;$i++){
                                                            echo"<option value='".$i."'>".$bln[$i-1]."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-line">
                                            <select class="form-control show-tick form-line"  name="tahun" id="tahun-brg-sisa">
                                                <option>--Pilih Tahun--</option>
                                                <?php
                                                    for($i=date('Y');$i>=date('Y')-2;$i--){
                                                        echo"<option value='".$i."'>".$i."</option>";
                                                    }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="form-group form-float" id="per-tahun-barang-sisa">
                                    <div class="form-line">
                                        <select class="form-control show-tick form-line"  name="per-tahun" id="tahun-barang-sisa">
                                            <option>--Pilih Tahun--</option>
                                            <?php
                                                for($i=date('Y');$i>=date('Y')-2;$i--){
                                                    echo"<option value='".$i."'>".$i."</option>";
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>

                                <button class="btn bg-brown waves-effect button-filter-barang-sisa" id="button-filter-barang-sisa" type="button">
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
                        <button target="blank" class="btn bg-brown waves-effect button-cetak-barang-sisa mt-3" type="button">
                            <i class="material-icons">print</i>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</section>