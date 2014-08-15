<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$sClient = new SoapClient('http://www.link2loyalty.com/ganatips/ws/wsGanaTips.asmx?wsdl');
		$response = $sClient->ConsultaUsuarios(array('idUsuario' => 0));
		$data = $response->ConsultaUsuariosResult;
		$e['usuarios'] = json_decode($data);
		//var_dump($e);
		echo json_encode($e);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */