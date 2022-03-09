<div class="flash-data" data-target="User" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Daftar User</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <div class="card">
                    <div class="header">
                        
                        <button type="button" class="btn bg-brown waves-effect" data-toggle="modal" data-target="#defaultModal">Tambah User</button>
                        
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
                                        <th>No</th>
                                        <th>ID USER</th>
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no=1;
                                        foreach($daftar_user as $peg){
                                            echo"<tr>";
                                                echo"<td>".$no."</td>";
                                                echo"<td>".$peg["id_user"]."</td>";
                                                echo"<td>".$peg["nama"]."</td>";
                                                echo"<td>".$peg["no_telp"]."</td>";   
                                                echo"<td>"; 
                                                    echo"<div class='demo-google-material-icon'>";
                                                        echo"<a class='btn-hapus' href='".base_url()."daftar_user/hapus/".$peg["id_user"]."' title='Hapus'>";
                                                            echo"<i class='material-icons'>delete</i> ";
                                                         echo"</a>";

                                                        echo"<a class='' href='".base_url()."daftar_user/profil/".$peg["id_user"]."' title='Edit'>";
                                                            echo"<i class='material-icons'>edit</i>";
                                                        echo"</a>";
                                                    echo"</div>";
                                                echo"</td>"; 
                                            echo"</tr>";
                                            $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-brown">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;">Tambah User</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("daftar_user/add", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_user" required>
                                <label class="form-label">ID User</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama" required>
                                <label class="form-label">Nama Lengkap</label>
                            </div>
                        </div>
                       
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="no_telp" required>
                                <label class="form-label">No Telp</label>
                            </div>
                        </div>


                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" required>
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                </div>
        
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">Simpan data</button>
                    <?php echo form_close(); ?>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="visibility" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;">Pilih Opsi</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("daftar_pegawai/opsi", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control nip" name="nip" value="" readonly="">
                            <label class="form-label label-nip">NIP</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control show-tick" name="opsi" required>
                                <option value="-">--Pilih Opsi--</option>
                                <option value="Hapus">Hapus Data</option>
                                <option value="Edit">Edit Data</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea class="form-control" name="keterangan"></textarea>
                            <label class="form-label">Keterangan</label>
                        </div>
                    </div>
                </div>
        
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">Simpan data</button>
                    <?php echo form_close(); ?>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Alert Pending -->
    <div class="modal fade" id="alert-pending" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;">Pemberitahuan</h4>
                </div>
                <div class="modal-body modal-body-pemberitahuan"></div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

 <!-- <button type="button" onclick="printJS('printJS-form', 'html')" id="print">
    Print Form
 </button> -->
</section>