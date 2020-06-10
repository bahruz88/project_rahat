<?php
include('session.php');
$sql_employees= "select * from $tbl_employees where  emp_status=1  and  empno=$empno ";

$sql_education = "Select  ee.*,u.uni_name,qd.qualification  from
$tbl_education  ee left  join
$tbl_universities u on ee.institution_id=u.id left  join
$tbl_qualification_dic qd on ee.qualification_id=qd.id inner  join
$tbl_employees e on e.id=ee.emp_id  where ee.edu_status =1 and  e.emp_status=1 and  e.empno=$empno";
$result_education_view = $db->query($sql_education);

$sql_skill = "
SELECT  tes.id,tes.skill_name,tes.skill_descr,te.lastname,te.firstname,te.surname
FROM $tbl_employee_skills tes  inner  join  $tbl_employees te  on tes.emp_id=te.id
where tes.skill_status =1 and  te.emp_status=1 and  te.empno=$empno";
$result_skill = $db->query($sql_skill);

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
    </style>
</head>

<body class="hold-transition sidebar-mini">
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

                                    <form id="uploadForm" action="upload.php" method="post">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="<?php echo $u_photo; ?>" alt="User profile picture" id="default">
                                        <div id="targetLayer"></div>
                                        <div id="uploadFormLayer">
                                            <input name="uid" type="hidden" class="inputFile"  value="<?php  echo $uid ; ?>"/>
                                            <input name="empno" type="hidden" class="inputFile"  value="<?php  echo $empno ; ?>"/>
                                            <label for="files" class="btn btn-primary btn-block btn-outlined">Şəkli dəyiş</label>
                                            <input id="files"  name="userImage" style="display: none" type="file">
                                            <!--                            <input name="userImage" type="file" class="inputFile" /><br/>-->
                                            <input type="submit" value="Əlavə et" class="btnSubmit" style="display:none;" />
                                        </div>
                                    </form>

                                </div>
                                <div class="clearFix"></div>

                                <h3 class="profile-username text-center"><?php  echo $login_fullname ; ?></h3>

                                <p class="text-muted text-center">Software Engineer</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <!--            <div class="card card-primary">-->
                        <!--              <div class="card-header">-->
                        <!--                <h3 class="card-title">--><?php //echo $dil["about_me"];?><!--</h3>-->
                        <!--              </div>-->
                        <!-- /.card-header -->
                        <!--              <div class="card-body">-->
                        <!--                <strong><i class="fas fa-book mr-1"></i> --><?php //echo $dil["education"];?><!--</strong>-->
                        <!---->
                        <!--                <p class="text-muted">-->
                        <!--                    --><?php
                        //                    if ($result_education_view->num_rows > 0) {
                        //                        while($row_edu = $result_education_view->fetch_assoc()) {
                        //
                        //                            ?>
                        <!--                            --><?php //echo $row_edu['uni_name']. ' ' .$row_edu['faculty']. ' ' .$row_edu['profession']. ' (' .$row_edu['qualification'].')';  ?>
                        <!--                        --><?php //} }?>
                        <!--                  B.S. in Computer Science from the University of Tennessee at Knoxville-->
                        <!--                </p>-->
                        <!---->
                        <!--                <hr>-->
                        <!---->
                        <!--                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>-->
                        <!---->
                        <!--                <p class="text-muted">Malibu, California</p>-->
                        <!---->
                        <!--                <hr>-->
                        <!---->
                        <!--                <strong><i class="fas fa-pencil-alt mr-1"></i> --><?php //echo $dil["skills"];?><!--</strong>-->
                        <!---->
                        <!--                <p class="text-muted">-->
                        <!--                    --><?php
                        //                    if ($result_skill->num_rows > 0) {
                        //                        while($row_skill = $result_skill->fetch_assoc()) {
                        //
                        //                            ?>
                        <!--                            <span class="tag tag-danger"> --><?php //echo $row_skill['skill_name']; ?><!--</span>-->
                        <!---->
                        <!--                        --><?php //} }?>
                        <!--                </p>-->
                        <!---->
                        <!--                <hr>-->
                        <!---->
                        <!--                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>-->
                        <!---->
                        <!--                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>-->
                        <!--              </div>-->
                        <!-- /.card-body -->
                        <!--            </div>-->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li Class="nav-item"><a href="#employees"  style="border-radius:0px;color:#494e53;" class="nav-link active" role="tab" data-toggle="tab"    ><?php echo $dil["employees"];?></a></li>
                                    <li class="nav-item dropdown" >
                                        <a class="nav-link dropdown-toggle" style="border-radius:0px;color:#494e53;" data-toggle="dropdown" id="qual" href="#"     ><?php echo $dil["qualification"];?></a>
                                        <div class="dropdown-menu dropdown-menu-lg  ">
                                            <a class="dropdown-item" id="eduinfotab" href="#eduinfo" data-toggle="tab">  <?php echo $dil["education_informations"];?></a>
                                            <a class="dropdown-item" id="certtab" href="#certification" data-toggle="tab"> <?php echo $dil["certification_info"];?></a>
                                            <a class="dropdown-item" id="langtab" href="#lang" data-toggle="tab"><?php echo $dil["lang_knowledge"];?></a>
                                            <a class="dropdown-item" id="skillstab" href="#skills" data-toggle="tab"><?php echo $dil["skills"];?></a>

                                        </div>
                                    </li>
                                    <li Class="nav-item"><a href="#aileinfo" id="aileinfotab"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" >
                                            <?php echo $dil["family_information"];?> </a></li>

                                    <li Class="nav-item"><a href="#militaryInfo" id="militaryInfotab" style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" >Hərbi məlumatlar</a></li>
                                    <li Class="nav-item"><a href="#paymentSalary"  id="paymentSalarytab"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" > Ödəmə/maaş  </a></li>
                                    <li Class="nav-item"><a href="#mysqltab"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" > Struktur </a></li>
                                    <li Class="nav-item"><a href="#mysqltab"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" > Iş yeri barədə </a></li>

                                    <li class="nav-item dropdown" >
                                        <a class="nav-link dropdown-toggle" style="border-radius:0px;color:#494e53;" data-toggle="dropdown" href="#"   id="qual2"  ><?php echo $dil["other_informations"];?></a>
                                        <div class="dropdown-menu dropdown-menu-lg  ">
                                            <a class="dropdown-item" href="#drivingLicense"  id="drivingLicensetab" data-toggle="tab">Sürücülük vəsiqəsi</a>
                                            <a class="dropdown-item" href="#migrationInfo"   id="migrationInfotab" data-toggle="tab">Miqrasiya Məlumatları</a>
                                            <a class="dropdown-item" href="#medicalInfo"   id="medicalInfotab" data-toggle="tab">Tibbi məlumatlar</a>
                                            <a class="dropdown-item" href="#previousPositions"    id="previousPositionstab" data-toggle="tab">Əvvəlki iş yerləri</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
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
                                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?php echo $dil["firstname"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="lastname"><?php echo $dil["lastname"];?></label>
                                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?php echo $dil["lastname"];?>" readonly />
                                                </div>
                                            </div>

                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="email"><?php echo $dil["email"];?></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $dil["email"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="company_name"><?php echo $dil["company_name"];?></label>
                                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="<?php echo $dil["company_name"];?>" readonly />
                                                </div>
                                            </div>



                                        </div>

                                        <div class="tab-pane" id="javatab">The Java is an object-oriented programming language that was developed by James Gosling from the Sun Microsystems in 1995.</div>
                                        <div class="tab-pane" id="main_information"> main_information  </div>
                                        <div class="tab-pane" id="eduinfo">

                                            <?php
                                            if ($result_education_view->num_rows > 0) {
                                                while($row_edu = $result_education_view->fetch_assoc()) {

                                                    ?>
                                                    <div class="info"> <h4><?php echo $row_edu['uni_name']. ' ' .$row_edu['faculty']. ' ' .$row_edu['profession']. ' (' .$row_edu['qualification'].')';  ?>
                                                        </h4></div>
                                                <?php } }?>

                                        </div>
                                        <div class="tab-pane" id="certification">

                                            <table id="cert_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["training_center_name"];?></th>
                                                    <th><?php echo $dil["training_name"];?></th>
                                                    <th><?php echo $dil["training_date"];?> </th>
                                                    <th><?php echo $dil["cert_given_date"];?> </th>
                                                    <th><?php echo $dil["operation"];?> </th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="skills">
                                            <?php
                                            if ($result_skill->num_rows > 0) {
                                                while($row_skill = $result_skill->fetch_assoc()) {

                                                    ?>
                                                    <div class="info"> <h4> <?php echo $row_skill['skill_name']; ?> </h4></div>

                                                <?php } }?>


                                        </div>
                                        <div class="tab-pane" id="lang">
                                            <table id="lang_knowledge_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["language"];?></th>
                                                    <th><?php echo $dil["reading"];?></th>
                                                    <th><?php echo $dil["speaking"];?></th>
                                                    <th><?php echo $dil["writing"];?></th>
                                                    <th><?php echo $dil["understanding"];?></th>
                                                    <th><?php echo $dil["operation"];?></th>
                                                </tr>
                                                </thead>
                                            </table>

                                        </div>
                                        <div class="tab-pane" id="aileinfo">
                                            <table id="faminfo_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["family_member_name"];?></th>
                                                    <th><?php echo $dil["family_member_type"];?></th>
                                                    <th><?php echo $dil["family_member_phone"];?></th>
                                                    <th><?php echo $dil["family_member_adress"];?></th>
                                                    <th><?php echo $dil["operation"];?></th>
                                                </tr>
                                                </thead>
                                            </table>

                                        </div>

                                        <!--<div class="tab-pane" id="herbi">HERBI  MELUMATLAR</div>-->
                                        <div class="tab-pane" id="militaryInfo">
                                            <table id="military_info_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["military_registration_group"];?></th>
                                                    <th><?php echo $dil["military_registration_category"];?></th>
                                                    <th><?php echo $dil["military_staff"];?></th>
                                                    <th><?php echo $dil["military_rank"];?></th>
                                                    <th><?php echo $dil["military_specialty_accounting"];?></th>
                                                    <th><?php echo $dil["military_fitness_service"];?></th>
                                                    <th><?php echo $dil["military_registration_service"];?></th>
                                                    <th><?php echo $dil["military_registration_date"];?></th>
                                                    <th><?php echo $dil["military_general"];?></th>
                                                    <th><?php echo $dil["military_special"];?></th>
                                                    <th><?php echo $dil["military_no_official"];?></th>
                                                    <th><?php echo $dil["military_additional_information"];?></th>
                                                    <th><?php echo $dil["military_date_completion"];?></th>
                                                    <th><?php echo $dil["operation"];?></th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="paymentSalary">
                                            <table id="payment_salary_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["payment_wage"];?></th>
                                                    <th><?php echo $dil["payment_addition_salary"];?></th>
                                                    <th><?php echo $dil["payment_addition_salary2"];?></th>
                                                    <th><?php echo $dil["payment_total_monthly_salary"];?></th>
                                                    <th><?php echo $dil["payment_prize_amount"];?></th>
                                                    <th><?php echo $dil["payment_reward_period"];?></th>
                                                    <th><?php echo $dil["payment_place_expenditure"];?></th>
                                                    <th><?php echo $dil["payment_salary_payment_day"];?></th>
                                                    <th><?php echo $dil["payment_parties_agree_payment_wages"];?></th>
                                                    <th><?php echo $dil["operation"];?></th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="drivingLicense">
                                            <table id="driving_info_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["driving_serial_number_card"];?></th>
                                                    <th><?php echo $dil["driving_category"];?></th>
                                                    <th><?php echo $dil["driving_licensing_authority"];?></th>
                                                    <th><?php echo $dil["driving_date_issue_card"];?></th>
                                                    <th><?php echo $dil["driving_period_validity"];?></th>
                                                    <th><?php echo $dil["operation"];?></th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="migrationInfo">
                                            <table id="migration_info_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["trp_seria_number"];?></th>
                                                    <th><?php echo $dil["trp_permit_reason"];?></th>
                                                    <th><?php echo $dil["trp_permit_date"];?></th>
                                                    <th><?php echo $dil["trp_valid_date"];?></th>
                                                    <th><?php echo $dil["trp_issuer"];?></th>
                                                    <th><?php echo $dil["prp_seria_number"];?></th>
                                                    <th><?php echo $dil["prp_permit_date"];?></th>
                                                    <th><?php echo $dil["prp_valid_date"];?></th>
                                                    <th><?php echo $dil["prp_issuer"];?></th>
                                                    <th><?php echo $dil["wp_seria_number"];?></th>
                                                    <th><?php echo $dil["wp_permit_date"];?></th>
                                                    <th><?php echo $dil["wp_valid_date"];?></th>
                                                    <th><?php echo $dil["operation"];?></th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="medicalInfo">
                                            <table id="medical_info_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["medical_app"];?></th>
                                                    <th><?php echo $dil["medical_renew_interval"];?></th>
                                                    <th><?php echo $dil["medical_last_renew_date"];?></th>
                                                    <th><?php echo $dil["medical_physical_deficiency"];?></th>
                                                    <th><?php echo $dil["medical_deficiency_desc"];?></th>
                                                    <th><?php echo $dil["operation"];?></th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="previousPositions">
                                            <table id="previous_positions_table" class="table table-striped  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:15px;">id</th>
                                                    <th><?php echo $dil["fio"];?></th>
                                                    <th><?php echo $dil["prev_employer"];?></th>
                                                    <th><?php echo $dil["date_range"];?></th>
                                                    <th><?php echo $dil["leave_reason"];?></th>
                                                    <th><?php echo $dil["sector"];?></th>
                                                    <th><?php echo $dil["operation"];?></th>
                                                </tr>
                                                </thead>
                                            </table>
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
                            <!-- /.tab-pane -->


                            <!--                  <div class="tab-pane" id="settings">-->
                            <!--                    <form class="form-horizontal">-->
                            <!--                      <div class="form-group row">-->
                            <!--                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>-->
                            <!--                        <div class="col-sm-10">-->
                            <!--                          <input type="email" class="form-control" id="inputName" placeholder="Name">-->
                            <!--                        </div>-->
                            <!--                      </div>-->
                            <!--                      <div class="form-group row">-->
                            <!--                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>-->
                            <!--                        <div class="col-sm-10">-->
                            <!--                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">-->
                            <!--                        </div>-->
                            <!--                      </div>-->
                            <!--                      <div class="form-group row">-->
                            <!--                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>-->
                            <!--                        <div class="col-sm-10">-->
                            <!--                          <input type="text" class="form-control" id="inputName2" placeholder="Name">-->
                            <!--                        </div>-->
                            <!--                      </div>-->
                            <!--                      <div class="form-group row">-->
                            <!--                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>-->
                            <!--                        <div class="col-sm-10">-->
                            <!--                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>-->
                            <!--                        </div>-->
                            <!--                      </div>-->
                            <!--                      <div class="form-group row">-->
                            <!--                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>-->
                            <!--                        <div class="col-sm-10">-->
                            <!--                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">-->
                            <!--                        </div>-->
                            <!--                      </div>-->
                            <!--                      <div class="form-group row">-->
                            <!--                        <div class="offset-sm-2 col-sm-10">-->
                            <!--                          <div class="checkbox">-->
                            <!--                            <label>-->
                            <!--                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>-->
                            <!--                            </label>-->
                            <!--                          </div>-->
                            <!--                        </div>-->
                            <!--                      </div>-->
                            <!--                      <div class="form-group row">-->
                            <!--                        <div class="offset-sm-2 col-sm-10">-->
                            <!--                          <button type="submit" class="btn btn-danger">Submit</button>-->
                            <!--                        </div>-->
                            <!--                      </div>-->
                            <!--                    </form>-->
                            <!--                  </div>-->
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>

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
</script>
</body>
</html>
