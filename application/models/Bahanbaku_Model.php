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
}
