<?php
	/**
	* 
	*/
	class Admin_user extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->logeado();
		}

		function index() {
			$header['title'] = 'Administrar Usuarios';
			$this->load->view('/layout/header', $header);
			$this->load->view('/admin/index');
			$this->load->view('/layout/footer');
		}

		function listaOficinas() {
			$option = '<option value="">Elegir</option>';
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoOficinas');
			$this->curl->post(array('usuario' => $this->input->post('clavePromotor')));
			$data = json_decode($this->curl->execute());
			foreach ($data->Valor as $o) {
				$option .= '<option value="'.$o->idOficina.'">'.$o->domicilio.'</option>';
			}
			echo $option;
		}

		function tablaOficinas() {
			$row = '';
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoOficinas');
			$this->curl->post(array('usuario' => $this->input->post('clavePromotor')));
			$data = json_decode($this->curl->execute());
			foreach ($data->Valor as $p) {
				$row .= '<tr>';
				$row .= '<td>'.$p->domicilio.'</td>';
				$row .= '</tr>';
			}
			echo $row;
		}

		function listaAsesores() {
			$row = '';
			$this->curl->create('http://www.link2loyalty.com/metlifepruebas/api/ListadoSubPromotoria');
			$post = array(
				'usuario' => $this->input->post('clavePromotor')
				);
			$this->curl->post($post);
			$data = json_decode($this->curl->execute());
			foreach ($data->Valor as $p) {
				$row .= '<tr>';
				$row .= '<td>'.$p->descripcion.'</td>';
				$row .= '<td>';
				$row .= '<form method="get" action="/listaGerentes/actializaDatos">';
				$row .= '<input type="hidden" name="clv_subpromotor" value="'.$p->valor.'">';
				$row .= '<input type="hidden" name="nombre" value="'.$p->descripcion.'">';
				$row .= '<button type="submit" class="button button-block button-rounded button-flat-action button-tiny" style=" position: relative; ">Editar</button>';
				$row .= '</form>';
				$row .= '</td>';
				$row .= '</tr>';
			}
			echo $row;
		}

		function upload () {
			//crear la ruta absoluta
	     $targetPath = "{$_SERVER['DOCUMENT_ROOT']}/{$this->config->item('dirPrincipal')}/uploads/";
	        
	     if (!empty($_FILES)) {
	      $nombreArchivo = $_FILES['Filedata']['name'];
				$tempFile = $_FILES['Filedata']['tmp_name'];
				$targetFile =  $targetPath.$nombreArchivo;
				if(move_uploaded_file($tempFile,$targetFile))
				{

				}
			}
			echo 1;
		}

	}
?>