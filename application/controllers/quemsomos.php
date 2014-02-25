<?php

class Quemsomos extends CI_Controller {
    private $title;
    private $class;
	private $model;
	
    function __construct() {
        parent::__construct();
		$this->model = 'blog_model';
		$this->class = $this->router->class;
		//$this->title = 'Thridi - Quem Somos';
		$this->load->model($this->model);

    }
 
    function index() {	
        $data->adminblogs = $this->{$this->model}->get_all_posts();
        //$data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/index', $data);
    }

}
