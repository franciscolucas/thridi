<?php

class Adminminha_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_adminminhas($busca = array(),$offset=false,$limit=10){
        if(!$offset){
            $offset=0;
        }
        $this->db->select('*');
        $this->db->from('minha');
        if(isset($busca['minha']) && $busca['minha'] != ''){
            $this->db->like('nome',$busca['minha']);
        }
        $this->db->where('ativo', 1);
        $this->db->limit($limit,$offset);
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
    
    function num_adminminhas($busca = array()){
        $this->db->select('*');
        $this->db->from('minha');
        if(isset($busca['minha']) && $busca['minha'] != ''){
            $this->db->like('nome',$busca['minha']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }
    
    function get_adminminha($id){
        $this->db->select('*');
        $this->db->from('minha');
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_allimage($busca = array()){
        $this->db->select('*');
        $this->db->from('minha');
        $this->db->where('ativo', true);
		return $this->db->get()->result();
    }
	
    function insert_adminminha($data){
        $this->db->insert('minha',$data);
        return $this->db->affected_rows();
    }
    
    function delete_adminminha($id){
        $this->db->where('id', $id);
        $data->Ativo = false;
        $this->db->update('minha',$data);
    }
    
    function update_adminminha($data,$where){
        $this->db->where('id', $where);
        $this->db->update('minha', $data);
        return $this->db->affected_rows();
    }
    
    
	

}