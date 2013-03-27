<?php


class Informacao extends CI_Controller {
    private $title;
    private $class;
	private $model;
	

    function __construct() {
        parent::__construct();
		$this->model = 'informacao_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Informacao';
		$this->load->model($this->model);

 }

    function index($busca = array()) {
		$data->informacaos = $this->{$this->model}->get_all_informacaos($busca);
		$data->title = $this->title;
		dadosGerais($data);
		//echo json_encode($data);
        $this->load->view($this->class.'/index', $data);
		
    }

	
	
}


	
?>



