<?php
	/**
	* 
	*/
	class UsuarioBloqueado extends CI_Controller {
		
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
							$this->curl->create('http://www.link2loyalty.com/WApiMetLife/api/ListadoBloqueados');
							$this->curl->post();
							$data['usuarios'] = json_decode($this->curl->execute());
							$data['title'] = 'Usuarios Bloqueados';
							$this->load->view('/admin/usuarioBloqueado', $data);
						}
						break;

					case 'POST':
						$data = array(
							'clvUsuario' => $this->input->post('clvUsuario')
							);
						$this->curl->create('http://www.link2loyalty.com/WApiMetLife/api/Desbloqueo');
						$post = $data;
						$this->curl->post($post);
						$e = json_decode($this->curl->execute());
						if ($e->resultado == 0) {
							$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
							redirect('/usuarioBloqueado');
						}
						else {
							$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
							redirect('/usuarioBloqueado');
						}
						break;
					
					default:
						# code...
						break;
				}
			
		}

	}
?>