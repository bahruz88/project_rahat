<?php
include('session.php');

if(isset($_GET['empid'])){
    $emp_id=$_GET['empid'];
}
$sql_employees= "select * from $tbl_employees where  emp_status=1  and  id=$emp_id ";
$u_photo = '';
$result_emp = $db->query($sql_employees);
if($result_emp){
    if ($result_emp->num_rows > 0) {
        while($row_users = $result_emp->fetch_assoc()) {
            $u_photo2 = $row_users['image_name'];

                $login_fullname2= $row_users['firstname'].' '.$row_users['lastname'];

        }
    }
}

 $ses_users ="select * from $tbl_users where emp_id =$emp_id ";
// echo '$ses_users='.$ses_users;
$result_users = $db->query($ses_users);
$login_session = '';

$company_id = '';
$login_fullname= '';
$login_lang = '';
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {

            $login_session = $row_users['username'];
            if($u_photo2 ==''){
                $u_photo = $row_users['u_photo'];
            }else{
                $u_photo=$u_photo2;
            }
            $company_id = $row_users['company_id'];
            $login_fullname= $row_users['firstname'].' '.$row['lastname'];
            $login_lang = $row_users['def_lang'];

        }
    }
}
if($login_fullname==''){
    $login_fullname=$login_fullname2;
    $u_photo=$u_photo2;
}



//
// $sql_education = "Select  ee.*,u.uni_name,qd.qualification  from
//$tbl_education  ee left  join
//$tbl_universities u on ee.institution_id=u.id left  join
//$tbl_qualification_dic qd on ee.qualification_id=qd.id inner  join
//$tbl_employees e on e.id=ee.emp_id  where ee.edu_status =1 and  e.emp_status=1 and  e.id=$emp_id";
//$result_education = $db->query($sql_education);
//$uni_name='';
//$faculty='';
//$profession='';
//$qualification='';
//if($result_education){
//    if ($result_education->num_rows > 0) {
//        while($row_edu = $result_education->fetch_assoc()) {
//
//            $uni_name=$row_edu['uni_name'];
//            $faculty=$row_edu['faculty'];
//            $profession=$row_edu['profession'];
//            $qualification=$row_edu['qualification'];
//        }
//    }
//}


$sql_skill = "
SELECT  tes.id,tes.skill_name,tes.skill_descr,te.lastname,te.firstname,te.surname
FROM $tbl_employee_skills tes  inner  join  $tbl_employees te  on tes.emp_id=te.id
where tes.skill_status =1 and  te.emp_status=1 and  te.id=$emp_id";
$result_skill = $db->query($sql_skill);
$skill_name=[];
$skill_descr=[];
if($result_skill){
    if ($result_skill->num_rows > 0) {
        while($row_skill = $result_skill->fetch_assoc()) {
            array_push($skill_name, $row_skill['skill_name']);
            array_push($skill_descr, $row_skill['skill_descr']);

        }
    }
}


$sql_users= "select te.* ";

if($company_id!=''){
    $sql_users.=" ,tc.company_name ";

}
$sql_users .=" from $tbl_employees te ";
if($company_id!=''){
    $sql_users.=" inner  join  $tbl_companies tc  on tc.id=$company_id ";

}
$sql_users.=" where  te.emp_status=1   and  te.id=$emp_id ";
$id = '';
$firstname = '';
$lastname = '';
$surname = '';
$reg_mail = '';
$home_tel = '';
$mob_tel ='';
$birthdate = '';
$company_name = '';
$living_address = '';
$result_users = $db->query($sql_users);
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row= $result_users->fetch_assoc()) {
            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $surname = $row['surname'];
            $reg_mail = $row['email'];
            $home_tel = $row['home_tel'];
            $mob_tel = $row['mob_tel'];
            $birthdate = $row['birth_date'];
            if($company_id!='') {
                $company_name = $row['company_name'];
            }
            $living_address = $row['living_address'];
        }
    }
}


$sql_certification= "select * 
from $tbl_certification 

where  cert_status =1   and  emp_id=$id ";

$result_certification = $db->query($sql_certification);
$training_center_name = [];
$training_name = [];
$training_date =[];
$cert_given_date = [];
if($result_certification){
    if ($result_certification->num_rows > 0) {
        while($row_skill= $result_certification->fetch_assoc()) {
            array_push($training_center_name, $row_skill['training_center_name']);
            array_push($training_name, $row_skill['training_name']);
            array_push($training_date, $row_skill['training_date']);
            array_push($cert_given_date, $row_skill['cert_given_date']);

        }
    }
}


$sql_langKnow= "select tlk.*,tl.lang_name ,tll.level_name speaking,tllr.level_name reading,tllw.level_name writing,tllu.level_name understanding 
from $tbl_language_knowledge  tlk
inner  join  $tbl_emp_lang tl  on tlk.lang_id=tl.id
inner  join  $tbl_lang_level tll  on tll.level_id=tlk.lang_speaking
inner  join  $tbl_lang_level tllr  on tllr.level_id=tlk.lang_reading
inner  join  $tbl_lang_level tllw  on tllw.level_id=tlk.lang_writing
inner  join  $tbl_lang_level tllu  on tllu.level_id=tlk.lang_understanding
where  tlk.lang_status =1   and  tlk.emp_id=$id and tll.lang_short_name='az' and tllr.lang_short_name='az' and tllw.lang_short_name='az' and tllu.lang_short_name='az' ";

$result_lang = $db->query($sql_langKnow);
$lang_name = [];
$speaking = [];
$reading = [];
$writing = [];
$understanding = [];
if($result_lang){
    if ($result_lang->num_rows > 0) {
        while($row_lang= $result_lang->fetch_assoc()) {
            array_push($lang_name, $row_lang['lang_name']);
            array_push($speaking, $row_lang['speaking']);
            array_push($reading, $row_lang['reading']);
            array_push($writing, $row_lang['writing']);
            array_push($understanding, $row_lang['understanding']);

        }
    }
}

$sql_family= "select tef.*,tf.type_desc member,ts.descr gender 
from $tbl_employee_family_info tef
inner  join  $tbl_family_member_types tf  on tef.member_type=tf.id
inner  join  $tbl_sex ts  on tef.gender=ts.id
where  tef.status =1   and  tef.emp_id=$id ";

