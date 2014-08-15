<?php
	/**
	* 
	*/
	class Api extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
		}

		function index() {
			echo '{"message":"bad request","cod":"500"}';
		}

		function usuarios() {
			$sClient = new SoapClient('http://www.link2loyalty.com/ganatips/ws/wsGanaTips.asmx?wsdl');
			$response = $sClient->ConsultaUsuarios(array('idUsuario' => 0));
			$data = $response->ConsultaUsuariosResult;
			$e['usuarios'] = json_decode($data);
			echo json_encode($e);
		}

		function usuario() {
			$u = $this->input->get('userID');
			$sClient = new SoapClient('http://www.link2loyalty.com/ganatips/ws/wsGanaTips.asmx?wsdl');
			$response = $sClient->ConsultaUsuarios(array('idUsuario' => $u));
			$data = $response->ConsultaUsuariosResult;
			$e['usuario'] = json_decode($data);
			echo json_encode($e);
		}

	}
?>