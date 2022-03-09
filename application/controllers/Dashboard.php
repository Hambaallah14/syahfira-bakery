<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_Model');
		$this->load->model('Barang_Model');
		
		if (! $this->session->userdata('logged')) { //cek session
            		redirect('login'); //jika tidak ada session maka balek ke menu login
        	}
	}

	public function index(){
		$data['title'] 	  		  = "Dashboard - Syahfira Bakery & Cake";
		$data['user']             = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$data['jumlah_user']	  = $this->User_Model->jumlah_user();
		$data['jumlah_makanan_ringan']	  = $this->Barang_Model->jumlah_makanan_ringan();
		$data['jumlah_minuman']	  		  = $this->Barang_Model->jumlah_minuman();
		$data['jumlah_bolu']	  		  = $this->Barang_Model->jumlah_bolu();
		$data['jumlah_roti']	  		  = $this->Barang_Model->jumlah_roti();
		$data['jumlah_kue_tradisional']	  = $this->Barang_Model->jumlah_kue_tradisional();
		$data['jumlah_bahan_baku'] 		  = $this->Barang_Model->jumlah_bahan_baku();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard/index');
		$this->load->view('template/footer');
	}
}
 ?>
