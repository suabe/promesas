<?php
	/**
	* 
	*/
	class AgregaAsesor extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(2);
		}

		function index() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoPromotores');
					$this->curl->post();
					$data['promotores'] = json_decode($this->curl->execute());
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoOficinas');
					$this->curl->post(array('usuario' => $this->session->userdata('card')));
					$data['oficinas'] = json_decode($this->curl->execute());
					$header['title'] = 'Agregar Promotoria';
					$this->load->view('/layout/header', $header);
					$this->load->view('/admin/agregaAsesor', $data);
					$this->load->view('/layout/footer');
					break;

				case 'POST':
				if ($this->input->post('clavePromotor')) {
						$u = $this->input->post('clavePromotor');
					}
					else {
						$u = $this->session->userdata('card');
					}
				$data = array(
						'usuario' => $this->input->post('usuario'),
						'rsocial' => $this->input->post('rsocial'),
						'sucursal' => $this->input->post('comercio'),
						'nombre' => $this->input->post('nombre'),
						'paterno' => $this->input->post('paterno'),
						'materno' => $this->input->post('materno'),
						'email' => $this->input->post('email'),
						'telefono1' => $this->input->post('telefono1'),
						'ext1' => $this->input->post('ext1'),
						'telefono2' => $this->input->post('telefono2'),
						'ext2' => $this->input->post('ext2'),
						'idestatus' => 1,
						'clvOficina' => $this->input->post('oficina'),
						'clavePromotor' => $u,
						'tipo' => 2,//Agente
						'rfc' =>	$this->input->post('rfc'),
						'no_agente' =>  $this->input->post('nAgente'),
						'idsucursal' => 0,
						'idcomercio' => 0,
						'nsucursal' => 0,
						'domicilio' => 'dd',
						'colonia'	=> 'dd',
						'cp'	=> 'dd',
						'delegacion' => 'dd',
						'poblacion' => 'dd',
						'idestado' => 9,
						'idmoneda' => 1,
						'idejecuto' => $this->session->userdata('idusuario')
						);
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/IUSPromotoroa');
					$post = $data;
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/agregaAsesor');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/agregaAsesor');
					}
					break;
				
				default:
					# code...
					break;
			}
		}
	}
?>