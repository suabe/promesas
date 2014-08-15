<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['catalogoEspecial/autos/aveo'] = "/catalogoEspecial/aveo";
$route['catalogoEspecial/autos/gol'] = "/catalogoEspecial/gol";
$route['catalogoEspecial/autos/march'] = "/catalogoEspecial/march";
$route['catalogoEspecial/autos/versa'] = "/catalogoEspecial/versa";
$route['catalogoEspecial/autos/matiz'] = "/catalogoEspecial/matiz";

$route['catalogoEspecial/viajes/acapulco'] = "/catalogoEspecial/acapulco";
$route['catalogoEspecial/viajes/cancun'] = "/catalogoEspecial/cancun";
$route['catalogoEspecial/viajes/ixtapa'] = "/catalogoEspecial/ixtapa";
$route['catalogoEspecial/viajes/vallarta'] = "/catalogoEspecial/vallarta";

$route['catalogoEspecial/motos/italikaRT'] = "/catalogoEspecial/italikaRT";
$route['catalogoEspecial/motos/italikaAT'] = "/catalogoEspecial/italikaAT";
$route['catalogoEspecial/motos/italikaFTS'] = "/catalogoEspecial/italikaFTS";
$route['catalogoEspecial/motos/italikaFT'] = "/catalogoEspecial/italikaFT";
$route['catalogoEspecial/motos/hondaWave'] = "/catalogoEspecial/hondaWave";
$route['catalogoEspecial/motos/hondaCargo'] = "/catalogoEspecial/hondaCargo";

$route['catalogoEspecial/pcs/sony'] = "/catalogoEspecial/sony";
$route['catalogoEspecial/pcs/toshiba'] = "/catalogoEspecial/toshiba";
$route['catalogoEspecial/pcs/hp'] = "/catalogoEspecial/hp";
/* End of file routes.php */
/* Location: ./application/config/routes.php */