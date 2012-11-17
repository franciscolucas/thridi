<?php


class Minhathridi extends CI_Controller {
    private $title;
    private $class;
	private $model;

	
    function __construct() {
        parent::__construct();
		$this->model = 'adminminha_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Minha Thridi';
		$this->load->model($this->model);

 }

    function index() {
		$data->title = $this->title;
        $this->load->view($this->class.'/index', $data);
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
    }
	

	 function cadastro() {
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/index', $data);
    }

    function cadastrar() {
		$this->load->view($this->class.'/index');
		$data->nome = $this->input->post('nome');
		$data->ativo = true;
		$data->email = $this->input->post('email');
		$arquivo = uploadImagem('uploads/minhathridi', 'arquivo');
		$data->imagem = $arquivo;
		$data->comentario = $this->input->post('comentario');
		$return = $this->{$this->model}->insert_adminminha($data);
		redirect($this->class);

	}
	

}


	
?>

