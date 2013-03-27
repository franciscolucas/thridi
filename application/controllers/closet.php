<?php


class Closet extends CI_Controller {
    private $title;
    private $class;
	private $model;
	

    function __construct() {
        parent::__construct();
		$this->model = 'closet_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Closet';
		$this->load->model($this->model);

 }

    function index($busca = array()) {
		$data->closets = $this->{$this->model}->get_all_closets($busca);
		$data->title = $this->title;
		dadosGerais($data);
		//echo json_encode($data);
        $this->load->view($this->class.'/index', $data);
		
    }

	
	
}


	
?>


