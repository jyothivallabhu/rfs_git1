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
$route['default_controller'] = 'login';

$route['mentor_login'] = 'login/index/$1';
$route['mentor_login/login'] = 'login/index/$1';
$route['mentor_login/Login'] = 'login/index/$1';
$route['(:any)/login'] = 'login/index/$1'; 
$route['(:any)/login/index'] = 'login/index/$1';
$route['(:any)/Login/check_login'] = 'Login/check_login/$1'; 



$route['logout'] = 'Logout/index/$1'; 
$route['mentor_login/logout'] = 'Logout/index/$1'; 
$route['(:any)/logout'] = 'Logout/index/$1'; 
$route['(:any)/Logout'] = 'Logout/index/$1'; 
$route['(:any)/Forgotpwd'] = 'Forgotpwd/index/$1'; 


$route['school_dashboard/(:any)'] = 'school_dashboard/index/$1'; 
$route['(:any)/school_dashboard'] = 'school_dashboard/school_dashboard/$1'; 

$route['get_help'] = 'get_help/index/$1'; 
$route['(:any)/get_help'] = 'get_help/index/$1'; 
$route['get_help_list'] = 'get_help/get_help_list/$1'; 


$route['(:any)/parents/import_parents'] = 'parents/import_parents/$1'; 
$route['(:any)/parents/add_parents'] = 'parents/add_parents/$1';  

$route['sitesettings'] = 'sitesettings/index/$1'; 
$route['(:any)/sitesettings'] = 'sitesettings/index/$1'; 



$route['school_admins/save_school_admin'] = 'school_admins/save_school_admin/$1'; 
$route['school_admins/del'] = 'school_admins/del/$1'; 
$route['school_admins/(:any)'] = 'school_admins/index/$1'; 

$route['(:any)/school_admins'] = 'school_admins/index/$1'; 

$route['school_management/save_user'] = 'school_management/save_user/$1'; 
$route['school_management/del'] = 'school_management/del/$1'; 
$route['school_management/(:any)'] = 'school_management/index/$1'; 
$route['(:any)/school_management/add_user'] = 'school_management/add_user/$1'; 
$route['(:any)/school_management/save_user'] = 'school_management/save_user/$1'; 
$route['(:any)/school_management/del'] = 'school_management/del/$1'; 
$route['(:any)/school_management'] = 'school_management/index/$1'; 

$route['(:any)/school_admins'] = 'school_admins/index/$1'; 
$route['(:any)/school_admins/add'] = 'school_admins/add/$1'; 
$route['(:any)/school_admins/edit/(:any)'] = 'school_admins/edit/$1/$2';

$route['school_mentors/del'] = 'school_mentors/del/$1'; 
$route['school_mentors/save_school_mentor'] = 'school_mentors/save_school_mentor/$1'; 
$route['school_mentors/(:any)'] = 'school_mentors/index/$1'; 
$route['(:any)/school_mentors'] = 'school_mentors/index/$1'; 
$route['(:any)/school_mentors/index'] = 'school_mentors/index/$1'; 
$route['(:any)/school_mentors/add'] = 'school_mentors/add/$1'; 
$route['(:any)/school_mentors/edit/(:any)'] = 'school_mentors/edit/$1/$2';

$route['sections/del'] = 'sections/del/$1'; 
$route['sections/save_sections'] = 'sections/save_sections/$1'; 
$route['sections/(:any)'] = 'sections/index/$1'; 
$route['(:any)/sections'] = 'sections/index/$1'; 

$route['teachers/del'] = 'teachers/del/$1'; 
$route['teachers/save_school_teachers'] = 'teachers/save_school_teachers/$1'; 
$route['(:any)/teachers/save_school_teachers'] = 'teachers/save_school_teachers/$1'; 
$route['(:any)/teachers/add'] = 'teachers/add/$1'; 
$route['(:any)/teachers/edit/(:any)'] = 'teachers/edit/$1/$2'; 
$route['(:any)/teachers/del'] = 'teachers/del/$1'; 
$route['teachers/(:any)'] = 'teachers/index/$1'; 
$route['(:any)/teachers'] = 'teachers/index/$1'; 

