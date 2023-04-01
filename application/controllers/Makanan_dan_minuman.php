<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Makanan_dan_minuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->load->model('MakanandanMinuman_Model');
        $this->load->model('Satuan_Model');
        $this->load->model('Jenis_Model');

        if (!$this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
    }

    public function index()
    {
        $data['title']             = "Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['makanan_minuman']   = $this->MakanandanMinuman_Model->all();
        $data['kode_makanan']      = $this->MakanandanMinuman_Model->kode();
        $data['satuan']            = $this->Satuan_Model->all();
        $data['jenis']             = $this->Jenis_Model->all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('makanan_dan_minuman/master/index');
        $this->load->view('template/footer');
    }


    public function insert()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('makanan_minuman', 'makanan_minuman', 'required');
        $this->form_validation->set_rules('id_jenis', 'id_jenis', 'required');
        $this->form_validation->set_rules('id_satuan', 'id_satuan', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('durasi_expired', 'durasi_expired', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('makanan_dan_minuman/master/index');
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
            $image_name             = $this->input->post('id', true) . '.png'; //buat name dari qr code sesuai dengan nim
            $params['data']         = $this->input->post('id', true); //data yang akan di jadikan QR CODE
            $params['level']        = 'H'; //H=High
            $params['size']         = 10;
            $params['savename']     = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $this->MakanandanMinuman_Model->insert();
            $this->session->set_flashdata('makanan_minuman', 'Disimpan');
            redirect('makanan_dan_minuman');
        }
    }

    public function delete($id)
    {
        $this->MakanandanMinuman_Model->delete($id);
        $this->session->set_flashdata('makanan_minuman', 'Dihapus');
        redirect('makanan_dan_minuman');
    }

    public function review($id)
    {
        $data['title']             = "Review Barang - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['makanan_minuman']   = $this->MakanandanMinuman_Model->allbyId($id);
        $data['satuan']            = $this->Satuan_Model->all();
        $data['jenis']             = $this->Jenis_Model->all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('makanan_dan_minuman/master/review');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $this->MakanandanMinuman_Model->edit();
        $this->session->set_flashdata('edit_makanan', 'Diedit');
        redirect('makanan_dan_minuman/review/' . $id);
    }



    ////////////// PERSEDIAAN
    public function persediaan()
    {
        $data['title']             = "Persediaan Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        if ($data["user"][0]["h_akses"] == "produksi") {
            $data['daftar_user']        = $this->User_Model->all_data();
            $data['makanan_minuman']    = $this->MakanandanMinuman_Model->all();
            $data['kode_persediaan']    = $this->MakanandanMinuman_Model->kode_persediaan();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('makanan_dan_minuman/persediaan/admin/index');
            $this->load->view('template/footer');
        } else {
            $data['makanan_minuman']         = $this->MakanandanMinuman_Model->allPersediaanbyIdUser($this->session->userdata('id_user'));
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('makanan_dan_minuman/persediaan/user/index');
            $this->load->view('template/footer');
        }
    }

    public function persediaan_cabang($id_user)
    {
        $data['title']             = "Persediaan Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['makanan_minuman']   = $this->MakanandanMinuman_Model->allPersediaanbyIdUser($id_user);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('makanan_dan_minuman/persediaan/admin/persediaan_cabang');
        $this->load->view('template/footer');
    }

    public function selectHargaMakandanMinuman()
    {
        $id            = $this->input->post('id', true);
        $data['harga'] = $this->MakanandanMinuman_Model->selectHargaMakandanMinuman($id);
        $this->load->view('makanan_dan_minuman/persediaan/admin/select_harga_makanan_minuman', $data);
    }

    public function InsertPersediaan()
    {
        $data['title']             = "Persediaan Bahan Baku - Syahfira Bakery & Cake";
        $this->form_validation->set_rules('id_persediaan', 'id_persediaan', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('id_mkn_mnm', 'id_mkn_mnm', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('tgl_persediaan', 'tgl_persediaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('makanan_dan_minuman/persediaan/admin/index');
            $this->load->view('template/footer');
        } else {
            $this->MakanandanMinuman_Model->InsertPersediaan();
            $this->session->set_flashdata('makanan_minuman', 'Disimpan');
            redirect('makanan_dan_minuman/persediaan');
        }
    }

    public function UpdateStatusPersediaan()
    {
        $this->MakanandanMinuman_Model->UpdateStatusPersediaan();
        $this->session->set_flashdata('makanan_minuman', 'Diubah');
        redirect('makanan_dan_minuman/persediaan');
    }

    // Menu hanya di akun admin
    public function review_persediaan_cabang()
    {
        $data['title']              = "Persediaan Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']               = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['daftar_user']        = $this->User_Model->all_data();
        $data['makanan_minuman']    = $this->MakanandanMinuman_Model->all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('makanan_dan_minuman/persediaan/admin/index');
        $this->load->view('template/footer');
    }


    public function pindahStok($object, $id_persediaan)
    {
        $data['title']              = "Persediaan Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']               = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['makanan_minuman']    = $this->MakanandanMinuman_Model->allPersediaanbyIdPersediaan($id_persediaan);
        if ($object == "e") {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('makanan_dan_minuman/barang_sisa/insert_barang_sisa');
            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('makanan_dan_minuman/barang_terjual/insert_barang_terjual');
            $this->load->view('template/footer');
        }
    }

    public function InsertPersediaanSisa()
    {
        $data['title']             = "Persediaan Makanan dan Minuman - Syahfira Bakery & Cake";
        $this->form_validation->set_rules('id_persediaan', 'id_persediaan', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('id_mkn_mnm', 'id_mkn_mnm', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('tgl_persediaan', 'tgl_persediaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('makanan_dan_minuman/barang_sisa/insert_barang_sisa');
            $this->load->view('template/footer');
        } else {
            $this->MakanandanMinuman_Model->InsertPersediaanSisa();
            $this->session->set_flashdata('status_persediaan', 'Disimpan');
            redirect('makanan_dan_minuman/persediaan');
        }
    }

    public function persediaan_sisa()
    {
        $data['title']              = "Persediaan Sisa Cabang - Syahfira Bakery & Cake";
        $data['user']               = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['makanan_minuman']    = $this->MakanandanMinuman_Model->allPersediaanSisa();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('makanan_dan_minuman/barang_sisa/index');
        $this->load->view('template/footer');
    }

    public function InsertPenjualanBarang()
    {
        $data['title']             = "Penjualan Barang - Syahfira Bakery & Cake";
        $this->form_validation->set_rules('id_persediaan', 'id_persediaan', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('id_makan_minum', 'id_makan_minum', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('new-qty', 'new-qty', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('makanan_dan_minuman/barang_terjual/insert_barang_terjual');
            $this->load->view('template/footer');
        } else {
            $this->MakanandanMinuman_Model->InsertPenjualanMakanMinum();
            $this->session->set_flashdata('makanan_minuman', 'Disimpan');
            redirect('makanan_dan_minuman/persediaan');
        }
    }

    public function penjualan_barang()
    {
        $data['title']              = "Penjualan Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']               = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['makanan_minuman']    = $this->MakanandanMinuman_Model->allPenjualanBarangbyIdUser($data['user'][0]["id_user"]);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('makanan_dan_minuman/barang_terjual/index');
        $this->load->view('template/footer');
    }

    // Menu hanya di akun admin
    public function review_penjualan_cabang()
    {
        $data['title']              = "Penjualan Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']               = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['daftar_user']        = $this->User_Model->all_data();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('makanan_dan_minuman/barang_terjual/review_penjualan');
        $this->load->view('template/footer');
    }

    public function penjualan_cabang($id_user)
    {
        $data['title']             = "Penjualan Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['makanan_minuman']   = $this->MakanandanMinuman_Model->allPenjualanBarangbyIdUser($id_user);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('makanan_dan_minuman/barang_terjual/penjualan_cabang');
        $this->load->view('makanan_dan_minuman/persediaan/admin/persediaan_cabang');
        $this->load->view('template/footer');
    }
}
