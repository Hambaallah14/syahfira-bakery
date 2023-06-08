<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MakanandanMinuman_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function all()
    {
        return $this->db->get('tb_makanan_minuman')->result_array();
    }

    public function allbyId($id)
    {
        return $this->db->query("SELECT tb_makanan_minuman.id, tb_makanan_minuman.qrcode, tb_makanan_minuman.id_jenis, tb_makanan_minuman.makanan_minuman, tb_makanan_minuman.harga, tb_makanan_minuman.durasi_expired, tb_makanan_minuman.id_satuan, tb_satuan.satuan FROM tb_makanan_minuman INNER JOIN tb_satuan ON tb_makanan_minuman.id_satuan=tb_satuan.id WHERE tb_makanan_minuman.id='$id'")->result_array();
    }



    public function kode()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(id,3)) AS kd_max FROM tb_makanan_minuman");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd  = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "MM" . date('y') . "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $a = "MM" . date('y') . $kd;
        return $a;
    }

    public function insert()
    {
        $makanan_minuman = [
            "id"                => $this->input->post('id', true),
            "qrcode"            => $this->input->post('id', true),
            "makanan_minuman"   => $this->input->post('makanan_minuman', true),
            "id_jenis"          => $this->input->post('id_jenis', true),
            "id_satuan"         => $this->input->post('id_satuan', true),
            "harga"             => str_replace(".", "", $this->input->post('harga', true)),
            "durasi_expired"    => $this->input->post('durasi_expired', true)
        ];
        $this->db->insert('tb_makanan_minuman', $makanan_minuman);
    }


    public function delete($id)
    {
        unlink('./assets/img/qrcode/barang/' . $id . '.png');
        $this->db->where('id', $id);
        $this->db->delete('tb_makanan_minuman');
    }

    public function edit()
    {
        $makanan_minuman = [
            "makanan_minuman"   => $this->input->post('makanan_minuman', true),
            "harga"             => str_replace(".", "", $this->input->post('harga', true)),
            "id_jenis"          => $this->input->post('id_jenis', true),
            "id_satuan"         => $this->input->post('id_satuan', true),
            "durasi_expired"    => $this->input->post('durasi_expired', true)

        ];
        $this->db->where("id", $this->input->post('id', true));
        $this->db->update('tb_makanan_minuman', $makanan_minuman);
    }


    /////////////PERSEDIAAN
    public function allPersediaanbyIdUser($idUser)
    {
        return $this->db->query("SELECT tb_persediaan_mm.id_persediaan, tb_persediaan_mm.id_mkn_mnm, tb_makanan_minuman.makanan_minuman, tb_makanan_minuman.durasi_expired, tb_persediaan_mm.harga, tb_persediaan_mm.qty, tb_persediaan_mm.tgl_persediaan, tb_persediaan_mm.keterangan, tb_satuan.satuan, tb_status_persediaan_mm.id_user, tb_status_persediaan_mm.status_persediaan, tb_status_persediaan_mm.status_keterangan FROM tb_persediaan_mm INNER JOIN tb_makanan_minuman ON tb_makanan_minuman.id=tb_persediaan_mm.id_mkn_mnm INNER JOIN tb_status_persediaan_mm ON tb_status_persediaan_mm.id_persediaan=tb_persediaan_mm.id_persediaan INNER JOIN tb_satuan ON tb_satuan.id=tb_makanan_minuman.id_satuan WHERE tb_status_persediaan_mm.id_user='$idUser'")->result_array();
    }

    public function allPersediaanbyIdPersediaan($idPersediaan)
    {
        return $this->db->query("SELECT tb_persediaan_mm.id_persediaan, tb_persediaan_mm.id_mkn_mnm, tb_makanan_minuman.makanan_minuman, tb_makanan_minuman.durasi_expired, tb_persediaan_mm.harga, tb_persediaan_mm.qty, tb_persediaan_mm.tgl_persediaan, tb_persediaan_mm.keterangan, tb_satuan.satuan, tb_status_persediaan_mm.id_user, tb_status_persediaan_mm.status_persediaan, tb_status_persediaan_mm.status_keterangan FROM tb_persediaan_mm INNER JOIN tb_makanan_minuman ON tb_makanan_minuman.id=tb_persediaan_mm.id_mkn_mnm INNER JOIN tb_status_persediaan_mm ON tb_status_persediaan_mm.id_persediaan=tb_persediaan_mm.id_persediaan INNER JOIN tb_satuan ON tb_satuan.id=tb_makanan_minuman.id_satuan WHERE tb_persediaan_mm.id_persediaan='$idPersediaan'")->result_array();
    }


    public function kode_persediaan()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(id_persediaan,3)) AS kd_max FROM tb_persediaan_mm");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd  = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "PMM" . date('y') . "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $a = "PMM" . date('y') . $kd;
        return $a;
    }

    public function selectHargaMakandanMinuman($id)
    {
        return $this->db->query("SELECT * FROM tb_makanan_minuman WHERE id='$id'")->result_array();
    }

    public function InsertPersediaan()
    {
        $persediaan = [
            "id_persediaan"    => $this->input->post('id_persediaan', true),
            "id_mkn_mnm"       => $this->input->post('id_mkn_mnm', true),
            "harga"            => $this->input->post('harga', true),
            "qty"              => $this->input->post('qty', true),
            "tgl_persediaan"   => $this->input->post('tgl_persediaan', true),
            "keterangan"       => $this->input->post('keterangan', true)
        ];
        $this->db->insert('tb_persediaan_mm', $persediaan);

        $status = [
            "id_persediaan"         => $this->input->post('id_persediaan', true),
            "id_user"               => $this->input->post('id_user', true),
            "status_persediaan"     => 0
        ];
        $this->db->insert('tb_status_persediaan_mm', $status);
    }

    public function UpdateStatusPersediaan()
    {
        $MakanandanMinuman = [
            "status_persediaan"      => $this->input->post('status_persediaan', true),
            "status_keterangan"      => $this->input->post('status_keterangan', true)

        ];
        $this->db->where("id_persediaan", $this->input->post('id_persediaan', true));
        $this->db->update('tb_status_persediaan_mm', $MakanandanMinuman);
    }

    public function UpdateStatusBarangSisa()
    {
        $MakanandanMinuman = [
            "status_persediaan"      => $this->input->post('status_persediaan', true),
            "status_keterangan"      => $this->input->post('status_keterangan', true)

        ];
        $this->db->where("id_persediaan", $this->input->post('id_persediaan', true));
        $this->db->update('tb_status_persediaan_mm', $MakanandanMinuman);
    }


    public function InsertPersediaanSisa()
    {
        foreach ($this->allPersediaanSisa() as $barang_sisa) {
            // CEK APAKAH DATA BARANG SISA SAMA DENGAN BARANG YANG MAU DIMASUKKAN DARI PERSEDIAAN
            if ($barang_sisa["id_persediaan"] == $this->input->post('id_persediaan', true)) {
                echo "TRUE";
            } else {
                echo "FALSE";
            }
        }
    }

    public function allPersediaanSisa()
    {
        return $this->db->query("SELECT tb_barang_sisa.tanggal, tb_barang_sisa.id_persediaan, tb_barang_sisa.id_user, tb_user.nama, tb_barang_sisa.id_makan_minum, tb_makanan_minuman.makanan_minuman, tb_makanan_minuman.durasi_expired, tb_barang_sisa.harga, tb_barang_sisa.qty, tb_satuan.satuan, tb_barang_sisa.tgl_persediaan, tb_status_persediaan_mm.status_persediaan, tb_status_persediaan_mm.status_keterangan FROM tb_barang_sisa INNER JOIN tb_makanan_minuman ON tb_barang_sisa.id_makan_minum=tb_makanan_minuman.id INNER JOIN tb_user ON tb_user.id_user=tb_barang_sisa.id_user INNER JOIN tb_satuan ON tb_satuan.id=tb_makanan_minuman.id_satuan INNER JOIN tb_status_persediaan_mm ON tb_status_persediaan_mm.id_persediaan=tb_barang_sisa.id_persediaan")->result_array();
    }

    public function allPersediaanSisabyId($id)
    {
        return $this->db->query("SELECT tb_barang_sisa.tanggal, tb_barang_sisa.id_persediaan, tb_barang_sisa.id_user, tb_user.nama, tb_barang_sisa.id_makan_minum, tb_makanan_minuman.makanan_minuman, tb_makanan_minuman.durasi_expired, tb_barang_sisa.harga, tb_barang_sisa.qty, tb_satuan.satuan, tb_barang_sisa.tgl_persediaan FROM tb_barang_sisa INNER JOIN tb_makanan_minuman ON tb_barang_sisa.id_makan_minum=tb_makanan_minuman.id INNER JOIN tb_user ON tb_user.id_user=tb_barang_sisa.id_user INNER JOIN tb_satuan ON tb_satuan.id=tb_makanan_minuman.id_satuan WHERE tb_barang_sisa.id_persediaan='$id'")->result_array();
    }

    public function InsertPenjualanSisa()
    {
        $persediaan = [
            "id_persediaan"    => $this->input->post('id_persediaan', true),
            "id_user"          => $this->input->post('id_user', true),
            "id_makan_minum"   => $this->input->post('id_makan_minum', true),
            "tanggal"          => date('Y-m-d'),
            "harga"            => $this->input->post('harga', true),
            "qty"              => $this->input->post('new-qty', true)
        ];
        $this->db->insert('tb_barang_jual', $persediaan);

        // Update Persediaan Sisa Barang
        $this->db->set('qty', 'qty-' . $this->input->post('new-qty', true), FALSE);
        $this->db->where("id_persediaan", $this->input->post('id_persediaan', true));
        $this->db->update('tb_barang_sisa');
    }

    public function InsertPenjualanMakanMinum()
    {
        $persediaan = [
            "id_persediaan"    => $this->input->post('id_persediaan', true),
            "id_user"          => $this->input->post('id_user', true),
            "id_makan_minum"   => $this->input->post('id_makan_minum', true),
            "tanggal"          => date('Y-m-d'),
            "harga"            => $this->input->post('harga', true),
            "qty"              => $this->input->post('new-qty', true)
        ];
        $this->db->insert('tb_barang_jual', $persediaan);

        // Update Barang Persediaan Barang
        $this->db->set('qty', 'qty-' . $this->input->post('new-qty', true), FALSE);
        $this->db->where("id_persediaan", $this->input->post('id_persediaan', true));
        $this->db->update('tb_persediaan_mm');
    }

    public function allPenjualanBarangbyIdUser($IdUser)
    {
        return $this->db->query("SELECT tb_barang_jual.tanggal, tb_barang_jual.id_persediaan, tb_barang_jual.id_user, tb_user.nama, tb_barang_jual.id_makan_minum, tb_makanan_minuman.makanan_minuman, tb_barang_jual.harga, tb_barang_jual.qty, tb_satuan.satuan FROM tb_barang_jual INNER JOIN tb_makanan_minuman ON tb_barang_jual.id_makan_minum=tb_makanan_minuman.id INNER JOIN tb_user ON tb_user.id_user=tb_barang_jual.id_user INNER JOIN tb_satuan ON tb_satuan.id=tb_makanan_minuman.id_satuan WHERE tb_barang_jual.id_user='$IdUser'")->result_array();
    }
}
