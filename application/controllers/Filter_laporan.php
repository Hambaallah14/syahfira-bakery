<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Filter_laporan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
        $this->load->model('Barang_Model');
		$this->load->model('M_PenjualanBrg');
        $this->load->model('M_PersediaanBrg');
		$this->load->model('User_Model');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}
	
	// DAFTAR BARANG
	public function daftar_barang(){
        $data['title'] 	  	       = "Filter Laporan Daftar Barang - Syahfira Bakery & Cake";
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['jenis_barang']	   = $this->Barang_Model->jenis_barang();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/daftar_barang');
        $this->load->view('template/footer');     
    }

	public function semua_barang(){
		$semua   = $this->input->post('semua');
		$data['barang'] = $this->Barang_Model->all_barang();
        $this->load->view('barang/filter_laporan/hasil_laporan/daftar_barang/semua_barang', $data);
	}


	
	public function jenis_barang(){
		$id_jenis   = $this->input->post('id_jenis');
		$data['barang'] = $this->Barang_Model->all_barang_by_idJenis($id_jenis);
        $this->load->view('barang/filter_laporan/hasil_laporan/daftar_barang/jenis_barang', $data);
	}


	// PERSEDIAAN BARANG
	public function persediaan_barang(){
		$data['title'] 	  = "Filter Laporan Persediaan Barang - Syahfira Bakery & Cake";
        $data['user']     = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/persediaan_barang');
        $this->load->view('template/footer');
    }

	// PENJUALAN BARANG
	public function penjualan_barang(){
        $data['title'] 	  = "Filter Laporan Penjualan Barang - Syahfira Bakery & Cake";
        $data['user']     = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/filter_laporan/penjualan_barang');
        $this->load->view('template/footer');
	}

	public function per_tanggal($method){
		if($method == "persediaan"){
			$dr_tgl   = $this->input->post('dr_tgl');
			$sm_tgl   = $this->input->post('sm_tgl');
			$data['barang'] = $this->Barang_Model->all_barang_by_perTanggal($dr_tgl, $sm_tgl, $method);
			$this->load->view('barang/filter_laporan/hasil_laporan/persediaan_barang/per_tanggal', $data);
		}
		else if($method == "penjualan"){
			$dr_tgl   = $this->input->post('dr_tgl');
			$sm_tgl   = $this->input->post('sm_tgl');
			$data['barang'] = $this->Barang_Model->all_barang_by_perTanggal($dr_tgl, $sm_tgl, $method);
			$this->load->view('barang/filter_laporan/hasil_laporan/penjualan_barang/per_tanggal', $data);
		}
	}

	public function per_bulan($method){
		if($method == "persediaan"){
			$per_bulan   = $this->input->post('per_bulan');
			$per_tahun   = $this->input->post('per_tahun');
			$data['barang'] = $this->Barang_Model->all_barang_by_perBulan($per_bulan, $per_tahun, $method);
			$this->load->view('barang/filter_laporan/hasil_laporan/persediaan_barang/per_bulan', $data);
		}
		else{
			$per_bulan   = $this->input->post('per_bulan');
			$per_tahun   = $this->input->post('per_tahun');
			$data['barang'] = $this->Barang_Model->all_barang_by_perBulan($per_bulan, $per_tahun, $method);
			$this->load->view('barang/filter_laporan/hasil_laporan/penjualan_barang/per_bulan', $data);
		}
	}

	public function per_tahun($method){
		if($method == "persediaan"){
			$per_tahun   = $this->input->post('per_tahun');
			$data['barang'] = $this->Barang_Model->all_barang_by_perTahun($per_tahun, $method);
			$this->load->view('barang/filter_laporan/hasil_laporan/persediaan_barang/per_tahun', $data);
		}
		else{
			$per_tahun   = $this->input->post('per_tahun');
			$data['barang'] = $this->Barang_Model->all_barang_by_perTahun($per_tahun, $method);
			$this->load->view('barang/filter_laporan/hasil_laporan/penjualan_barang/per_tahun', $data);
		}
	}
}
 ?>
