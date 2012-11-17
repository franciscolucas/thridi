<?php


class Adminminha extends CI_Controller {
    private $title;
    private $class;
	private $model;
	

    function __construct() {
        parent::__construct();
		if($this->session->userdata('logged') != 'tche') redirect('admin/login');
		$this->model = 'adminminha_model';
		$this->class = $this->router->class;
		$this->title = 'Thridi - Minha Thridi';
		$this->load->model($this->model);

    }

    function index($limit=1000, $offset=false) {	
		if ($_POST) {
		if (isset($_POST['limit'])) {
			$limit = $_POST['limit'];
			redirect($this->class.'/index/' . $limit . '/0/');
		} else {
			$busca = $_POST;
			redirect($this->class.'/index/' . $limit . '/0/' . arrayToUrlSearch($_POST));
		}
        }
        $busca = $this->uri->uri_to_assoc(5);
        $config['base_url'] = base_url() . $this->class.'/index/' . $limit . '/';
        $config['uri_segment'] = 4;
        $config['total_rows'] = $this->{$this->model}->num_adminminhas($busca);
        $config['per_page'] = $limit;
        $config['next_link'] = 'Próximo';
        $config['prev_link'] = 'Anterior';
        $config['last_link'] = 'Último';
        $config['first_link'] = 'Primeiro';
        $config['url_complement'] = arrayToUrlSearch($busca);

        $this->pagination->initialize($config);


        $data->adminminhas = $this->{$this->model}->get_adminminhas($busca, $offset, $limit);
        $data->paginacao = $this->pagination->create_links();
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/index', $data);
    }


	
		 function visualizar($id=false) {
		$data->contato = $this->{$this->model}->contato($id);
        if (!$data->contato) {
            show_404();
        }

        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/visualizar', $data);

    }
	
	function visualizartudo($busca = array()) {
		$data->empresas = $this->{$this->model}->get_allimage($busca);
        $data->title = $this->title;
        dadosGerais($data);
        $this->load->view($this->class.'/visualizartudo', $data);
    }
	
	function excluir_contato($id=false) {
        $this->{$this->model}->delete_adminminha($id);
        redirect($this->class);
    }
	
}
	
   
	
	
?>



