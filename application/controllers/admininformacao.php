<?php

class Admininformacao extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
    function __construct() {
        parent::__construct();
		if($this->session->userdata('logged') != 'tche') redirect('admin/login');
		$this->model = 'informacao_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - informacao';
		$this->load->model($this->model);
		$this->load->helper('url');

    }
 
    function index() {	

        $data->admininformacaos = $this->{$this->model}->get_admininformacaos();
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
		$arquivo = uploadImagem('uploads/informacao', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admininformacao($data);
		redirect($this->class);
    }
	
	    function cadastrarimagem() {
		$this->load->view($this->class.'/cadastro');
		$arquivo = uploadImagem('uploads/adminblog', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admininformacaoimagem($data);
		redirect($this->class);
    }
	
	function editar($id=false) {
        $data->admininformacao = $this->{$this->model}->get_admininformacao($id);
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/edita', $data);
    }

    function atualizar() {
            $id = $this->input->post('id');
            $where = $id;
			$data->ativo = true;
			$arquivo = uploadImagem('uploads/informacao', 'logo');
			$data->imagem = $arquivo;
            $return = $this->{$this->model}->update_admininformacao($data, $where);
            redirect($this->class);
        }

	function excluir_informacao($id=false) {
        $this->{$this->model}->delete_admininformacao($id);
        redirect($this->class);
    }
	
    function excluir_imagem($id=false) {
        $this->{$this->model}->delete_admininformacaoimagem($id);
        redirect($this->class);
    }
	

}