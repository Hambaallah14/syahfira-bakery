<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_Model extends CI_Model{
	
	private $table = "tb_login";
    private $pk    = "id_login";

    public function __construct() {
        parent::__construct();
    }

	public function get_by_cookie($cookie){
		$this->db->where('cookie', $cookie);
		return $this->db->get($this->table);
	}

	public function login($id_user, $password){
		$this->db->where('id_user', $id_user);
        $this->db->where('password', md5($password));
        return $this->db->get($this->table);
	}
	

	public function update($update_key, $no){
		$this->db->where($this->pk, $no);
        $this->db->update($this->table, $update_key);
	}
}
?>