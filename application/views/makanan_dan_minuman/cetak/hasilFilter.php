<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">
                        <h4>DAFTAR LAPORAN MAKANAN / MINUMAN</h4>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <!--UNTUK ADMIN -->

                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Makanan / Minuman</th>
                                                <th class="text-center">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($makanan_minuman as $m) {
                                                echo "<tr>";
                                                echo "<td>" . $no . "</td>";
                                                echo "<td>" . $m["id"] . "</td>";
                                                echo "<td>" . $m["makanan_minuman"] . "</td>";
                                                echo "<td>" . $m["harga"] . "</td>";
                                                echo "</tr>";
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn bg-teal waves-effect btnCetak float-right">
                                    <i class="material-icons">print</i>
                                    <span>CETAK</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>