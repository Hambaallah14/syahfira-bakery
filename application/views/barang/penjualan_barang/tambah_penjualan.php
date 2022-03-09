<div class="flash-data" data-target="Penjualan Barang" data-dataflash="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">    
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php echo form_open("penjualan_barang/add", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h2>Tambah Penjualan Barang</h2>
                            </div>
                            <div class="body">             
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control id_penjualan" name="id_penjualan" value="<?=$kode; ?>" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="date" class="form-control tanggal" name="tanggal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick form-line"  name="id_barang" data-nama="" id="id_barang">
                                                <option value="-">-- Pilih Barang --</option>
                                                <?php foreach($daftar_barang as  $sat){ ?>
                                                    <option value="<?=$sat["id_barang"] ?>" barang="<?=$sat["barang"];?>"><?=$sat["barang"];?></option>";
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" class="form-control qty" name="harga" placeholder="Harga" id="harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" class="form-control qty" name="qty" placeholder="Qty" id="qty">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <button class="btn bg-brown waves-effect tambah_list_penjualan" type="button">Tambah List</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>List Barang</h2>
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
                                    <table class="table table-bordered table-striped table-hover dataTable" id="dataTable"><!--dataTable js-exportable" -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Barang</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>

                                        <tbody></tbody>
                                    </table>
                                    
                                </div>
                                <button type="submit" class="btn bg-brown mt-5 btn-tambah-persediaan">Simpan</button>
                            </div>
                        </div>  
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>