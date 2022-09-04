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
    public function persediaan_barang(){

    }

    // <!-- END PERSEDIAAN BARANG -->
    

    // <!-- BARANG KELUAR -->
    public function barang_keluar(){

    }

    // <!-- END BARANG KELUAR -->
    

    // <!-- BARANG TERJUAL -->
    public function barang_terjual(){

    }

    // <!-- END BARANG TERJUAL -->


    // <!-- BARANG SISA -->
    public function barang_sisa(){

    }

    // <!-- END BARANG SISA -->

}
?>