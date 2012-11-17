
<?php

class Campanha_model extends CI_Model{

    function __construct() {
        parent::__construct();

    }
    
    function get_admincampanhas($busca = array()){
        $this->db->select('*');
        $this->db->from('campanha');
        if(isset($busca['campanha']) && $busca['campanha'] != ''){
            $this->db->like('imagem',$busca['campanha']);
        }
        $this->db->where('ativo', 1);
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
	
    
    function num_admincolecaos($busca = array()){
        $this->db->select('*');
        $this->db->from('campanha');
        if(isset($busca['campanha']) && $busca['campanha'] != ''){
            $this->db->like('imagem',$busca['campanha']);
        }
        $this->db->where('ativo', 1);
        return $this->db->get()->num_rows();
    }
    
    function get_admincampanha($id){
        $this->db->select('*');
        $this->db->from('campanha');
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
        return $this->db->get()->row();
    }
	
	function get_all_campanhas($id){
        $this->db->select('*');
        $this->db->from('campanha');
        $this->db->where('ativo', true);
		$this->db->order_by('id');
		return $this->db->get()->result();
    }
	
    function insert_admincampanha($data){
        $this->db->insert('campanha',$data);
        return $this->db->affected_rows();
    }
	
    function insert_admincampanhaimagem($data){
        $this->db->insert('imagem',$data);
        return $this->db->affected_rows();
    }
	
    function get_all_imagem(){
        $this->db->select('*');
        $this->db->from('imagem');
		return $this->db->get()->result();
    }
    
    function delete_admincampanha($id){
        $this->db->where('id', $id);
        $data->Ativo = false;
        $this->db->update('campanha',$data);
    }
	
	function delete_admincampanhaimagem($id){
        $this->db->where('id', $id);
        $this->db->update('imagem',$data);
    }
    
    function update_admincampanha($data,$where){
        $this->db->where('id', $where);
        $this->db->update('campanha', $data);
        return $this->db->affected_rows();
    }
    
	
}