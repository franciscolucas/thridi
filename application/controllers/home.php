<?php


class Home extends CI_Controller {
    private $title;
    private $class;

    function __construct() {
        parent::__construct();
		$this->class = $this->router->class;
		$this->title = 'Thridi';

 }

    function index() {
        $data = new stdClass ();
		$data->title = $this->title;
        $this->load->view($this->class.'/index', $data);
    }
}
	
?>