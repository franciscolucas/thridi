<?php


class Colecao extends CI_Controller {
    private $title;
    private $class;
	private $model;
	

    function __construct() {
        parent::__construct();
		$this->model = 'colecao_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Colecao';
		$this->load->model($this->model);

 }

    function index($busca = array()) {
		$data->colecaos = $this->{$this->model}->get_all_colecaos($busca);
		$data->title = $this->title;
		dadosGerais($data);
		//echo json_encode($data);
        $this->load->view($this->class.'/index', $data);
		
    }
	
/*	function visualizartudo($id) {
		$data1->colecaos = $this->{$this->model}->get_all_colecaos($id);
        $data1->title = $this->title;
        dadosGerais($data1);
		$id = $this->input->post('id');
		echo json_encode($data1);
        echo $this->load->view($this->class.'/index', $data1);
    }*/
	
	
}


	
?>



