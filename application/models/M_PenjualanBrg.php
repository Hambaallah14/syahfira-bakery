<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_PenjualanBrg extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }

    public function all(){
      return $this->db->query("SELECT * FROM tb_header_penjualan_barang")->result_array();
    }

    public function all_detail($id_penjualan){
      return $this->db->query("SELECT tb_barang.barang, tb_satuan.satuan, tb_detail_penjualan_barang.harga,tb_detail_penjualan_barang.qty, tb_header_penjualan_barang.id_penjualan, tb_header_penjualan_barang.tanggal_penjualan FROM tb_header_penjualan_barang INNER JOIN tb_detail_penjualan_barang ON tb_header_penjualan_barang.id_penjualan=tb_detail_penjualan_barang.id_penjualan INNER JOIN tb_barang ON tb_barang.id_barang=tb_detail_penjualan_barang.id_barang INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_header_penjualan_barang.id_penjualan = '$id_penjualan'")->result_array();
    }


    public function kode_penjualan_barang(){
      $q = $this->db->query("SELECT MAX(RIGHT(id_penjualan,3)) AS kd_max FROM tb_header_penjualan_barang");
      $kd = "";
      if($q->num_rows()>0){
          foreach($q->result() as $k){
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%03s", $tmp);
          }
      }else{
          $kd = "SELL-SBC-".date('y')."-001";
      }
      date_default_timezone_set('Asia/Jakarta');
      $a = "SELL-SBC-".date('y')."-".$kd;
      return $a;  
    }

    public function tambah(){
      // tb_header_persediaan_barang
      $data = [
        "id_penjualan"          => $this->input->post('id_penjualan', true),
        "tanggal_penjualan"     => $this->input->post('tanggal', true)
      ];
      $this->db->insert('tb_header_penjualan_barang', $data);

      // tb_detail_persediaan_barang
      for($i=0; $i < count($this->input->post('all_id_barang', true)); $i++){
        $this->db->set('id_penjualan', $this->input->post('id_penjualan', true));
        $this->db->set('id_barang', $this->input->post('all_id_barang', true)[$i]);
        $this->db->set('harga', str_replace(".", "", $this->input->post('all_harga', true))[$i]);
        $this->db->set('qty', $this->input->post('all_qty', true)[$i]);
        $this->db->insert('tb_detail_penjualan_barang');


        // Update stok bertambah pada tb_atk
        $this->db->set('stok', 'stok-'.$this->input->post('all_qty', true)[$i], FALSE);
        $this->db->where("id_barang", $this->input->post('all_id_barang', true)[$i]);
        $this->db->update('tb_stok');
      }
    }


}