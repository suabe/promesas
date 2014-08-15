<?php
	/**
	* 
	*/
	class Inportar extends CI_Controller {
		
		function __construct() {
			parent::__construct();
		}

		function index() {
			$this->load->view('/importar');
		}

		function tio_file() {
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
				$post = array('resultado'=>0,'mensaje' => json_encode($salida),'usuario'=>'Admin','password'=>'Admin');
				$this->curl->post($post);
				$e = json_decode($this->curl->execute());
 	
        }else{
            echo "Debes subir un archivo";
        }
		}//fin

	}
?>