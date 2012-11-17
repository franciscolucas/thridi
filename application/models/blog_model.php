<?php

class Blog_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_adminblogs($busca = array()){
        $this->db->select('*');
        $this->db->from('entry');
        if(isset($busca['entry']) && $busca['entry'] != ''){
            $this->db->like('entry_name',$busca['entry']);
        }
        $this->db->where('ativo', 1);
        $this->db->order_by('entry_id');
        return $this->db->get()->result();
    }
	
    
    function num_adminblogs($busca = array()){
        $this->db->select('*');
        $this->db->from('entry');
        if(isset($busca['entry']) && $busca['entry'] != ''){
            $this->db->like('entry_name',$busca['entry']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }
    
    function get_adminblog($id){
        $this->db->select('*');
        $this->db->from('entry');
        $this->db->where('entry_id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_all_posts(){
        $this->db->select('*');
        $this->db->from('entry');
        $this->db->where('ativo', true);
		$this->db->order_by('entry_id', 'desc');
		return $this->db->get()->result();
    }
	
    function insert_adminblog($data){
        $this->db->insert('entry',$data);
        return $this->db->affected_rows();
    }
	
    function insert_adminblogimagem($data){
        $this->db->insert('imagem',$data);
        return $this->db->affected_rows();
    }
	
    function get_all_imagem(){
        $this->db->select('*');
        $this->db->from('imagem');
		return $this->db->get()->result();
    }
    
    function delete_adminblog($id){
        $this->db->where('entry_id', $id);
        $data->Ativo = false;
        $this->db->update('entry',$data);
    }
	
	function delete_adminblogimagem($id){
        $this->db->where('id', $id);
        $this->db->update('imagem',$data);
    }
    
    function update_adminblog($data,$where){
        $this->db->where('entry_id', $where);
        $this->db->update('entry', $data);
        return $this->db->affected_rows();
    }
    
    
    function get_by_name($nome){
        $this->db->select('*');
        $this->db->from('entry');
        $this->db->where('entry_name', $nome);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
}