
<?php

class Informacao_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_admininformacaos($busca = array()){
        $this->db->select('*');
        $this->db->from('informacao');
        if(isset($busca['informacao']) && $busca['informacao'] != ''){
            $this->db->like('imagem',$busca['informacao']);
        }
        $this->db->where('ativo', 1);
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
	
    
    function num_admincolecaos($busca = array()){
        $this->db->select('*');
        $this->db->from('informacao');
        if(isset($busca['informacao']) && $busca['informacao'] != ''){
            $this->db->like('imagem',$busca['informacao']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }

    function get_admininformacao($id){
        $this->db->select('*');
        $this->db->from('informacao');
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_all_informacaos($id){
        $this->db->select('*');
        $this->db->from('informacao');
        $this->db->where('ativo', true);
		$this->db->order_by('id', 'asc');
		return $this->db->get()->result();
    }
	
    function insert_admininformacao($data){
        $this->db->insert('informacao',$data);
        return $this->db->affected_rows();
    }
	
    function insert_admininformacaoimagem($data){
        $this->db->insert('imagem',$data);
        return $this->db->affected_rows();
    }
	
    function get_all_imagem(){
        $this->db->select('*');
        $this->db->from('imagem');
		return $this->db->get()->result();
    }
    
    function delete_admininformacao($id){
        $this->db->where('id', $id);
        $data->Ativo = false;
        $this->db->update('informacao',$data);
    }
	
	function delete_admininformacaoimagem($id){
        $this->db->where('id', $id);
        $this->db->update('imagem',$data);
    }
    
    function update_admininformacao($data,$where){
        $this->db->where('id', $where);
        $this->db->update('informacao', $data);
        return $this->db->affected_rows();
    }
    
	
}