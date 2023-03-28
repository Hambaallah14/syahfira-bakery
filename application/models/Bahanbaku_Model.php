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
}
