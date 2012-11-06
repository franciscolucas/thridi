<?php


class Admin_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function check_user($login, $password){
        $this->db->select('password');
        $this->db->where('login', $login);
        $this->db->limit('1');
        $query = $this->db->get('user')->result();
        if($query) return true;
        else return false;
    }  

}
?>