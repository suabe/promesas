<?php
	class Download extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(4);
		}

		function index() {
			if ($this->acceso_mod->logeado()) {
				$file='manual.pdf';
				// verificar archivo
				// obtener archivo
				$root = '/img/pdf/';
				$file = basename($file);
				$path = $root.$file;
				$type = '';
				//var_dump($path);
				if (is_file($path)) {
					$size = filesize($path);
					if (function_exists('mime_content_type')) {
						$type = mime_content_type($path);
					} 
					elseif (function_exists('finfo_file')) {
						$info = finfo_open(FILEINFO_MIME);
						$type = finfo_file($info, $path);
						finfo_close($info);
					}
					if ($type == '') {
						$type = "application/force-download";
					}
					//var_dump($size);
					header("Content-Type: $type");
					header("Content-Disposition: attachment; filename=manual.pdf");
					header("Content-Transfer-Encoding: binary");
					header("Content-Length: " . $size);
					// descargar achivo
					readfile($path);
				} 
			}
		}
	}
?>	