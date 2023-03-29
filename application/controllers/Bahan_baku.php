<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bahan_baku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->load->model('Bahanbaku_Model');
        $this->load->model('Satuan_Model');

        if (!$this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
    }

    public function index()
    {
        $data['title']             = "Bahan Baku - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['bahan_baku']        = $this->Bahanbaku_Model->all();
        $data['kode_bahan_baku']   = $this->Bahanbaku_Model->kode();
        $data['satuan']            = $this->Satuan_Model->all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('bahan_baku/master/index');
        $this->load->view('template/footer');
    }


    public function insert()
    {
        $this->form_validation->set_rules('id_bahanbaku', 'id_bahanbaku', 'required');
        $this->form_validation->set_rules('bahan_baku', 'bahan_baku', 'required');
        $this->form_validation->set_rules('id_satuan', 'id_satuan', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('bahan_baku/master/index');
            $this->load->view('template/footer');
        } else {
            $this->load->library('ciqrcode');
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/img/qrcode/barang/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name             = $this->input->post('id_bahanbaku', true) . '.png'; //buat name dari qr code sesuai dengan nim
            $params['data']         = $this->input->post('id_bahanbaku', true); //data yang akan di jadikan QR CODE
            $params['level']        = 'H'; //H=High
            $params['size']         = 10;
            $params['savename']     = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $this->Bahanbaku_Model->insert();
            $this->session->set_flashdata('bahan_baku', 'Disimpan');
            redirect('bahan_baku');
        }
    }

    public function delete($id)
    {
        $this->Bahanbaku_Model->delete($id);
        $this->session->set_flashdata('bahan_baku', 'Dihapus');
        redirect('bahan_baku');
    }

    public function review($id)
    {
        $data['title']             = "Review Barang - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['bahan_baku']        = $this->Bahanbaku_Model->allbyId($id);
        $data['satuan']            = $this->Satuan_Model->all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('bahan_baku/master/review');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $this->Bahanbaku_Model->edit();
        $this->session->set_flashdata('edit_bahan_baku', 'Diedit');
        redirect('bahan_baku/review/' . $id);
    }



    ////////////// PERSEDIAAN
    public function persediaan()
    {
        $data['title']             = "Persediaan Bahan Baku - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        if ($data["user"][0]["h_akses"] == "produksi") {
            $data['daftar_user']        = $this->User_Model->all_data();
            $data['bahan_baku']         = $this->Bahanbaku_Model->all();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('bahan_baku/persediaan/admin/index');
            $this->load->view('template/footer');
        } else {
            $data['bahan_baku']         = $this->Bahanbaku_Model->allPersediaanbyIdUser($this->session->userdata('id_user'));
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('bahan_baku/persediaan/user/index');
            $this->load->view('template/footer');
        }
    }
}
