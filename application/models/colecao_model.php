<?php

class Colecao_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_admincolecaos($busca = array()){
        $this->db->select('*');
        $this->db->from('colecao');
        if(isset($busca['colecao']) && $busca['colecao'] != ''){
            $this->db->like('referencia',$busca['colecao']);
        }
        $this->db->where('ativo', 1);
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
	
    
    function num_admincolecaos($busca = array()){
        $this->db->select('*');
        $this->db->from('colecao');
        if(isset($busca['colecao']) && $busca['colecao'] != ''){
            $this->db->like('referencia',$busca['colecao']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }
    
    function get_admincolecao($id){
        $this->db->select('*');
        $this->db->from('colecao');
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_all_colecaos($id){
        $this->db->select('*');
        $this->db->from('colecao');
        $this->db->where('ativo', true);
		$this->db->order_by('id');
		return $this->db->get()->result();
    }
	
    function insert_admincolecao($data){
        $this->db->insert('colecao',$data);
        return $this->db->affected_rows();
    }
	
    function insert_admincolecaoimagem($data){
        $this->db->insert('imagem',$data);
        return $this->db->affected_rows();
    }
	
    function get_all_imagem(){
        $this->db->select('*');
        $this->db->from('imagem');
		return $this->db->get()->result();
    }
    
    function delete_admincolecao($id){
        $this->db->where('id', $id);
        $data->Ativo = false;
        $this->db->update('colecao',$data);
    }
	
	function delete_admincolecaoimagem($id){
        $this->db->where('id', $id);
        $this->db->update('imagem',$data);
    }
    
    function update_admincolecao($data,$where){
        $this->db->where('id', $where);
        $this->db->update('colecao', $data);
        return $this->db->affected_rows();
    }
    
	
}