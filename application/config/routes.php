<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Frontend';
$route['admin'] = 'admin/dashboard';

$route['transaksi'] = 'admin/transaksi';
$route['transaksi/add_to_cart'] = 'admin/transaksi/add_to_cart';
$route['transaksi/cetak_faktur'] = 'admin/transaksi/cetak_faktur';

$route['transaksi_status'] = 'admin/transaksi_status';
$route['transaksi_status/update_action'] = 'admin/transaksi_status/update_action';

$route['pelanggan'] = 'admin/pelanggan';
$route['pelanggan/create'] = 'admin/pelanggan/create';
$route['pelanggan/create_action'] = 'admin/pelanggan/create_action';
$route['pelanggan/update_action'] = 'admin/pelanggan/update_action';

$route['jasa'] = 'admin/jasa';
$route['jasa/create'] = 'admin/jasa/create';
$route['jasa/create_action'] = 'admin/jasa/create_action';
$route['jasa/update_action'] = 'admin/jasa/update_action';

$route['laporan'] = 'admin/laporan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
