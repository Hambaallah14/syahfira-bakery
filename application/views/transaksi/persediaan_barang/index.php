<div class="flash-data" data-target="Persediaan Barang" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Persediaan Barang</h2>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" ><!--dataTable js-exportable" -->
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Barang</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Tanggal Transaksi</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $no=1;
                                        
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
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">Tambah Persediaan Barang</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control show-tick id_barang" name="id_barang" required>
                                        <option value="-">--Pilih Barang--</option>
                                        <?php
                                            foreach($daftar_barang as $brg){
                                                echo"<option value='".$brg["id_barang"]."'>".$brg['barang']."</option>";
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control tgl-transaksi" placeholder="Pilih Tanggal" name="tgl-transaksi" required>
                                        <label class="form-label">Tanggal Transaksi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control qty" name="qty" required>
                                        <label class="form-label">Qty</label>
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