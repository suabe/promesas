<?php
	/**
	* 
	*/
	class ListaGerentes extends CI_Controller {
		
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
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoPromotores');
			$this->curl->post();
			$data['Spromotores'] = json_decode($this->curl->execute());
			$header['title'] = 'Agregar Promotoria';
			$this->load->view('/layout/header', $header);
			$this->load->view('/admin/listaGerentes', $data);
			$this->load->view('/layout/footer');
		}

		function actializaDatos() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/DetallePromotor');
					$post = array(
						'idspromotoria' => $this->input->get('clv_subpromotor')
						);
					$this->curl->post($post);
					$data['promotor'] = json_decode($this->curl->execute());
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoOficinas');
					$this->curl->post(array('usuario' => $this->session->userdata('card')));
					$data['oficinas'] = json_decode($this->curl->execute());
					$header['title'] = 'Administrar Usuarios';
					$this->load->view('/layout/header', $header);
					$this->load->view('/admin/actializaDatos', $data);
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					$data = array(
						'cveSPromotor' => $this->input->post('clv_subpromotor'),
						'email' => $this->input->post('email'),
						'telefono1' => $this->input->post('telefono1'),
						'ext1' => $this->input->post('ext1'),
						'telefono2' => $this->input->post('telefono2'),
						'ext2' => $this->input->post('ext2'),
						'estatus' => $this->input->post('estatus'),
						'no_oficina' => $this->input->post('oficina')
						);
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/UpdSubPromotor');
					$post = $data;
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/listaGerentes');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/listaGerentes');
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>