<?php
	/**
	* 
	*/
	class AgregaDesarrollador extends CI_Controller
	{
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(2);
		}

		function index() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					if ($this->session->userdata('perfil') != 2) {
						$message_401 = "<h1>401</h1>No tiene permiso de entrar a la url que intenta acceder.";
						show_error($message_401 , 401 );	
					}
					else {
						$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoPromotores');
						$this->curl->post();
						$data['promotores'] = json_decode($this->curl->execute());
						$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoOficinas');
						$this->curl->post(array('usuario' => $this->session->userdata('card')));
						$data['oficinas'] = json_decode($this->curl->execute());
						$header['title'] = 'Agregar Promotoria';
						$this->load->view('/layout/header', $header);
						$this->load->view('/admin/agregaDesarrollador', $data);
						$this->load->view('/layout/footer');
					}
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
						'tipo' => 1,//Desarrollador
						'rfc' =>	'sss',
						'no_agente' =>  '12412',
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
						redirect('/agregaDesarrollador');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/agregaDesarrollador');
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>