$result_family = $db->query($sql_family);
$m_firstname = [];
$m_lastname = [];
$m_surname =[];
$gender = [];
$birth_date = [];
$contact_number = [];
$adress = [];
$member = [];
if($result_family){
    if ($result_family->num_rows > 0) {
        while($row_fam= $result_family->fetch_assoc()) {
            array_push($m_firstname, $row_fam['m_firstname']);
            array_push($m_lastname, $row_fam['m_lastname']);
            array_push($m_surname, $row_fam['m_surname']);
            array_push($gender, $row_fam['gender']);
            array_push($birth_date, $row_fam['birth_date']);
            array_push($contact_number, $row_fam['contact_number']);
            array_push($adress, $row_fam['adress']);
            array_push($member, $row_fam['member']);

        }
    }
}

$sql_militaryInfo= "select tmi.*,tmr.rank_desc,tms.staff_desc 
from $tbl_military_information tmi
inner  join  $tbl_military_rank tmr  on tmr.rank_id=tmi.military_rank
inner  join  $tbl_military_staff tms  on tms.staff_id=tmi.military_staff
 where  tmi.status =1   and  tmi.emp_id=$id ";

$result_military = $db->query($sql_militaryInfo);
$military_reg_group1 = [];
$military_reg_category1 = [];
$staff_desc1 =[];
$rank_desc1 = [];
$military_special1ty_acc1 = [];
$military_fitness_service1 = [];
$military_registration_service1 = [];
$military_registration_date1 = [];
$military_general1 = [];
$military_special1 = [];
$military_no_official1 = [];
$military_additional_information1 = [];
$military_date_completion1 = [];
if($result_military){
    if ($result_military->num_rows > 0) {
        while($row_military= $result_military->fetch_assoc()) {
            if($row_military['military_reg_category']==1){
                $military_reg_category11='Kateqoriya 1';
            }else{
                $military_reg_category11='Kateqoriya 2';
            }
            if($row_military['military_reg_group']==1){
                $military_reg_group11='Çağırışçı';
            }else{
                $military_reg_group11='Hərbi vəzifəli';
            }
            array_push($military_reg_category1, $military_reg_category11);
            array_push($military_reg_group1, $military_reg_group11);
            array_push($staff_desc1, $row_military['staff_desc']);
            array_push($rank_desc1, $row_military['rank_desc']);
            array_push($military_special1ty_acc1, $row_military['military_specialty_acc']);
            array_push($military_fitness_service1, $row_military['military_fitness_service']);
            array_push($military_registration_service1, $row_military['military_registration_service']);
            array_push($military_registration_date1, $row_military['military_registration_date']);
            array_push($military_general1, $row_military['military_general']);
            array_push($military_special1, $row_military['military_special']);
            array_push($military_no_official1, $row_military['military_no_official']);
            array_push($military_additional_information1, $row_military['military_additional_information']);
            array_push($military_date_completion1, $row_military['military_date_completion']);

        }
    }
}



$sql_drivers= "select td.*,tc.cat_desc ,tc.lang
from $tbl_employye_driver_license td
inner  join  $tbl_driver_lic_cat tc  on tc.cat_id=td.category
where  td.status=1   and  td.emp_id=$id ";
$lic_seria_number = '';
$cat_desc = '';
$lic_issuer = '';
$lic_issue_date = '';
$expire_date = '';
$result_drivers = $db->query($sql_drivers);
if($result_drivers){
    if ($result_drivers->num_rows > 0) {
        while($row= $result_drivers->fetch_assoc()) {
            $lic_seria_number = $row['lic_seria_number'];
            $cat_desc = $row['cat_desc'];
            $lic_issuer = $row['lic_issuer'];
            $lic_issue_date = $row['lic_issue_date'];
            $expire_date = $row['expire_date'];
        }
    }
}


$sql_minfo = "SELECT tmi.id,tmi.emp_id,tmi.trp_seria_number,tmi.trp_permit_reason,
 DATE_FORMAT(tmi.trp_permit_date,'%d/%m/%Y') trp_permit_date,DATE_FORMAT(tmi.trp_valid_date,'%d/%m/%Y') trp_valid_date,
 tmi.trp_issuer,tmi.prp_seria_number,DATE_FORMAT(tmi.prp_permit_date,'%d/%m/%Y') prp_permit_date,DATE_FORMAT(tmi.prp_valid_date,'%d/%m/%Y') prp_valid_date,
 tmi.prp_issuer,tmi.wp_seria_number,DATE_FORMAT(tmi.wp_permit_date,'%d/%m/%Y') wp_permit_date,DATE_FORMAT(tmi.wp_valid_date,'%d/%m/%Y') wp_valid_date,
 tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tmi.status 
FROM tbl_migration_info tmi  where tmi.status=1 and tmi.emp_id=$id";
 $trp_seria_number = '';
$trp_permit_reason = '';
$trp_permit_date = '';
$trp_valid_date = '';
$trp_issuer = '';
$prp_seria_number = '';
$prp_permit_date = '';
$prp_valid_date = '';
$prp_issuer = '';
$wp_seria_number = '';
$wp_permit_date = '';
$wp_valid_date = '';
$result_minfo = $db->query($sql_minfo);
if($result_minfo){
    if ($result_minfo->num_rows > 0) {
        while($row= $result_minfo->fetch_assoc()) {
            $trp_seria_number = $row['trp_seria_number'];
            $trp_permit_reason = $row['trp_permit_reason'];
            $trp_permit_date = $row['trp_permit_date'];
            $trp_valid_date = $row['trp_valid_date'];
            $trp_issuer = $row['trp_issuer'];
            $prp_seria_number = $row['prp_seria_number'];
            $prp_permit_date = $row['prp_permit_date'];
            $prp_valid_date = $row['prp_valid_date'];
            $prp_issuer = $row['prp_issuer'];
            $wp_seria_number = $row['wp_seria_number'];
            $wp_permit_date = $row['wp_permit_date'];
            $wp_valid_date = $row['wp_valid_date'];
        }
    }
}


$sql_miginfo = "SELECT tmi.id,tmi.emp_id,tmi.medical_app,tmi.renew_interval,
 DATE_FORMAT(tmi.last_renew_date,'%d/%m/%Y') last_renew_date,tmi.physical_deficiency,tmi.deficiency_desc,
 tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tmi.status,
  tEN.exist_id, tEN.exist_desc mmedical_app,tEN.lang,
  tYN.chois_id, tYN.chois_desc mphysical_deficiency,tYN.lang
