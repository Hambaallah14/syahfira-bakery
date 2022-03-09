<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Persediaan_barang extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Barang_Model');
        $this->load->model('M_PersediaanBrg');
		$this->load->model('User_Model');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
        $data['title'] 	  	       = "Persediaan Barang - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['daftar_barang']     = $this->Barang_Model->all_barang();
        $data['daftar_persediaan'] = $this->M_PersediaanBrg->all();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/persediaan_barang/index');
        $this->load->view('template/footer');     
    }

    public function tambah_persediaan(){
        $data['title'] 	  	       = "Persediaan Barang - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$data['kode']		       = $this->M_PersediaanBrg->kode_persediaan_barang();
		$data['daftar_barang']     = $this->Barang_Model->all_barang();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/persediaan_barang/tambah_persediaan');
        $this->load->view('template/footer');     
    }


    public function review_persediaan($id_persediaan){
        $data['title'] 	  	        = "Persediaan Barang - Syahfira Bakery & Cake";
		$data['user']               = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$data["rincian_persediaan"] = $this->M_PersediaanBrg->all_detail($id_persediaan);
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/persediaan_barang/review_persediaan');
        $this->load->view('template/footer');
    }

	public function add(){
		$data['title'] 	  = "Persediaan Barang - Syahfira Bakery & Cake";
		$this->M_PersediaanBrg->tambah();
		$this->session->set_flashdata('flash', 'Disimpan');
		redirect('persediaan_barang');
	}

}
 ?>
