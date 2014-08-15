<?php
	/**
	* 
	*/
	class Promesas extends CI_Controller {
	
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(4);
		}

		function index() {
			$header['title'] = 'Promesas Cumplidas';
			$this->load->view('/layout/header', $header);
			$this->load->view('/promesas');
			$this->load->view('/layout/footer');	
		}

	}
?>