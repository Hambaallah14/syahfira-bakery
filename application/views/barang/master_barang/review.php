<div class="flash-data" data-target="Barang" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="col-md-4">
                    <div class="card" style="border-top:2px solid green;padding:20px 15px 20px 15px;">
                        <div class="row">
                            <div class="col-md-12">
                                <img src='<?=base_url("assets/img/qrcode/barang/");?><?=$daftar_barang[0]["qrcode"];?>.png' style="display:block;margin:auto;width:100px;height:100px; margin-bottom:10px;" class="rounded-circle">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <h4 class="text-center"><?=$daftar_barang[0]["id_barang"];?></h4>
                                <h5 class="text-center"><?= $daftar_barang[0]["barang"]; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card" style="border-top:2px solid green;">
                        <div class="header">
                        <h2>Edit Barang</h2>
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

                                <div id="edit-profil" style="display:none;">
                                <?php echo form_open("daftar_barang/edit/".$daftar_barang[0]['id_barang'], array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                   
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="id_barang" readonly value="<?= $daftar_barang[0]['id_barang'];?>">
                                        </div>  
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="id_jenis" required>
                                                <option value="-">--Pilih Jenis Barang--</option>
                                                    <?php foreach($jenis_barang as $sat){ ?>
                                                        <option value="<?=$sat["id"] ?>" <?php if($sat["id"] == $daftar_barang[0]["id_jenis"]){echo "selected";} ?>><?=$sat["jenis"];?></option>
                                                    <?php } ?>  
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="barang" required value="<?= $daftar_barang[0]['barang'];?>">
                                            <label class="form-label">Barang</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="id_satuan" required>
                                                <option value="-">--Pilih Satuan--</option>
                                                <?php foreach($satuan as $sat){ ?>
                                                    <option value="<?=$sat["id_satuan"] ?>" <?php if($sat["id_satuan"] == $daftar_barang[0]["id_satuan"]){echo "selected";} ?>><?=$sat["satuan"];?></option>";
                                                <?php } ?>  
                                            </select>
                                        </div>
                                    </div> 

                                    
                                </div>
                                    <button type="submit" class="btn bg-green waves-effect">Edit data</button>
                                <?php echo form_close(); ?>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>




                                        
                                   