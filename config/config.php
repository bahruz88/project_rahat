<?php

  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'bahruz_root');
  define('DB_PASSWORD', 'beyaz853');
  define('DB_DATABASE', 'hrm');
 
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  mysqli_set_charset($db,"utf8");
$company_name="HRM" ;
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
$tbl_employee_schedules='tbl_employee_schedules';												 
$tbl_position_status='tbl_position_status';
$tbl_additions_salary='tbl_additions_salary';
$tbl_place_expenditure='tbl_place_expenditure';
$tbl_salary_info='tbl_salary_info';
$tbl_reward_period='tbl_reward_period';
$tbl_currency='tbl_currency';
$tbl_terms_employment_contract='tbl_terms_employment_contract';
$tbl_dates='tbl_dates';
$tbl_workplace_status='tbl_workplace_status';
$tbl_working_conditions='tbl_working_conditions';
$tbl_additions_deductions_salary='tbl_additions_deductions_salary';
$tbl_work_experience='tbl_work_experience';
$tbl_overtime_calc_status='tbl_overtime_calc_status';
$tbl_employee_overtimes='tbl_employee_overtimes';
$tbl_periods='tbl_periods';
$tbl_work_status='tbl_work_status';
$tbl_month='tbl_month';
$tbl_type_dismissal='tbl_type_dismissal';
$tbl_country='tbl_country';
$tbl_termination_clause='tbl_termination_clause';
$tbl_notes='tbl_notes';
$tbl_employee_exit='tbl_employee_exit';
$tbl_schedules_additional='tbl_schedules_additional';

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
$sql_dates= "select * from $tbl_dates where lang='$site_lang' ";
$sql_workplace_status= "select * from $tbl_workplace_status where lang='$site_lang' ";
$sql_working_conditions= "select * from $tbl_working_conditions where lang='$site_lang' ";
$sql_exist_not_exist= "select * from $tbl_exist_not_exist where lang='$site_lang'";

$sql_employees= "select * from $tbl_employees where  emp_status=1 ";
$sql_employee_company= "select * from $tbl_employee_company where  status=1 ";
$sql_employees_asc= "select * from $tbl_employees where  emp_status=1 ORDER BY id DESC LIMIT 1";
$sql_type_dismissal= "select * from $tbl_type_dismissal where  lang='$site_lang' ";
$sql_termination_clause= "select * from $tbl_termination_clause where  lang='$site_lang' ";
$sql_country= "select * from $tbl_country where  lang='$site_lang' ";

?>