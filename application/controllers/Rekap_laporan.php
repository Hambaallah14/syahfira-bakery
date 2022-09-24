<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Rekap_laporan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
        $this->load->model('Barang_Model');
		$this->load->model('User_Model');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

    // PERSEDIAAN BARANG
	public function persediaan_barang(){
        $data['title'] 	  	       = "Rekap Laporan Persediaan Barang - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['jenis_barang']	   = $this->Barang_Model->jenis_barang();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/daftar_barang');
        $this->load->view('template/footer');     
    }


    // BARANG KELUAR
	public function barang_keluar(){
        $data['title'] 	  	       = "Rekap Laporan Barang Keluar - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['jenis_barang']	   = $this->Barang_Model->jenis_barang();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/daftar_barang');
        $this->load->view('template/footer');     
    }


    // BARANG TERJUAL
	public function barang_terjual(){
        $data['title'] 	  	       = "Rekap Laporan Barang Terjual - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['jenis_barang']	   = $this->Barang_Model->jenis_barang();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/daftar_barang');
        $this->load->view('template/footer');     
    }


    // BARANG SISA
	public function barang_sisa(){
        $data['title'] 	  	       = "Rekap Laporan Barang Sisa - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['jenis_barang']	   = $this->Barang_Model->jenis_barang();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/daftar_barang');
        $this->load->view('template/footer');     
    }
	
}
 ?>
