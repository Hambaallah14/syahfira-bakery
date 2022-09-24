<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Rekap_laporan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
        $this->load->model('Transaksi_Model');
		$this->load->model('User_Model');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

    // PERSEDIAAN BARANG
	public function persediaan_barang(){
        $data['title'] 	  	       = "Rekap Laporan Persediaan Barang - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('rekap_laporan/persediaan_barang/index');
        $this->load->view('template/footer');     
    }


    // BARANG KELUAR
	public function barang_keluar(){
        $data['title'] 	  	       = "Rekap Laporan Barang Keluar - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('rekap_laporan/barang_keluar/index');
        $this->load->view('template/footer');     
    }


    // BARANG TERJUAL
	public function barang_terjual(){
        $data['title'] 	  	       = "Rekap Laporan Barang Terjual - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/daftar_barang');
        $this->load->view('template/footer');     
    }


    // BARANG SISA
	public function barang_sisa(){
        $data['title'] 	  	       = "Rekap Laporan Barang Sisa - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/daftar_barang');
        $this->load->view('template/footer');     
    }



    // REKAP LAPORAN
    public function per_tanggal($object){
        if($object == "persediaan_barang"){
            $dr_tgl                    = $this->input->post('dr_tgl');
			$sm_tgl                    = $this->input->post('sm_tgl');
            $data['persediaan_barang'] = $this->Transaksi_Model->perTanggal($dr_tgl, $sm_tgl, $object);
            $this->load->view('rekap_laporan/persediaan_barang/rekap_filter', $data);
        }
        else if($object == "barang_keluar"){
            $dr_tgl                    = $this->input->post('dr_tgl');
			$sm_tgl                    = $this->input->post('sm_tgl');
            $data['barang_keluar']     = $this->Transaksi_Model->perTanggal($dr_tgl, $sm_tgl, $object);
            $this->load->view('rekap_laporan/barang_keluar/rekap_filter', $data);
        }
        else if($object == "barang_terjual"){

        }
        else if($object == "barang_sisa"){

        }
    }

    public function per_bulan($object){
        if($object == "persediaan_barang"){
            $bulan                    = $this->input->post('per_bulan');
			$tahun                    = $this->input->post('per_tahun');
            $data['persediaan_barang'] = $this->Transaksi_Model->perBulan($bulan, $tahun, $object);
            $this->load->view('rekap_laporan/persediaan_barang/rekap_filter', $data);
        }
        else if($object == "barang_keluar"){
            $bulan                    = $this->input->post('per_bulan');
			$tahun                    = $this->input->post('per_tahun');
            $data['barang_keluar']    = $this->Transaksi_Model->perBulan($bulan, $tahun, $object);
            $this->load->view('rekap_laporan/barang_keluar/rekap_filter', $data);
        }
        else if($object == "barang_terjual"){

        }
        else if($object == "barang_sisa"){

        }
    }

    public function per_tahun($object){
        if($object == "persediaan_barang"){
			$tahun                     = $this->input->post('tahun');
            $data['persediaan_barang'] = $this->Transaksi_Model->perTahun($tahun, $object);
            $this->load->view('rekap_laporan/persediaan_barang/rekap_filter', $data);
        }
        else if($object == "barang_keluar"){
            $tahun                     = $this->input->post('tahun');
            $data['barang_keluar']     = $this->Transaksi_Model->perTahun($tahun, $object);
            $this->load->view('rekap_laporan/barang_keluar/rekap_filter', $data);
        }
        else if($object == "barang_terjual"){

        }
        else if($object == "barang_sisa"){

        }
    }
	
}
 ?>
