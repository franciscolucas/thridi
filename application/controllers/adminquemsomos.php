<?php

class Adminquemsomos extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
	
    function __construct() {
        parent::__construct();
		if($this->session->userdata('logged') != 'tche') redirect('admin/login');
		$this->model = 'blog_model';
		$this->class = $this->router->class;
		$this->title = 'Quem Somos';
		$this->load->model($this->model);
		$this->load->helper('url');

    }
 
    function index() {	

        $data->adminblogs = $this->{$this->model}->get_adminblogs();
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
		$data->entry_name = $this->input->post('entry_name');
		$data->ativo = true;
		$data->entry_body = $this->input->post('entry_body');
		$data->entry_date = date('Y-m-d H:i:s');
		$arquivo = uploadImagem('uploads/adminblog', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_adminblog($data);
		redirect($this->class);
    }
	
	    function cadastrarimagem() {
		$this->load->view($this->class.'/cadastro');
		$arquivo = uploadImagem('uploads/adminblog', 'logo');
		$data->imagem = $arquivo;
		$return = $this->{$this->model}->insert_adminblogimagem($data);
		redirect($this->class);
    }
	
	function editar($id=false) {
        $data->adminblog = $this->{$this->model}->get_adminblog($id);
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/edita', $data);
    }

    function atualizar() {
        $id = $this->input->post('entry_id');
            $where = $id;
            $data->entry_name = $this->input->post('entry_name');
            $data->ativo = true;
            $data->entry_body = $this->input->post('entry_body');
            $data->entry_date = $this->input->post('entry_date');
            $return = $this->{$this->model}->update_adminblog($data, $where);
            redirect($this->class);
        }

	function excluir_post($id=false) {
        $this->{$this->model}->delete_adminblog($id);
        redirect($this->class);
    }
	
    function excluir_imagem($id=false) {
        $this->{$this->model}->delete_adminblogimagem($id);
        redirect($this->class);
    }
	

}