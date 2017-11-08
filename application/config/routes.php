<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site_Controller/index';

$route['companies/register'] = 'Company_Controller/register';
$route['companies/(:any)/users'] = 'Company_Controller/users/$1';
$route["companies/(:any)/subscriptions"] = "Company_Controller/subscriptions/$1";

$route['users/login'] = 'User_Controller/login';
$route['users/logout'] = 'User_Controller/logout';

$route['users/create'] = 'User_Controller/create';
$route['users'] = 'User_Controller/all';
$route['users/profile'] = 'User_Controller/profile';
$route['users/profile/update']["POST"] = 'User_Controller/update';
$route['users/profile/change-password'] = "User_Controller/change_password";
$route['users/profile/update-avatar']['POST'] = "User_Controller/update_avatar";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['migrate'] = 'Migration_Controller/index';
$route['migrate/(:any)'] = 'Migration_Controller/index/$1';
$route['migrate/(:any)/(:num)'] = 'Migration_Controller/index/$1/$2';
