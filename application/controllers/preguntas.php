<?php
	/**
	* 
	*/
	class Preguntas extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(4);
		}

		function index() {
			$header['title'] = 'Preguntas Frecuentes';
			$this->load->view('/layout/header', $header);
			$this->load->view('/preguntas');
			$this->load->view('/layout/footer');
		}

	}
?>