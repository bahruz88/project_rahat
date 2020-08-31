<?php
header('Content-type: text/html; charset=utf-8');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'rhr');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$db->set_charset('utf8');
$tbl_users='tbl_users' ;
$tbl_contracts='tbl_contracts' ;
$tbl_employee_commands='tbl_employee_commands' ;
$tbl_commands='tbl_commands' ;
$tbl_employee_category='tbl_category';
$tbl_structure_positions='tbl_structure_positions';
$tbl_position_level='tbl_position_level';
$tbl_structure_level='tbl_structure_level';
$tbl_employee_position='tbl_employee_position';
$tbl_employee_company='tbl_employee_company' ;
$tbl_lang='tbl_site_languages' ;
$tbl_emp_lang='tbl_languages' ;
$tbl_roles='tbl_roles' ;
$tbl_employees='tbl_employees' ;
$tbl_structure_roles='tbl_structure_roles';
$tbl_education='tbl_employee_education' ;
$tbl_qualification_dic='tbl_qualification_dic' ;
$tbl_universities='tbl_universities';
$tbl_lang_level='tbl_lang_level';
$tbl_certification='tbl_employee_certification';
$tbl_employee_skills='tbl_employee_skills';
$tbl_language_knowledge='tbl_language_knowledge';
$tbl_employee_family_info='tbl_employee_family_info';
$tbl_sex='tbl_sex';
$tbl_family_member_types='tbl_family_member_types';
$tbl_military_information='tbl_military_information';
$tbl_military_rank='tbl_military_rank';
$tbl_military_staff='tbl_military_staff';
$tbl_payment_salary='tbl_payment_salary';
$tbl_employye_driver_license='tbl_employye_driver_license';
$tbl_driver_lic_cat='tbl_driver_lic_cat';
$tbl_employee_medical_information='tbl_employee_medical_information';
$tbl_yesno='tbl_yesno';
$tbl_exist_not_exist='tbl_exist_not_exist';
$tbl_employee_prev_positions='tbl_employee_prev_positions';
$tbl_migration_info='tbl_migration_info';
$tbl_companies='tbl_companies';
$tbl_sch_time_managment_type='tbl_sch_time_managment_type';
$tbl_sch_schtype='tbl_sch_schtype';
$tbl_sch_reduce_from='tbl_sch_reduce_from';
$tbl_sch_reduce_reason='tbl_sch_reduce_reason';
$tbl_schedules='tbl_schedules';
$tbl_position_status='tbl_position_status';
$tbl_additions_salary='tbl_additions_salary';
$tbl_place_expenditure='tbl_place_expenditure';
$tbl_salary_info='tbl_salary_info';
$tbl_reward_period='tbl_reward_period';
$tbl_currency='tbl_currency';
$tbl_additions_deductions_salary='tbl_additions_deductions_salary';
$sql_lang  = "select * from $tbl_lang where status=1 order  by position";
$sql_roles = "select * from $tbl_roles where status=1 order  by position";
$sql_qua_dic = "select * from $tbl_qualification_dic ";
$sql_university= "select * from $tbl_universities where status=1 ";
$sql_emp_lang= "select * from $tbl_emp_lang ";
if(!isset($_SESSION['login_user'])){
    $site_lang='az' ;
}else
{
    $site_lang=$_SESSION['dil'] ;

}

$sql_yesno= "select * from $tbl_yesno where lang='$site_lang' ";
$sql_exist_not_exist= "select * from $tbl_exist_not_exist where lang='$site_lang'";

$sql_employees= "select * from $tbl_employees where  emp_status=1 ";

$sql_employee_company= "select * from $tbl_employee_company where  status=1 ";

$sql_employees_asc= "select * from $tbl_employees where  emp_status=1 ORDER BY id DESC LIMIT 1";


?>