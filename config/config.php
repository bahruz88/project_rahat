<?php

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'rhr');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   $tbl_users='tbl_users' ;
   $tbl_lang='tbl_site_languages' ;
   $tbl_emp_lang='tbl_languages' ;
   $tbl_roles='tbl_roles' ;
   $tbl_employees='tbl_employees' ;
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

   $sql_lang  = "select * from $tbl_lang where status=1 order  by position";
   $sql_roles = "select * from $tbl_roles where status=1 order  by position";				
   $sql_qua_dic = "select * from $tbl_qualification_dic ";
   $sql_university= "select * from $tbl_universities where status=1 ";
   $sql_emp_lang= "select * from $tbl_emp_lang ";
   $sql_yesno= "select * from $tbl_yesno ";
   $sql_exist_not_exist= "select * from $tbl_exist_not_exist ";

   $sql_employees= "select * from $tbl_employees where  emp_status=1 ";

   
?>