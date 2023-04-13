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
                        echo "<td>Rp. " . number_format($m["harga"], 0, ',', '.') . "</td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>