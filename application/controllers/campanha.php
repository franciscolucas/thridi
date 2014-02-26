<?php


class Campanha extends CI_Controller {
    private $title;
    private $class;
	private $model;
	

    function __construct() {
        parent::__construct();
		$this->model = 'campanha_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Campanha';
		$this->load->model($this->model);

 }

    function index($busca = array()) {
    	$data = new stdClass ();
		$data->campanhas = $this->{$this->model}->get_all_campanhas($busca);
		$data->title = $this->title;
		dadosGerais($data);
		//echo json_encode($data);
        $this->load->view($this->class.'/index', $data);
		
    }

	
	
}


	
?>



