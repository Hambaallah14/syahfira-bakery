<div class="flash-data" data-target="Persediaan Barang" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Penjualan Barang</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <div class="card">
                    <div class="header">
                            <a href="<?=base_url();?>penjualan_barang/tambah_penjualan" class="btn bg-brown">Tambah Penjualan</a>
                            
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
                                        <th class="text-center">ID Penjualan</th>
                                        <th class="text-center">Tanggal Penjualan</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $no=1;
                                        foreach($daftar_penjualan as $brg){
                                            echo"<tr>";
                                                echo "<td class='text-center'>".$no."</td>";
                                                echo "<td>".$brg["id_penjualan"]."</td>";
                                                echo "<td class='text-center'>".date('d F Y', strtotime($brg["tanggal_penjualan"]))."</td>";
                                                echo "<td class='text-center'>";
                                                    echo"<div class='demo-google-material-icon '>";
                                                        echo"<a href='".base_url()."penjualan_barang/review_penjualan/".$brg["id_penjualan"]."' title='Review'>";
                                                            echo"<i class='material-icons'>visibility</i> ";
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
</section>