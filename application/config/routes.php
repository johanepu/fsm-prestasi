<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'User_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'Register';
$route['success'] = "User_login";
$route['addPrestasi'] = "Prestasi/addPrestasi";
$route['prestasi']='/Prestasi/index';
$route['kucing'] = "Admin_login";
$route['Admin_user/user/(:any)'] = "/Admin_user/lihat_user/$1";
