<?php
	/**
	* 
	*/
	class EstadoCta extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(3);
		}

		function index() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/EstadoCuenta');
					$post = array('usuario'=> $this->session->userdata('card'));
					$this->curl->post($post);
					$data['estado'] = json_decode($this->curl->execute());
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoPromotores');
					$this->curl->post();
					$data['promotores'] = json_decode($this->curl->execute());
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoSubPromotoria');
					$post = array(
						'usuario' => $this->session->userdata('card')
						);
					$this->curl->post($post);
					$data['Spromotores'] = json_decode($this->curl->execute());
					$data['promotor'] = '';
					$header['title'] = 'Estado de Cuenta';
					$this->load->view('/layout/header', $header);
					$this->load->view('/estado',$data);
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					if ($this->input->post('usuario')) {
						$u = $this->input->post('usuario');
					}
					else {
						$u = $this->session->userdata('card');
					}
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/EstadoCuenta');
					$post = array(
						'usuario'=> $u,
						'del'=> $this->input->post('del'),
						'al'=> $this->input->post('al')
						);
					$this->curl->post($post);
					$data['estado'] = json_decode($this->curl->execute());
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoPromotores');
					$this->curl->post();
					$data['promotores'] = json_decode($this->curl->execute());
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoSubPromotoria');
					$post = array(
						'usuario' => $this->session->userdata('card')
						);
					$this->curl->post($post);
					$data['Spromotores'] = json_decode($this->curl->execute());
					$data['promotor'] = 'Estás consultando: '.$u;
					$header['title'] = 'Estado de Cuenta';
					$this->load->view('/layout/header', $header);
					$this->load->view('/estado',$data);
					$this->load->view('/layout/footer');
					break;
				
				default:
					# code...
					break;
			}
		}
	}
?>