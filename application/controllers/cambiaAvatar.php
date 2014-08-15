<?php
	/**
	* 
	*/
	class CambiaAvatar extends CI_Controller{
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(1);
		}

		function index() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$header['title'] = 'Administrar Usuarios';
					$this->load->view('/layout/header', $header);
					$this->load->view('/admin/cambiaAvatar');
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					$data = array(
						'usuario' => $this->input->post('usuario'),
						'logo' => $this->input->post('logo')
						);
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ModificaLogoPromotor');
					$post = $data;
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->set_userdata('logo', $this->input->post('logo'));
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/mi_cuenta/cambia_pass');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/cambiaAvatar');
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>