<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class transaksi extends CI_Controller{
	
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

    // <!-- PERSEDIAAN BARANG -->


    // <!-- END PERSEDIAAN BARANG -->


    // <!-- BARANG KELUAR -->


    // <!-- END BARANG KELUAR -->


    // <!-- BARANG TERJUAL -->


    // <!-- END BARANG TERJUAL -->


    // <!-- BARANG SISA -->


    // <!-- END BARANG SISA -->

}
?>