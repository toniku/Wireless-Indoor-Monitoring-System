<?php
class Session_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function get_password($login) {
    $this->db->select('password');
    $this->db->from('UserAccounts');
    $this->db->where('login', $login);
    return $this->db->get()->row('password');
  }
}
