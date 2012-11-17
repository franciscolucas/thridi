<?php

class Admincontato_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_admincontatos($busca = array(),$offset=false,$limit=10){
        if(!$offset){
            $offset=0;
        }
        $this->db->select('*');
        $this->db->from('contato');
        if(isset($busca['contato']) && $busca['contato'] != ''){
            $this->db->like('nome',$busca['contato']);
        }
        $this->db->where('ativo', 1);
        $this->db->limit($limit,$offset);
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
    
    function num_admincontatos($busca = array()){
        $this->db->select('*');
        $this->db->from('contato');
        if(isset($busca['contato']) && $busca['contato'] != ''){
            $this->db->like('nome',$busca['contato']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }
    
    function get_adminportofolio($id){
        $this->db->select('*');
        $this->db->from('contato');
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_allimage($busca = array()){
        $this->db->select('*');
        $this->db->from('contato');
        $this->db->where('ativo', true);
		return $this->db->get()->result();
    }
	
    function insert_admincontato($data){
        $this->db->insert('contato',$data);
        return $this->db->affected_rows();
    }
    
    function delete_admincontato($id){
        $this->db->where('id', $id);
        $data->Ativo = false;
        $this->db->update('contato',$data);
    }
    
    function update_admincontato($data,$where){
        $this->db->where('id', $where);
        $this->db->update('contato', $data);
        return $this->db->affected_rows();
    }
    
    
    function get_by_local($local){
        $this->db->select('*');
        $this->db->from('contato');
        $this->db->where('nome', $nome);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	

}