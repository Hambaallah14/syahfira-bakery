<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Daftar_barang extends CI_Controller{
	
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

	public function index(){
        $data['title'] 	  	       = "Daftar Barang - Syahfira Bakery & Cake";
        $data['kode']		       = $this->Barang_Model->kode_barang();
        $data['daftar_barang']     = $this->Barang_Model->all_barang();
		$data['jenis_barang']	   = $this->Barang_Model->jenis_barang();
		$data['satuan']		       = $this->Barang_Model->satuan();
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/master_barang/index');
        $this->load->view('template/footer');     
    }

	public function add(){
		$data['title'] 	  = "Daftar Barang - Syahfira Bakery & Cake";
		$this->form_validation->set_rules('id_barang', 'id_barang', 'required');
		$this->form_validation->set_rules('id_jenis', 'id_jenis', 'required');
		$this->form_validation->set_rules('barang', 'barang', 'required');
        $this->form_validation->set_rules('id_satuan', 'id_satuan', 'required');
        
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('barang/master_barang/index');
			$this->load->view('template/footer');
		}
		else{
			$this->load->library('ciqrcode'); 
			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './assets/'; //string, the default is application/cache/
			$config['errorlog']     = './assets/'; //string, the default is application/logs/
			$config['imagedir']     = './assets/img/qrcode/barang/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224,255,255); // array, default is array(255,255,255)
			$config['white']        = array(70,130,180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$image_name=$this->input->post('id_barang', true).'.png'; //buat name dari qr code sesuai dengan nim
			$params['data'] = $this->input->post('id_barang', true); //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

			$this->Barang_Model->add();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('daftar_barang');
		}
    }

	public function hapus($id_barang){
        $this->Barang_Model->delete($id_barang);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('daftar_barang');
	}

	public function review_barang($id_barang){
		$data['title'] 	  	       = "Review Barang - Syahfira Bakery & Cake";
        $data['daftar_barang']     = $this->Barang_Model->all_barang_by_id($id_barang);
		$data['jenis_barang']	   = $this->Barang_Model->jenis_barang();
		$data['satuan']		       = $this->Barang_Model->satuan();
		$data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('barang/master_barang/review');
        $this->load->view('template/footer');
	}

	public function edit($id_barang){
		$this->Barang_Model->edit();
		$this->session->set_flashdata('flash', 'Diedit');
		redirect('daftar_barang/review_barang/'.$id_barang);
	}
}
 ?>
