<?php
	/**
	* 
	*/
	class Aviso extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(4);
		}

		function index() {
			$header['title'] = 'Términos y Condiciones';
			$this->load->view('/layout/header', $header);
			$this->load->view('/aviso');
			$this->load->view('/layout/footer');
		}

	}
?>