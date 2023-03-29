<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bahanbaku_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function all()
    {
        return $this->db->get('tb_bahan_baku')->result_array();
    }

    public function allbyId($id)
    {
        return $this->db->query("SELECT tb_bahan_baku.id_bahanbaku, tb_bahan_baku.qrcode, tb_bahan_baku.bahanbaku, tb_bahan_baku.harga, tb_bahan_baku.id_satuan, tb_satuan.satuan FROM tb_bahan_baku INNER JOIN tb_satuan ON tb_bahan_baku.id_satuan=tb_satuan.id WHERE tb_bahan_baku.id_bahanbaku='$id'")->result_array();
    }


    public function jumlah_bahan_baku()
    {
        $this->db->select('COUNT(id_bahanbaku) as jumlah_bahan');
        $this->db->from('tb_bahan_baku');
        return $this->db->get()->row()->jumlah_bahan;
    }



    public function kode()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(id_bahanbaku,3)) AS kd_max FROM tb_bahan_baku");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd  = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "BB" . date('y') . "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $a = "BB" . date('y') . $kd;
        return $a;
    }

    public function insert()
    {
        $bahan_baku = [
            "id_bahanbaku"    => $this->input->post('id_bahanbaku', true),
            "qrcode"          => $this->input->post('id_bahanbaku', true),
            "bahanbaku"       => $this->input->post('bahan_baku', true),
            "harga"           => str_replace(".", "", $this->input->post('harga', true)),
            "id_satuan"       => $this->input->post('id_satuan', true)
        ];
        $this->db->insert('tb_bahan_baku', $bahan_baku);
    }


    public function delete($id_bahanbaku)
    {
        unlink('./assets/img/qrcode/barang/' . $id_bahanbaku . '.png');
        $this->db->where('id_bahanbaku', $id_bahanbaku);
        $this->db->delete('tb_bahan_baku');
    }

    public function edit()
    {
        $bahan_baku = [
            "bahanbaku"      => $this->input->post('bahan_baku', true),
            "harga"          => str_replace(".", "", $this->input->post('harga', true)),
            "id_satuan"      => $this->input->post('id_satuan', true)

        ];
        $this->db->where("id_bahanbaku", $this->input->post('id_bahanbaku', true));
        $this->db->update('tb_bahan_baku', $bahan_baku);
    }



    /////////////PERSEDIAAN
    public function allPersediaanbyIdUser($idUser)
    {
        return $this->db->query("SELECT tb_persediaan_bb.id_persediaan, tb_persediaan_bb.id_bahanbaku, tb_bahan_baku.bahanbaku, tb_persediaan_bb.harga, tb_persediaan_bb.qty, tb_persediaan_bb.tgl_persediaan, tb_persediaan_bb.tgl_expired, tb_persediaan_bb.keterangan, tb_status_persediaan_bb.id_user FROM tb_persediaan_bb INNER JOIN tb_bahan_baku ON tb_bahan_baku.id_bahanbaku=tb_persediaan_bb.id_bahanbaku INNER JOIN tb_status_persediaan_bb ON tb_status_persediaan_bb.id_persediaan=tb_persediaan_bb.id_persediaan WHERE tb_status_persediaan_bb.id_user='$idUser'")->result_array();
    }


    public function kode_persediaan()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(id_persediaan,3)) AS kd_max FROM tb_persediaan_bb");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd  = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "PBB" . date('y') . "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $a = "PBB" . date('y') . $kd;
        return $a;
    }
}
