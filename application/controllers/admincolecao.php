<?php

class Admincolecao extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
	
    function __construct() {
        parent::__construct();
		if($this->session->userdata('logged') != 'tche') redirect('admin/login');
		$this->model = 'colecao_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Colecaoo';
		$this->load->model($this->model);
		$this->load->helper('url');

    }
 
    function index() {	

        $data->admincolecaos = $this->{$this->model}->get_admincolecaos();
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
		$data->referencia = $this->input->post('referencia');
		$data->ativo = true;
		$data->descricao = $this->input->post('descricao');
		$data->material = $this->input->post('material');
		$data->cor = $this->input->post('cor');
		$arquivo = uploadImagem('uploads/colecao', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admincolecao($data);
		redirect($this->class);
    }
	
	    function cadastrarimagem() {
		$this->load->view($this->class.'/cadastro');
		$arquivo = uploadImagem('uploads/adminblog', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admincolecaoimagem($data);
		redirect($this->class);
    }
	
	function editar($id=false) {
        $data->admincolecao = $this->{$this->model}->get_admincolecao($id);
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/edita', $data);
    }

    function atualizar() {
            $id = $this->input->post('id');
            $where = $id;
            $data->referencia = $this->input->post('referencia');
			$data->ativo = true;
			$data->descricao = $this->input->post('descricao');
			$data->material = $this->input->post('material');
			$data->cor = $this->input->post('cor');
			$arquivo = uploadImagem('uploads/colecao', 'logo');
			$data->imagem = $arquivo;
            $return = $this->{$this->model}->update_admincolecao($data, $where);
            redirect($this->class);
        }

	function excluir_colecao($id=false) {
        $this->{$this->model}->delete_admincolecao($id);
        redirect($this->class);
    }
	
    function excluir_imagem($id=false) {
        $this->{$this->model}->delete_admincolecaoimagem($id);
        redirect($this->class);
    }
	

}