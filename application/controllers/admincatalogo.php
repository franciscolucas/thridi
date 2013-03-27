<?php

class Admincatalogo extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
    function __construct() {
        parent::__construct();
		if($this->session->userdata('logged') != 'tche') redirect('admin/login');
		$this->model = 'catalogo_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - catalogo';
		$this->load->model($this->model);
		$this->load->helper('url');

    }
 
    function index() {	

        $data->admincatalogos = $this->{$this->model}->get_admincatalogos();
        $data->title = $this->title;
        dadosGerais($data);
		$data->allimagem = $this->{$this->model}->get_all_imagem();
        $this->load->view($this->class.'/index', $data);
    }
		


  	 function cadastro() {
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/cadastro', $data);
    }

    function cadastrar() {
		$this->load->view($this->class.'/cadastro');
		$data->ativo = true;
		$arquivo = uploadImagem('uploads/catalogo', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admincatalogo($data);
		redirect($this->class.'/cadastro');
    }
	
	    function cadastrarimagem() {
		$this->load->view($this->class.'/cadastro');
		$arquivo = uploadImagem('uploads/adminblog', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admincatalogoimagem($data);
		redirect($this->class);
    }
	
	function editar($id=false) {
        $data->admincatalogo = $this->{$this->model}->get_admincatalogo($id);
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/edita', $data);
    }

    function atualizar() {
            $id = $this->input->post('id');
            $where = $id;
			$data->ativo = true;
			$arquivo = uploadImagem('uploads/catalogo', 'logo');
			$data->imagem = $arquivo;
            $return = $this->{$this->model}->update_admincatalogo($data, $where);
            redirect($this->class);
        }

	function excluir_catalogo($id=false) {
        $this->{$this->model}->delete_admincatalogo($id);
        redirect($this->class);
    }
	
    function excluir_imagem($id=false) {
        $this->{$this->model}->delete_admincatalogoimagem($id);
        redirect($this->class);
    }
	

}