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
$route['default_controller'] = 'login';$route['dashboard/(:any)'] = 'Dashboard/index/$1'; 
//$route['(:any)'] = 'login/index/$1'; 
/*$route['(:any)/login'] = 'login/index/$1'; 
$route['(:any)/Register'] = 'Register/index/$1'; 
$route['(:any)/Login/index'] = 'Login/index/$1'; 
$route['(:any)/Login/Validate'] = 'Login/Validate/$1'; 
$route['(:any)/Logout'] = 'Logout/index/$1'; 

$route['(:any)/Dashboard/index'] = 'Dashboard/index/$1';
$route['(:any)/Dashboard/RegisteredUsers'] = 'Dashboard/RegisteredUsers/$1';
$route['(:any)/Dashboard/pageload/(:any)'] = 'Dashboard/pageload/$1/$2'; 
$route['(:any)/Domain'] = 'Domain/index/$1'; 
$route['(:any)/Domain/index'] = 'Domain/index/$1'; 
$route['(:any)/Domain/add'] = 'Domain/add/$1'; 
$route['(:any)/Domain/edit/(:any)'] = 'Domain/edit/$1/$2';
$route['(:any)/Workspace'] = 'Workspace/index/$1'; 
$route['(:any)/Workspace/index'] = 'Workspace/index/$1'; 
$route['(:any)/Workspace/add'] = 'Workspace/add/$1';
$route['(:any)/Workspace/edit/(:any)'] = 'Workspace/edit/$1/$2'; 
$route['(:any)/Sitesettings'] = 'Sitesettings/index/$1'; 
$route['(:any)/Sitesettings/index'] = 'Sitesettings/index/$1'; 
$route['(:any)/Sitesettings/add'] = 'Sitesettings/add/$1'; 
$route['(:any)/Custompage'] = 'Custompage/index/$1'; 
$route['(:any)/Custompage/index'] = 'Custompage/index/$1'; 
$route['(:any)/Custompage/add'] = 'Custompage/add/$1'; 
$route['(:any)/Custompage/edit/(:any)'] = 'Custompage/edit/$1/$2';
$route['(:any)/Category'] = 'Category/index/$1'; 
$route['(:any)/Category/index'] = 'Category/index/$1'; 
$route['(:any)/Category/add'] = 'Category/add/$1'; 
$route['(:any)/Category/edit/(:any)'] = 'Category/edit/$1/$2';
$route['(:any)/Subcategory'] = 'Subcategory/index/$1'; 
$route['(:any)/Subcategory/index'] = 'Subcategory/index/$1'; 
$route['(:any)/Subcategory/add'] = 'Subcategory/add/$1'; 
$route['(:any)/Subcategory/edit/(:any)'] = 'Subcategory/edit/$1/$2';
$route['(:any)/Programs'] = 'Programs/index/$1'; 
$route['(:any)/Programs/index'] = 'Programs/index/$1'; 
$route['(:any)/Programs/add'] = 'Programs/add/$1'; 
$route['(:any)/Programs/pending'] = 'Programs/pending/$1'; 
$route['(:any)/Programs/active'] = 'Programs/active/$1'; 
$route['(:any)/Programs/inactive'] = 'Programs/inactive/$1'; 
$route['(:any)/Programs/edit/(:any)'] = 'Programs/edit/$1/$2';
$route['(:any)/Programs/basic_details/(:any)'] = 'Programs/basic_details/$1/$2';
$route['(:any)/Programs/faculty_details/(:any)'] = 'Programs/faculty_details/$1/$2';
$route['(:any)/Programs/pre_test/(:any)'] = 'Programs/pre_test/$1/$2';
$route['(:any)/Programs/add_pre_test/(:any)'] = 'Programs/add_pre_test/$1/$2';
$route['(:any)/Programs/edit_preTest/(:any)'] = 'Programs/edit_preTest/$1/$2';
$route['(:any)/Programs/post_test/(:any)'] = 'Programs/post_test/$1/$2';
$route['(:any)/Programs/add_post_test/(:any)'] = 'Programs/add_post_test/$1/$2';
$route['(:any)/Programs/edit_postTest/(:any)'] = 'Programs/edit_postTest/$1/$2';
$route['(:any)/Certificate_templates'] = 'Certificate_templates/index/$1'; 
$route['(:any)/Certificate_templates/index'] = 'Certificate_templates/index/$1'; 
$route['(:any)/Certificate_templates/add'] = 'Certificate_templates/add/$1'; 
$route['(:any)/Certificate_templates/edit/(:any)'] = 'Certificate_templates/edit/$1/$2';
$route['(:any)/Certificate_templates/view/(:any)'] = 'Certificate_templates/view/$1/$2';
$route['(:any)/Certificate_templates/generateCertificatePDF/(:any)'] = 'Certificate_templates/generateCertificatePDF/$1/$2';
$route['(:any)/Changepwd'] = 'Changepwd/index/$1'; 
$route['(:any)/Changepwd/index'] = 'Changepwd/index/$1'; 
$route['(:any)/Changepwd/updatePass'] = 'Changepwd/updatePass/$1';
$route['(:any)/Programs/add_evaluation/(:any)'] = 'Programs/add_evaluation/$1/$2';
$route['(:any)/Programs/evaluation/(:any)'] = 'Programs/evaluation/$1/$2';
$route['(:any)/Programs/edit_evaluation/(:any)'] = 'Programs/edit_evaluation/$1/$2';
$route['(:any)/Programs/CopyEval/(:any)'] = 'Programs/CopyEval/$1/$2';
$route['(:any)/Programs/faculty_video/(:any)'] = 'Programs/faculty_video/$1/$2';
$route['(:any)/Programs/add_faculty_video/(:any)'] = 'Programs/add_faculty_video/$1/$2';
$route['(:any)/Programs/edit_faculty_video/(:any)'] = 'Programs/edit_faculty_video/$1/$2';
$route['(:any)/Programs/activity/(:any)'] = 'Programs/activity/$1/$2';
$route['(:any)/Programs/add_activity/(:any)'] = 'Programs/add_activity/$1/$2';
$route['(:any)/Programs/edit_activity/(:any)'] = 'Programs/edit_activity/$1/$2';
$route['(:any)/UserPrograms'] = 'UserPrograms/index/$1'; 
$route['(:any)/UserPrograms/index'] = 'UserPrograms/index/$1';
$route['(:any)/UserPrograms/Inprogress'] = 'UserPrograms/Inprogress/$1';
$route['(:any)/UserPrograms/Completed'] = 'UserPrograms/Completed/$1';
$route['(:any)/UserPrograms/Dashboard'] = 'UserPrograms/Dashboard/$1';
$route['(:any)/UserPrograms/situation_room/(:any)/(:any)'] = 'UserPrograms/situation_room/$1/$2';
$route['(:any)/UserPrograms/view/(:any)'] = 'UserPrograms/view/$1/$2'; 
$route['(:any)/UserPrograms/pre_test/(:any)'] = 'UserPrograms/pre_test/$1/$2'; 
$route['(:any)/UserPrograms/posttest/(:any)'] = 'UserPrograms/posttest/$1/$2'; 
$route['(:any)/UserPrograms/activity/(:any)'] = 'UserPrograms/activity/$1/$2'; 
$route['(:any)/UserPrograms/evaluations/(:any)'] = 'UserPrograms/evaluations/$1/$2'; 
$route['(:any)/UserPrograms/grades/(:any)'] = 'UserPrograms/grades/$1/$2'; 
$route['(:any)/UserPrograms/answers/(:any)/(:any)'] = 'UserPrograms/answers/$1/$2/$3'; 
$route['(:any)/Users'] = 'Users/index/$1'; 
$route['(:any)/Users/index'] = 'Users/index/$1'; 
$route['(:any)/Users/add'] = 'Users/add/$1'; 
$route['(:any)/Users/edit/(:any)'] = 'Users/edit/$1/$2';*/



 

$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;
