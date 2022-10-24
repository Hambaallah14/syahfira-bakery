<div class="flash-data" data-target="Barang Terjual" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Barang Terjual</h2>
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" ><!--dataTable js-exportable" -->
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Persediaan</th>
                                        <th class="text-center">Barang</th>
                                        <th class="text-center">harga</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                        $no=1;
                                        foreach ($barang_terjual as $brg_terjual) {
                                            echo"<tr>";
                                                echo"<td>".$no."</td>";
                                                echo"<td>".date('d F Y', strtotime($brg_terjual["tanggal_transaksi"]))."</td>";
                                                echo"<td>".$brg_terjual["barang"]."</td>";
                                                echo"<td>".number_format($brg_terjual["harga"],0,',','.')."</td>";
                                                echo"<td>".$brg_terjual["qty"]." ".$brg_terjual["satuan"]."</td>";
                                                echo"<td>".number_format($brg_terjual["harga"]*$brg_terjual["qty"],0,',','.')."</td>";
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