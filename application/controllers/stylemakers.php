<?php

class Stylemakers extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
    function __construct() {
        parent::__construct();
		$this->model = 'onde_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - StyleMakers';
		$this->load->model($this->model);

    }
 
    function index() {	
        $data = new stdClass ();
        $data->adminblogs = $this->{$this->model}->get_all_posts();
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/index', $data);
    }

}

?>