<?php


class Clipping extends CI_Controller {
    private $title;
    private $class;
	private $model;
	

    function __construct() {
        parent::__construct();
		$this->model = 'clipping_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Clipping';
		$this->load->model($this->model);

 }

    function index($busca = array()) {
		$data->clippings = $this->{$this->model}->get_all_clippings($busca);
		$data->title = $this->title;
		dadosGerais($data);
        $this->load->view($this->class.'/index', $data);
    }
	
	function visualizartudo($busca = array()) {
		$data->clippings = $this->{$this->model}->get_all_clippings($busca);
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/visualizartudo', $data);
    }
}


	
?>
