	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
 


$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//usuarios
$route['usuarios'] = 'usuario';
$route['usuarios/nuevo'] = 'usuario/create';
$route['usuarios/editar/(:num)'] = 'usuario/edit/$1';
$route['usuarios/actualizar']['POST'] = 'usuario/update';
$route['usuarios/index/(:any)'] = 'usuario/index/$1';
$route['usuarios/index'] = 'usuario/index';


//sedes
$route['sedes'] = 'sede';
$route['sedes/nuevo'] = 'sede/create';
$route['sedes/editar/(:num)'] = 'sede/edit/$1';
$route['sedes/actualizar']['POST'] = 'sede/update';
$route['sedes/index/(:any)'] = 'sede/index/$1';
$route['sedes/index'] = 'sede/index';


//local
$route['locales'] = 'local';
$route['locales/nuevo'] = 'local/create';
$route['locales/editar/(:num)'] = 'local/edit/$1';
$route['locales/actualizar']['POST'] = 'local/update';
$route['locales/index/(:any)'] = 'local/index/$1';
$route['locales/index'] = 'local/index';


//area
$route['areas'] = 'area';
$route['areas/nuevo'] = 'area/create';
$route['areas/editar/(:num)'] = 'area/edit/$1';
$route['areas/actualizar']['POST'] = 'area/update';
$route['areas/index/(:any)'] = 'area/index/$1';
$route['areas/index'] = 'area/index';


//oficina
$route['oficinas'] = 'oficina';
$route['oficinas/nuevo'] = 'oficina/create';
$route['oficinas/editar/(:num)'] = 'oficina/edit/$1';
$route['oficinas/actualizar']['POST'] = 'oficina/update';
$route['oficinas/index/(:any)'] = 'oficina/index/$1';
$route['oficinas/index'] = 'oficina/index';



//proveedor
$route['proveedores'] = 'proveedor';
$route['proveedores/nuevo'] = 'proveedor/create';
$route['proveedores/editar/(:num)'] = 'proveedor/edit/$1';
$route['proveedores/actualizar']['POST'] = 'proveedor/update';
$route['proveedores/index/(:any)'] = 'proveedor/index/$1';
$route['proveedores/index'] = 'proveedor/index';



//tipo documento
$route['tiposdocumento'] = 'tipodocumento';
$route['tiposdocumento/nuevo'] = 'tipodocumento/create';
$route['tiposdocumento/editar/(:num)'] = 'tipodocumento/edit/$1';
$route['tiposdocumento/actualizar']['POST'] = 'tipodocumento/update';
$route['tiposdocumento/index/(:any)'] = 'tipodocumento/index/$1';
$route['tiposdocumento/index'] = 'tipodocumento/index';



//cuenta contable
$route['cuentascontable'] = 'cuentacontable';
$route['cuentascontable/nuevo'] = 'cuentacontable/create';
$route['cuentascontable/editar/(:num)'] = 'cuentacontable/edit/$1';
$route['cuentascontable/actualizar']['POST'] = 'cuentacontable/update';
$route['cuentascontable/index/(:any)'] = 'cuentacontable/index/$1';
$route['cuentascontable/index'] = 'cuentacontable/index';



//estado bien
$route['estadosbien'] = 'estadobien';
$route['estadosbien/nuevo'] = 'estadobien/create';
$route['estadosbien/editar/(:num)'] = 'estadobien/edit/$1';
$route['estadosbien/actualizar']['POST'] = 'estadobien/update';
$route['estadosbien/index/(:any)'] = 'estadobien/index/$1';
$route['estadosbien/index'] = 'estadobien/index';



//condicion bien
$route['condicionesbien'] = 'condicionbien';
$route['condicionesbien/nuevo'] = 'condicionbien/create';
$route['condicionesbien/editar/(:num)'] = 'condicionbien/edit/$1';
$route['condicionesbien/actualizar']['POST'] = 'condicionbien/update';
$route['condicionesbien/index/(:any)'] = 'condicionbien/index/$1';
$route['condicionesbien/index'] = 'condicionbien/index';



//origen bien
$route['origenesbien'] = 'origenbien';
$route['origenesbien/nuevo'] = 'origenbien/create';
$route['origenesbien/editar/(:num)'] = 'origenbien/edit/$1';
$route['origenesbien/actualizar']['POST'] = 'origenbien/update';
$route['origenesbien/index/(:any)'] = 'origenbien/index/$1';
$route['origenesbien/index'] = 'origenbien/index';



//procedencia bien
$route['procedenciasbien'] = 'procedenciabien';
$route['procedenciasbien/nuevo'] = 'procedenciabien/create';
$route['procedenciasbien/editar/(:num)'] = 'procedenciabien/edit/$1';
$route['procedenciasbien/actualizar']['POST'] = 'procedenciabien/update';
$route['procedenciasbien/index/(:any)'] = 'procedenciabien/index/$1';
$route['procedenciasbien/index'] = 'procedenciabien/index';



//motivo de baja
$route['motivosbaja'] = 'motivobaja';
$route['motivosbaja/nuevo'] = 'motivobaja/create';
$route['motivosbaja/editar/(:num)'] = 'motivobaja/edit/$1';
$route['motivosbaja/actualizar']['POST'] = 'motivobaja/update';
$route['motivosbaja/index/(:any)'] = 'motivobaja/index/$1';
$route['motivosbaja/index'] = 'motivobaja/index';



