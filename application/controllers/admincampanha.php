<?php

class Admincampanha extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
    function __construct() {
        parent::__construct();
		if($this->session->userdata('logged') != 'tche') redirect('admin/login');
		$this->model = 'campanha_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Campanha';
		$this->load->model($this->model);
		$this->load->helper('url');

    }
 
    function index() {	

        $data->admincampanhas = $this->{$this->model}->get_admincampanhas();
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
		$arquivo = uploadImagem('uploads/campanha', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admincampanha($data);
		redirect($this->class.'/cadastro');
    }
	
	    function cadastrarimagem() {
		$this->load->view($this->class.'/cadastro');
		$arquivo = uploadImagem('uploads/adminblog', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admincampanhaimagem($data);
		redirect($this->class);
    }
	
	function editar($id=false) {
        $data->admincampanha = $this->{$this->model}->get_admincampanha($id);
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/edita', $data);
    }

    function atualizar() {
            $id = $this->input->post('id');
            $where = $id;
			$data->ativo = true;
			$arquivo = uploadImagem('uploads/campanha', 'logo');
			$data->imagem = $arquivo;
            $return = $this->{$this->model}->update_admincampanha($data, $where);
            redirect($this->class);
        }

	function excluir_campanha($id=false) {
        $this->{$this->model}->delete_admincampanha($id);
        redirect($this->class);
    }
	
    function excluir_imagem($id=false) {
        $this->{$this->model}->delete_admincampanhaimagem($id);
        redirect($this->class);
    }
	

}