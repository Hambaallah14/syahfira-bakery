<div class="flash-data" data-target="Penjualan Barang" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<section class="content">
    <div class="container-fluid">
    
        <div class="block-header">
            <h2>Rincian Penjualan Barang</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <tbody>    
                                <tr>
                                    <td width="35%">ID Penjualan</td>
                                    <td width="5%">:</td>
                                    <td width="60%"><?=$rincian_penjualan[0]['id_penjualan'];?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Penjualan</td>
                                    <td>:</td>
                                    <td><?=date('d F Y', strtotime($rincian_penjualan[0]['tanggal_penjualan']));?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Barang</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $no=1;
                                        $total = 0; 
                                        foreach($rincian_penjualan as $brg){
                                            echo"<tr>";
                                                echo "<td class='text-center'>".$no."</td>";
                                                echo "<td>".$brg["barang"]."</td>";
                                                echo "<td class='text-right'>".number_format($brg["harga"],0,',','.')."</td>";
                                                echo "<td class='text-right'>".$brg["qty"]." ".$brg["satuan"]."</td>";
                                                echo "<td class='text-right'>".number_format($brg["harga"]*$brg["qty"],0,',','.')."</td>";
                                                $total += $brg["harga"]*$brg["qty"];
                                            echo"</tr>";
                                            $no++;
                                        }

                                        echo"<tr>";
                                            echo"<td colspan='4' class='text-center'><strong>GRAND TOTAL (Rp.)</strong></td>";
                                            echo"<td class='text-right text-uppercase'><strong>".number_format($total,0,',','.')."</strong></td>";
                                        echo"</tr>";
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