<?php
	/**
	* 
	*/
	class Pruebas extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(2);
		}

		function index() {
			echo "string";
		}
	}
?>