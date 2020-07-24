
<?php

include('session.php');
$sql_employees= "select * from $tbl_employees where  emp_status=1";
$sql_position_level= "select * from $tbl_position_level";
$sql_structure_level= "select * from $tbl_structure_level";


//$users= "select * from $tbl_employee_category";
$users= "select tec.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id ,teco.company_name company,tsl.title struc,tsl.struc_id struc_id,tpl.posit_id posit_id,tpl.title posit,tpl.posit_icon 
from $tbl_employee_category tec
LEFT join $tbl_employees te on te.id=tec.emp_id 
LEFT join $tbl_employee_company teco on tec.company_id=teco.id
LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
LEFT join $tbl_position_level tpl on tpl.posit_id=tec.position_level";
//echo $users;
//$users= "select tec.*,tep.* from $tbl_employee_category tec
//INNER join $tbl_employee_position tep on tep.category_id=tec.id";
$result_users = $db->query($users);

$sub_array='';
$idArray=array();
$data = array();
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {
            $sub_array   = array();
            $idArray[]=$row_users['id'];
            $sub_array[] = $row_users['id'];
            $sub_array[] = utf8_encode($row_users['category']);
            $sub_array[] = $row_users['parent'];
            $sub_array[] = $row_users['create_date'];
            $sub_array[] = $row_users['end_date'];


            $sub_array[] = [];//children
             $sub_array[] = utf8_encode($row_users['code']);
             $sub_array[] = utf8_encode($row_users['full_name']);
            $sub_array[] = utf8_encode($row_users['company']);
           $sub_array[] = utf8_encode($row_users['struc']);
            $sub_array[] = utf8_encode($row_users['posit']);
            $sub_array[] = utf8_encode($row_users['struc_id']);
            $sub_array[] = utf8_encode($row_users['posit_id']);
            $sub_array[] = utf8_encode($row_users['emp_id']);
            $sub_array[] = $row_users['icon'];
            $sub_array[] = $row_users['posit_icon'];

            $data[]     = $sub_array;
        }
    }
}
//print_r($data);