$route['students/getSections'] = 'students/getSections/$1'; 
$route['students/save_student'] = 'students/save_student/$1'; 
$route['students/getparentsByemailID'] = 'students/getparentsByemailID/$1'; 
$route['students/getstudentsByAdmissionNumber'] = 'students/getstudentsByAdmissionNumber/$1'; 
$route['students/update_student'] = 'students/update_student/$1'; 
$route['students/submitimport'] = 'students/submitimport/$1'; 
$route['students/del'] = 'students/del/$1'; 
$route['students/ajGetClasses'] = 'students/ajGetClasses/$1'; 
$route['students/ajGetSectionStudents'] = 'students/ajGetSectionStudents/$1'; 
$route['students/(:any)'] = 'students/index/$1'; 
$route['(:any)/students'] = 'students/index/$1'; 
$route['(:any)/students/add_students'] = 'students/add_students/$1'; 
$route['(:any)/students/import'] = 'students/import/$1'; 

$route['parents/save_parent'] = 'parents/save_parent/$1'; 
$route['parents/del'] = 'parents/del/$1'; 
$route['parents/submitimport'] = 'parents/submitimport/$1'; 
$route['allparent'] = 'parents/index/$1'; 
$route['parents/(:any)'] = 'parents/index/$1'; 
$route['(:any)/parents'] = 'parents/index/$1'; 
$route['(:any)/parents/save_parent'] = 'parents/save_parent/$1/$2';

$route['assign_lessons/del'] = 'assign_lessons/del/$1'; 
$route['assign_lessons/add'] = 'assign_lessons/add/$1'; 
$route['assign_lessons/save_lesson_ids'] = 'assign_lessons/save_lesson_ids/$1'; 
$route['assign_lessons/save_lesson_id2'] = 'assign_lessons/save_lesson_id2/$1'; 
$route['assign_lessons/(:any)'] = 'assign_lessons/index/$1'; 
$route['(:any)/assign_lessons/add'] = 'assign_lessons/add/$1'; 
$route['(:any)/assign_lessons'] = 'assign_lessons/index/$1'; 

$route['lesson_schedule/del'] = 'lesson_schedule/del/$1'; 
$route['lesson_schedule/save_data'] = 'lesson_schedule/save_data/$1'; 
$route['lesson_schedule/(:any)'] = 'lesson_schedule/index/$1'; 
$route['(:any)/lesson_schedule'] = 'lesson_schedule/index/$1'; 
$route['(:any)/lesson_schedule/add'] = 'lesson_schedule/add/$1'; 
$route['(:any)/lesson_schedule/edit'] = 'lesson_schedule/edit/$1'; 
$route['(:any)/lesson_schedule/del'] = 'lesson_schedule/del/$1'; 
$route['(:any)/lesson_schedule/save_data'] = 'lesson_schedule/save_data/$1'; 



$route['classes/save_class'] = 'classes/save_class/$1'; 
$route['classes/del'] = 'classes/del/$1'; 
$route['classes/(:any)'] = 'classes/index/$1'; 
$route['(:any)/classes'] = 'classes/index/$1';

$route['grades/save'] = 'grades/save/$1'; 
$route['grades/del'] = 'grades/del/$1'; 
$route['grades/(:any)'] = 'grades/index/$1'; 
$route['(:any)/grades'] = 'grades/index/$1';
$route['(:any)/grades/add'] = 'grades/add/$1';

$route['exam_types/save'] = 'exam_types/save/$1'; 
$route['exam_types/del'] = 'exam_types/del/$1'; 
$route['exam_types/(:any)'] = 'exam_types/index/$1'; 
$route['(:any)/exam_types'] = 'exam_types/index/$1';
$route['(:any)/exam_types/add'] = 'exam_types/add/$1';




$route['school_management/save_class'] = 'school_management/save_class/$1'; 
$route['school_management/del'] = 'school_management/del/$1'; 
$route['school_management/(:any)'] = 'school_management/index/$1'; 
$route['(:any)/school_management'] = 'school_management/index/$1';



