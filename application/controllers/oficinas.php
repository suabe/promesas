<?php
	/**
	* 
	*/
	class Oficinas extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(2);
		}

		function index() {
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoOficinas');
			$this->curl->post(array('usuario' => $this->session->userdata('card')));
			$data['oficinas'] = json_decode($this->curl->execute());
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoPromotoresST');
			$this->curl->post();
			$data['Spromotores'] = json_decode($this->curl->execute());	
			$header['title'] = 'Administrar Usuarios';
			$this->load->view('/layout/header', $header);
			$this->load->view('/admin/oficinas', $data);
			$this->load->view('/layout/footer');
		}

		

	}
?>