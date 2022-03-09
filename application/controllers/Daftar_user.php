<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Daftar_user extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('User_Model');
		if (! $this->session->userdata('logged')) { //cek session
            		redirect('login'); //jika tidak ada session maka balek ke menu login
        	}
	}

	public function index(){
		$data['title'] 	  	      = "Daftar User - Syafira Bakery & Cake";
		$data['user']             = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$data['daftar_user']   	  = $this->User_Model->all_data();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('user/index');
        $this->load->view('template/footer');
        
    }
	
	public function hapus($id_user){
        $this->User_Model->delete($id_user);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('daftar_user');
	}
	
    public function add(){
		$data['title'] 	  = "Tambah User - Syafira Bakery & Cake";
		$this->form_validation->set_rules('id_user', 'id_user', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('user/index');
			$this->load->view('template/footer');
		}
		else{
			$this->User_Model->add();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('daftar_user');
		}
    }

	public function profil($id_user){
        $data['title'] 	          = "Profil - Syafira Bakery & Cake";
		$data['id_user']		  = $this->User_Model->user_by_iduser($id_user);
		$data['status_user']      = $this->User_Model->user_by_status_user($id_user);
		$data['user']             = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('user/edit', $data);
        $this->load->view('template/footer');
	}

    
	public function edit_profil($id_user){
		$this->User_Model->edit_user();
		$this->session->set_flashdata('flash', 'Diedit');
		redirect('daftar_user/profil/'.$id_user);
	}

	public function edit_password($id_user){
		$this->User_Model->edit_password();
		$this->session->set_flashdata('flash', 'Diedit');
		redirect('daftar_user/profil/'.$id_user);
	}

	public function tambah(){
		$data['title'] 	  = "Alat Tulis Kantor - Sistem Pengolahan Barang BKD Provsu";
		$this->form_validation->set_rules('kode_atk', 'kode_atk', 'required');
		$this->form_validation->set_rules('atk', 'atk', 'required');
		$this->form_validation->set_rules('satuan', 'satuan', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('atk/input');
			$this->load->view('template/footer');
		}
		else{
            $this->Atk_Model->tambah();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('atk');
		}
	}

}
 ?>