$route['(:any)/school_mentoring'] = 'school_mentoring/index/$1';
$route['school_mentoring/(:any)'] = 'school_mentoring/index/$1';

$route['(:any)/artwork_feedback'] = 'feedback_management/artwork/$1';
$route['artwork_feedback/(:any)'] = 'feedback_management/artwork/$1';

$route['view_trial_and_mentoring/(:any)'] = 'feedback_management/view/$1';
$route['(:any)/view_trial_and_mentoring/(:any)'] = 'feedback_management/view/$1';
$route['(:any)/trail_feedback'] = 'feedback_management/trial_and_mentoring/$1';
$route['trail_feedback/(:any)'] = 'feedback_management/trial_and_mentoring/$1';

$route['section_artwork/(:any)'] = 'feedback_management/view_artwork/$1';
$route['(:any)/section_artwork/(:any)'] = 'feedback_management/view_artwork/$1';
$route['(:any)/mentoring_feedback'] = 'feedback_management/trial_and_mentoring/$1';
$route['mentoring_feedback/(:any)'] = 'feedback_management/trial_and_mentoring/$1';


$route['(:any)/monthlymentoring'] = 'feedback_management/trial_and_mentoring/$1';
$route['monthlymentoring/(:any)'] = 'feedback_management/trial_and_mentoring/$1';


$route['activities/add'] = 'activities/add/$1';
$route['activities/del'] = 'activities/del/$1';
$route['activities/save'] = 'activities/save/$1';
$route['(:any)/activities'] = 'activities/index/$1';
$route['(:any)/activities/add'] = 'activities/add/$1';
$route['activities/(:any)'] = 'activities/index/$1';

$route['(:any)/libary'] = 'libary/index/$1'; 

$route['(:any)/teacher_dashboard'] = 'teacher_dashboard/dashboard/$1'; 
$route['(:any)/ajNotificationList'] = 'Notifications/ajNotificationList/$1'; 
$route['teacher_dashboard/ajNotificationList'] = 'teacher_dashboard/ajNotificationList/$1'; 

$route['(:any)/teacher_students/getAll'] = 'teacher_students/getAll/$1'; 
$route['(:any)/assigned_sections'] = 'teacher_assigned_sections/index'; 
$route['(:any)/teacher_artwork'] = 'Teacher_artwork/index/$1'; 

$route['(:any)/teacher_trial'] = 'teacher_trial/index/$1'; 
$route['(:any)/add_teacher_trial'] = 'teacher_trial/add/$1/$2'; 
$route['(:any)/add_teacher_trial/(:any)/(:any)'] = 'teacher_trial/add/$1/$2'; 
$route['(:any)/teacher_triallessonwise'] = 'teacher_trial/teacher_triallessonwise2/$1/$2'; 
$route['(:any)/teacher_triallessonwise2'] = 'teacher_trial/teacher_triallessonwise2/$1/$2'; 
$route['(:any)/teacher_triallessonwise/(:any)/(:any)'] = 'teacher_trial/teacher_triallessonwise/$1/$2'; 
$route['(:any)/view_teacher_trial/(:any)'] = 'teacher_trial/view/$1'; 
$route['(:any)/edit_teacher_trial/(:any)'] = 'teacher_trial/edit/$1'; 

$route['(:any)/teacher_mentoring'] = 'teacher_continuous_mentoring/index2/$1'; 
$route['(:any)/teacher_mentoring2'] = 'teacher_continuous_mentoring/index2/$1'; 
$route['(:any)/teacher_mentoring/add'] = 'teacher_continuous_mentoring/add/$1'; 
$route['(:any)/teacher_mentoring/add_cmentoring'] = 'teacher_continuous_mentoring/add2/$1'; 
$route['(:any)/view_mentoring/(:any)'] = 'teacher_continuous_mentoring/view/$1'; 
$route['(:any)/edit_mentoring/(:any)'] = 'teacher_continuous_mentoring/edit/$1'; 

$route['(:any)/teacher_monthly_mentoring'] = 'teacher_monthly_mentoring/index/$1'; 
$route['(:any)/view_monthlymentoring/(:any)'] = 'teacher_monthly_mentoring/view/$1'; 

