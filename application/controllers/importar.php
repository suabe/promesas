<?php
	/**
	* 
	*/
	class Importar extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->logeado();
		}

		function index() {
			$header['title'] = 'Importar';
			$this->load->view('/layout/header', $header);
			$this->load->view('/importar');
			$this->load->view('/layout/footer');
		}

		function to_file() {
			$this->load->library('excel');
			$file = $_FILES['excel']['tmp_name']; 
			$filename = $_FILES['excel']['name']; 
			if(!is_dir("./excel_files/")) 
      	mkdir("./excel_files/", 0777);
      if (copy($_FILES['excel']['tmp_name'],"./excel_files/".$filename)) {
	      //queremos obtener la extensión del archivo
	      $trozos = explode(".", $filename);

	      //solo queremos archivos excel
	      if($trozos[1] != "xlsx" && $trozos[1] != "xls") return;

	      $objReader = PHPExcel_IOFactory::createReader('Excel2007');
				$objPHPExcel = $objReader->load('excel_files/'.$filename);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				$salida = array();
				foreach ($sheetData as $data) {
          $s = array(
            'Fecha' => $data['A'],
            'Cve_periodo' => $data['B'],
            'Cve_bloque' => $data['C'],
            'Cve_Promotoria' => $data['D'],
            'Cve_Tipo' => $data['E'],
            'Puntos' => $data['F'],
          );
	         array_push($salida, $s);
        }
				$f = array_shift($salida);
        $this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/CargaPuntos');
				$post = array('resultado'=>0,'mensaje' => json_encode($salida),'usuario'=> $this->input->post('usuario'),'password'=> $this->input->post('password'));
				$this->curl->post($post);
				$e = json_decode($this->curl->execute());
				if ($e->resultado == 0) {
					//unlink("./excel_files/".$filename);
					$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
					redirect('/importar');
				}
				else {
					//unlink("./excel_files/".$filename);
					$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
					redirect('/importar');
				}
 	
      }else{
      	$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>Debes subir un archivo</h5></div>");
        redirect('/importar');
      }
		}//fin

		function abono() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$header['title'] = 'Administrar Usuarios';
					$this->load->view('/layout/header', $header);
					$this->load->view('/admin/abono');
					$this->load->view('/layout/footer');
					break;

				case 'POST':
					$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/TransaccionSubPromotor');
					$post = array(
						'usuario' => $this->session->userdata('card'),
						'tipo' => $this->input->post('tipo'),
						'valor' => $this->input->post('valor'),
						'clv_subpromotor' => $this->input->post('clv_subpromotor'),
						'password' => $this->input->post('password')
						);
					$this->curl->post($post);
					$e = json_decode($this->curl->execute());
					if ($e->resultado == 0) {
						$this->session->set_userdata('saldo', $e->valor->saldo);
						$this->session->set_flashdata('message', "<div class='alert alert-success flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/agregaPuntos');
					}
					else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger flash-message' style='margin:0px;width:100%;float:left;'><h5>".$e->mensaje."</h5></div>");
						redirect('/agregaPuntos');
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
?>