FROM tbl_employee_medical_information tmi
INNER join tbl_exist_not_exist tEN on tmi.medical_app=tEN.exist_id and tEN.lang='az'
INNER join tbl_yesno tYN on tmi.physical_deficiency=tYN.chois_id and tYN.lang='az'
 where tmi.status=1   and tmi.emp_id=$id";

$medical_app = '';
$renew_interval = '';
$last_renew_date = '';
$physical_deficiency = '';
$deficiency_desc = '';
$result_miginfo = $db->query($sql_miginfo);
if($result_miginfo){
    if ($result_miginfo->num_rows > 0) {
        while($row= $result_miginfo->fetch_assoc()) {
            $medical_app = $row['mmedical_app'];
            $renew_interval = $row['renew_interval'];
            $last_renew_date = $row['last_renew_date'];
            $physical_deficiency = $row['mphysical_deficiency'];
            $deficiency_desc = $row['deficiency_desc'];
        }
    }
}


$sql_positions = "SELECT tepp.id,tepp.emp_id,tepp.prev_employer, DATE_FORMAT(tepp.start_date,'%d/%m/%Y') start_date,
DATE_FORMAT(tepp.end_date,'%d/%m/%Y') end_date,
tepp.leave_reason,tepp.sector,tepp.status,tepp.insert_date
FROM tbl_employee_prev_positions tepp 
 where tepp.status=1 and  tepp.emp_id=$id";

