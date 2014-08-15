<?php
	/**
	* 
	*/
	class Reportes extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(1);
		}

		function index() {
			$header['title'] = 'Home';
			$this->load->view('/layout/header', $header);
			$this->load->view('/admin/reportes');
			$this->load->view('/layout/footer');
		}

		function tipo() {
			$data['datos'] = $this->input->post();
			$header['title'] = 'Home';
			$this->load->view('/layout/header', $header);
			$this->load->view('/admin/reportesTipo', $data);
			$this->load->view('/layout/footer');
		}

	}
?>