<?php
	/**
	* 
	*/
	class Calendario extends CI_controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(3);
		}

		function index() {
			$header['title'] = 'Calendario de Puntos';
			$this->load->view('/layout/header', $header);
			$this->load->view('/calendario');
			$this->load->view('/layout/footer');
		}

	}
?>