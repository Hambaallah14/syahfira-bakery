<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('Form_validation');
		$this->load->helper(array('Form', 'Cookie', 'String'));
		$this->load->model('Login_Model');
	}

	public function index(){
		$cookie = get_cookie('inventaris'); // Ambil Cookie
		if ($this->session->userdata('logged')) { // Cek Session
			redirect('dashboard');
		}
		else if($cookie <> ''){
			
			$row = $this->Login_Model->get_by_cookie($cookie)->row(); //Cek Cookie
			if ($row) {
				$this->daftar_session($row);
			}
			else{
				
				$data = array(
					'id_user' => set_value('id_user'),
					'password' => set_value('password'),
					'flash'    => $this->session->flashdata('flash')
				);
				$this->load->view('login/index', $data);
			}
		}
		else{
			$data = array(
				'id_user'  => set_value('id_user'),
				'password' => set_value('password'),
				'flash'    => $this->session->flashdata('flash')
			);
			$this->load->view('login/index', $data);
		}
	}

	public function daftar_session($row){
		$session = array(
					'logged'   => TRUE,
					'id_login' => $row->id_login,
					'id_user'  => $row->id_user
					);
		$this->session->set_userdata($session);
		redirect('dashboard');
	}

	public function cek(){
		$id 	  = $this->input->post('id');
        $password = $this->input->post('password');
        $row 	  = $this->Login_Model->login($id, $password)->row();
        if ($row) { //Jika Login Berhasil Maka cookies langsung berjalan
			if($row->status_user !== "Aktif"){ //cek status apakah sudah aktif ?
				$this->session->set_flashdata('flash', 'Akun belum didaftarkan');
        		$this->index();
			}
			else{ //kalo sudah aktif langsung proses
				$key = random_string('alnum', 64);
        		set_cookie('inventaris', $key, 3600*24*30); // set expired 30 hari kedepan
        	
            	$update_key = array(  // simpan key di database
                    		'cookie' => $key
                			);
            	$this->Login_Model->update($update_key, $row->id_login);
            	$this->daftar_session($row);
			}
        	
        }
        else{
        	$this->session->set_flashdata('flash', 'Login tidak valid');
        	$this->index();
        }
	}


	public function logout(){
		delete_cookie('inventaris');
		$this->session->sess_destroy();
		redirect('login');
	}
}
 ?>
