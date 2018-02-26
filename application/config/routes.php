<?php
defined("BASEPATH") OR exit("No direct script access allowed");

$route["default_controller"] = "SiteController/index";

$route["companies/selection"]["GET"] = "CompanyController/show_selection";
$route["companies/register"]["GET"] = "CompanyController/show_register";
$route["companies/register_success"]["GET"] = "CompanyController/show_register_success";
$route["companies/register_success"]["POST"] = "CompanyController/show_register_success";
$route["companies/register_failed"]["GET"] = "CompanyController/show_register_failed";
$route["companies/register_failed"]["POST"] = "CompanyController/show_register_failed";
$route["companies/register"]["POST"] = "CompanyController/register";
$route["companies/checkout"]["POST"] = "CompanyController/checkout";

$route["users/login"]["GET"] = "UserController/show_login";
$route["users/login"]["POST"] = "UserController/login";
$route["users/logout"]["GET"] = "UserController/logout";
$route["users/forgot"]["GET"] = "UserController/forgot";

$route["users/profile"]["GET"] = "UserController/profile";
$route["users/profile/update"]["POST"] = "UserController/update_profile";
$route["users/profile/update-avatar"]["POST"] = "UserController/update_avatar";
$route["users/profile/change-password"] = "UserController/change_password";

$route["users"]["GET"] = "UserController/index";
$route["users/create"]["GET"] = "UserController/show_create";
$route["users/create"]["POST"] = "UserController/create";
$route["users/(:any)/update"]["GET"] = "UserController/show_update/$1";
$route["users/(:any)/update"]["POST"] = "UserController/update/$1";

$route["migrate"] = "MigrationController/index";
$route["migrate/(:any)"] = "MigrationController/index/$1";
$route["migrate/(:any)/(:num)"] = "MigrationController/index/$1/$2";

$route["roles"]["GET"] = "RoleController/index";
$route["roles/create"]["GET"] = "RoleController/show_create";
$route["roles/create"]["POST"] = "RoleController/create";
$route["roles/(:any)/update"]["GET"] = "RoleController/show_update/$1";
$route["roles/(:any)/update"]["POST"] = "RoleController/update/$1";

$route["api/dev/companies"]["GET"] = "APIController/get_companies";
$route["api/dev/companies/users"]["GET"] = "APIController/get_company_users";
$route["api/dev/companies/roles"]["GET"] = "APIController/get_company_roles";

$route["404_override"] = "";
$route["translate_uri_dashes"] = FALSE;