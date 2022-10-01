<div class="flash-data" data-target="Barang" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Daftar Barang</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <div class="card">
                    <div class="header">
                            <button type="button" class="btn bg-teal waves-effect btn-tambah-barang" data-toggle="modal" data-target="#defaultModal">Tamba Barang</button>
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
                                        <th>ID Barang</th>
                                        <th>Barang</th>
                                        <th>Stok Barang</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no=1;
                                        foreach($daftar_barang as $barang){
                                            echo"<tr>";
                                                echo"<td>".$no."</td>";
                                                echo"<td>".$barang["id_barang"]."</td>";
                                                // echo"<td><img src='".base_url()."assets/img/qrcode/barang/master-barang/".$barang["id_barcode"].".png' width='50%'></td>";
                                                echo"<td>".$barang["barang"]."</td>";
                                                if($barang["qty"] == ""){
                                                    echo"<td>0</td>";
                                                }
                                                else{
                                                    echo"<td>".$barang["qty"]." ".$barang["satuan"]."</td>";
                                                }
                                                echo"<td>"; 
                                                    echo"<div class='demo-google-material-icon'>";
                                                        echo"<a class='btn-hapus' href='".base_url()."daftar_barang/hapus/".$barang["id_barang"]."' title='Hapus'>";
                                                            echo"<i class='material-icons'>delete</i> ";
                                                        echo"</a>";

                                                        echo"<a class='btn-edit-barang' href='".base_url()."daftar_barang/review_barang/".$barang["id_barang"]."' title='Review Barang'>";
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
                <div class="modal-header bg-teal">
                    <h4 class="modal-title" id="defaultModalLabel" style="padding-top:-5px;padding-bottom:10px;color:white;">Tambah Barang</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control id_barang" name="id_barang" value="<?= $kode;?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control show-tick id_jenis" name="id_jenis" required>
                                        <option value="-">--Pilih Jenis Barang--</option>
                                        <?php
                                            foreach($jenis_barang as $jenis){
                                                echo"<option value='".$jenis["id"]."'>".$jenis['jenis']."</option>";
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control barang" name="barang" required>
                                        <label class="form-label">Barang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control show-tick id_satuan" name="id_satuan" required>
                                            <option value="-">--Pilih Satuan--</option>
                                                <?php
                                                    foreach($satuan as $sat){
                                                        echo"<option value='".$sat["id_satuan"]."'>".$sat['satuan']."</option>";
                                                    }
                                                ?>
                                        </select>
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