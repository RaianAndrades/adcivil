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

$route['default_controller'] = "login";
$route['404_override'] = '';

//$route['login'] = ""

$route['admin/advogados/(:any)'] = "admin/advogados/$1";
$route['admin/advogados/editar/(:any)'] = "admin/advogados/editar/$1";

$route['admin/relatorios'] = "admin/pdf";
$route['admin/relatorios/lista_advogados'] = "admin/pdf/advogados_pdf";
$route['admin/relatorios/lista_clientes'] = "admin/pdf/clientes_pdf";
$route['admin/relatorios/lista_processos'] = "admin/pdf/processos_pdf";
$route['admin/relatorios/lista_audiencias'] = "admin/pdf/audiencias_pdf";
$route['admin/relatorios/(:any)'] = "admin/pdf/$1";

$route['admin/audiencias/(:any)'] = "admin/audiencias/$1";
$route['admin/audiencias/editar/(:any)'] = "admin/audiencias/editar/$1";


 $route['admin/clientes/(:any)'] = "admin/clientes/index/$1";
$route['admin/clientes/(:any)'] = "admin/clientes/$1";
$route['admin/clientes/editar/(:any)'] = "admin/clientes/editar/$1";
$route['admin/clientes/editar/'] = "admin/clientes/";


// $route['admin/clientes/index/$1'] = "admin/clientes/index/$1";
// $route['admin/clientes/(:any)'] = "admin/clientes/$1";
// $route['admin/clientes/editar/(:any)'] = "admin/clientes/editar/$1";
// $route['admin/clientes/ver_cliente/(:any)'] = "admin/clientes/ver_cliente/$1";

$route['admin/pdf/(:any)'] = "admin/pdf/$1";


$route['admin/processos/(:any)'] = "admin/processos/$1";
$route['admin/processos/editar/(:any)'] = "admin/processos/editar/$1";

$route['admin/processos_testemunhas/(:any)'] = "admin/processos_testemunhas/$1";
$route['admin/processos_testemunhas/editar/(:any)'] = "admin/processos_testemunhas/editar/$1";

$route['admin/usuarios'] = "admin/usuarios_admin";
$route['admin/usuarios/(:any)'] = "admin/usuarios_admin/$1";
$route['admin/usuarios/editar/(:any)'] = "admin/usuarios_admin/editar/$1";




/* End of file routes.php */
/* Location: ./application/config/routes.php */