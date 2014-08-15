<?php
	/**
	* 
	*/
	class AgregaOfic extends CI_Controller
	{
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(1);
		}

		function index() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/Estados');
					$this->curl->post();
					$data['estados'] = json_decode($this->curl->execute());
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoPromotores');
					$this->curl->post();
					$data['Spromotores'] = json_decode($this->curl->execute());
					$header['title'] = 'Administrar Usuarios';
					$this->load->view('/layout/header', $header);
					$this->load->view('/admin/agregaOfic',$data);
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					$data = array(
						'calle'	=> $this->input->post('calle'),
						'colonia'	=> $this->input->post('colonia'),
						'ciudad'	=> '0',
						'municipio'	=> $this->input->post('municipio'),
						'estado'	=> $this->input->post('idestado'),
						'cp'	=> $this->input->post('cp'),
						'no_int'	=> $this->input->post('numInt'),
						'no_ext'	=> $this->input->post('numExt'),
						'usuaio'	=> $this->input->post('clavePromotor'),
						'telefono1'	=> '',
						'telefono2'	=> '',
						'ext1'	=> '',
						'ext2'	=> '',
						'atencionDe'	=> '',
						'atencionA'	=> '',
						'atencionDias'	=> ''
						);
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/AltaOficina');
					$post = $data;
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					//var_dump($e);
					if ($e->resultado == 0) {
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/agregaOfic');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/agregaOfic');
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>