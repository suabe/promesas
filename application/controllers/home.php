<?php
	/**
	* 
	*/
	class Home extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->logeado();
		}

		function index() {
			if ($this->session->userdata('perfil') == 5) {
				redirect('/admin_promo');
			}
			elseif ($this->session->userdata('perfil') == 6) {
				redirect('/agente');
			}
			else {
				$header['title'] = 'Home';
				$this->load->view('/layout/header', $header);
				$this->load->view('/home');
				$this->load->view('/layout/footer');
			}
		}

	}
?>