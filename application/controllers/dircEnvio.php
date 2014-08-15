<?php
	/**
	* 
	*/
	class DircEnvio extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(1);
		}

		function index() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoCambioDireccion');
					$this->curl->post();
					$data['direcciones'] = json_decode($this->curl->execute());
					$header['title'] = 'Administrar Usuarios';
					$this->load->view('/layout/header', $header);
					$this->load->view('/admin/dircEnvio', $data);
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					$data = array(
						'clvDireccion' => $this->input->post('clvDireccion'),
						'idEstatus' => $this->input->post('idEstatus')
						);
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/AutorizaCambioDireccion');
					$post = $data;
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/dircEnvio');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/dircEnvio');
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>