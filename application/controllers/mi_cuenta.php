<?php
	/**
	* 
	*/
	class Mi_cuenta extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->logeado();
		}

		function index() {
			$header['title'] = 'Cambiar Cpntraseña';
			$this->load->view('/layout/header', $header);
			$this->load->view('/perfil');
			$this->load->view('/layout/footer');
		}

		function cambia_pass() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$header['title'] = 'Cambiar Cpntraseña';
					$this->load->view('/layout/header', $header);
					$this->load->view('/cambia_pass');
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/CambioPassword');
					$post = array(
						'usuario'=> $this->session->userdata('card'),
						'passwordAnterior'=> $this->input->post('passActual'),
						'passwordNuevo'=> $this->input->post('passNuevo2')
						);
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->sess_destroy();
						redirect('/');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/mi_cuenta/cambia_pass');
					}
					break;
				
				default:
					# code...
					break;
			}
		}
		
		function compras() {
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/Calendario');
			$post = array(
				'usuario'=> $this->session->userdata('card')
				);
			$this->curl->post($post);
			$e = json_decode($this->curl->execute());
			echo $e->valor->calendario;
		}

	}
?>