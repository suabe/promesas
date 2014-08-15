<?php
	/**
	* 
	*/
	class Acceso extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('acceso_model');
		}

		function index() {
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
				if (!$this->acceso_model->validarsesion()) {
					$this->load->view('/login');
				}
				else {
					redirect('/');
				}
				break;
			case 'POST':
				$login = $this->input->post('usuario');
				if (  $this->acceso_model->login($login, $this->input->post('password')) ) {
					if( $redirect = $this->session->userdata('redirect') ) {
						redirect($redirect);
					}
					redirect("/");
					$this->session->unset_userdata('redirect');
					exit;
				}
				else {
					//$this->session->set_flashdata('message', "<div class='alert alert-warning flash-message' style='margin:0px;'><h3>Usuario y/o contraseña incorrectos</h3></div>");
					redirect('/acceso');
				}
				break;
			
			default:
				redirect("/acceso");
				break;
		}

	}
	
	function logout() {
		$this->acceso_model->logOut();
	}

	function recupera() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$this->load->view('/recupera');
					break;

				case 'POST':
					$login = $this->input->post('usuario');
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/RecuperaPw');
					$post = array('usuario'=> $login);
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/acceso');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/acceso/recupera');	
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>