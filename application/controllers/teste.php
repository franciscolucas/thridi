<?php


class Teste extends CI_Controller {
    private $title;
    private $class;

    function __construct() {
        parent::__construct();
    $this->class = $this->router->class;
    $this->title = 'Teste';

 }

    function index() {
    $data->title = $this->title;
        $this->load->view($this->class.'/index', $data);
    }

    function op() {
    $data->title = $this->title;
        $this->load->view($this->class.'/op', $data);
    }

    function pc() {
    $data->title = $this->title;
        $this->load->view($this->class.'/pc', $data);
    }

}
  
?>