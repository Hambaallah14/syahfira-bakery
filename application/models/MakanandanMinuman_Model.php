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
        return $this->db->query("SELECT tb_bahan_baku.id_bahanbaku, tb_bahan_baku.qrcode, tb_bahan_baku.bahanbaku, tb_bahan_baku.harga, tb_bahan_baku.id_satuan, tb_satuan.satuan FROM tb_bahan_baku INNER JOIN tb_satuan ON tb_bahan_baku.id_satuan=tb_satuan.id WHERE tb_bahan_baku.id_bahanbaku='$id'")->result_array();
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
        unlink('./assets/img/qrcode/barang/'.$id_bahanbaku.'.png');
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
}
