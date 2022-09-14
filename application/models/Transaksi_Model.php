<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi_Model extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }

    // PERSEDIAAN BARANG
    public function all_persediaan_barang(){
        return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.id_barang, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan")->result_array();
    }

    public function add_persediaan_barang(){
      $data_persediaan = [
        "id_barang"           => $this->input->post('id_barang', true),
        "tanggal_transaksi"   => $this->input->post('tgl-transaksi', true),
        "qty"                 => $this->input->post('qty', true)
      ];
      $this->db->insert('tb_persediaan_barang', $data_persediaan);
    }

    public function delete_persediaan_barang($id_transaksi){
      $this->db->where('id_transaksi', $id_transaksi);
      $this->db->delete('tb_persediaan_barang');
    }

    public function modal_status_barang($id_transaksi){
      return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.id_barang, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_persediaan_barang.id_transaksi='$id_transaksi'")->result_array();
    }




    // BARANG SISA
    public function modal_barang_sisa($id_transaksi){
      return $this->db->query("SELECT tb_persediaan_barang.id_transaksi, tb_persediaan_barang.id_barang, tb_persediaan_barang.qty, tb_persediaan_barang.tanggal_transaksi, tb_barang.barang, tb_satuan.satuan FROM tb_persediaan_barang INNER JOIN tb_barang ON tb_persediaan_barang.id_barang=tb_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_persediaan_barang.id_transaksi='$id_transaksi'")->result_array();
    }

    public function add_barang_sisa(){
      // Menambahkan barang ke Barang Sisa
      $data_barang_sisa = [
        "id_transaksi"        => $this->input->post('id-transaksi', true),
        "id_barang"           => $this->input->post('id-barang', true),
        "qty"                 => $this->input->post('qty', true)
      ];
      $this->db->insert('tb_barang_sisa', $data_barang_sisa);

      // Kemudian Menghapus persediaan barang
      $this->db->where('id_transaksi', $this->input->post('id-transaksi', true));
      $this->db->delete('tb_persediaan_barang');
    }
}