<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');


		if (!$this->session->userdata('logged')) { //cek session
			redirect('login'); //jika tidak ada session maka balek ke menu login
		}
	}

	public function index()
	{
		$data['title'] 	  		  	= "Dashboard - Syahfira Bakery & Cake";
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard/index');
		$this->load->view('template/footer');
	}
}
