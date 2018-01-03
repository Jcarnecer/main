<?php
defined("BASEPATH") OR exit("No direct script access allowed");

$route["default_controller"] = "SiteController/index";

$route["companies/register"] = "CompanyController/register";

$route["users/login"] = "UserController/login";
$route["users/logout"] = "UserController/logout";

$route["users/profile"] = "UserController/profile";
$route["users/profile/update"]["POST"] = "UserController/update_profile";
$route["users/profile/update-avatar"]["POST"] = "UserController/update_avatar";
$route["users/profile/change-password"] = "UserController/change_password";

$route["users"] = "UserController/index";
$route["users/create"] = "UserController/create";
$route["users/(:any)/update"] = "UserController/update/$1";

$route["migrate"] = "MigrationController/index";
$route["migrate/(:any)"] = "MigrationController/index/$1";
$route["migrate/(:any)/(:num)"] = "MigrationController/index/$1/$2";

$route["roles"] = "RoleController/index";
$route["roles/create"]["GET"] = "RoleController/show_create";
$route["roles/create"]["POST"] = "RoleController/create";
$route["roles/(:any)/update"]["GET"] = "RoleController/show_update/$1";
$route["roles/(:any)/update"]["POST"] = "RoleController/update/$1";

$route["api/dev/companies"]["GET"] = "APIController/get_companies";
$route["api/dev/companies/users"] = "APIController/get_company_users";
$route["api/dev/companies/roles"] = "APIController/get_company_roles";

$route["api/dev/roles/(:any)"] = "APIController/get_role/$1";
$route["api/dev/roles/(:any)/permissions"] = "APIController/get_role_permissions/$1";

$route["{API_URL}/permissions"] = "APIController/get_permissions";

$route["404_override"] = "";
$route["translate_uri_dashes"] = FALSE;