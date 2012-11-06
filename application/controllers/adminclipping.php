<?php

class Adminclipping extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
	
    function __construct() {
        parent::__construct();
		if($this->session->userdata('logged') != 'tche') redirect('admin/login');
		$this->model = 'clipping_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Clipping';
		$this->load->model($this->model);
		$this->load->helper('url');

    }
 
    function index() {	

        $data->adminclippings = $this->{$this->model}->get_adminclippings();
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
		$data->onde = $this->input->post('onde');
		$data->ativo = true;
		$data->quando = $this->input->post('quando');
		$arquivo = uploadImagem('uploads/clipping', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_adminclipping($data);
		redirect($this->class);
    }
	
	    function cadastrarimagem() {
		$this->load->view($this->class.'/cadastro');
		$arquivo = uploadImagem('uploads/adminblog', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_adminclippingimagem($data);
		redirect($this->class);
    }
	
	function editar($id=false) {
        $data->adminclipping = $this->{$this->model}->get_adminclipping($id);
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
			$arquivo = uploadImagem('uploads/clipping', 'logo');
			$data->imagem = $arquivo;
            $return = $this->{$this->model}->update_adminclipping($data, $where);
            redirect($this->class);
        }

	function excluir_clipping($id=false) {
        $this->{$this->model}->delete_adminclipping($id);
        redirect($this->class);
    }
	
    function excluir_imagem($id=false) {
        $this->{$this->model}->delete_adminclippingimagem($id);
        redirect($this->class);
    }
	

}