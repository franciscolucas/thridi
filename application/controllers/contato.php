<?php


class Contato extends CI_Controller {
    private $title;
    private $class;
	private $model;

	
    function __construct() {
        parent::__construct();
		$this->model = 'admincontato_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Contato';
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
		$data->assunto = $this->input->post('assunto');
		$data->mensagem = $this->input->post('mensagem');
		$return = $this->{$this->model}->insert_admincontato($data);
		email_interacao($data->nome, $data->email, $data->assunto, $data->mensagem);
		redirect($this->class);

	}
	

}


	
?>

