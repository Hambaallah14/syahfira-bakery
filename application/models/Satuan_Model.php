<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Satuan_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function all()
    {
        return $this->db->get('tb_satuan')->result_array();
    }
}
