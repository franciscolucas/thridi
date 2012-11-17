<?php

class Clipping_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_adminclippings($busca = array()){
        $this->db->select('*');
        $this->db->from('clipping');
        if(isset($busca['clipping']) && $busca['clipping'] != ''){
            $this->db->like('referencia',$busca['clipping']);
        }
        $this->db->where('ativo', 1);
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
	
    
    function num_adminclippings($busca = array()){
        $this->db->select('*');
        $this->db->from('clipping');
        if(isset($busca['clipping']) && $busca['clipping'] != ''){
            $this->db->like('referencia',$busca['clipping']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }
    
    function get_adminclipping($id){
        $this->db->select('*');
        $this->db->from('clipping');
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_all_clippings(){
        $this->db->select('*');
        $this->db->from('clipping');
        $this->db->where('ativo', true);
		$this->db->order_by('id');
		return $this->db->get()->result();
    }
	
    function insert_adminclipping($data){
        $this->db->insert('clipping',$data);
        return $this->db->affected_rows();
    }
	
    function insert_adminclippingimagem($data){
        $this->db->insert('imagem',$data);
        return $this->db->affected_rows();
    }
	
    function get_all_imagem(){
        $this->db->select('*');
        $this->db->from('imagem');
		return $this->db->get()->result();
    }
    
    function delete_adminclipping($id){
        $this->db->where('id', $id);
        $data->Ativo = false;
        $this->db->update('clipping',$data);
    }
	
	function delete_adminclippingimagem($id){
        $this->db->where('id', $id);
        $this->db->update('imagem',$data);
    }
    
    function update_adminclipping($data,$where){
        $this->db->where('id', $where);
        $this->db->update('clipping', $data);
        return $this->db->affected_rows();
    }
    
	
}