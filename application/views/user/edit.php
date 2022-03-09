<div class="flash-data" data-target="User" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="col-md-4">
                    <div class="card" style="border-top:2px solid green;padding:20px 15px 20px 15px;">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="<?= base_url();?>assets/img/user.png" style="display:block;margin:auto;width:100px;height:100px; margin-bottom:10px;" class="rounded-circle">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <h4 class="text-center"><?= $id_user[0]['nama']; ?></h4>
                                <h5 class="text-center"><?= $id_user[0]['id_user']; ?></h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" style="margin-bottom:10px;">
                                <button type="button" class="btn btn-block btn-lg bg-green waves-effect" id="btn-edit-profil">Edit Profil</button>
                            </div>
                            <div class="col-md-6" style="margin-bottom:10px;">
                                <button type="button" class="btn btn-block btn-lg bg-green waves-effect" id="btn-edit-password">Edit User</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card" style="border-top:2px solid green;">
                        <div class="header">
                        <h2>Edit Profil</h2>
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
                                <?php echo form_open("daftar_user/edit_profil/".$id_user[0]['id_user'], array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                    <?php foreach($id_user as $data){ ?>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="id_user" readonly value="<?= $data['id_user'];?>">
                                        </div>
                                        
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama" required value="<?= $data['nama'];?>">
                                            <label class="form-label">Nama Lengkap</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="no_telp" required value="<?= $data['no_telp'];?>">
                                            <label class="form-label">No Telp</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="status_user" required>
                                                <option value="-">--Status User--</option>
                                                <option value="Aktif" <?php if($status_user[0]['status_user'] == 'Aktif'){echo "selected";} ?>>Aktif</option>
                                                <option value="Tidak Aktif" <?php if($status_user[0]['status_user'] == 'Tidak Aktif'){echo "selected";} ?>>Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <?php } ?>
                                    <button type="submit" class="btn bg-green waves-effect">Edit data</button>
                                <?php echo form_close(); ?>
                                </div>

                                <div id="edit-password" style="display:none;">
                                    <?php echo form_open("daftar_user/edit_password/".$id_user[0]['id_user'], array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                        <input type="hidden" name="id_user" value="<?= $data['id_user'];?>">
                                        
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" class="form-control" name="new_password">
                                                <label class="form-label">New Password</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" class="form-control" name="confirm_password">
                                                <label class="form-label">Confirm Password</label>
                                            </div>
                                        </div>                
                                        
                                        <button type="submit" class="btn bg-green waves-effect">Edit Password</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>




                                        
                                   