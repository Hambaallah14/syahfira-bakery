<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi_Model extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }

    // PERSEDIAAN BARANG
    public function cariBarang($id_barang){
      return $this->db->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'")->result_array();
    }
    
    public function all_persediaan_barang(){
        return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.id_barang, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_persediaan_barang.harga, tb_barang.barang, tb_satuan.satuan, tb_jenis.jenis FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan INNER JOIN tb_jenis ON tb_jenis.id=tb_barang.id_jenis ORDER BY tb_persediaan_barang.tanggal_transaksi DESC")->result_array();
    }

    public function all_persediaan_barang_by_idTransaksi($id_transaksi){
      return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.id_barang, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_persediaan_barang.harga, tb_barang.barang, tb_satuan.satuan, tb_jenis.jenis FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan INNER JOIN tb_jenis ON tb_jenis.id=tb_barang.id_jenis WHERE tb_persediaan_barang.id_transaksi='$id_transaksi' ORDER BY tb_persediaan_barang.tanggal_transaksi DESC")->result_array();
    }

    public function add_persediaan_barang(){
      $data_persediaan = [
        "id_barang"           => $this->input->post('id_barang', true),
        "harga"               => $this->input->post('harga', true),
        "tanggal_transaksi"   => $this->input->post('tgl-transaksi', true),
        "qty"                 => $this->input->post('qty', true),
        "id_user"             => $this->input->post('id_user', true)
      ];
      $this->db->insert('tb_persediaan_barang', $data_persediaan);
    }

    public function delete_persediaan_barang($id_transaksi){
      $this->db->where('id_transaksi', $id_transaksi);
      $this->db->delete('tb_persediaan_barang');
    }

    public function add_status_barang(){
      $pilih_menu = $this->input->post('pilih-menu', true);

      if($pilih_menu == "Barang Terjual"){
        // ditambahkan ke barang terjual
        $data_barang_terjual = [
          "tanggal_transaksi"   => date('Y-m-d'),
          "id_transaksi"        => $this->input->post('id-transaksi', true),
          "id_barang"           => $this->input->post('id-barang', true),
          "harga"               => $this->input->post('harga', true),
          "qty"                 => $this->input->post('new-qty', true),
          "id_user"             => $this->input->post('id_user', true)
        ];
        $this->db->insert('tb_barang_terjual', $data_barang_terjual);

        // Update Barang Persediaan Barang
        $this->db->set('qty', 'qty-'.$this->input->post('new-qty', true), FALSE);
        $this->db->where("id_transaksi", $this->input->post('id-transaksi', true));
        $this->db->update('tb_persediaan_barang');
      }

      else{
        // ditambahkan ke barang keluar
        $data_barang_keluar = [
          "tanggal_transaksi"   => date('Y-m-d'),
          "id_transaksi"        => $this->input->post('id-transaksi', true),
          "id_barang"           => $this->input->post('id-barang', true),
          "harga"               => $this->input->post('harga', true),
          "qty"                 => $this->input->post('new-qty', true),
          "id_user"             => $this->input->post('id_user', true)
        ];
        $this->db->insert('tb_barang_keluar', $data_barang_keluar);

        // Update Barang Persediaan Barang
        $this->db->set('qty', 'qty-'.$this->input->post('new-qty', true), FALSE);
        $this->db->where("id_transaksi", $this->input->post('id-transaksi', true));
        $this->db->update('tb_persediaan_barang');
      }
    }


    // BARANG KELUAR
    public function all_barang_keluar(){
      return $this->db->query("SELECT tb_barang_keluar.id_transaksi, tb_barang_keluar.id_barang, tb_barang_keluar.qty, tb_barang_keluar.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_keluar INNER JOIN tb_barang ON tb_barang_keluar.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan")->result_array();
    }


    // BARANG TERJUAL
    public function all_barang_terjual(){
      return $this->db->query("SELECT tb_barang_terjual.id_transaksi, tb_barang_terjual.id_barang, tb_barang_terjual.qty, tb_barang_terjual.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_terjual INNER JOIN tb_barang ON tb_barang_terjual.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan")->result_array();
    }


    // BARANG SISA
    public function all_barang_sisa(){
      return $this->db->query("SELECT tb_barang_sisa.id_transaksi, tb_barang_sisa.id_barang, tb_barang_sisa.qty, tb_barang_sisa.harga, tb_barang_sisa.tanggal_transaksi, tb_barang_sisa.tanggal, tb_barang.barang, tb_satuan.satuan FROM tb_barang_sisa INNER JOIN tb_barang ON tb_barang_sisa.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan")->result_array();
    }

    public function add_barang_sisa(){
      // Menambahkan barang ke Barang Sisa
      $data_barang_sisa = [
        "tanggal"             => date('Y-m-d'),
        "tanggal_transaksi"   => $this->input->post('tanggal_transaksi', true),
        "id_transaksi"        => $this->input->post('id-transaksi', true),
        "id_barang"           => $this->input->post('id-barang', true),
        "harga"               => $this->input->post('harga', true),
        "qty"                 => $this->input->post('qty', true),
        "id_user"             => $this->input->post('id_user', true)
      ];
      $this->db->insert('tb_barang_sisa', $data_barang_sisa);

      // Kemudian Menghapus persediaan barang
      $this->db->where('id_transaksi', $this->input->post('id-transaksi', true));
      $this->db->delete('tb_persediaan_barang');
    }










    // REKAP LAPORAN
    public function perTanggal($dr_tgl, $sm_tgl, $object){
      if($object == "persediaan_barang"){
        return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.id_barang, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_persediaan_barang.tanggal_transaksi >= '$dr_tgl' AND tb_persediaan_barang.tanggal_transaksi <= '$sm_tgl' ORDER BY tb_persediaan_barang.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_keluar"){
        return $this->db->query("SELECT tb_barang_keluar.id_transaksi, tb_barang_keluar.id_barang, tb_barang_keluar.qty, tb_barang_keluar.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_keluar INNER JOIN tb_barang ON tb_barang_keluar.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_barang_keluar.tanggal_transaksi >= '$dr_tgl' AND tb_barang_keluar.tanggal_transaksi <= '$sm_tgl' ORDER BY tb_barang_keluar.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_terjual"){
        return $this->db->query("SELECT tb_barang_terjual.id_transaksi, tb_barang_terjual.id_barang, tb_barang_terjual.qty, tb_barang_terjual.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_terjual INNER JOIN tb_barang ON tb_barang_terjual.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_barang_terjual.tanggal_transaksi >= '$dr_tgl' AND tb_barang_terjual.tanggal_transaksi <= '$sm_tgl' ORDER BY tb_barang_terjual.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_sisa"){
        return $this->db->query("SELECT tb_barang_sisa.id_transaksi, tb_barang_sisa.id_barang, tb_barang_sisa.qty, tb_barang_sisa.tanggal, tb_barang_sisa.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_sisa INNER JOIN tb_barang ON tb_barang_sisa.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_barang_sisa.tanggal >= '$dr_tgl' AND tb_barang_sisa.tanggal <= '$sm_tgl' ORDER BY tb_barang_sisa.tanggal DESC")->result_array();
      }

    }

    public function perBulan($bulan, $tahun, $object){
      if($object == "persediaan_barang"){
        return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.id_barang, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_persediaan_barang.tanggal_transaksi) = '$tahun' AND EXTRACT(MONTH FROM tb_persediaan_barang.tanggal_transaksi)='$bulan' ORDER BY tb_persediaan_barang.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_keluar"){
        return $this->db->query("SELECT tb_barang_keluar.id_transaksi, tb_barang_keluar.id_barang, tb_barang_keluar.qty, tb_barang_keluar.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_keluar INNER JOIN tb_barang ON tb_barang_keluar.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_barang_keluar.tanggal_transaksi) = '$tahun' AND EXTRACT(MONTH FROM tb_barang_keluar.tanggal_transaksi)='$bulan' ORDER BY tb_barang_keluar.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_terjual"){
        return $this->db->query("SELECT tb_barang_terjual.id_transaksi, tb_barang_terjual.id_barang, tb_barang_terjual.qty, tb_barang_terjual.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_terjual INNER JOIN tb_barang ON tb_barang_terjual.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_barang_terjual.tanggal_transaksi) = '$tahun' AND EXTRACT(MONTH FROM tb_barang_terjual.tanggal_transaksi)='$bulan' ORDER BY tb_barang_terjual.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_sisa"){
        return $this->db->query("SELECT tb_barang_sisa.id_transaksi, tb_barang_sisa.id_barang, tb_barang_sisa.qty, tb_barang_sisa.tanggal_transaksi, tb_barang_sisa.tanggal, tb_barang.barang, tb_satuan.satuan FROM tb_barang_sisa INNER JOIN tb_barang ON tb_barang_sisa.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_barang_sisa.tanggal) = '$tahun' AND EXTRACT(MONTH FROM tb_barang_sisa.tanggal)='$bulan' ORDER BY tb_barang_sisa.tanggal DESC")->result_array();
      }
    }

    public function perTahun($tahun, $object){
      if($object == "persediaan_barang"){
        return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.id_barang, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_persediaan_barang.tanggal_transaksi) = '$tahun' ORDER BY tb_persediaan_barang.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_keluar"){
        return $this->db->query("SELECT tb_barang_keluar.id_transaksi, tb_barang_keluar.id_barang, tb_barang_keluar.qty, tb_barang_keluar.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_keluar INNER JOIN tb_barang ON tb_barang_keluar.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_barang_keluar.tanggal_transaksi) = '$tahun' ORDER BY tb_barang_keluar.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_terjual"){
        return $this->db->query("SELECT tb_barang_terjual.id_transaksi, tb_barang_terjual.id_barang, tb_barang_terjual.qty, tb_barang_terjual.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_barang_terjual INNER JOIN tb_barang ON tb_barang_terjual.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_barang_terjual.tanggal_transaksi) = '$tahun' ORDER BY tb_barang_terjual.tanggal_transaksi DESC")->result_array();
      }

      else if($object == "barang_sisa"){
        return $this->db->query("SELECT tb_barang_sisa.id_transaksi, tb_barang_sisa.id_barang, tb_barang_sisa.qty, tb_barang_sisa.tanggal_transaksi, tb_barang_sisa.tanggal, tb_barang.barang, tb_satuan.satuan FROM tb_barang_sisa INNER JOIN tb_barang ON tb_barang_sisa.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_barang_sisa.tanggal) = '$tahun' ORDER BY tb_barang_sisa.tanggal DESC")->result_array();
      }
    }
}