$flatArray=$data;
unflattenArray($flatArray);
function createArray($arrC){
    $arrChil=array();
    foreach ($arrC as $arrCh)
    {
        $arrCh['id'] = $arrCh[0];
        $arrCh['title'] = $arrCh[1];
        $arrCh['pId'] = $arrCh[2];
        $arrCh['create_date'] = $arrCh[3];
        $arrCh['end_date'] = $arrCh[4];
        $arrCh['code'] = $arrCh[6];
        $arrCh['full_name'] = $arrCh[7];
        $arrCh['company'] = $arrCh[8];
        $arrCh['structure'] = $arrCh[9];
        $arrCh['posit'] = $arrCh[10];
        $arrCh['struc_id'] = $arrCh[11];
        $arrCh['posit_id'] = $arrCh[12];
        $arrCh['emp_id'] = $arrCh[13];
        $arrCh['icon'] = $arrCh[14];
        $arrCh['posit_icon'] = $arrCh[15];
        $arrCh['children'] = $arrCh[5];
        $arrCh['expanded'] = false;
        $arrCh['folder'] = true;
        if(count($arrCh[5])>0){

            $arrCh['children'] = createArray($arrCh[5]);
            unset($arrCh[0]);
            unset($arrCh[1]);
            unset($arrCh[2]);
            unset($arrCh[3]);
            unset($arrCh[4]);
            unset($arrCh[5]);
            unset($arrCh[6]);
            unset($arrCh[7]);
            unset($arrCh[8]);
            unset($arrCh[9]);
            unset($arrCh[10]);
            unset($arrCh[11]);
            unset($arrCh[12]);
            unset($arrCh[13]);
            unset($arrCh[14]);
            unset($arrCh[15]);
        }
        $arrChil[]=$arrCh;
    }
    return $arrChil;
}
function unflattenArray($flatArray)
{

    $refs = array(); //for setting children without having to search the parents in the result tree.
    $result = array();
    $arrrId = array();
    $arrrPId = array();
    $arrrId[]=0;
for ($j = 0; $j < count($flatArray); $j++) {
    $arrrId[]=$flatArray[$j][0];
    $arrrPId[]=$flatArray[$j][2];
}

    //process all elements until nohting could be resolved.
    //then add remaining elements to the root one by one.
    while (count($flatArray) > 0) {
        for ($i = count($flatArray) - 1; $i >= 0; $i--) {
            if(in_array($flatArray[$i][2],$arrrId)){

            if ($flatArray[$i][2] == NULL) {
                //root element: set in result and ref!
                $result[$flatArray[$i][0]] = $flatArray[$i];
                $refs[$flatArray[$i][0]] = &$result[$flatArray[$i][0]];
                unset($flatArray[$i]);
                $flatArray = array_values($flatArray);
            } else if ($flatArray[$i][2] != NULL) {
                //no root element. Push to the referenced parent, and add to references as well.
                if (array_key_exists($flatArray[$i][2], $refs)) {
                        //parent found
                        $o = $flatArray[$i];
                        $refs[$flatArray[$i][0]] = $o;
                        $refs[$flatArray[$i][2]][5][] = &$refs[$flatArray[$i][0]];
                        unset($flatArray[$i]);
                        $flatArray = array_values($flatArray);
                }
            }
            }else {
                unset($flatArray[$i]);
                $flatArray = array_values($flatArray);
            }
        }
    }
    if (count($result) > 0) {
//        print_r(createArray($result));
        return createArray($result);
    }
}

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
    <link rel="stylesheet" href="css/ionic.css">
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
    <link href="css/google_fonts.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" ></script>
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- This demo uses an 3rd-party, jQuery UI based context menu -->
    <link
            href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- jquery-contextmenu (https://github.com/mar10/jquery-ui-contextmenu/) -->
    <script src="//cdn.jsdelivr.net/npm/ui-contextmenu/jquery.ui-contextmenu.min.js"></script>

    <link href="src/skin-win8/ui.fancytree.css" rel="stylesheet" />
    <script src="src/jquery.fancytree.js"></script>
    <script src="src/jquery.fancytree.dnd5.js"></script>
    <script src="src/jquery.fancytree.edit.js"></script>
    <script src="src/jquery.fancytree.gridnav.js"></script>
    <script src="src/jquery.fancytree.table.js"></script>
    <!--
    <script src="../../build/jquery.fancytree-all.min.js"></script>
-->

    <!-- Start_Exclude: This block is not part of the sample code -->
<!--    <link href="../lib/prettify.css" rel="stylesheet" />-->
<!--    <script src="../lib/prettify.js"></script>-->
<!--    <link href="../demo/sample.css" rel="stylesheet" />-->
<!--    <script src="../demo/sample.js"></script>-->
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
        <a href="../index3.html" class="brand-link">
            <img src="dist/img/rhr.png" alt="RahatHR Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">RahatHR</span>
        </a>

        <!-- Sidebar -->
        <?php  include("main_menu.php") ?>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <!-- Content Header (Page header)
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $dil["employees"];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=""><?php echo $dil["employees"];?></a></li>
              <li class="breadcrumb-item active"><?php echo $dil["employee_list"];?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>-->
        <br>
        <div class="col-12 col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">

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
<!--            <li class="nav-item">-->
<!--                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
<!--            </li>-->
        </ul>
    </div>
</nav>
<input type='hidden' value='' id='txt_id'>
<input type='hidden' value='' id='number_id'>
<!-- Small modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" id="butModal" data-target="#bd-example-modal-lg">New</button>

<div class="modal fade bd-example-modal-lg text-left" tabindex="-1" id="bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                        <label class="col-sm-4 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
                        <div class="col-sm-6">
                            <select data-live-search="true"  name="employee" id="employee"  title="<?php echo $dil["selectone"];?>" class="form-control "  placeholder="<?php echo $dil["employee"];?>" >
                                <option  value="0" >Seçin...</option>
                                <?php
                                $result_employees_view = $db->query($sql_employees);
                                if ($result_employees_view->num_rows > 0) {
                                    while($row_employees= $result_employees_view->fetch_assoc()) {

                                        ?>
                                        <option  value="<?php echo $row_employees['id']; ?>" ><?php echo utf8_encode($row_employees['firstname'])." " .utf8_encode($row_employees['lastname']);  ?></option>

                                    <?php } }?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row"  id="positionQuery">
                        <label class="col-sm-4 col-form-label" for="position_level"><?php echo $dil["position_level"];?></label>
                        <div class="col-sm-6">

                            <select data-live-search="true"  name="position_level" id="position_level"  title="<?php echo $dil["selectone"];?>" class="form-control "  placeholder="<?php echo $dil["position_level"];?>" >
                                <option  value="0" >Seçin...</option>

                                <?php
                                $result_position_view = $db->query($sql_position_level);
                                if ($result_position_view->num_rows > 0) {
                                    while($row_position= $result_position_view->fetch_assoc()) {

                                        ?>
                                        <option  value="<?php echo $row_position['id']; ?>" data-icon="<?php echo $row_position['posit_icon']; ?>"  style="background-image:url(../images/icons/man2.png);"  ><?php echo  $row_position['title'];  ?></option>

                                    <?php } }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="structureQuery">
                        <label class="col-sm-4 col-form-label" for="structure_level"><?php echo $dil["structure_level"];?></label>
                        <div class="col-sm-6">
                            <select data-live-search="true"  name="structure_level" id="structure_level"  title="<?php echo $dil["selectone"];?>" class="form-control "  placeholder="<?php echo $dil["structure_level"];?>" >
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
                        <label class="col-sm-4 col-form-label" for="st_create_date"><?php echo $dil["create_end_date"];?></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="st_create_date" name="st_create_date" placeholder="0000-00-00" />
                            <input type="text" class="form-control" id="st_end_date" name="st_end_date" placeholder="0000-00-00" />

                        </div>
                    </div>
                    <div class="form-group row" id="iconQuery" style="display:none;">
                        <label class="col-sm-4 col-form-label" for="icon"> </label>
                        <div class="col-sm-6">
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
        <th> Person </th>
        <th>İl</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <!-- Define a row template for all invariant markup: -->
    <tr>
        <td class="alignCenter"></td>
        <td></td>
        <td></td>
        <td> </td>
        <td><span></span>
            <div id="structure_level1">
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
            <div id="position_level1">
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
            <select data-live-search="true"  name="employee" style="font-size:14px;" title="<?php echo $dil["selectone"];?>" class="form-control "  placeholder="<?php echo $dil["employee"];?>" >
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
            <input type="text" class="form-control"  style="font-size:14px;" name="st_create_date" placeholder="0000-00-00" />
            <input type="text" class="form-control"  style="font-size:14px;" name="st_end_date" placeholder="0000-00-00" />
            <button type="button" class="btn btn-info"  style="font-size:10px;" >+</button>
        </td>
        <td> </td>

    </tr>
    </tbody>
</table>

<pre id="sourceCode" class="prettyprint" style="display:none"></pre>
<!-- End_Exclude -->
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
<script src="js/popper.min.js" type="text/javascript"></script> 
<script src="js/moment.min.js" type="text/javascript"></script>
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
<!--<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>-->

<script type="text/javascript" src="dist/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="js/employee.js"></script>

</body>
</html>
<script type="text/javascript">
    var CLIPBOARD = null;
    var myJSON;
    // var pushOldu=false;
    var idArray;
    var eventArray=[];
    var dataArray=[];
    var silArray=[];
    var event_t='';
    var tree_e=[];
    var addNew=0;
    $(function() {
        var subArray =  <?php echo json_encode(unflattenArray($flatArray)); ?>;
        idArray =  <?php echo json_encode($idArray); ?>;
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
                                console.log('a1')
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


                                });
                                confirmClick();


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
                        console.log('createNode',data)

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
                        console.log('renderColumns',data)
                        var node = data.node,
                            $tdList = $(node.tr).find(">td");
                        $tdList.eq(1).text(node.data.id);
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
                            // if(data.childNode){
                            //     ID=data.childNode.data.id;
                            //     delet="id"
                            // }else
                                if(silArray.data.id){
                                ID=silArray.data.id;
                                delet="id"
                            }else {
                                ID=0
                                delet="parent"
                            }
                            console.log('ID=='+ID);
                            console.log('delet=='+delet);

                            $.ajax({
                                url: 'st_delete.php',
                                type: "POST",
                                data: {id:ID,delet:delet},
                                success: function (data) {
                                    console.log('data=' + data)
                                    if(data){
                                        var tree = $('#tree').fancytree('getTree');
                                        tree.reload($.parseJSON(data));
                                    }else{
                                        $('#butModal').css('display','block');
                                        stClick();
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

                    switch (data.cmd) {

                        case "addChild":
                        case "addSibling":
                        case "indent":
                        case "moveDown":
                        case "moveUp":
                        case "outdent":
                        case "remove":
                        case "rename":
                            console.log('-----------------='+addNew)
                            console.log('-----------------=n'+data.cmd)
                            silArray=node;
                            event_t=data.cmd;
                            console.log('-----------------= html=',silArray)
                            if(addNew==1){
                                $('#butModal').trigger('click');

                            }else{
                                tree.applyCommand(data.cmd, node);
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
                    console.log('beforeOpen',ui)
                    var node = $.ui.fancytree.getNode(ui.target);
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
                    // delay the event, so the menu can close and the click event does
                    // not interfere with the edit control
                    setTimeout(function() {
                        $(that).trigger("nodeCommand", { cmd: ui.cmd });
                    }, 100);

                },
            });

        }

    });
    stClick();
    function stClick() {
        $(document).on('click', '#struktur', function (e) {
            console.log('a2')
            $('#query').css('display', 'none')
            $('#stQuery').css('display', 'block')
            $('#employeesQuery').css('display', 'none');
            $('#positionQuery').css('display', 'none');
            $('#dateQuery').css('display', 'block')
            $('#confirmQuery').css('display', 'block')
            $('#structureQuery').css('display', 'block')
            $(document).off('click', '#pozisya');
            $(document).off('click', '#struktur');
            confirmClick();
        });
        $(document).on('click', '#pozisya', function (e) {
            console.log('a3');
            $('#query').css('display', 'none')
            $('#stQuery').css('display', 'block')
            $('#employeesQuery').css('display', 'block')
            $('#positionQuery').css('display', 'block')
            $('#dateQuery').css('display', 'block')
            $('#confirmQuery').css('display', 'block')
            $('#structureQuery').css('display', 'none')
            $(document).off('click', '#pozisya');
            $(document).off('click', '#struktur');

            confirmClick();
        });
    }

    function confirmClick(e){
        $(document).on("click", "#confirm", function(e){
            console.log('confirm col ');

            $('#stQuery').css('display','none')
            var employee=$('#employeesQuery option:selected').val()
            var structure_level=$('#structure_level option:selected').val()
            var position_level=$('#position_level option:selected').val()

            var d = new Date();
            var strDate = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();
            var st_create_date=$('#st_create_date').val()!='' ? $('#st_create_date').val() :'0000-00-00' ;
            var st_end_date=$('#st_end_date').val()!='' ? $('#st_end_date').val() :'0000-00-00' ;
            console.log('st_create_date='+st_create_date)
            if(structure_level!=0){
                $('#icon').val('../images/icons/box1.png')
            }
            if(position_level!=0){
                $('#icon').val($('#position_level option:selected').attr('data-icon'))
            }
            $('#structure_level').find('option[value="0"]').prop('selected', true);
            $('#position_level').find('option[value="0"]').prop('selected', true);
            $('#employee').find('option[value="0"]').prop('selected', true);
            var icon=$('#icon').val();
            if(eventArray){
                createNew(eventArray, dataArray, employee,structure_level,position_level,st_create_date,st_end_date,icon);

            }else{
                createNew('yeni', 0, employee,structure_level,position_level,st_create_date,st_end_date,icon);

            }
            $('#st_create_date').val('')
            $('#st_end_date').val('')
            $('.close').trigger('click');
            $(document).off('click', '#pozisya');
            $(document).off('click', '#struktur');
            $(document).off('click', '#confirm');
            // confirmClick().remove()
        });

    }
    function createNew(event,data,employee,structure_level,position_level,st_create_date,st_end_date,icon){
        // console.log('data',createRequestNumber(8))
        console.log('eventeventeventevent',event)
        console.log('data.cmd==',data.cmd)
        var PID;
        var title;

        if (data==0){
            PID=0;
            title='Yeni';
        }else if(data.node.parent.data.id){
            PID=data.node.parent.data.id;
            title=data.node.title;

        }else if(data.node.parent.children[0].data.pId){
            PID=data.node.parent.children[0].data.pId;
            title=data.node.title;
        }else if(data.node.title &&(!data.node.parent.children[0].data.pId || !data.node.parent.data.id)  ){
            title=data.node.title;
            PID=0;
        }

        console.log('PID=='+PID);
        console.log('title=='+title);
        $.ajax({
            url: 'st_insert.php',
            type: "POST",
            data: { pId:PID, name:title,icon:icon,emp_id:employee,structure_level:structure_level,position_level:position_level,create_date:st_create_date,end_date:st_end_date},
            success: function (data) {
                  // console.log('dataaaaaaaaaa=' , data);
                console.log('dataaaaaaaaaa=' , $.parseJSON(data));
                var tree = $('#tree').fancytree('getTree');
                tree.reload($.parseJSON(data));
            },
        });

    }

    function sagClick(number){
        // Hide context menu
        $(document).bind('contextmenu click',function(){
            $(".context-menu").hide();
            $("#txt_id").val("");
            $("#number_id").val("");

        });

        // disable right click and show custom context menu

        $("#idst"+number).bind('contextmenu', function (e) {

            var id = this.id;
            $("#txt_id").val(id);
            $("#number_id").val(number);
            console.log('number_id[='+$("#number_id").val())
            // var top = e.pageY+5;
            // var left = e.pageX;
            var top = e.pageY-90;
            var left = e.pageX-215;

            $(".context-menu").toggle(100).css({
                top: top + "px",
                left: left + "px"

            });

            // Disable default menu
            return false;
        });

        $("#idemp"+number).bind('contextmenu', function (e) {

            var id = this.id;
            $("#txt_id").val(id);
            $("#number_id").val(number);
            console.log('number_id[='+$("#number_id").val())
            var top = e.pageY-90;
            var left = e.pageX-215;

            // Show contextmenu
            $(".context-menu").toggle(100).css({
                top: top + "px",
                left: left + "px"
            });

            // Disable default menu
            return false;
        });

        $("#idyear"+number).bind('contextmenu', function (e) {

            var id = this.id;
            $("#txt_id").val(id);
            $("#number_id").val(number);
            console.log('number_id[='+$("#number_id").val())
            var top = e.pageY-90;
            var left = e.pageX-215;

            // Show contextmenu
            $(".context-menu").toggle(100).css({
                top: top + "px",
                left: left + "px"
            });
            // Disable default menu
            return false;
        });


        // disable context-menu from custom menu
        $('.context-menu').bind('contextmenu',function(){
            return false;
        });

        // Clicked context-menu item
        $('.context-menu li').click(function(){
            var className = $(this).find("span:nth-child(1)").attr("class");
            var titleid = $('#txt_id').val();
            $( "#"+ titleid ).css( "background-color", className );
            $(".context-menu").hide();
        });


        // Clicked context-menu item
        $('#contentEdit').click(function(){
            var idCont = $('#txt_id').val();
            if(idCont){
                console.log('idCont='+idCont)
                $('#'+idCont).find('span').css('display','none')
                $('#'+idCont).find('select').css('display','block')
                $('#'+idCont).find('input').css('display','block')
                $('#'+idCont).find('button').css('display','block')
            }

        });
        // Clicked context-menu item
        $("#idst"+number).find('select').change(function(){
            console.log('contentEdit change'+$(this).attr('name'));
            if($(this).find('option:selected').val()!='0'){
                $(this).closest('td').find('span').text($(this).find('option:selected').text())
            }else{
                $(this).closest('td').find('span').text('')
            }

            $(this).closest('td').find('span').css('display','block')
            $(this).css('display','none');
            var thisName=$(this).attr('name')
            var thisVal=$(this).find('option:selected').val()
            var icon='../images/icons/box1.png'

            if(thisName=='structure_level'){
                $('#icon').val('../images/icons/box1.png')
            }else {
                $('#icon').val($('#position_level option:selected').attr('data-icon'))
            }


            $.ajax({
                url: 'st_update.php',
                type: "POST",
                data: { id:number, name:thisVal,change:thisName},
                success: function (data) {
                    console.log('dataaaaaaa=' + data)
                    var tree = $('#tree').fancytree('getTree');
                    tree.reload($.parseJSON(data));

                },
            });
        });


        $("#idemp"+number).find('select').change(function(){
            console.log('contentEdit change'+$(this).attr('name'));
            if($(this).find('option:selected').val()!='0'){
                $(this).closest('td').find('span').text($(this).find('option:selected').text())
            }else{
                $(this).closest('td').find('span').text('')
            }

            $(this).closest('td').find('span').css('display','block')
            $(this).css('display','none');
            var thisName='emp_id'
            var thisVal=$(this).find('option:selected').val()
            $.ajax({
                url: 'st_update.php',
                type: "POST",
                data: { id:number, name:thisVal,change:thisName},
                success: function (data) {
                    console.log('dataaaaaaaw=' + data)
                    $("#idemp"+number).find('span').css('display','block')
                    $("#idemp"+number).find('select').css('display','none')

                },
            });
        });

        $("#idyearButton"+number).click(function(){

            $(this).closest('td').find('span').text($("#idcreateInput"+number).val()+'/'+$("#idendInput"+number).val())

            $(this).closest('td').find('span').css('display','block')
            // $(this).css('display','none');
            var createDate=$(this).closest('td').find("#idcreateInput"+number).val()
            var endDate=$(this).closest('td').find("#idendInput"+number).val()
            console.log('contentEdit createDate'+createDate);
            console.log('contentEdit endDate'+endDate);

            $.ajax({
                url: 'st_update.php',
                type: "POST",
                data: { id:number, createDate:createDate,endDate:endDate},
                success: function (data) {
                    console.log('dataaaaaaaw=' + $.parseJSON(data))
                    $("#idyear"+number).find('span').css('display','block')
                    $("#idyear"+number).find('button').css('display','block')
                    $("#idcreateInput"+number).css('display','none')
                    $("#idendInput"+number).css('display','none')
                    $('.datepicker').css('display','none')
                    var tree = $('#tree').fancytree('getTree');
                    tree.reload($.parseJSON(data));

                },
            });
        });
        $("#idcreateInput"+number).datepicker({
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            // startDate: new Date()
            // });
        })
        $("#idendInput"+number).datepicker({
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            // startDate: new Date()
            // });
        })

    }
    $(document).on('click', '#menyu_edit', function(e) {
        addNew=0;
        $("#tree").trigger("nodeCommand", { cmd: 'rename' });
    })
    $(document).on('click', '#menyu_delete', function(e) {
        addNew=0;
        $("#tree").trigger("nodeCommand", { cmd: 'remove' });
    })
    $(document).on('click', '#menyu_add', function(e) {
      addNew=0;
      console.log('sssss')
         $("#tree").trigger("nodeCommand", { cmd: "addSibling"});
    })
    $(document).on('click', '#menyu_addChild', function(e) {
        addNew=0;
        $("#tree").trigger("nodeCommand", { cmd: 'addChild' });
    })

</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(function () {
        $('#st_create_date').datepicker({
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            // startDate: new Date()
        });
        $('#st_end_date').datepicker({
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            // startDate: new Date()
        });
    });
</script>

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
