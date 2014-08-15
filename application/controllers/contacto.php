<?php
	/**
	* 
	*/
	class Contacto extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(4);
		}

		function index() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$header['title'] = 'Contacto';
					$this->load->view('/layout/header', $header);
					$this->load->view('/contacto');
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/Contacto');
					$post = array(
						'nombre'=> $this->input->post('nombre'),
						'email'=> $this->input->post('email'),
						'asunto'=> $this->input->post('asunto'),
						'mensaje'=> $this->input->post('mensaje')
						);
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/contacto');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/contacto');
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>