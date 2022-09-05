<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi_Model extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }

    // PERSEDIAAN BARANG
    public function all_persediaan_barang(){
        return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan")->result_array();
    }

    public function delete_persediaan_barang($id_transaksi){
      $this->db->where('id_transaksi', $id_transaksi);
      $this->db->delete('tb_persediaan_barang');
    }
}