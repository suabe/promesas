<?php
	/**
	* 
	*/
	class Agente extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(6);
		}

		function index() {
			if ($this->session->userdata('perfil') != 6) {
				$message_401 = "<h1>401</h1>No tiene permiso de entrar a la url que intenta acceder.";
				show_error($message_401 , 401 );	
			}
			else {
				$header['title'] = 'Catálogo';
				$this->load->view('/layout/header', $header);
				$this->load->view('/catalogoEspecial/index');
				$this->load->view('/layout/footer');
			}
		}

	}
?>