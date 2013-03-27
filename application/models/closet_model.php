
<?php

class Closet_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_adminclosets($busca = array()){
        $this->db->select('*');
        $this->db->from('closet');
        if(isset($busca['closet']) && $busca['closet'] != ''){
            $this->db->like('imagem',$busca['closet']);
        }
        $this->db->where('ativo', 1);
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
	
    
    function num_admincolecaos($busca = array()){
        $this->db->select('*');
        $this->db->from('closet');
        if(isset($busca['closet']) && $busca['closet'] != ''){
            $this->db->like('imagem',$busca['closet']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }
    
    function get_admincloset($id){
        $this->db->select('*');
        $this->db->from('closet');
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_all_closets($id){
        $this->db->select('*');
        $this->db->from('closet');
        $this->db->where('ativo', true);
		$this->db->order_by('id', 'asc');
		return $this->db->get()->result();
    }
	
    function insert_admincloset($data){
        $this->db->insert('closet',$data);
        return $this->db->affected_rows();
    }
	
    function insert_adminclosetimagem($data){
        $this->db->insert('imagem',$data);
        return $this->db->affected_rows();
    }
	
    function get_all_imagem(){
        $this->db->select('*');
        $this->db->from('imagem');
		return $this->db->get()->result();
    }
    
    function delete_admincloset($id){
        $this->db->where('id', $id);
        $data->Ativo = false;
        $this->db->update('closet',$data);
    }
	
	function delete_adminclosetimagem($id){
        $this->db->where('id', $id);
        $this->db->update('imagem',$data);
    }
    
    function update_admincloset($data,$where){
        $this->db->where('id', $where);
        $this->db->update('closet', $data);
        return $this->db->affected_rows();
    }
    
	
}