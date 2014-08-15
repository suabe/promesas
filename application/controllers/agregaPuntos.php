<?php
	/**
	* 
	*/
	class AgregaPuntos extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(2);
		}

		function index() {
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoSubPromotoria');
			$post = array(
				'usuario' => $this->session->userdata('card')
				);
			$this->curl->post($post);
			$data['promotores'] = json_decode($this->curl->execute());
			$header['title'] = 'Agregar Promotoria';
			$this->load->view('/layout/header', $header);
			$this->load->view('/admin/agregaPuntos', $data);
			$this->load->view('/layout/footer');
		}
	}
?>