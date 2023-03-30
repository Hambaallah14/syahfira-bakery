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
}
