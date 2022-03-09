<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Penjualan_barang extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Barang_Model');
        $this->load->model('M_PenjualanBrg');
		$this->load->model('User_Model');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
        $data['title'] 	  	       = "Penjualan Barang - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['daftar_barang']     = $this->Barang_Model->all_barang();
        $data['daftar_penjualan']  = $this->M_PenjualanBrg->all();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/penjualan_barang/index');
        $this->load->view('template/footer');     
    }

    public function tambah_penjualan(){
        $data['title'] 	  	       = "Penjualan Barang - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$data['kode']		       = $this->M_PenjualanBrg->kode_penjualan_barang();
		$data['daftar_barang']     = $this->Barang_Model->all_barang();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/penjualan_barang/tambah_penjualan');
        $this->load->view('template/footer');     
    }


    public function review_penjualan($id_penjualan){
        $data['title'] 	  	        = "Penjualan Barang - Syahfira Bakery & Cake";
		$data['user']               = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$data["rincian_penjualan"]  = $this->M_PenjualanBrg->all_detail($id_penjualan);
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/penjualan_barang/review_penjualan');
        $this->load->view('template/footer');
    }

	public function add(){
		$data['title'] 	  = "Penjualan Barang - Syahfira Bakery & Cake";
		$this->M_PenjualanBrg->tambah();
		$this->session->set_flashdata('flash', 'Disimpan');
		redirect('penjualan_barang');
	}

}
 ?>
