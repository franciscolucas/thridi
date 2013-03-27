
<?php

class Catalogo_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_admincatalogos($busca = array()){
        $this->db->select('*');
        $this->db->from('catalogo');
        if(isset($busca['catalogo']) && $busca['catalogo'] != ''){
            $this->db->like('imagem',$busca['catalogo']);
        }
        $this->db->where('ativo', 1);
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
	
    
    function num_admincolecaos($busca = array()){
        $this->db->select('*');
        $this->db->from('catalogo');
        if(isset($busca['catalogo']) && $busca['catalogo'] != ''){
            $this->db->like('imagem',$busca['catalogo']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }
    
    function get_admincatalogo($id){
        $this->db->select('*');
        $this->db->from('catalogo');
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_all_catalogos($id){
        $this->db->select('*');
        $this->db->from('catalogo');
        $this->db->where('ativo', true);
		$this->db->order_by('id', 'asc');
		return $this->db->get()->result();
    }
	
    function insert_admincatalogo($data){
        $this->db->insert('catalogo',$data);
        return $this->db->affected_rows();
    }
	
    function insert_admincatalogoimagem($data){
        $this->db->insert('imagem',$data);
        return $this->db->affected_rows();
    }
	
    function get_all_imagem(){
        $this->db->select('*');
        $this->db->from('imagem');
		return $this->db->get()->result();
    }
    
    function delete_admincatalogo($id){
        $this->db->where('id', $id);
        $data->Ativo = false;
        $this->db->update('catalogo',$data);
    }
	
	function delete_admincatalogoimagem($id){
        $this->db->where('id', $id);
        $this->db->update('imagem',$data);
    }
    
    function update_admincatalogo($data,$where){
        $this->db->where('id', $where);
        $this->db->update('catalogo', $data);
        return $this->db->affected_rows();
    }
    
	
}