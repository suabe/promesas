<?php
	/**
	* 
	*/
	class Mi_cuenta extends CI_Controller {
		
		function __construct() {
			parent::__construct();
		}

		function index() {
			$header['title'] = 'Estado de Cuenta';
			$this->load->view('/layout/header', $header);
			$this->load->view('/estado');
			$this->load->view('/layout/footer');
		}

	}
?>