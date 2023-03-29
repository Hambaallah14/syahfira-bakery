<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_Model extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function user_by_iduser($id_user){
        return $this->db->query("select * from tb_user WHERE id_user = '$id_user'")->result_array();
    }

    public function user_by_status_user($id_user){
      return $this->db->query("select status_user from tb_login WHERE id_user = '$id_user'")->result_array();
  }

    public function all_data(){
      return $this->db->query("SELECT * FROM tb_user")->result_array();
    }

    public function jumlah_user(){
      $this->db->select('COUNT(id_user) as jumlah_user');
      $this->db->from('tb_user');
      return $this->db->get()->row()->jumlah_user;
    }

    public function delete($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');

        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_login');
    }

    public function add(){
      $data_user = [
        "id_user"        => $this->input->post('id_user', true),
        "nama"           => $this->input->post('nama', true),
        "no_telp"        => $this->input->post('no_telp', true)
      ];
      $this->db->insert('tb_user', $data_user);

      $data_login = [
          "id_user"       => $this->input->post('id_user', true),
          "password"      => md5($this->input->post('password', true)),
          "status_user"   => "Tidak Aktif"
      ];
      $this->db->insert('tb_login', $data_login);
  }

  public function edit_user(){
    $data_user = [
      "nama"      => $this->input->post('nama', true),
      "no_telp"   => $this->input->post('no_telp', true)
    ];
    $this->db->where("id_user", $this->input->post('id_user',true));
    $this->db->update('tb_user', $data_user);

    $data_login = [
      "status_user"   => $this->input->post('status_user', true)
    ];
    $this->db->where("id_user", $this->input->post('id_user',true));
    $this->db->update('tb_login', $data_login);
  }

  public function edit_password(){
    $data_login = [
      "password"      => md5($this->input->post('new_password', true))
    ];
    $this->db->where("id_user", $this->input->post('id_user',true));
    $this->db->update('tb_login', $data_login);
  }
}