$route['mentor_dashboard'] = 'mentor_dashboard/dashboard/$1'; 
$route['mentor_schools'] = 'mentor_schools/index/$1'; 
$route['mentor_trails'] = 'mentor_trails/index/$1'; 
$route['view_mentor_trial/(:any)'] = 'mentor_trails/view/$1'; 
$route['mentor_continuous_mentoring'] = 'mentor_continuous_mentoring/index/$1'; 
$route['view_continuous_mentoring/(:any)'] = 'mentor_continuous_mentoring/view/$1'; 
$route['view_monthlymentoring/(:any)'] = 'mentor_monthly_mentoring/view/$1'; 
$route['mentor_monthly_mentoring'] = 'mentor_monthly_mentoring/index/$1'; 
$route['edit_monthlymentoring/(:any)'] = 'mentor_monthly_mentoring/edit/$1'; 

$route['(:any)/teacher_students/(:any)'] = 'teacher_students/index/$1'; 
$route['(:any)/teacher_students/(:any)/(:any)'] = 'teacher_students/index/$1'; 
$route['(:any)/view_students/(:any)'] = 'teacher_students/view_students/$1'; 

$route['(:any)/teacher_artwork/save_feedback'] = 'teacher_artwork/view/$1'; 
$route['(:any)/view_artwork/(:any)'] = 'teacher_artwork/view/$1'; 
$route['(:any)/section_artwork/(:any)/(:any)'] = 'teacher_artwork/section_artwork/$1/$2'; 
$route['(:any)/teacher_artwork/(:any)/(:any)'] = 'teacher_artwork/lessonclass_wise/$1/$2'; 

$route['(:any)/view_lesson/(:any)'] = 'lessons/view_lesson/$1/$2';
$route['(:any)/lessons_view/(:any)'] = 'Teacher_lessons/view_lesson/$1/$2';
$route['(:any)/teacher_lessonslist'] = 'teacher_lessons/teacher_lessonslist2/$1';
$route['(:any)/teacher_lessonslist2'] = 'teacher_lessons/teacher_lessonslist/$1';
$route['(:any)/teacher_lessons'] = 'teacher_lessons/index/$1';
$route['(:any)/sectionwiselessons/(:any)'] = 'teacher_lessons/sectionwiselessons/$1';
$route['(:any)/edit_schedule/(:any)'] = 'teacher_lessons/edit_schedule/$1';

$route['mentor/changepwd'] = 'Change_password/index/$1';
$route['(:any)/changepwd'] = 'Change_password/index/$1';
$route['grade_entry/create'] = 'grade_entry/create/$1';
$route['view_gradereport/(:any)'] = 'grade_entry/view_gradereport/$1';
$route['view_gradereportpdf'] = 'grade_entry/view_gradereportpdf/$1';
$route['view_gradereportpdf/(:any)'] = 'grade_entry/view_gradereportpdf/$1';
$route['get_grade_entry_students/(:any)'] = 'grade_entry/get_grade_entry_students/$1';
$route['(:any)/get_grade_entry_students'] = 'grade_entry/get_grade_entry_students/$1';
$route['(:any)/view_gradereport/(:any)'] = 'grade_entry/view_gradereport/$1';
$route['(:any)/view_gradereportpdf'] = 'grade_entry/view_gradereportpdf/$1';
$route['(:any)/view_gradereportpdf/(:any)'] = 'grade_entry/view_gradereportpdf/$1';
$route['grade_entry/save_bulk_entry'] = 'grade_entry/save_bulk_entry/$1';
$route['grade_entry/create_bulk_entry_step1'] = 'grade_entry/create_bulk_entry_step1/$1';
$route['(:any)/bulk_grade_entry/create_bulk_entry'] = 'grade_entry/create_bulk_entry/$1';
$route['(:any)/bulk_grade_entry'] = 'grade_entry/bulk_grade_entry/$1';
$route['(:any)/grade_entry'] = 'grade_entry/index/$1';
$route['(:any)/reports'] = 'grade_entry/grade_report/$1';

$route['(:any)/faq'] = 'faq/teacher_faq/$1'; 



$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;
