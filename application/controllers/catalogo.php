<?php


class Catalogo extends CI_Controller {
    private $title;
    private $class;
	private $model;
	

    function __construct() {
        parent::__construct();
		$this->model = 'catalogo_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Catalogo';
		$this->load->model($this->model);

 }

    function index($busca = array()) {
    	$data = new stdClass ();
		$data->catalogos = $this->{$this->model}->get_all_catalogos($busca);
		$data->title = $this->title;
		dadosGerais($data);
		//echo json_encode($data);
        $this->load->view($this->class.'/index', $data);
		
    }

	
	
}


	
?>



