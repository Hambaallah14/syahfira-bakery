<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class transaksi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Barang_Model');
        $this->load->model('Transaksi_Model');
		$this->load->model('User_Model');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

    // <!-- PERSEDIAAN BARANG -->
    public function persediaan_barang(){
        $data['title'] 	  	       = "Persediaan Barang - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['persediaan_barang'] = $this->Transaksi_Model->all_persediaan_barang();
        $data['daftar_barang']     = $this->Barang_Model->all_daftar_barang();

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('transaksi/persediaan_barang/index');
        $this->load->view('template/footer');
    }

    public function add_persediaan_barang(){
        $data['title'] 	            = "Persediaan Barang - Syahfira Bakery & Cake";
		$this->form_validation->set_rules('id_barang', 'id_barang', 'required');
		$this->form_validation->set_rules('tgl-transaksi', 'tgl-transaksi', 'required');
		$this->form_validation->set_rules('qty', 'qty', 'required');
        
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('transaksi/persediaan_barang/index');
            $this->load->view('template/footer');
		}
		else{
			$this->Transaksi_Model->add_persediaan_barang();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('transaksi/persediaan_barang');
		}
    }

    public function delete_persediaan_barang($id_transaksi){
        $this->Transaksi_Model->delete_persediaan_barang($id_transaksi);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('transaksi/persediaan_barang');
    }

    // <!-- END PERSEDIAAN BARANG -->
    

    // <!-- BARANG KELUAR -->
    public function barang_keluar(){
        $data['title'] 	  	       = "Barang Keluar - Syahfira Bakery & Cake";

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('transaksi/barang_keluar/index');
        $this->load->view('template/footer');
    }

    // <!-- END BARANG KELUAR -->
    

    // <!-- BARANG TERJUAL -->
    public function barang_terjual(){
        $data['title'] 	  	       = "Barang Terjual - Syahfira Bakery & Cake";

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('transaksi/barang_terjual/index');
        $this->load->view('template/footer');
    }

    // <!-- END BARANG TERJUAL -->


    // <!-- BARANG SISA -->
    public function barang_sisa(){
        $data['title'] 	  	       = "Barang Sisa - Syahfira Bakery & Cake";

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('transaksi/barang_sisa/index');
        $this->load->view('template/footer');
    }

    public function modal_barang_sisa(){
        $id_transaksi = $this->input->post['id_transaksi'];
        // $data['data_modal'] = $this->Transaksi_Model->modal_barang_sisa($id_transaksi);
        $this->load->view('transaksi/barang_sisa/modal_barang_sisa', $data);
    }


    // public function add_barang_sisa(){
    //     $data['title'] 	            = "Persediaan Barang - Syahfira Bakery & Cake";
	// 	$this->form_validation->set_rules('id-transaksi', 'id-transaksi', 'required');
	// 	$this->form_validation->set_rules('id-barang', 'id-barang', 'required');
	// 	$this->form_validation->set_rules('qty', 'qty', 'required');
        
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('template/header', $data);
    //         $this->load->view('template/sidebar');
    //         $this->load->view('transaksi/persediaan_barang/index');
    //         $this->load->view('template/footer');
	// 	}
	// 	else{
	// 		$this->Transaksi_Model->add_barang_sisa();
	// 		$this->session->set_flashdata('flash', 'Disimpan');
	// 		redirect('transaksi/persediaan_barang');
	// 	}
    // }

    // <!-- END BARANG SISA -->

}
?>