<?php
defined("BASEPATH") OR exit("No direct script access allowed");

$route["default_controller"] = "SiteController/index";

$route["companies/register"] = "CompanyController/register";

$route["users/login"] = "UserController/login";
$route["users/logout"] = "UserController/logout";

$route["users"] = "UserController/index";
$route["users/create"] = "UserController/create";
$route["users/profile"] = "UserController/profile";
$route["users/profile/update"]["POST"] = "UserController/update";
$route["users/profile/change-password"] = "UserController/change_password";
$route["users/profile/update-avatar"]["POST"] = "UserController/update_avatar";

$route["roles"] = "RoleController/index";
$route["roles/create"] = "RoleController/create";
$route["roles/(:any)/permissions/add"] = "RoleController/add_permission/$1";
$route["roles/(:any)"] = "RoleController/view/$1";

$api_url = "api/dev";
$route["{$api_url}/companies"]["GET"] = "APIController/get_companies";
$route["{$api_url}/companies/users"] = "APIController/get_company_users";
$route["{$api_url}/companies/roles"] = "APIController/get_company_roles";

$route["{$api_url}/roles/(:any)"] = "APIController/get_role/$1";
$route["{$api_url}/roles/(:any)/permissions"] = "APIController/get_role_permissions/$1";

$route["{$api_url}/permissions"] = "APIController/get_permissions";

$route["migrate"] = "Migration_Controller/index";
$route["migrate/(:any)"] = "Migration_Controller/index/$1";
$route["migrate/(:any)/(:num)"] = "Migration_Controller/index/$1/$2";

$route["404_override"] = "";
$route["translate_uri_dashes"] = FALSE;
