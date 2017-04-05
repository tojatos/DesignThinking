<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = 'Main/error404';

$route['Kurs/(:num)'] = 'Kurs/index/$1';
$route['Egzamin/(:num)'] = 'Egzamin/index/$1';
