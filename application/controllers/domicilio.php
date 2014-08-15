<?php
	/**
	* 
	*/
	class Domicilio extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(1);
		}

		function index() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/Domicilio');
					$post = array('usuario'=> $this->session->userdata('card'));
					$this->curl->post($post);
					$data['domicilio'] = json_decode($this->curl->execute());
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoPromotores');
					$this->curl->post();
					$data['promotores'] = json_decode($this->curl->execute());
					$header['title'] = 'Cambiar Domicilio de Entraga';
					$this->load->view('/layout/header', $header);
					$this->load->view('/domicilio', $data);
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/CambioDomicilio');
					$post = array(
						'usuaio'=> $this->input->post('clavePromotor'),
						'calle'=> $this->input->post('calle'),
						'colonia'=> $this->input->post('colonia'),
						'municipio'=> $this->input->post('municipio'),
						'ciudad'=> 0,
						'estado'=> $this->input->post('estado'),
						'cp'=> $this->input->post('cp'),
						'no_int'=> $this->input->post('numInt'),
						'no_ext'=> $this->input->post('numExt'),
						'telefono1' => $this->input->post('telefono1'),
						'ext1' => $this->input->post('ext1'),
						'telefono2' => $this->input->post('telefono2'),
						'ext2' => $this->input->post('ext2'),
						'atencionDe' => '',
						'atencionA' => '',
						'atencionDias' => ''
						);
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/domicilio');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/domicilio');
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>