<?php
	/**
	* 
	*/
	class Acceso_model extends CI_model
	{
		
		function __construct() {
			parent::__construct();
		}


		function userlog( $login,$Password ) {
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/Valida');
			$post = array('login'=> $login, 'password' => $Password);
			$this->curl->post($post);
			$e = json_decode($this->curl->execute());
			return $e;
		}

		function saldo( $card ) {
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/Saldo');
			$post = array('usuario'=> $card);
			$this->curl->post($post);
			$e = json_decode($this->curl->execute());
			return $e;	
		}

		function login( $login, $Password ){
			$e = $this->userlog($login,$Password);
			if ( $e->resultado == 0 ) {				
				$data = array('entra' =>2,'perfil'=> $e->Valor->idnusuario,'nombre' => $e->Valor->nombre, 'idusuario' => $e->Valor->idusuario,'saldo' => $e->Valor->saldo, 'nivel' => $e->Valor->nivel,'logo' => $e->Valor->logo);
				return $this->autenticar($data,$login, $Password );
			}
			else {
				$data = array('entra' =>1,'mensasje' => $e->mensaje);
				return $this->autenticar($data,$login, $Password );
			}
		}

		function autenticar($data,$login, $Password ) {
			if ($data['entra'] == 2) {
											
				$sesion_data = array(
		 			'username' => $data['nombre'],
		 			'password' => $Password,
		 			'card' => $login,
		 			'perfil' => $data['perfil'],
		 			'idusuario' => $data['idusuario'],
		 			'saldo' => $data['saldo'],
		 			'nivel' => $data['nivel'],
		 			'logo' => $data['logo'],
		 			'logged_in' => TRUE
	 			);
				$this->session->set_userdata($sesion_data);
				$data = $this->session->all_userdata();
				return TRUE;
			}		
			else {
				$this->session->set_flashdata('message', "<div class='alert alert-error flash-message' style='margin:0px;width:100%;float:left;'><h5>".$data['mensasje']."</h5></div>");
				return false;
			}
		}

		function logeado() {
			if ($this->validarsesion()) {
				return true;
			}
			else {
				$this->session->set_userdata('redirect', $this->uri->uri_string());
				redirect("/acceso");
				return false;
			}
		}

		function validarsesion() {
			$user_session = $this->session->userdata('username');
			if ($user_session) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		function authenticationRequired( $nivel = 0) {
			$e = $this->session->userdata('perfil');
			if ($this->validarsesion()) {
				if ($e > $nivel ) {
					$message_401 = "<h1>401</h1>No tiene permiso de entrar a la url que intenta acceder.";
					show_error($message_401 , 401 );	
				}
				return true;
			}
			else {
				$this->session->set_userdata('redirect', $this->uri->uri_string());
				redirect("/acceso");
				return false;
			}
		}

		function logOut() {
			$this->session->sess_destroy();
			redirect("/");
		}


	}
?>