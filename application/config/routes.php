<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site_Controller/index';

$route['companies/register'] = 'Company_Controller/register';
$route['companies/(:any)/users'] = 'Company_Controller/users/$1';
$route["companies/(:any)/subscriptions"] = "Company_Controller/subscriptions/$1";

$route['users/login'] = 'UserController/login';
$route['users/logout'] = 'UserController/logout';

$route['users/create'] = 'UserController/create';
$route['users'] = 'UserController/index';
$route['users/profile'] = 'UserController/profile';
$route['users/profile/update']["POST"] = 'UserController/update';
$route['users/profile/change-password'] = "UserController/change_password";
$route['users/profile/update-avatar']['POST'] = "UserController/update_avatar";

$route["roles"] = "RoleController/index";
$route["roles/create"] = "RoleController/create";
$route["roles/(:any)"] = "RoleController/view/$1";

$api_url = "api/dev";
$route["{$api_url}/companies/roles"] = "Company_Controller/roles";
$route["{$api_url}/roles/(:any)"] = "RoleController/view_rest/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['migrate'] = 'Migration_Controller/index';
$route['migrate/(:any)'] = 'Migration_Controller/index/$1';
$route['migrate/(:any)/(:num)'] = 'Migration_Controller/index/$1/$2';
