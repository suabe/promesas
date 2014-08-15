<?php
	/**
	* 
	*/
	class AgregaPromotor extends CI_Controller
	{
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(5);
		}

		function index() {
				switch ($_SERVER['REQUEST_METHOD']) {
					case 'GET':
						if ($this->session->userdata('perfil') != 5) {
							$message_401 = "<h1>401</h1>No tiene permiso de entrar a la url que intenta acceder.";
							show_error($message_401 , 401 );	
						}
						else {
							$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/Estados');
							$this->curl->post();
							$data['estados'] = json_decode($this->curl->execute());
							$data['title'] = 'Agregar Promotoria';
							$this->load->view('/admin/agregaPromotoria', $data);
						}
						break;

					case 'POST':
						$data = array(
							'usuario' => $this->input->post('usuario'),
							'rsocial' => '',
							'comercio' => $this->input->post('comercio'),
							'nombre' => $this->input->post('nombre'),
							'paterno' => $this->input->post('paterno'),
							'materno' => $this->input->post('materno'),
							'email' => $this->input->post('email'),
							'domicilio' => '',
							'no_int' => '',
							'no_ext' => '',
							'colonia' => '',
							'cp' => '',
							'delegacion' => '',
							'idestado' => 9,
							'telefono1' => $this->input->post('telefono1'),
							'ext1' => $this->input->post('ext1'),
							'telefono2' => $this->input->post('telefono2'),
							'ext2' => $this->input->post('ext2'),
							'atencionDe' => '',
							'atencionA' => '',
							'estatus' => 1,
							'logo' => 'avatar.png',
							'domiciliof' => '',
							'coloniaf' => '',
							'cpf'	=>	'',
							'delegacionf'	=> '',
							'pobalcionf'	=> '',
							'idestadof'	=> 9,
							'puntolealtad' => 0,
							'renovacion'	=> 0,
							'puntosini' => 0,
							'idmoneda' =>1,
							'descuento' => 0,
							'tipovencimiento' => 0,
							'latitud'	=> 0,
							'longitud' => 0,
							'fechaalta' => date('Ymd'),
							'idcomercio' => 0,
							'idejecuto' => $this->session->userdata('idusuario')
							);
						$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/IUPromotora');
						$post = $data;
						$this->curl->post($post);
						$e = json_decode($this->curl->execute());
						if ($e->resultado == 0) {
							$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
							redirect('/agregaPromotor');
						}
						else {
							$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
							redirect('/agregaPromotor');
						}
						break;
					
					default:
						# code...
						break;
				}
			
		}

	}
?>