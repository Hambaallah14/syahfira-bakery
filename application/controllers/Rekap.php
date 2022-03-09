<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Rekap extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Atk_Model');
        $this->load->model('Barang_Model');
        $this->load->model('Kendaraan_Model');    
        $this->load->model('Pegawai_Model');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

    //Alat Tulis Kantor
    public function rekap_pembelian_atk(){
        $data['title']   = "Rekap Laporan Pembelian Alat Tulis Kantor";
        $pil             = $this->input->post('rekap', true);
        if($pil == "Bulan"){
            $data['tahun'] = $this->input->post('tahun', true);
            $data['bulan'] = $this->input->post('bulan', true);
            $bulan = $this->input->post('bulan', true);
            $tahun = $this->input->post('tahun', true);
            $data['atk_perbulan']  = $this->Atk_Model->rekap_atk_perbulan();
            $this->load->view('rekap/atk/rekap_atk_perbulan', $data);
        }
        else{
            $data['dr_tgl'] = $this->input->post('dr_tgl', true);
            $dr_tgl = $this->input->post('dr_tgl', true);

            $data['sd_tgl'] = $this->input->post('sd_tgl', true);
            $sd_tgl = $this->input->post('sd_tgl', true);

            $data['atk_pertgl']  = $this->Atk_Model->rekap_atk_pertgl();
            $this->load->view('rekap/atk/rekap_atk_pertgl', $data);
        }
    }

    public function rekap_permintaan_atk(){ 
        $data['title']   = "Rekap Laporan Permintaan Alat Tulis Kantor";
        $pil             = $this->input->post('rekap', true);
        if($pil == "Orang"){
            $id_permintaan   = $this->input->post('id_permintaan', true);
            $data['pegawai'] = $this->Pegawai_Model->pegawaibynip($this->session->userdata('nip'));
            $data['atk']     = $this->Atk_Model->cetak_permintaan($id_permintaan);
            $data['pengurus_barang'] = $this->Pegawai_Model->jabatan("Pengurus Barang");
            $data['kasubbag_umum']   = $this->Pegawai_Model->jabatan("Kasubbag Umum dan Kepegawaian");
            $this->load->view('rekap/atk/rekap_permintaan_atk', $data);
        }
        else{
            $data['bidang'] = $this->input->post('bidang', true);
            $bidang = $this->input->post('bidang', true);

            $data['dr_tgl'] = $this->input->post('dr_tgl', true);
            $dr_tgl = $this->input->post('dr_tgl', true);

            $data['sd_tgl'] = $this->input->post('sd_tgl', true);
            $sd_tgl = $this->input->post('sd_tgl', true);

            $data['atk_perbidang']  = $this->Atk_Model->rekap_atk_perbidang();
            $this->load->view('rekap/atk/rekap_atk_perbidang', $data);
        }
    }

    public function rekap_pengembalian_atk(){
        $id_pengembalian = $this->input->post('id_pengembalian', true);
        $data['title']   = "Rekap Laporan Pengembalian Alat Tulis Kantor";
        $data['pegawai'] = $this->Pegawai_Model->pegawaibynip($this->session->userdata('nip'));
        $data['atk']     = $this->Atk_Model->cetak_pengembalian($id_pengembalian);
        $data['pengurus_barang'] = $this->Pegawai_Model->jabatan("Pengurus Barang");
        $data['kasubbag_umum']   = $this->Pegawai_Model->jabatan("Kasubbag Umum dan Kepegawaian");
        $this->load->view('rekap/atk/rekap_pengembalian_atk', $data); 
    }




    //Barang
    public function rekap_pembelian_barang(){
        $data['title']   = "Rekap Laporan Pembelian Barang";
        $pil             = $this->input->post('rekap', true);
        if($pil == "Bulan"){
            $data['tahun'] = $this->input->post('tahun', true);
            $tahun = $this->input->post('tahun', true);
            
            $data['bulan'] = $this->input->post('bulan', true);
            $bulan = $this->input->post('bulan', true);
            $data['brg_perbulan']  = $this->Barang_Model->rekap_barang_perbulan();
            $this->load->view('rekap/barang/rekap_barang_perbulan', $data);
        }
        else{
            $data['dr_tgl'] = $this->input->post('dr_tgl', true);
            $dr_tgl = $this->input->post('dr_tgl', true);

            $data['sd_tgl'] = $this->input->post('sd_tgl', true);
            $sd_tgl = $this->input->post('sd_tgl', true);

            $data['brg_pertgl']  = $this->Barang_Model->rekap_barang_pertgl();
            $this->load->view('rekap/barang/rekap_barang_pertgl', $data);
        }
    }

    public function rekap_peminjaman_barang(){
        $data['title']   = "Rekap Laporan Peminjaman Barang";
        $pil             = $this->input->post('rekap', true);
        if($pil == "Bap"){
            $id_permintaan           = $this->input->post('id_barang_keluar', true);
            $data['id_permintaan']   = $id_permintaan;
            $data['pegawai']         = $this->Pegawai_Model->pegawaibynip($this->session->userdata('nip'));
            $data['pengurus_barang'] = $this->Pegawai_Model->jabatan("Pengurus Barang");
            $data['kasubbag_umum']   = $this->Pegawai_Model->jabatan("Kasubbag Umum dan Kepegawaian");
            $data['barang']          = $this->Barang_Model->tb_detail($id_permintaan);
            $this->load->view('rekap/barang/rekap_peminjaman_barang', $data); 

        }
        else if ($pil == "Orang"){
            $nip                 = $this->input->post('nip', true);
            $data['nip']         = $nip;
            $data['daftar_brg']  = $this->Barang_Model->rekap_peminjaman_per_org($nip);
            $this->load->view('rekap/barang/rekap_brg_per_orang', $data); 
        }

        else{
            $data['bidang'] = $this->input->post('bidang', true);
            $bidang = $this->input->post('bidang', true);

            $data['dr_tgl'] = $this->input->post('dr_tgl', true);
            $dr_tgl = $this->input->post('dr_tgl', true);

            $data['sd_tgl'] = $this->input->post('sd_tgl', true);
            $sd_tgl = $this->input->post('sd_tgl', true);

            $data['brg_perbidang']  = $this->Barang_Model->rekap_brg_perbidang();
            $this->load->view('rekap/barang/rekap_brg_perbidang', $data);
        }
        
    }

    public function rekap_pengembalian_barang(){
        $id_pengembalian = $this->input->post('id_pengembalian', true);
        $data['id_pengembalian'] = $id_pengembalian;
        $data['title']   = "Rekap Laporan Pengembalian Barang";
        $data['pegawai'] = $this->Pegawai_Model->pegawaibynip($this->session->userdata('nip'));
        $data['pengurus_barang'] = $this->Pegawai_Model->jabatan("Pengurus Barang");
        $data['kasubbag_umum']   = $this->Pegawai_Model->jabatan("Kasubbag Umum dan Kepegawaian");
        $data['barang']  = $this->Barang_Model->tb_detail_pengembalian_barang($id_pengembalian);
        $this->load->view('rekap/barang/rekap_pengembalian_barang', $data); 
    }

    public function rekap_kendaraan(){
        $id_permintaan      = $this->input->post('id_permintaan', true);
        $data['title']      = "Rekap Laporan Permintaan Kendaraan";
        $data['pegawai']    = $this->Pegawai_Model->pegawaibynip($this->session->userdata('nip'));
        $data['pengurus_barang'] = $this->Pegawai_Model->jabatan("Pengurus Barang");
        $data['kasubbag_umum']   = $this->Pegawai_Model->jabatan("Kasubbag Umum dan Kepegawaian");
        $data['kendaraan']  = $this->Kendaraan_Model->tb_permintaan_kendaraan($id_permintaan);
        $this->load->view('rekap/kendaraan/rekap_kendaraan', $data); 
    }

    public function rekap_pengembalian_kendaraan(){
        $id_pengembalian    = $this->input->post('id_pengembalian', true);
        $data['title']      = "Rekap Laporan Pengembalian Kendaraan";
        $data['pegawai']    = $this->Pegawai_Model->pegawaibynip($this->session->userdata('nip'));
        $data['pengurus_barang'] = $this->Pegawai_Model->jabatan("Pengurus Barang");
        $data['kasubbag_umum']   = $this->Pegawai_Model->jabatan("Kasubbag Umum dan Kepegawaian");
        $data['kendaraan']  = $this->Kendaraan_Model->tb_pengembalian_kendaraan($id_pengembalian);
        $this->load->view('rekap/kendaraan/rekap_pengembalian_kendaraan', $data); 
    }


	
}
 ?>
