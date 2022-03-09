<?php
// konfigurasi database
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "db_persediaan";
// perintah php untuk akses ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

$nim = $_POST['kode_atk'];
$query = mysqli_query($koneksi, "select * from tb_atk where kode_atk='$nim'");
$atk = mysqli_fetch_array($query);
$data = array(
            'nama'      => $atk['nama'],
            'satuan'   =>  $atk['satuan'],
            'harga'    =>  $atk['harga'],);
 echo json_encode($data);
?>