<?php
	/**
	* 
	*/
	class CatalogoEspecial extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('acceso_model');
			$this->acceso_model->authenticationRequired(6);
		}

		function index() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/index');
			$this->load->view('/layout/footer');
		}

		function autos() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/autos/index');
			$this->load->view('/layout/footer');
		}

		function march() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/autos/march');
			$this->load->view('/layout/footer');
		}

		function versa() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/autos/versa');
			$this->load->view('/layout/footer');	
		}

		function matiz() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/autos/matiz');
			$this->load->view('/layout/footer');	
		}

		function aveo() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/autos/aveo');
			$this->load->view('/layout/footer');	
		}

		function gol() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/autos/gol');
			$this->load->view('/layout/footer');	
		}
/*
*
* VIAJES
*
*/
		function viajes() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/viajes/index');
			$this->load->view('/layout/footer');
		}

		function acapulco() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/viajes/acapulco');
			$this->load->view('/layout/footer');	
		}

		function cancun() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/viajes/cancun');
			$this->load->view('/layout/footer');	
		}

		function ixtapa() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/viajes/ixtapa');
			$this->load->view('/layout/footer');
		}

		function vallarta() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/viajes/vallarta');
			$this->load->view('/layout/footer');
		}

/*
*
* Motos
*
*/
		function motos() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/motos/index');
			$this->load->view('/layout/footer');
		}

		function italikaRT() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/motos/italikaRT');
			$this->load->view('/layout/footer');
		}

		function italikaAT() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/motos/italikaAT');
			$this->load->view('/layout/footer');
		}

		function italikaFTS() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/motos/italikaFTS');
			$this->load->view('/layout/footer');
		}

		function italikaFT() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/motos/italikaFT');
			$this->load->view('/layout/footer');
		}

		function hondaWave() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/motos/hondaWave');
			$this->load->view('/layout/footer');
		}

		function hondaCargo() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/motos/hondaCargo');
			$this->load->view('/layout/footer');
		}


/*
*
* Motos
*
*/
		function pcs() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/pcs/index');
			$this->load->view('/layout/footer');
		}

		function sony() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/pcs/sony');
			$this->load->view('/layout/footer');
		}

		function toshiba() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/pcs/toshiba');
			$this->load->view('/layout/footer');
		}

		function hp() {
			$header['title'] = 'Catálogo Especial';
			$this->load->view('/layout/header', $header);
			$this->load->view('/catalogoEspecial/pcs/hp');
			$this->load->view('/layout/footer');
		}

	}
?>