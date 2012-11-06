<?php

class Admin extends CI_Controller {
    private $title;
    private $class;

    function __construct() {
        parent::__construct();

		$this->class = $this->router->class;
		$this->title = 'Home - Thridi';
    }

    function index() {
        // verifica se está logado
        if($this->session->userdata('logged') != 'tche') redirect('admin/login');

        $this->load->view($this->class.'/home');
    }

    function login(){

        if($login = $this->input->post()){
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $this->load->model('admin_model');

            if($this->admin_model->check_user($login, $password) == true){
                $this -> session -> set_userdata('logged', 'tche');
                redirect($this->class);
            }        
        }
        $this -> load -> view($this->class.'/login');
    }

    function logout(){
        $this->session->set_userdata('logged', 'false');
        redirect($this->class);
    }
}
