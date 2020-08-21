
<?php
header("Content-Type: text/html; charset=utf-8");
include('session.php');

$sql_employees= "select * from $tbl_employees where  emp_status=1";
$sql_position_level= "select * from $tbl_position_level";
$sql_structure_level= "select * from $tbl_structure_level";



//roles
$sql_structure_roles= "select * from $tbl_structure_roles";
$sql_position= "select * from $tbl_employee_category";

?>
<input type="hidden" id="user_id_edit" name="user_id_edit" value="">
<input type="hidden" id="user_name" name="user_name" value="">


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>RahatHR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">-->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- This demo uses an 3rd-party, jQuery UI based context menu -->
    <link
            href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
            rel="stylesheet"
    />

    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- jquery-contextmenu (https://github.com/mar10/jquery-ui-contextmenu/) -->
    <script src="//cdn.jsdelivr.net/npm/ui-contextmenu/jquery.ui-contextmenu.min.js"></script>

    <link href="src/skin-win8/ui.fancytree.css" rel="stylesheet" />
    <script src="src/jquery.fancytree.js"></script>
    <script src="src/jquery.fancytree.dnd5.js"></script>
    <script src="src/jquery.fancytree.edit.js"></script>
    <script src="src/jquery.fancytree.gridnav.js"></script>
    <script src="src/jquery.fancytree.table.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css?v3" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>

        /* Context menu */
        .context-menu{
            display: none;
            position: absolute;
            border: 1px solid #5d6974;
            border-radius: 3px;
            width: 200px;
            background: white;
            /*box-shadow: 10px 10px 5px #5d6974;*/
            font-size: 12px;
        }

        .context-menu ul{
            list-style: none;
            padding: 2px;
        }

        .context-menu ul li{
            padding: 1px 2px;
            margin-bottom: 3px;
            color: black;
            /*font-weight: bold;*/
            /*background-color: darkturquoise;*/

        }

        .context-menu ul li:hover{
            cursor: pointer;
            color:white;
            background-color:#0d70b7;
        }
        .ui-menu {
            width: 180px;
            font-size: 63%;
        }
        .ui-menu kbd {
            /* Keyboard shortcuts for ui-contextmenu titles */
            float: right;
        }
        /* custom alignment (set by 'renderColumns'' event) */
        td.alignRight {
            text-align: right;
        }
        td.alignCenter {
            text-align: center;
        }
        td input[type="input"] {
            width: 40px;
        }
        .navbar .nav-link:not(.active):hover {
            color: #007bff;
        }
        /***/
        .modal-confirm {
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn, .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
        }
        .modal-confirm .btn-secondary {
            background: #c1c1c1;
        }
        .modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
        .treeStruk{
            min-height:300px;
            height:500px;
            overflow-x:auto;
        }
        .stTab{
            min-height:200px;
            height:400px;
            overflow-x:auto;
            overflow-y:auto;
        }
        .tab-content>.tab-pane{
            padding: 10px !important;
        }
        .tab-alt{
            background-color: #f7f7f7;
        }
        .dropdown-toggle{
            height:40px !important;
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
            <img src="dist/img/rhr.png" alt="RahatHR Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">RahatHR</span>
        </a>

        <!-- Sidebar -->
        <?php  include("main_menu.php") ?>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <br>
        <div class="col-12 col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="treeStruk">
                        <h2>STRUKTUR</h2>
                        <div class='context-menu text-left'>
                            <ul>
                                <li id="contentEdit"> &nbsp;<span> Redaktə et</span></li>
                                <!--        <li>&nbsp;<span>Delete</span></li>-->
                            </ul>
                        </div>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">


                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#" id="menyu_edit">Redaktə et </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#" id="menyu_delete">Sil  </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#" id="menyu_add">New sibling</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#" id="menyu_addChild"> New child</a>
                                    </li>
                                    <li class="nav-item">
                                                                          </li>
                                </ul>
                                <div id="companyDiv" class="row" style="width:350px;">
                                    <label class="col-sm-4 col-form-label" for="company"><?php echo $dil["company"];?></label>
                                    <div class="col-sm-8">

                                        <select data-live-search="true"  name="company" id='company'   multiple="multiple" style="display: none;" title="<?php echo $dil["selectone"];?>" class="form-control"  placeholder="<?php echo $dil["company"];?>"   >

                                            <?php
                                            $result_company = $db->query($sql_employee_company);
                                            if ($result_company->num_rows > 0) {
                                                while($row_company= $result_company->fetch_assoc()) {
                                                    ?>
                                                    <option  value="<?php echo $row_company['id']; ?>" ><?php echo $row_company['company_name'];  ?></option>
                                                <?php } }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <input type='text' value='' id='company_id'>
                        <input type='text' value='' id='company_name'>
                        <input type='hidden' value='' id='txt_id'>
                        <input type='hidden' value='' id='number_id'>
                        <!-- Small modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="butModal" style="display:none;" data-target=".bd-example-modal-lg">New</button>

                        <div class="modal fade bd-example-modal-lg text-left" tabindex="-1" id="new" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Struktur</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div  id="query">
                                            <p>Siz "Struktur" yaratmaq isteyirsiniz yoxsa "Pozisya"?</p>
                                            <div class="row TEXT-CENTER">

                                                <div class="col-md-6"><button type="button" class="btn btn-info" id="struktur">Strukur</button></div>
                                                <div class="col-md-6"><button type="button" class="btn btn-info" id="pozisya" >Pozisya</button></div>
                                            </div>
                                        </div>


                                        <div class="container" style="display: none;"  id="stQuery">
                                            <div class="form-group row" id="employeesQuery">
                                                <label class="col-sm-12 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
                                                <div class="col-sm-12"  id="employees">
                                                    <select data-live-search="true"  name="employee" id="employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
                                                        <option  value="0" >Seçin...</option>
<!--                                                        --><?php
//                                                        $result_employees_view = $db->query($sql_employees);
//                                                        if ($result_employees_view->num_rows > 0) {
//                                                            while($row_employees= $result_employees_view->fetch_assoc()) {
//
//                                                                ?>
<!--                                                                <option  value="--><?php //echo $row_employees['id']; ?><!--" >--><?php //echo utf8_encode($row_employees['firstname'])." " .utf8_encode($row_employees['lastname']);  ?><!--</option>-->
<!---->
<!--                                                            --><?php //} }?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row"  id="positionQuery">
                                                <label class="col-sm-12 col-form-label" for="position_level"><?php echo $dil["position_level"];?></label>
                                                <div class="col-sm-12">

                                                    <select data-live-search="true"  name="position_level" id="position_level"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["position_level"];?>" >
                                                        <option  value="0" >Seçin...</option>

                                                        <?php
                                                        $result_position_view = $db->query($sql_position_level);
                                                        if ($result_position_view->num_rows > 0) {
                                                            while($row_position= $result_position_view->fetch_assoc()) {

                                                                ?>
                                                                <option  value="<?php echo $row_position['id']; ?>" data-icon="<?php echo $row_position['posit_icon']; ?>"  style="background-image:url(images/icons/man2.png);"  ><?php echo  $row_position['title'];  ?></option>

                                                            <?php } }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="structureQuery">
<!--                                                <div id="companyDiv">-->
<!--                                                    <label class="col-sm-4 col-form-label" for="company">--><?php //echo $dil["company"];?><!--</label>-->
<!--                                                    <div class="col-sm-6">-->
<!--                                                        <select data-live-search="true"  name="company" id='company' title="--><?php //echo $dil["selectone"];?><!--" class="form-control selectpicker"  placeholder="--><?php //echo $dil["company"];?><!--"   >-->
<!--                                                            <option  value="" >Seçin...</option>-->
<!---->
<!--                                                            --><?php
//                                                            $result_company = $db->query($sql_employee_company);
//                                                            if ($result_company->num_rows > 0) {
//                                                                while($row_company= $result_company->fetch_assoc()) {
//                                                                    ?>
<!--                                                                    <option  value="--><?php //echo $row_company['id']; ?><!--" >--><?php //echo $row_company['company_name'];  ?><!--</option>-->
<!--                                                                --><?php //} }?>
<!--                                                        </select>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                                <label class="col-sm-12 col-form-label" for="structure_level"><?php echo $dil["structure_level"];?></label>
                                                <div class="col-sm-12">
                                                    <select data-live-search="true"  name="structure_level" id="structure_level"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["structure_level"];?>" >
                                                        <option  value="0" >Seçin...</option>
                                                        <?php
                                                        $result_structure_view = $db->query($sql_structure_level);
                                                        if ($result_structure_view->num_rows > 0) {
                                                            while($row_structure= $result_structure_view->fetch_assoc()) {

                                                                ?>
                                                                <option  value="<?php echo $row_structure['id']; ?>" ><?php echo $row_structure['title'];  ?></option>

                                                            <?php } }?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row" id="dateQuery">
                                                <label class="col-sm-12 col-form-label" for="st_create_date"><?php echo $dil["create_end_date"];?></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="st_create_date" name="st_create_date" placeholder="0000-00-00" />
                                                    <input type="text" class="form-control" id="st_end_date" name="st_end_date" placeholder="0000-00-00" />

                                                </div>
                                            </div>
                                            <div class="form-group row" id="iconQuery" style="display:none;">
                                                <label class="col-sm-12 col-form-label" for="icon"> </label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="icon" name="icon"   />
                                                </div>
                                            </div>
                                            <div class="row TEXT-CENTER"  id="confirmQuery">

                                                <div class="col-md-12"><button type="button" class="btn btn-info" id="confirm" >Təsdiq</button></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="tree">
                            <colgroup>
                                <col width="30px" />
                                <col width="50px" />
                                <col width="350px" />
                                <col width="150px" />
                                <col width="150px" />
                                <col width="150px" />
                                <col width="150px" />
                                <col width="150px" />
                            </colgroup>
                            <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th></th>
                                <th> Kod </th>
                                <th> Səviyyə </th>
                                <th> ASA </th>
                                <th>İl</th>
                                <th> Şirkət </th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody id="fancyBody">
                            <!-- Define a row template for all invariant markup: -->
                            <tr>
                                <td class="alignCenter"></td>
                                <td></td>
                                <td></td>
                                <td> </td>
                                <td><span></span>
                                    <div id="structure_level1" style="display: none;">
                                        <select data-live-search="true"  style="font-size:14px;" name="structure_level"   title="<?php echo $dil["selectone"];?>" class="form-control "  placeholder="<?php echo $dil["structure_level"];?>" >
                                            <option  value="0" >Seçin...</option>
                                            <?php
                                            $result_structure_view = $db->query($sql_structure_level);
                                            if ($result_structure_view->num_rows > 0) {
                                                while($row_structure= $result_structure_view->fetch_assoc()) {

                                                    ?>
                                                    <option  value="<?php echo $row_structure['id']; ?>" ><?php echo utf8_encode($row_structure['title']);  ?></option>

                                                <?php } }?>
                                        </select>
                                    </div>
                                    <div id="position_level1" style="display: none;">
                                        <select data-live-search="true"  style="font-size:14px;" name="position_level"   title="<?php echo $dil["selectone"];?>" class="form-control "  placeholder="<?php echo $dil["position_level"];?>" >
                                            <option  value="0" >Seçin...</option>

                                            <?php
                                            $result_position_view = $db->query($sql_position_level);
                                            if ($result_position_view->num_rows > 0) {
                                                while($row_position= $result_position_view->fetch_assoc()) {

                                                    ?>
                                                    <option  value="<?php echo $row_position['id']; ?>"  data-icon="<?php echo $row_position['posit_icon']; ?>"><?php echo utf8_encode($row_position['title']);  ?></option>

                                                <?php } }?>
                                        </select>
                                    </div>
                                </td>
                                <td> <span></span>
                                    <select data-live-search="true"  style="display: none;" name="employee" style="font-size:14px;" title="<?php echo $dil["selectone"];?>" class="form-control "  placeholder="<?php echo $dil["employee"];?>" >
                                        <option  value="0">Seçin...</option>
                                        <?php
                                        $result_employees_view = $db->query($sql_employees);
                                        if ($result_employees_view->num_rows > 0) {
                                            while($row_employees= $result_employees_view->fetch_assoc()) {
                                                ?>
                                                <option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'];  ?></option>
                                            <?php } }?>
                                    </select>

                                </td>
                                <td>
                                    <span></span>
                                    <input type="text" class="form-control"  style="font-size:14px;display: none;" name="st_create_date" placeholder="0000-00-00" />
                                    <input type="text" class="form-control"  style="font-size:14px;display: none;" name="st_end_date" placeholder="0000-00-00" />
                                    <button type="button" class="btn btn-info"  style="font-size:10px;display: none;" >+</button>
                                </td>
                                <td><span></span> </td>
                                <td> </td>

                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <!-- Button HTML (to Trigger Modal) -->
                            <a href="#deleteModal" id="deleteModalClick" class="trigger-btn" data-toggle="modal"  style="display:none;">Click to Open Confirm Modal</a>
                        </div>

                        <!-- Modal HTML -->
                        <div id="deleteModal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="material-icons">&#xE5CD;</i>
                                        </div>
                                        <h4 class="modal-title w-100">Siz əminsiniz?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Həqiqətən bu qeydləri silmək istəyirsiniz? Bu prosesi geri qaytarmaq olmaz.</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İmtina et</button>
                                        <button type="button" class="btn btn-danger" id="deleteItem">Sil</button>
                                    </div></div>
                            </div>
                        </div>
                        <pre id="sourceCode" class="prettyprint" style="display:none"></pre>
                        <!-- End_Exclude -->
                    </div>



                </div>
            </div>
        </div><div class="col-12 col-sm-6 col-lg-12">
              <div class="tabs">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li Class="nav-item"><a href="#general_info"      class="nav-link active" role="tab" data-toggle="tab" >
                                            <?php echo $dil["general_info"];?> </a>
                                    </li>
                                    <li Class="nav-item"><a href="#structure_roles"   class="nav-link" role="tab" data-toggle="tab"    ><?php echo $dil["structure_role"];?></a></li>




                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body tab-alt">
                                <!-- Tab panes -->
                                <div class="tab-content stTab" >
                                    <div class="tab-pane " id="structure_roles">
                                        <div class="form-group  row">
                                            <button type="button" class="btn btn-info" id="confirmRole" ><i class="fa fa-floppy-o fa-lg" aria-hidden="true"></i></button>

                                        </div>

                                        <div class="form-group  row">
                                            <div class="col-md-2">
                                                <label class=" col-form-label" for="roles"><?php echo $dil["structure_role"];?></label>
                                            </div>
                                            <div class="col-md-5">
                                                <select data-live-search="true"  name="roles" id="roles"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["structure_role"];?>" >
                                                    <option  value="0" >Seçin...</option>
                                                    <?php
                                                    $result_structure_roles = $db->query($sql_structure_roles);
                                                    if($result_structure_roles){
                                                        if ($result_structure_roles->num_rows > 0) {
                                                            while($row_structure_roles = $result_structure_roles->fetch_assoc()) {

                                                                ?>
                                                                <option  value="<?php echo $row_structure_roles['id']; ?>" ><?php echo  $row_structure_roles['role'];  ?></option>

                                                            <?php }
                                                        }
                                                    }?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <label class=" col-form-label" for="role_start_date"><?php echo $dil["start_date"];?></label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" style="width: 120px;" id="role_start_date" name="role_start_date" placeholder="0000-00-00" />

                                            </div>
                                        </div>
                                        <div class="form-group  row">
                                            <div class="col-md-2">
                                                <label class=" col-form-label" for="positionList"><?php echo $dil["position"];?></label>
                                            </div>
                                            <div class="col-md-5">
                                                <div id="posList">

                                                </div>

                                                <label id="fullName" class=" col-form-label"></label>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <label class=" col-form-label" for="role_end_date"><?php echo $dil["end_date"];?></label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" style="width: 120px;" class="form-control" id="role_end_date" name="role_end_date" placeholder="0000-00-00" />

                                            </div>


                                        </div>
                                        <div class="form-group  row">

                                            <div class="col-md-10">
                                                <table class="table table-striped" id="tableStructureRoles">
                                                    <thead>
                                                    <tr>
                                                        <th><strong><?php echo $dil["icon"];?></strong></th>
                                                        <th><strong><?php echo $dil["role"];?></strong></th>
                                                        <th><strong><?php echo $dil["position"];?></strong></th>

                                                        <th><strong><?php echo $dil["firstname"].' '.$dil["lastname"].' '.$dil["surname"];?></strong></th>
                                                        <th><strong><?php echo $dil["percent"];?></span></strong></th>
                                                        <th><strong><?php echo $dil["start_date"];?></span></strong></th>
                                                        <th><strong><?php echo $dil["end_date"];?></span></strong></th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>    </div>



                                        </div>
                                    </div>
                                    <div class="tab-pane active" id="general_info">


                                        <div class="panel">
                                            <div class="form-group  row">

                                                <div class="col-md-10">
                                                    <table class="table table-striped" id="tablePositions">
                                                        <thead>
                                                        <tr>
                                                            <th><strong><?php echo $dil["icon"];?></strong></th>
                                                            <th><strong><?php echo $dil["role"];?></strong></th>
                                                            <th><strong><?php echo $dil["position"];?></strong></th>

                                                            <th><strong><?php echo $dil["firstname"].' '.$dil["lastname"].' '.$dil["surname"];?></strong></th>
                                                            <th><strong><?php echo $dil["percent"];?></span></strong></th>
                                                            <th><strong><?php echo $dil["start_date"];?></span></strong></th>
                                                            <th><strong><?php echo $dil["end_date"];?></span></strong></th>
                                                         </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>    </div>



                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->


                        </div>
                    </div>
        </div>

    </div>
    <!-- /.content-wrapper -->
    <?php  include ("footer.php"); ?>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!--<script src="plugins/jquery/jquery.min.js"></script>-->
<!-- jQuery UI 1.11.4 -->
<!--<script src="plugins/jquery-ui/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


<!--<script type="text/javascript" src="js/datatables.min.js"></script>-->
<script type="text/javascript" src="dist/js/jquery.validate.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"  ></script>
<script type="text/javascript" src="dist/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="js/employee.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
    var CLIPBOARD = null;
    var myJSON;
    // var pushOldu=false;
    var idArray;
    var eventArray=[];
    var createDateParent='1900-01-01';
    var dataArray=[];
    var silArray=[];
    var event_t='';
    var tree_e=[];
    var addNew=0;
    var tree=[];
    var trList;var companyId;
    $(function() {
        //var subArray =  <?php //echo json_encode(unflattenArray($flatArray)); ?>//;
        var subArray =  [];
        //idArray =  <?php //echo json_encode($idArray); ?>//;
        idArray =  [];
        console.log('subArray $idArray=',idArray);
        console.log('subArray parent=',subArray);

        pushOldu(subArray)
        function pushOldu(subArray) {
            console.log('subArray=', subArray)
            $("#tree")
                .fancytree({
                    checkbox: true,
                    checkboxAutoHide: true,
                    titlesTabbable: true, // Add all node titles to TAB chain
                    quicksearch: true, // Jump to nodes when pressing first character
                    // source: myJSON,
                    // source: { url: "ajax-tree-products.json" },
                    source: subArray,
                    //source: SOURCE,

                    extensions: ["edit", "dnd5", "table", "gridnav"],

                    dnd5: {
                        preventVoidMoves: true,
                        preventRecursion: true,
                        autoExpandMS: 400,
                        // dragStart: function(node, data) {
                        //     return true;
                        // },
                        // dragEnter: function(node, data) {
                        //     // return ["before", "after"];
                        //     return true;
                        // },
                        // dragDrop: function(node, data) {
                        //     data.otherNode.moveTo(node, data.hitMode);
                        // },
                    },
                    edit: {
                        triggerStart: ["f2", "shift+click", "mac+enter"],
                        close: function(event, data) {
                            if (data.save && data.isNew) {
                                console.log('a1',data)
                                if(data.node.parent.data.create_date){
                                    createDateParent=data.node.parent.data.create_date;
                                }

                                eventArray=event;
                                dataArray=data;
                                $(document).on('click', '#struktur', function(e) {
                                    console.log('a2')
                                    $('#query').css('display','none')
                                    $('#stQuery').css('display','block')
                                    $('#employeesQuery').css('display','none');
                                    $('#positionQuery').css('display','none');
                                    $('#dateQuery').css('display','block')
                                    $('#confirmQuery').css('display','block')
                                    $('#structureQuery').css('display','block')
                                    $(document).off('click', '#pozisya');
                                    $(document).off('click', '#struktur');

                                });
                                $(document).on('click', '#pozisya', function(e) {
                                    console.log('a3');
                                    $('#query').css('display','none')
                                    $('#stQuery').css('display','block')
                                    $('#employeesQuery').css('display','block')
                                    $('#positionQuery').css('display','block')
                                    $('#dateQuery').css('display','block')
                                    $('#confirmQuery').css('display','block')
                                    $('#structureQuery').css('display','none')
                                    $(document).off('click', '#pozisya');
                                    $(document).off('click', '#struktur');
                                    // var company_id=$('#company_id').val();



                                    $.ajax({
                                        url: 'st_emp_select.php',
                                        type: "POST",
                                        data: { company_id:companyId},
                                        success: function (data) {
                                            console.log('data=' + data)
                                            var option='<select data-live-search="true"  name="employee" id="employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
                                            option += '<option value="">Seçin..</option>';

                                            var row = '';
                                            // $('#tablePositions').find('tbody').html('');
                                            $.each($.parseJSON(data), function(k,v) {
                                                console.log('v=',v)
                                                option += '<option value="' + v.id + '" >' + v.firstname + ' '+v.lastname + ' '+v.surname + '</option>';

                                            });
                                            option+=' </select>';
                                            console.log('option='+option)
                                            // option += '</select>';
                                            $('#employees').html(option);
                                            $(".selectpicker").selectpicker();

                                        },
                                    });


                                });
                                confirmClick(companyId);


                                // Quick-enter: add new nodes until we hit [enter] on an empty title
                                $("#tree").trigger("nodeCommand", {
                                    cmd: "addSibling",
                                });
                            }
                        },
                    },
                    table: {
                        indentation: 20,
                        nodeColumnIdx: 2,
                        checkboxColumnIdx: 0,
                    },
                    gridnav: {
                        autofocusInput: false,
                        handleCursorKeys: true,
                    },

                    lazyLoad: function(event, data) {
                        data.result = { url: "../demo/ajax-sub2.json" };
                    },
                    createNode: function(event, data) {
                        // console.log('createNode',data)

                        if(data.node.data.id){
                            $('#butModal').css('display','none');
                            $(document).off('click', '#struktur');
                            $(document).off('click', '#pozisya');
                            $('#query').css('display','block')
                            $('#employeesQuery').css('display','none')

                        }
                        var node = data.node,
                            $tdList = $(node.tr).find(">td");

                        // console.log('createNode node=',node)

                        // Span the remaining columns if it's a folder.
                        // We can do this in createNode instead of renderColumns, because
                        // the `isFolder` status is unlikely to change later
                        // if (node.isFolder()) {
                        //     $tdList
                        //         .eq(2)
                        //         .prop("colspan", 6)
                        //         .nextAll()
                        //         .remove();
                        //
                        // }
                    },
                    renderColumns: function(event, data) {

                        // console.log('renderColumns',data)
                        var node = data.node,
                            $tdList = $(node.tr).find(">td");
                            trList = $(node.tr);

                        $tdList.eq(0).text('');
                        $tdList.eq(1).text(node.data.id);
                        $(node.tr).attr('data-id',node.data.id);
                        $(node.tr).attr('data-companyId',node.data.company_id);
                        //*men
                        $tdList
                            .eq(3)
                            // .find('input')
                            .text(node.data.code);
                        if(node.data.structure){
                            $tdList
                                .eq(4)
                                .find('span')
                                .text(node.data.structure);
                            $tdList
                                .eq(4)
                                .find('select')
                                .find('option[value=' + node.data.struc_id + ']').attr('selected', 'selected');

                            $tdList
                                .eq(4)
                                .find('#structure_level1')
                                .css('display','block');
                            $tdList
                                .eq(4)
                                .find('#position_level1')
                                .css('display','none');
                        }else  if(node.data.posit){
                            // $tdList
                            //     .eq(4)
                            //     .find('span')
                            //     .text(node.data.posit);
                            $tdList
                                .eq(4)
                                .find('select')
                                .find('option[value=' + node.data.posit_id + ']').attr('selected', 'selected');
                            // .val(node.data.posit);

                            $tdList
                                .eq(4)
                                .find('#structure_level1')
                                .css('display','none');
                            $tdList
                                .eq(4)
                                .find('#position_level1')
                                .css('display','block');
                        }else{
                            $tdList
                                .eq(4)
                                .find('#structure_level1')
                                .css('display','none');
                            $tdList
                                .eq(4)
                                .find('#position_level1')
                                .css('display','none');
                        }
                        $tdList
                            .eq(4)
                            // .find('input')
                            .attr('id','idst'+node.data.id);
                        $tdList
                            .eq(4)
                            .find('input')
                            .attr('id','idstInput'+node.data.id);

                        $tdList
                            .eq(4)
                            .find('select')
                            .css('display','none');

                        // .find("input")
                        // .val(node.key);
                        $tdList
                            .eq(5)
                            .find('span')
                            .text(node.data.full_name);
                        if(node.data.emp_id){
                            $tdList
                                .eq(5)
                                .find('select')
                                .find('option[value=' + node.data.emp_id + ']').attr('selected', 'selected');
                        }

                        $tdList
                            .eq(5)
                            .find('select')
                            .css('display','none');
                        $tdList
                            .eq(5)
                            // .find('input')
                            .attr('id','idemp'+node.data.id);
                        // .find("input")
                        // .val(node.key);
                        $tdList
                            .eq(6)
                            .find('span')
                            .text(node.data.create_date+' / '+node.data.end_date);
                        $tdList
                            .eq(6)
                            // .find('input')
                            .attr('id','idyear'+node.data.id);
                        $tdList
                            .eq(6)
                            .find('input')
                            .eq(0)
                            .attr('id','idcreateInput'+node.data.id);
                        $tdList
                            .eq(6)
                            .find('input')
                            .eq(1)
                            .attr('id','idendInput'+node.data.id);
                        $tdList
                            .eq(6)
                            .find('button')
                            .attr('id','idyearButton'+node.data.id);
                        $tdList
                            .eq(6)
                            .find('button')
                            .css('display','none');
                        $tdList
                            .eq(6)
                            .find('input')
                            .css('display','none');

                        // console.log('$(\'#company_id\').val()='+$('#company_id').val())
                        if($('#company_id').val()==''){
                            console.log('company_idcompany_id='+node.data.company_ids)
                            $('#company_id').val(node.data.company_ids)
                            $('#company_name').val(node.data.company)
                        }
                        $tdList
                            .eq(7)
                            .find('span')
                            .text(node.data.company);


                        // .find("input")
                        // .val(node.data.foo);
                        // $tdList
                        // 	.eq(5)
                        // 	.find("input")
                        // 	.val(node.data.children);
                        // console.log('$tdList=',$tdList)

                        // Static markup (more efficiently defined as html row template):
                        // $tdList.eq(3).html("<input type='input' value='"  "" + "'>");
                        // ...
                        sagClick(node.data.id);
                        treeClick(trList)
                    },
                    modifyChild: function(event, data) {
                        console.log('modifyChild event.type='+event.type)
                        console.log('modifyChild data=',data)

                        data.tree.info(event.type, data);

                        if(data.operation=='add'){
                            addNew++;
                        }
                        if(data.operation=='remove'){
                            addNew++;
                        }
                        if(data.operation=='rename' && addNew==0){
                            console.log('rename',data)
                            console.log('data.cmd==',data.cmd)
                            var ID;
                            var title;

                            ID=data.childNode.data.id;
                            title=data.childNode.title;
                            console.log('ID=='+ID);
                            console.log('title=='+title);

                            $.ajax({
                                url: 'st_update.php',
                                type: "POST",
                                data: { id:ID, name:title,change:'category'},
                                success: function (data) {
                                    console.log('data=' + data)
                                    // members=$.parseJSON(data)

                                },
                            });
                        }
                        if(data.operation=='remove' && addNew==1){
                            console.log('rename sil',data)
                            console.log('rename silArray',silArray)
                            console.log('data.cmd==',data.cmd)
                            var ID;
                            var delet;

                            if(silArray.data.id){
                                ID=silArray.data.id;
                                delet="id"
                            }else {
                                ID=0
                                delet="parent"
                            }
                            console.log('ID=='+ID);
                            console.log('delet=='+delet);
                           var  company_id=companyId
                           var  company_ids='0,'+$('#company_id').val();
                            console.log('delet company_ids=='+company_ids);
                            $.ajax({
                                url: 'st_delete.php',
                                type: "POST",
                                data: {id:ID,delet:delet,company_id:company_id,company_ids:company_ids,st:"st"},
                                success: function (data) {
                                    console.log('data=' + data);
                                    if(data){

                                        tree = $('#tree').fancytree('getTree');
                                        tree.reload($.parseJSON(data));
                                    }else{
                                      $('#butModal').css('display','none');
                                        stClick();
                                        tree = $('#tree').fancytree('getTree');
                                        tree.reload([]);
                                    }

                                },
                            });
                        }
                    },
                })
                .on("nodeCommand", function(event, data) {
                    // Custom event handler that is triggered by keydown-handler and
                    // context menu:
                    var refNode,
                        moveMode,
                        tree = $.ui.fancytree.getTree(this),
                        node = tree.getActiveNode();
                    console.log('node cagirdim /////////////////////////////////////////',node)

                    switch (data.cmd) {

                        case "addChild":
                        case "addSibling":
                        case "indent":
                        case "moveDown":
                        case "moveUp":
                        case "outdent":
                        case "remove":
                        case "rename":
                            console.log('----------------tree=',node)
                            console.log('-----------------='+addNew)
                            console.log('-----------------=n'+data.cmd)
                            silArray=node;
                            event_t=data.cmd;
                            console.log('-----------------= html=',silArray)
                            console.log('-----------------= node=',node)
                            if(addNew==1){
                                $('#butModal').trigger('click');

                            }else{
                                if(data.cmd=='remove'){
                                    $('#deleteModalClick').trigger('click');
                                    $('#deleteItem').on('click',function(){
                                        // do your stuffs with id
                                        console.log('sildim',data.cmd)
                                        console.log('silArray',silArray)
                                        console.log('addNew',addNew)
                                        tree.applyCommand(data.cmd, silArray);
                                        // $("#successMessage").html("Record With id "+id+" Deleted successfully!");
                                        $('#deleteModal').modal('hide'); // now close modal
                                    })
                                }else{
                                    if(node==null ){//|| node.data.pId==null
                                        console.log("bosdur");
                                        // $('#structureQuery').find('#companyDiv').css('display','block')
                                        $('#butModal').trigger('click');
                                         stClick()

                                    }else{
                                        // $('#structureQuery').find('#companyDiv').css('display','none')
                                        tree.applyCommand(data.cmd, node);


                                    }

                                }

                            }


                            break;
                        case "cut":
                            CLIPBOARD = { mode: data.cmd, data: node };
                            break;
                        case "copy":
                            CLIPBOARD = {
                                mode: data.cmd,
                                data: node.toDict(true, function(dict, node) {
                                    delete dict.key;
                                }),
                            };
                            break;
                        case "clear":
                            CLIPBOARD = null;
                            break;
                        case "paste":
                            if (CLIPBOARD.mode === "cut") {
                                // refNode = node.getPrevSibling();
                                CLIPBOARD.data.moveTo(node, "child");
                                CLIPBOARD.data.setActive();
                            } else if (CLIPBOARD.mode === "copy") {
                                node.addChildren(
                                    CLIPBOARD.data
                                ).setActive();
                            }
                            break;
                        default:
                            alert("Unhandled command: " + data.cmd);
                            return;
                    }
                })
                .on("keydown", function(e) {
                    var cmd = null;

                    console.log("keyDown"+$.ui.fancytree.eventToString(e));
                    switch ($.ui.fancytree.eventToString(e)) {
                        case "ctrl+shift+n":
                        case "meta+shift+n": // mac: cmd+shift+n
                            cmd = "addChild";
                            break;
                        case "ctrl+c":
                        case "meta+c": // mac
                            cmd = "copy";
                            break;
                        case "ctrl+v":
                        case "meta+v": // mac
                            cmd = "paste";
                            break;
                        case "ctrl+x":
                        case "meta+x": // mac
                            cmd = "cut";
                            break;
                        case "ctrl+n":
                        case "meta+n": // mac
                            cmd = "addSibling";
                            break;
                        case "del":
                        case "meta+backspace": // mac
                            cmd = "remove";
                            break;
                        // case "f2":  // already triggered by ext-edit pluging
                        // 	cmd = "rename";
                        // 	break;
                        case "ctrl+up":
                        case "ctrl+shift+up": // mac
                            cmd = "moveUp";
                            break;
                        case "ctrl+down":
                        case "ctrl+shift+down": // mac
                            cmd = "moveDown";
                            break;
                        case "ctrl+right":
                        case "ctrl+shift+right": // mac
                            cmd = "indent";
                            break;
                        case "ctrl+left":
                        case "ctrl+shift+left": // mac
                            cmd = "outdent";
                    }
                    if (cmd) {
                        console.log('trigger')
                        $(this).trigger("nodeCommand", { cmd: cmd });
                        return false;
                    }
                });

            /*
             * Tooltips
             */
            // $("#tree").tooltip({
            // 	content: function () {
            // 		return $(this).attr("title");
            // 	}
            // });

            /*
             * Context menu (https://github.com/mar10/jquery-ui-contextmenu)
             */
            $("#tree").contextmenu({


                delegate: "span.fancytree-node",
                menu: [
                    {
                        title: "Redaktə et <kbd>[F2]</kbd>",
                        cmd: "rename",
                        uiIcon: "ui-icon-pencil",
                    },
                    {
                        title: "Sil <kbd>[Del]</kbd>",
                        cmd: "remove",
                        uiIcon: "ui-icon-trash",
                    },
                    { title: "----" },
                    {
                        title: "New sibling <kbd>[Ctrl+N]</kbd>",
                        cmd: "addSibling",
                        uiIcon: "ui-icon-plus",
                    },
                    {
                        title: "New child <kbd>[Ctrl+Shift+N]</kbd>",
                        cmd: "addChild",
                        uiIcon: "ui-icon-arrowreturn-1-e",
                    },
                    // { title: "----" },
                    // {
                    //     title: "Cut <kbd>Ctrl+X</kbd>",
                    //     cmd: "cut",
                    //     uiIcon: "ui-icon-scissors",
                    // },
                    // {
                    //     title: "Copy <kbd>Ctrl-C</kbd>",
                    //     cmd: "copy",
                    //     uiIcon: "ui-icon-copy",
                    // },
                    // {
                    //     title: "Paste as child<kbd>Ctrl+V</kbd>",
                    //     cmd: "paste",
                    //     uiIcon: "ui-icon-clipboard",
                    //     disabled: true,
                    // },
                ],
                beforeOpen: function(event, ui) {
                    console.log('before event',event)
                    // console.log('before event',$(this).html())


                    var node = $.ui.fancytree.getNode(ui.target);
                    companyId=ui.target.closest('tr').attr('data-companyId')
                    console.log('node=',node)
                    $("#tree").contextmenu(
                        "enableEntry",
                        "paste",
                        !!CLIPBOARD
                    );
                    node.setActive();
                },
                select: function(event, ui) {
                    console.log('event=',event)
                    console.log('ui=',ui);
                    addNew=0;
                    var that = this;
                    console.log('id=',$(that).attr('id'));

                    // delay the event, so the menu can close and the click event does
                    // not interfere with the edit control
                    setTimeout(function() {
                        $(that).trigger("nodeCommand", { cmd: ui.cmd });
                    }, 100);
                },
            });
        }
    });
</script>
<script src="js/structure.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="js/BsMultiSelect.js"></script>
<script>
    $("#company").bsMultiSelect({cssPatch : {
            choices: {columnCount:'1' },
        }});
</script>

</body>
</html>