$prev_employer = '';
$start_date = '';
$end_date = '';
$leave_reason = '';
$sector = '';
$result_positions = $db->query($sql_positions);
if($result_positions){
    if ($result_positions->num_rows > 0) {
        while($row= $result_positions->fetch_assoc()) {
            $prev_employer = $row['prev_employer'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $leave_reason =$row['leave_reason'];
            $sector = $row['sector'];
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RahatHR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .clearFix{
            clear: both;
        }
        .info{
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
        }
        .panel{
            box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
            margin:10px;
            padding:10px;
        }
        .profile-user-img{
            width:100px;
            height:100px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <?php  include ("navbar.php")?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/rhr.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">RahatHR</span>
        </a>

        <!-- Sidebar -->
        <?php  include("main_menu.php") ?>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header)
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">User Profile</li>
    </ol>
    </div>
    </div>
    </div>
    </section>-->
        <!-- /.container-fluid -->
        <!-- Main content --><br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <?php
                                    if($u_photo==''){
                                        $u_photo = 'images/users/def.png';
                                    }?>

                                    <form id="uploadForm" action="upload.php" method="post">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="<?php echo $u_photo; ?>" alt="User profile picture" id="default">
                                        <div id="targetLayer"></div>
                                        <div id="uploadFormLayer">
                                            <input name="uid" type="hidden" class="inputFile"  value="<?php  echo $uid ; ?>"/>
                                            <input name="emp_id" type="hidden" class="inputFile"  value="<?php  echo $emp_id ; ?>"/>
                                            <label for="files" class="btn btn-primary btn-block btn-outlined">Şəkli dəyiş</label>
                                            <input id="files"  name="userImage" style="display: none" type="file">
                                            <!--                            <input name="userImage" type="file" class="inputFile" /><br/>-->
                                            <input type="submit" value="Əlavə et" class="btnSubmit" style="display:none;" />
                                        </div>
                                    </form>

                                </div>
                                <div class="clearFix"></div>

                                <h3 class="profile-username text-center"><?php  echo $login_fullname ; ?></h3>

                                <p class="text-muted text-center"><?php echo $profession; ?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b><?php echo $dil["mob_tel"];?></b> <a class="float-right"><?php echo $mob_tel; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><?php echo $dil["home_tel"];?></b> <a class="float-right"><?php echo $home_tel; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><?php echo $dil["company_name"];?></b> <a class="float-right"><?php echo $company_name; ?></a>
                                    </li>
                                </ul>

<!--                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li Class="nav-item"><a href="#employees"   class="nav-link active" role="tab" data-toggle="tab"    ><?php echo $dil["employees"];?></a></li>
                                    <li class="nav-item dropdown" id="edu" >
                                        <a class="nav-link dropdown-toggle"   data-toggle="dropdown" id="qual" href="#"     ><?php echo $dil["qualification"];?></a>
                                        <div class="dropdown-menu dropdown-menu-lg  ">
                                            <a class="dropdown-item" id="eduinfotab" href="#eduinfo" data-toggle="tab">  <?php echo $dil["education_informations"];?></a>
                                            <a class="dropdown-item" id="certtab" href="#certification" data-toggle="tab"> <?php echo $dil["certification_info"];?></a>
                                            <a class="dropdown-item" id="langtab" href="#lang" data-toggle="tab"><?php echo $dil["lang_knowledge"];?></a>
                                            <a class="dropdown-item" id="skillstab" href="#skills" data-toggle="tab"><?php echo $dil["skills"];?></a>

                                        </div>
                                    </li>
                                    <li Class="nav-item"><a href="#aileinfo" id="aileinfotab"    class="nav-link" role="tab" data-toggle="tab" >
                                            <?php echo $dil["family_information"];?> </a></li>

                                    <li Class="nav-item"><a href="#militaryInfo" id="militaryInfotab"   class="nav-link" role="tab" data-toggle="tab" >Hərbi məlumatlar</a></li>
                                    <li Class="nav-item"><a href="#paymentSalary"  id="paymentSalarytab"   class="nav-link" role="tab" data-toggle="tab" > Ödəmə/maaş  </a></li>
                                    <li Class="nav-item"><a href="#mysqltab"    class="nav-link" role="tab" data-toggle="tab" > Struktur </a></li>
                                    <li Class="nav-item"><a href="#mysqltab"    class="nav-link" role="tab" data-toggle="tab" > Iş yeri barədə </a></li>

                                    <li class="nav-item dropdown" >
                                        <a class="nav-link dropdown-toggle"   data-toggle="dropdown" href="#"   id="qual2"  ><?php echo $dil["other_informations"];?></a>
                                        <div class="dropdown-menu dropdown-menu-lg  ">
                                            <a class="dropdown-item" href="#drivingLicense"  id="drivingLicensetab" data-toggle="tab">Sürücülük vəsiqəsi</a>
                                            <a class="dropdown-item" href="#migrationInfo"   id="migrationInfotab" data-toggle="tab">Miqrasiya Məlumatları</a>
                                            <a class="dropdown-item" href="#medicalInfo"   id="medicalInfotab" data-toggle="tab">Tibbi məlumatlar</a>
                                            <a class="dropdown-item" href="#previousPositions"    id="previousPositionstab" data-toggle="tab">Əvvəlki iş yerləri</a>
                                        </div>
                                    </li>
                                   </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Tab panes -->
                                    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
                                        <div class="tab-pane active" id="employees">
                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="firstname"><?php echo $dil["firstname"];?></label>
                                                    <input type="text" class="form-control" id="firstname" value="<?php echo $firstname; ?>" name="firstname" placeholder="<?php echo $dil["firstname"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="lastname"><?php echo $dil["lastname"];?></label>
                                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>"  placeholder="<?php echo $dil["lastname"];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="surname"><?php echo $dil["surname"];?></label>
                                                    <input type="text" class="form-control" id="surname" value="<?php echo $surname; ?>" name="surname" placeholder="<?php echo $dil["surname"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="birthdate"><?php echo $dil["birth_date"];?></label>
                                                    <input type="text" class="form-control" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>"  placeholder="<?php echo $dil["birth_date"];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="living_address"><?php echo $dil["living_address"];?></label>
                                                    <input type="text" class="form-control" id="living_address" value="<?php echo $living_address; ?>" name="living_address" placeholder="<?php echo $dil["living_address"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="home_tel"><?php echo $dil["home_tel"];?></label>
                                                    <input type="text" class="form-control" id="home_tel" name="home_tel" value="<?php echo $home_tel; ?>"  placeholder="<?php echo $dil["home_tel"];?>" readonly />
                                                </div>
                                            </div>

                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="email"><?php echo $dil["email"];?></label>
                                                    <input type="email" class="form-control" id="email"  value="<?php echo $reg_mail; ?>" name="email" placeholder="<?php echo $dil["email"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="company_name"><?php echo $dil["company_name"];?></label>
                                                    <input type="text" class="form-control" id="company_name"  value="<?php echo $company_name; ?>" name="company_name" placeholder="<?php echo $dil["company_name"];?>" readonly />
                                                </div>
                                            </div>



                                        </div>

                                        <div class="tab-pane" id="javatab">The Java is an object-oriented programming language that was developed by James Gosling from the Sun Microsystems in 1995.</div>
                                        <div class="tab-pane" id="main_information"> main_information  </div>
                                        <div class="tab-pane" id="eduinfo">


                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-6 col-form-label" for="uni_name"><?php echo $dil["institution_name"];?></label>
                                                    <input type="text" class="form-control" id="uni_name" value="<?php echo $uni_name; ?>" name="uni_name" placeholder="<?php echo $dil["institution_name"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-6 col-form-label" for="faculty"><?php echo $dil["faculty"];?></label>
                                                    <input type="text" class="form-control" id="faculty" name="faculty" value="<?php echo $faculty; ?>"  placeholder="<?php echo $dil["faculty"];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-6 col-form-label" for="profession"><?php echo $dil["profession"];?></label>
                                                    <input type="text" class="form-control" id="profession" value="<?php echo $profession; ?>" name="profession" placeholder="<?php echo $dil["profession"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-6 col-form-label" for="qualification"><?php echo $dil["qualification"];?></label>
                                                    <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $qualification; ?>"  placeholder="<?php echo $dil["qualification"];?>" readonly />
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tab-pane" id="certification">

                                            <?php for($i=0;$i<count($training_center_name);$i++){?>
                                                <div class="panel">
                                                <div class="form-group  row">

                                                    <div class="col-md-6">
                                                        <label class="col-sm-8 col-form-label" for="training_center_name"><?php echo $dil["training_center_name"];?></label>
                                                        <input type="text" class="form-control" id="training_center_name" value="<?php echo $training_center_name[$i]; ?>" name="training_center_name" placeholder="<?php echo $dil["training_center_name"];?>" readonly />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-sm-8 col-form-label" for="training_name"><?php echo $dil["training_name"];?></label>
                                                        <input type="text" class="form-control" id="training_name" name="training_name" value="<?php echo $training_name[$i]; ?>"  placeholder="<?php echo $dil["training_name"];?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group  row">

                                                    <div class="col-md-6">
                                                        <label class="col-sm-8 col-form-label" for="training_date"><?php echo $dil["training_date"];?></label>
                                                        <input type="text" class="form-control" id="training_date" value="<?php echo $training_date[$i]; ?>" name="training_date" placeholder="<?php echo $dil["training_date"];?>" readonly />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-sm-8 col-form-label" for="cert_given_date"><?php echo $dil["cert_given_date"];?></label>
                                                        <input type="text" class="form-control" id="cert_given_date" name="cert_given_date" value="<?php echo $cert_given_date[$i]; ?>"  placeholder="<?php echo $dil["cert_given_date"];?>" readonly />
                                                    </div>
                                                </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="tab-pane" id="skills">
                                            <?php for($i=0;$i<count($skill_name);$i++){?>
                                            <div class="panel">

                                                <div class="form-group  row">

                                                    <div class="col-md-6">
                                                        <label class="col-sm-6 col-form-label" for="skill_name"><?php echo $dil["skills_name"];?></label>
                                                        <input type="text" class="form-control" id="skill_name" value="<?php echo $skill_name[$i]; ?>" name="skill_name" placeholder="<?php echo $dil["skills_name"];?>" readonly />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-sm-6 col-form-label" for="skill_descr"><?php echo $dil["skills_descr"];?></label>
                                                        <input type="text" class="form-control" id="skill_descr" name="skill_descr" value="<?php echo $skill_descr[$i]; ?>"  placeholder="<?php echo $dil["skills_descr"];?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>


                                        </div>
                                        <div class="tab-pane" id="lang">
                                            <?php for($i=0;$i<count($lang_name);$i++){?>
                                                <div class="panel">
                                                    <div class="form-group  row">

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="lang_name"><?php echo $dil["language"];?></label>
                                                            <input type="text" class="form-control" id="lang_name" value="<?php echo $lang_name[$i]; ?>" name="lang_name" placeholder="<?php echo $dil["language"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="speaking"><?php echo $dil["speaking"];?></label>
                                                            <input type="text" class="form-control" id="speaking" name="speaking" value="<?php echo $speaking[$i]; ?>"  placeholder="<?php echo $dil["speaking"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="reading"><?php echo $dil["reading"];?></label>
                                                            <input type="text" class="form-control" id="reading" name="reading" value="<?php echo $reading[$i]; ?>"  placeholder="<?php echo $dil["reading"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="writing"><?php echo $dil["writing"];?></label>
                                                            <input type="text" class="form-control" id="writing" name="writing" value="<?php echo $writing[$i]; ?>"  placeholder="<?php echo $dil["writing"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="understanding"><?php echo $dil["understanding"];?></label>
                                                            <input type="text" class="form-control" id="understanding" name="understanding" value="<?php echo $understanding[$i]; ?>"  placeholder="<?php echo $dil["understanding"];?>" readonly />
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php } ?>

                                        </div>
                                        <div class="tab-pane" id="aileinfo">

                                            <?php for($i=0;$i<count($m_firstname);$i++){?>
                                                <div class="panel">
                                                    <div class="form-group  row">

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="firstname"><?php echo $dil["firstname"];?></label>
                                                            <input type="text" class="form-control" id="firstname" value="<?php echo $m_firstname[$i]; ?>" name="lang_name" placeholder="<?php echo $dil["firstname"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="lastname"><?php echo $dil["lastname"];?></label>
                                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $m_lastname[$i]; ?>"  placeholder="<?php echo $dil["lastname"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="surname"><?php echo $dil["surname"];?></label>
                                                            <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $m_surname[$i]; ?>"  placeholder="<?php echo $dil["surname"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="gender"><?php echo $dil["sex"];?></label>
                                                            <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $gender[$i]; ?>"  placeholder="<?php echo $dil["sex"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="birth_date"><?php echo $dil["birth_date"];?></label>
                                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="<?php echo $birth_date[$i]; ?>"  placeholder="<?php echo $dil["birth_date"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="contact_number"><?php echo $dil["contact_number"];?></label>
                                                            <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php echo $contact_number[$i]; ?>"  placeholder="<?php echo $dil["contact_number"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="adress"><?php echo $dil["address"];?></label>
                                                            <input type="text" class="form-control" id="adress" name="adress" value="<?php echo $adress[$i]; ?>"  placeholder="<?php echo $dil["address"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="member"><?php echo $dil["family_member_type"];?></label>
                                                            <input type="text" class="form-control" id="member" name="member" value="<?php echo $member[$i]; ?>"  placeholder="<?php echo $dil["family_member_type"];?>" readonly />
                                                        </div>

                                                    </div>

                                                </div>
                                            <?php } ?>
                                        </div>

                                        <!--<div class="tab-pane" id="herbi">HERBI  MELUMATLAR</div>-->
                                        <div class="tab-pane" id="militaryInfo">
                                            <?php for($i=0;$i<count($military_reg_group1);$i++){?>
                                                <div class="panel">
                                                    <div class="form-group  row">

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_reg_group"><?php echo $dil["military_registration_group"];?></label>
                                                            <input type="text" class="form-control" id="military_reg_group" value="<?php echo $military_reg_group1[$i]; ?>" name="military_reg_group" placeholder="<?php echo $dil["military_registration_group"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_reg_category"><?php echo $dil["military_registration_category"];?></label>
                                                            <input type="text" class="form-control" id="military_reg_category" name="military_reg_category" value="<?php echo $military_reg_category1[$i]; ?>"  placeholder="<?php echo $dil["military_registration_category"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="staff_desc"><?php echo $dil["military_staff"];?></label>
                                                            <input type="text" class="form-control" id="staff_desc" name="staff_desc" value="<?php echo $staff_desc1[$i]; ?>"  placeholder="<?php echo $dil["military_staff"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="rank_desc"><?php echo $dil["military_rank"];?></label>
                                                            <input type="text" class="form-control" id="rank_desc" name="rank_desc" value="<?php echo $rank_desc1[$i]; ?>"  placeholder="<?php echo $dil["military_rank"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_specialty_acc"><?php echo $dil["military_specialty_accounting"];?></label>
                                                            <input type="text" class="form-control" id="military_specialty_acc" name="military_specialty_acc" value="<?php echo $military_special1ty_acc1[$i]; ?>"  placeholder="<?php echo $dil["military_specialty_accounting"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_fitness_service"><?php echo $dil["military_fitness_service"];?></label>
                                                            <input type="text" class="form-control" id="military_fitness_service" name="military_fitness_service" value="<?php echo $military_fitness_service1[$i]; ?>"  placeholder="<?php echo $dil["military_fitness_service"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_registration_service"><?php echo $dil["military_registration_service"];?></label>
                                                            <input type="text" class="form-control" id="military_registration_service" name="military_registration_service" value="<?php echo $military_registration_service1[$i]; ?>"  placeholder="<?php echo $dil["military_registration_service"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_registration_date"><?php echo $dil["military_registration_date"];?></label>
                                                            <input type="text" class="form-control" id="military_registration_date" name="military_registration_date" value="<?php echo $military_registration_date1[$i]; ?>"  placeholder="<?php echo $dil["military_registration_date"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_general"><?php echo $dil["military_general"];?></label>
                                                            <input type="text" class="form-control" id="military_general" name="military_general" value="<?php echo $military_general1[$i]; ?>"  placeholder="<?php echo $dil["military_general"];?>" readonly />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_special"><?php echo $dil["military_special"];?></label>
                                                            <input type="text" class="form-control" id="military_special" name="military_special" value="<?php echo $military_special1[$i]; ?>"  placeholder="<?php echo $dil["military_special"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_no_official"><?php echo $dil["military_no_official"];?></label>
                                                            <input type="text" class="form-control" id="military_no_official" name="military_no_official" value="<?php echo $military_no_official1[$i]; ?>"  placeholder="<?php echo $dil["military_no_official"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_additional_information"><?php echo $dil["military_additional_information"];?></label>
                                                            <input type="text" class="form-control" id="military_additional_information" name="military_additional_information" value="<?php echo $military_additional_information1[$i]; ?>"  placeholder="<?php echo $dil["military_additional_information"];?>" readonly />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-sm-8 col-form-label" for="military_date_completion"><?php echo $dil["military_date_completion"];?></label>
                                                            <input type="text" class="form-control" id="military_date_completion" name="military_date_completion" value="<?php echo $military_date_completion1[$i]; ?>"  placeholder="<?php echo $dil["military_date_completion"];?>" readonly />
                                                        </div>

                                                    </div>


                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="tab-pane" id="paymentSalary">
<!--                                            <table id="payment_salary_table" class="table table-striped  table-bordered table-hover">-->
<!--                                                <thead>-->
<!--                                                <tr>-->
<!--                                                    <th style="width:15px;">id</th>-->
<!--                                                    <th>--><?php //echo $dil["fio"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_wage"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_addition_salary"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_addition_salary2"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_total_monthly_salary"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_prize_amount"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_reward_period"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_place_expenditure"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_salary_payment_day"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["payment_parties_agree_payment_wages"];?><!--</th>-->
<!--                                                    <th>--><?php //echo $dil["operation"];?><!--</th>-->
<!--                                                </tr>-->
<!--                                                </thead>-->
<!--                                            </table>-->
                                        </div>

                                        <div class="tab-pane" id="drivingLicense">
                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="lic_seria_number"><?php echo $dil["driving_serial_number_card"];?></label>
                                                <input type="text" class="form-control" id="lic_seria_number" value="<?php echo $lic_seria_number; ?>" name="lic_seria_number" placeholder="<?php echo $dil["driving_serial_number_card"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="cat_desc"><?php echo $dil["driving_category"];?></label>
                                                <input type="text" class="form-control" id="cat_desc" name="cat_desc" value="<?php echo $cat_desc; ?>"  placeholder="<?php echo $dil["driving_category"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="lic_issuer"><?php echo $dil["driving_licensing_authority"];?></label>
                                                <input type="text" class="form-control" id="lic_issuer" name="lic_issuer" value="<?php echo $lic_issuer; ?>"  placeholder="<?php echo $dil["driving_licensing_authority"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="lic_issue_date"><?php echo $dil["driving_date_issue_card"];?></label>
                                                <input type="text" class="form-control" id="lic_issue_date" name="lic_issue_date" value="<?php echo $lic_issue_date; ?>"  placeholder="<?php echo $dil["driving_date_issue_card"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="expire_date"><?php echo $dil["driving_period_validity"];?></label>
                                                <input type="text" class="form-control" id="expire_date" name="expire_date" value="<?php echo $expire_date; ?>"  placeholder="<?php echo $dil["driving_period_validity"];?>" readonly />
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="migrationInfo">
                                            <div  style="padding:3px; color:#bd2130;border-left-color:#1e7e34; border-left:5px solid ;">
                                                <i class="fas  fa-check-double"   style="color:#bd2130;"><?php echo   $dil["migration_temporary_residence_permit"]; ?> </i>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="trp_seria_number"><?php echo $dil["trp_seria_number"];?></label>
                                                <input type="text" class="form-control" id="trp_seria_number" value="<?php echo $trp_seria_number; ?>" name="trp_seria_number" placeholder="<?php echo $dil["trp_seria_number"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="trp_permit_reason"><?php echo $dil["trp_permit_reason"];?></label>
                                                <input type="text" class="form-control" id="trp_permit_reason" name="trp_permit_reason" value="<?php echo $trp_permit_reason; ?>"  placeholder="<?php echo $dil["trp_permit_reason"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="trp_permit_date"><?php echo $dil["trp_permit_date"];?></label>
                                                <input type="text" class="form-control" id="trp_permit_date" name="trp_permit_date" value="<?php echo $trp_permit_date; ?>"  placeholder="<?php echo $dil["trp_permit_date"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="trp_valid_date"><?php echo $dil["trp_valid_date"];?></label>
                                                <input type="text" class="form-control" id="trp_valid_date" name="trp_valid_date" value="<?php echo $trp_valid_date; ?>"  placeholder="<?php echo $dil["trp_valid_date"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="trp_issuer"><?php echo $dil["trp_issuer"];?></label>
                                                <input type="text" class="form-control" id="trp_issuer" name="trp_issuer" value="<?php echo $trp_issuer; ?>"  placeholder="<?php echo $dil["trp_issuer"];?>" readonly />
                                            </div>
                                            <div  style="padding:3px; color:#bd2130;border-left-color:#1e7e34; border-left:5px solid ;">
                                                <i class="fas  fa-check-double"   style="color:#bd2130;"><?php echo $dil["migration_permanent_residence_permit"];?> </i>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="prp_seria_number"><?php echo $dil["prp_seria_number"];?></label>
                                                <input type="text" class="form-control" id="prp_seria_number" name="prp_seria_number" value="<?php echo $prp_seria_number; ?>"  placeholder="<?php echo $dil["prp_seria_number"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="prp_permit_date"><?php echo $dil["prp_permit_date"];?></label>
                                                <input type="text" class="form-control" id="prp_permit_date" name="prp_permit_date" value="<?php echo $prp_permit_date; ?>"  placeholder="<?php echo $dil["prp_permit_date"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="prp_valid_date"><?php echo $dil["prp_valid_date"];?></label>
                                                <input type="text" class="form-control" id="prp_valid_date" name="prp_valid_date" value="<?php echo $prp_valid_date; ?>"  placeholder="<?php echo $dil["prp_valid_date"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="prp_issuer"><?php echo $dil["prp_issuer"];?></label>
                                                <input type="text" class="form-control" id="prp_issuer" name="prp_issuer" value="<?php echo $prp_issuer; ?>"  placeholder="<?php echo $dil["prp_issuer"];?>" readonly />
                                            </div>

                                            <div  style="padding:3px; color:#bd2130;border-left-color:#1e7e34; border-left:5px solid ;">
                                                <i class="fas  fa-check-double" right" style="color:#bd2130;"><?php echo $dil["migration_work_permit_labor_activity"]; ?> </i>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="wp_seria_number"><?php echo $dil["wp_seria_number"];?></label>
                                                <input type="text" class="form-control" id="wp_seria_number" name="wp_seria_number" value="<?php echo $wp_seria_number; ?>"  placeholder="<?php echo $dil["wp_seria_number"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="wp_permit_date"><?php echo $dil["wp_permit_date"];?></label>
                                                <input type="text" class="form-control" id="wp_permit_date" name="wp_permit_date" value="<?php echo $wp_permit_date; ?>"  placeholder="<?php echo $dil["wp_permit_date"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="wp_valid_date"><?php echo $dil["wp_valid_date"];?></label>
                                                <input type="text" class="form-control" id="wp_valid_date" name="trp_issuer" value="<?php echo $wp_valid_date; ?>"  placeholder="<?php echo $dil["wp_valid_date"];?>" readonly />
                                            </div>


                                        </div>
                                        <div class="tab-pane" id="medicalInfo">

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="medical_app"><?php echo $dil["medical_app"];?></label>
                                                <input type="text" class="form-control" id="medical_app" value="<?php echo $medical_app; ?>" name="medical_app" placeholder="<?php echo $dil["medical_app"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="renew_interval"><?php echo $dil["medical_renew_interval"];?></label>
                                                <input type="text" class="form-control" id="renew_interval" name="renew_interval" value="<?php echo $renew_interval; ?>"  placeholder="<?php echo $dil["medical_renew_interval"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="last_renew_date"><?php echo $dil["medical_last_renew_date"];?></label>
                                                <input type="text" class="form-control" id="last_renew_date" name="last_renew_date" value="<?php echo $last_renew_date; ?>"  placeholder="<?php echo $dil["medical_last_renew_date"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="physical_deficiency"><?php echo $dil["medical_physical_deficiency"];?></label>
                                                <input type="text" class="form-control" id="physical_deficiency" name="physical_deficiency" value="<?php echo $physical_deficiency; ?>"  placeholder="<?php echo $dil["medical_physical_deficiency"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="deficiency_desc"><?php echo $dil["medical_deficiency_desc"];?></label>
                                                <input type="text" class="form-control" id="deficiency_desc" name="deficiency_desc" value="<?php echo $deficiency_desc; ?>"  placeholder="<?php echo $dil["medical_deficiency_desc"];?>" readonly />
                                            </div>


                                        </div>
                                        <div class="tab-pane" id="previousPositions">
                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="prev_employer"><?php echo $dil["prev_employer"];?></label>
                                                <input type="text" class="form-control" id="prev_employer" value="<?php echo $prev_employer; ?>" name="prev_employer" placeholder="<?php echo $dil["prev_employer"];?>" readonly />
                                            </div>


                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="start_date"><?php echo $dil["date_range"];?></label>
                                                <input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date; ?>"  placeholder="<?php echo $dil["date_range"];?>" readonly />
                                                <input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date; ?>"  placeholder="<?php echo $dil["date_range"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="leave_reason"><?php echo $dil["leave_reason"];?></label>
                                                <input type="text" class="form-control" id="leave_reason" name="leave_reason" value="<?php echo $leave_reason; ?>"  placeholder="<?php echo $dil["leave_reason"];?>" readonly />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-8 col-form-label" for="sector"><?php echo $dil["sector"];?></label>
                                                <input type="text" class="form-control" id="sector" name="sector" value="<?php echo $sector; ?>"  placeholder="<?php echo $dil["sector"];?>" readonly />
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="bootstab">Bootstrap Content here
                                            <ul>
                                                <li>Bootstrap forms</li>
                                                <li>Bootstrap buttons</li>
                                                <li>Bootstrap navbar</li>
                                                <li>Bootstrap footer</li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="htmltab">Hypertext Markup Language</div>
                                    </div>
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <!--                    <div class="post">-->
                                        <!--                      <div class="user-block">-->
                                        <!--                        <img class="img-circle img-bordered-sm" src="dist/img/user1-128x128.jpg" alt="user image">-->
                                        <!--                        <span class="username">-->
                                        <!--                          <a href="#">Jonathan Burke Jr.</a>-->
                                        <!--                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>-->
                                        <!--                        </span>-->
                                        <!--                        <span class="description">Shared publicly - 7:30 PM today</span>-->
                                        <!--                      </div>-->
                                        <!-- /.user-block -->
                                        <!--                      <p>-->
                                        <!--                        Lorem ipsum represents a long-held tradition for designers,-->
                                        <!--                        typographers and the like. Some people hate it and argue for-->
                                        <!--                        its demise, but others ignore the hate as they create awesome-->
                                        <!--                        tools to help create filler text for everyone from bacon lovers-->
                                        <!--                        to Charlie Sheen fans.-->
                                        <!--                      </p>-->
                                        <!---->
                                        <!--                      <p>-->
                                        <!--                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>-->
                                        <!--                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>-->
                                        <!--                        <span class="float-right">-->
                                        <!--                          <a href="#" class="link-black text-sm">-->
                                        <!--                            <i class="far fa-comments mr-1"></i> Comments (5)-->
                                        <!--                          </a>-->
                                        <!--                        </span>-->
                                        <!--                      </p>-->

                                        <!--                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">-->
                                        <!--                    </div>-->
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <!--                    <div class="post clearfix">-->
                                        <!--                      <div class="user-block">-->
                                        <!--                        <img class="img-circle img-bordered-sm" src="dist/img/user2-160x160.jpg" alt="User Image">-->
                                        <!--                        <span class="username">-->
                                        <!--                          <a href="#">Sarah Ross</a>-->
                                        <!--                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>-->
                                        <!--                        </span>-->
                                        <!--                        <span class="description">Sent you a message - 3 days ago</span>-->
                                        <!--                      </div>-->
                                        <!-- /.user-block -->
                                        <!--                      <p>-->
                                        <!--                        Lorem ipsum represents a long-held tradition for designers,-->
                                        <!--                        typographers and the like. Some people hate it and argue for-->
                                        <!--                        its demise, but others ignore the hate as they create awesome-->
                                        <!--                        tools to help create filler text for everyone from bacon lovers-->
                                        <!--                        to Charlie Sheen fans.-->
                                        <!--                      </p>-->
                                        <!---->
                                        <!--                      <form class="form-horizontal">-->
                                        <!--                        <div class="input-group input-group-sm mb-0">-->
                                        <!--                          <input class="form-control form-control-sm" placeholder="Response">-->
                                        <!--                          <div class="input-group-append">-->
                                        <!--                            <button type="submit" class="btn btn-danger">Send</button>-->
                                        <!--                          </div>-->
                                        <!--                        </div>-->
                                        <!--                      </form>-->
                                        <!--                    </div>-->
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <!--                    <div class="post">-->
                                        <!--                      <div class="user-block">-->
                                        <!--                        <img class="img-circle img-bordered-sm" src="dist/img/user6-128x128.jpg" alt="User Image">-->
                                        <!--                        <span class="username">-->
                                        <!--                          <a href="#">Adam Jones</a>-->
                                        <!--                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>-->
                                        <!--                        </span>-->
                                        <!--                        <span class="description">Posted 5 photos - 5 days ago</span>-->
                                        <!--                      </div>-->
                                        <!-- /.user-block -->
                                        <!--                      <div class="row mb-3">-->
                                        <!--                        <div class="col-sm-6">-->
                                        <!--                          <img class="img-fluid" src="dist/img/photo1.png" alt="Photo">-->
                                        <!--                        </div>-->
                                        <!-- /.col -->
                                        <!--                        <div class="col-sm-6">-->
                                        <!--                          <div class="row">-->
                                        <!--                            <div class="col-sm-6">-->
                                        <!--                              <img class="img-fluid mb-3" src="dist/img/photo2.png" alt="Photo">-->
                                        <!--                              <img class="img-fluid" src="dist/img/photo3.jpg" alt="Photo">-->
                                        <!--                            </div>-->
                                        <!-- /.col -->
                                        <!--                            <div class="col-sm-6">-->
                                        <!--                              <img class="img-fluid mb-3" src="dist/img/photo4.jpg" alt="Photo">-->
                                        <!--                              <img class="img-fluid" src="dist/img/photo1.png" alt="Photo">-->
                                        <!--                            </div>-->
                                        <!-- /.col -->
                                        <!--                          </div>-->
                                        <!-- /.row -->
                                        <!--                        </div>-->
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!--                      <p>-->
                                    <!--                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>-->
                                    <!--                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>-->
                                    <!--                        <span class="float-right">-->
                                    <!--                          <a href="#" class="link-black text-sm">-->
                                    <!--                            <i class="far fa-comments mr-1"></i> Comments (5)-->
                                    <!--                          </a>-->
                                    <!--                        </span>-->
                                    <!--                      </p>-->

                                    <!--                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">-->
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <!--                      <div class="time-label">-->
                                    <!--                        <span class="bg-danger">-->
                                    <!--                          10 Feb. 2014-->
                                    <!--                        </span>-->
                                    <!--                      </div>-->
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="fas fa-envelope bg-primary"></i>-->
                                    <!---->
                                    <!--                        <div class="timeline-item">-->
                                    <!--                          <span class="time"><i class="far fa-clock"></i> 12:05</span>-->
                                    <!---->
                                    <!--                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>-->
                                    <!---->
                                    <!--                          <div class="timeline-body">-->
                                    <!--                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,-->
                                    <!--                            weebly ning heekya handango imeem plugg dopplr jibjab, movity-->
                                    <!--                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle-->
                                    <!--                            quora plaxo ideeli hulu weebly balihoo...-->
                                    <!--                          </div>-->
                                    <!--                          <div class="timeline-footer">-->
                                    <!--                            <a href="#" class="btn btn-primary btn-sm">Read more</a>-->
                                    <!--                            <a href="#" class="btn btn-danger btn-sm">Delete</a>-->
                                    <!--                          </div>-->
                                    <!--                        </div>-->
                                    <!--                      </div>-->
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="fas fa-user bg-info"></i>-->
                                    <!---->
                                    <!--                        <div class="timeline-item">-->
                                    <!--                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>-->
                                    <!---->
                                    <!--                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request-->
                                    <!--                          </h3>-->
                                    <!--                        </div>-->
                                    <!--                      </div>-->
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="fas fa-comments bg-warning"></i>-->
                                    <!---->
                                    <!--                        <div class="timeline-item">-->
                                    <!--                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>-->
                                    <!---->
                                    <!--                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>-->
                                    <!---->
                                    <!--                          <div class="timeline-body">-->
                                    <!--                            Take me to your leader!-->
                                    <!--                            Switzerland is small and neutral!-->
                                    <!--                            We are more like Germany, ambitious and misunderstood!-->
                                    <!--                          </div>-->
                                    <!--                          <div class="timeline-footer">-->
                                    <!--                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>-->
                                    <!--                          </div>-->
                                    <!--                        </div>-->
                                    <!--                      </div>-->
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <!--                      <div class="time-label">-->
                                    <!--                        <span class="bg-success">-->
                                    <!--                          3 Jan. 2014-->
                                    <!--                        </span>-->
                                    <!--                      </div>-->
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="fas fa-camera bg-purple"></i>-->
                                    <!---->
                                    <!--                        <div class="timeline-item">-->
                                    <!--                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>-->
                                    <!---->
                                    <!--                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>-->
                                    <!---->
                                    <!--                          <div class="timeline-body">-->
                                    <!--                            <img src="http://placehold.it/150x100" alt="...">-->
                                    <!--                            <img src="http://placehold.it/150x100" alt="...">-->
                                    <!--                            <img src="http://placehold.it/150x100" alt="...">-->
                                    <!--                            <img src="http://placehold.it/150x100" alt="...">-->
                                    <!--                          </div>-->
                                    <!--                        </div>-->
                                    <!--                      </div>-->
                                    <!-- END timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="far fa-clock bg-gray"></i>-->
                                    <!--                      </div>-->
                                </div>
                            </div>

                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->

        </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php  include ("footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">

    $(document).ready(function (e) {
        $(document).on('change', '#files', function () {
            console.log('on change')
            $("#uploadForm").submit();
        })

        $("#uploadForm").on('submit',(function(e) {
            console.log('on submit')
            e.preventDefault();
            $.ajax({
                url: "upload.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $('#default').css('display','none')
                    $("#targetLayer").html(data);

                },
                error: function()
                {
                }
            });
        }));




    });
    var atextEdu=$('#qual').text()
    var atextOther=$('#qual2').text()
    $(".dropdown-menu").on("click", "a", function () {
        console.log('sdsfsdf')
        var item=$(this).text();
        var parentId=$(this).closest('li').find('.dropdown-toggle').attr('id')
        if(parentId=='qual'){
            $(this).closest('li').find('a.nav-link').html(atextEdu+'/'+item)
            $('#qual2').text(atextOther)

        }else{
            $(this).closest('li').find('a.nav-link').html(atextOther+'/'+item)
            $('#qual').text(atextEdu)
        }
    })
    // $('#edu').on('change', function() {
    //     console.log('sss')
    // });
    // $("#eduinfotab").on('click',(function(e) {
    //     console.log('salam='+$(this).closest('li').find('a').text())
    //     $(this).closest('li').find('a').append('/salam')
    //     console.log('salam2='+$(this).closest('li').find('a').text())
    // });
</script>

<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
</body>
</html>
