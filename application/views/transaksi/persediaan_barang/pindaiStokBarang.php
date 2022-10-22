<div class="flash-data" data-target="Persediaan Barang" data-flashdata="<?= $this->session->flashdata('persediaan_barang'); ?>"></div>
<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Memindai Persediaan Barang</h2>
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
                        <?php echo form_open("transaksi/add_status_barang", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                            <input type="hidden" name="id_user" value="<?=$user[0]["id_user"];?>">
                            <input type="hidden" name="id-transaksi" value="<?=$persediaan_barang[0]["id_transaksi"];?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line"> 
                                            <select class="form-control" name="pilih-menu">
                                                <option value="-">-Pilih Menu-</option>
                                                <option value="Barang Keluar">Barang Keluar</option>
                                                <option value="Barang Terjual">Barang Terjual</option>
                                            </select>     
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line"> 
                                            <input type="text" class="form-control" name="id-barang" readonly value="<?=$persediaan_barang[0]["id_barang"];?>">     
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line"> 
                                            <input type="text" class="form-control" name="barang" readonly value="<?=$persediaan_barang[0]["barang"];?>">     
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line"> 
                                            <input type="number" class="form-control" name="harga" readonly value="<?=$persediaan_barang[0]["harga"];?>">     
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line"> 
                                            <input type="text" class="form-control" name="qty" readonly value="<?=$persediaan_barang[0]["qty"]." ".$persediaan_barang[0]["satuan"];?>">     
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line"> 
                                        <input type="number" class="form-control" name="new-qty" required min="0" max="<?=$persediaan_barang[0]["qty"];?>" value="0">     
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-teal waves-effect btn-simpan">Pindai Stok</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>