//familia
$route['familias'] = 'familia';
$route['familias/nuevo'] = 'familia/create';
$route['familias/editar/(:num)'] = 'familia/edit/$1';
$route['familias/actualizar']['POST'] = 'familia/update';
$route['familias/index/(:any)'] = 'familia/index/$1';
$route['familias/index'] = 'familia/index';



//sub familia
$route['subfamilias'] = 'subfamilia';
$route['subfamilias/nuevo'] = 'subfamilia/create';
$route['subfamilias/editar/(:num)'] = 'subfamilia/edit/$1';
$route['subfamilias/actualizar']['POST'] = 'subfamilia/update';
$route['subfamilias/index/(:any)'] = 'subfamilia/index/$1';
$route['subfamilias/index'] = 'subfamilia/index';



//motivo de traslado
$route['motivostraslado'] = 'motivotraslado';
$route['motivostraslado/nuevo'] = 'motivotraslado/create';
$route['motivostraslado/editar/(:num)'] = 'motivotraslado/edit/$1';
$route['motivostraslado/actualizar']['POST'] = 'motivotraslado/update';
$route['motivostraslado/index/(:any)'] = 'motivotraslado/index/$1';
$route['motivostraslado/index'] = 'motivotraslado/index';


//centro de costo
$route['centroscosto'] = 'centrocosto';
$route['centroscosto/nuevo'] = 'centrocosto/create';
$route['centroscosto/editar/(:num)'] = 'centrocosto/edit/$1';
$route['centroscosto/actualizar']['POST'] = 'centrocosto/update';
$route['centroscosto/index/(:any)'] = 'centrocosto/index/$1';
$route['centroscosto/index'] = 'centrocosto/index';



//colores
$route['colores'] = 'color';
$route['colores/nuevo'] = 'color/create';
$route['colores/editar/(:num)'] = 'color/edit/$1';
$route['colores/actualizar']['POST'] = 'color/update';
$route['colores/index/(:any)'] = 'color/index/$1';
$route['colores/index'] = 'color/index';



//contratos de leasing
$route['contratos'] = 'contrato';
$route['contratos/nuevo'] = 'contrato/create';
$route['contratos/editar/(:num)'] = 'contrato/edit/$1';
$route['contratos/actualizar']['POST'] = 'contrato/update';
$route['contratos/index/(:any)'] = 'contrato/index/$1';
$route['contratos/index'] = 'contrato/index';



//bancos
$route['bancos'] = 'banco';
$route['bancos/nuevo'] = 'banco/create';
$route['bancos/editar/(:num)'] = 'banco/edit/$1';
$route['bancos/actualizar']['POST'] = 'banco/update';
$route['bancos/index/(:any)'] = 'banco/index/$1';
$route['bancos/index'] = 'banco/index';



//proyectos
$route['proyectos'] = 'proyecto';
$route['proyectos/nuevo'] = 'proyecto/create';
$route['proyectos/editar/(:num)'] = 'proyecto/edit/$1';
$route['proyectos/actualizar']['POST'] = 'proyecto/update';
$route['proyectos/index/(:any)'] = 'proyecto/index/$1';
$route['proyectos/index'] = 'proyecto/index';


//edificios
$route['edificios'] = 'edificio';
$route['edificios/nuevo'] = 'edificio/create';
$route['edificios/editar/(:num)'] = 'edificio/edit/$1';
$route['edificios/actualizar']['POST'] = 'edificio/update';
$route['edificios/index/(:any)'] = 'edificio/index/$1';
$route['edificios/index'] = 'edificio/index';



//pisos
$route['pisos'] = 'piso';
$route['pisos/nuevo'] = 'piso/create';
$route['pisos/editar/(:num)'] = 'piso/edit/$1';
$route['pisos/actualizar']['POST'] = 'piso/update';
$route['pisos/index/(:any)'] = 'piso/index/$1';
$route['pisos/index'] = 'piso/index';


//sedes
$route['bienes'] = 'bien';
$route['bienes/nuevo'] = 'bien/create';
$route['bienes/editar/(:num)'] = 'bien/edit/$1';
$route['bienes/actualizar']['POST'] = 'bien/update';
$route['bienes/index/(:any)'] = 'bien/index/$1';
$route['bienes/index'] = 'bien/index';

//sunat
$route['sunat'] = 'sunat';
$route['sunat/index'] = 'sunat/index';


//mejoras

$route['mejoras'] = 'mejoras';
$route['mejoras/nuevo'] = 'mejoras/create';
$route['mejoras/editar/(:num)'] = 'mejoras/edit/$1';
$route['mejoras/actualizar']['POST'] = 'mejoras/update';
$route['mejoras/index/(:any)'] = 'mejoras/index/$1';
$route['mejoras/index'] = 'mejoras/index';



$route['ajuste'] = 'ajuste';
$route['ajuste/nuevo'] = 'ajuste/create';
$route['ajuste/editar/(:num)'] = 'ajuste/edit/$1';
$route['ajuste/actualizar']['POST'] = 'ajuste/update';
$route['ajuste/index/(:any)'] = 'ajuste/index/$1';
$route['ajuste/index'] = 'ajuste/index';