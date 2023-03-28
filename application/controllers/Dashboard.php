<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('User_Model');

		if (!$this->session->userdata('logged')) { //cek session
			redirect('login'); //jika tidak ada session maka balek ke menu login
		}
	}

	public function index()
	{
		$data['title'] 	  		  		= "Dashboard - Syahfira Bakery & Cake";
		$data['user']             		= $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$data['jumlah_user']	  		= $this->User_Model->jumlah_user();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard/index');
		$this->load->view('template/footer');
	}
}
