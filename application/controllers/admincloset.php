<?php

class Admincloset extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
    function __construct() {
        parent::__construct();
		if($this->session->userdata('logged') != 'tche') redirect('admin/login');
		$this->model = 'closet_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - closet';
		$this->load->model($this->model);
		$this->load->helper('url');

    }
 
    function index() {	

        $data->adminclosets = $this->{$this->model}->get_adminclosets();
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
		$arquivo = uploadImagem('uploads/closet', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_admincloset($data);
		redirect($this->class.'/cadastro');
    }
	
	    function cadastrarimagem() {
		$this->load->view($this->class.'/cadastro');
		$arquivo = uploadImagem('uploads/adminblog', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_adminclosetimagem($data);
		redirect($this->class);
    }
	
	function editar($id=false) {
        $data->admincloset = $this->{$this->model}->get_admincloset($id);
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/edita', $data);
    }

    function atualizar() {
            $id = $this->input->post('id');
            $where = $id;
			$data->ativo = true;
			$arquivo = uploadImagem('uploads/closet', 'logo');
			$data->imagem = $arquivo;
            $return = $this->{$this->model}->update_admincloset($data, $where);
            redirect($this->class);
        }

	function excluir_closet($id=false) {
        $this->{$this->model}->delete_admincloset($id);
        redirect($this->class);
    }
	
    function excluir_imagem($id=false) {
        $this->{$this->model}->delete_adminclosetimagem($id);
        redirect($this->class);
    }
	

}