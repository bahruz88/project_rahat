<?php
include('session.php');
$site_lang=$_SESSION['dil'] ;
$sql_fam_member_type= "select * from $tbl_family_member_types  where lang='$site_lang' ";
$sql_military_rank= "select * from $tbl_military_rank  where lang='$site_lang' ";
$sql_military_staff= "select * from $tbl_military_staff  where lang='$site_lang' ";
$sql_driving_category= "select * from $tbl_driver_lic_cat  where lang='$site_lang' ";

$sql_lang_level= "select * from $tbl_lang_level  where lang_short_name='$site_lang' ";

$sql_position_level= "select * from $tbl_position_level lang='$site_lang'";
$sql_employee= "select * from $tbl_employees where  emp_status=1";

$commands= "select * from $tbl_commands where lang='$site_lang'";
$sql_month= "select * from $tbl_month  where lang='$site_lang'";
$result_month = $db->query($sql_month);

$result_commands = $db->query($commands);
//$sql_employees= "select * from $tbl_employees where  emp_status=1 ";
?>
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
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />-->


    <style>
        .ui-datepicker-calendar {
            display: none;
        }
        .datesFirst span{
            color:blue;
            font-size:28px;
            cursor: pointer;
        }
        /*.datesFirst span{*/
        /*    display: inline-block;*/
        /*    margin-left: .255em;*/
        /*    vertical-align: .255em;*/
        /*    content: "";*/
        /*    border-top: .3em solid;*/
        /*    border-right: .3em solid transparent;*/
        /*    border-bottom: 0;*/
        /*    border-left: .3em solid transparent;*/
        /*    ↔*/
        /*}*/
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

    <!-- Content Wrapper. Contains page content -->
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


                    <?php
                    include  ('contracts/mainContractModal.php');
                    ?>

                    <!-- Tab panes -->
                    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
                        <div class="tab-pane active" id="employees" style="padding: 10px;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="company"><?php echo $dil["company"];?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true"  name="company" id='company' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"   >
                                        <option  value="" >Seçin...</option>

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
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="year"><?php echo $dil["dates"];?></label>
                                <div class="col-sm-3">
                                    <select data-live-search="true"  name="year"   id="year"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["year"];?>" >
                                        <option  value="0" >Seçin...</option>
                                        <?php
                                        for($i=1900;$i<=2999;$i++){
                                           ?>
                                            <option  value="<?php echo $i;  ?>" ><?php echo $i;  ?></option>

                                            <?php
                                        }
                                       ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select data-live-search="true"  name="month"   id="month"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["month"];?>" >
                                        <?php
                                        if($result_month->num_rows > 0) {
                                            while($row_month = $result_month->fetch_assoc()) {
                                                ?>
                                                <option  value="<?php echo $row_month['level_id']; ?>" ><?php echo $row_month['title'];  ?></option>

                                            <?php } }?>
                                    </select>
                                </div>
                            </div>

                            <button id="searchTabel">Axtar</button>

                        </div>


                    </div>
                    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
                        <div class="tab-pane active" id="employee" style="padding: 10px;display: none;overflow-x: auto;overflow-y: auto;">
                            <h1 style="font-weight: bold;font-size: 24px;" class="text-center">"<span class="company_name"></span>"-nin 2020-ci ilin avqust ayı üçün iş vaxtının istifadəsi cədvəlinin hesabatı</h1>
                            <h1 style="font-weight: bold;font-size: 26px;margin-top:60px;" class="text-center">TƏSDİQ EDİRƏM</h1>
                            <h1 style="font-weight: bold;font-size: 20px;margin-top:30px;margin-right:60px;" class="text-right">_____________________Rəsulov Hamlet Rəsul  / Tarix <span class="currentDate"></span></h1>
                            <table id="emp_table" class="table table-striped  table-bordered table-hover">

                                <thead>

                                </thead>
                                <tbody>

                                </tbody>



                            </table


                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->



</div>  <?php  include ("footer.php"); ?>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
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


<script type="text/javascript" src="js/datatables.min.js"></script>
<script type="text/javascript" src="dist/js/jquery.validate.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"  ></script>
<script type="text/javascript" src="dist/js/bootstrap-datetimepicker.js"></script>
<!--<script type="text/javascript" src="js/contracts.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function(){
        $('#employee').on(
            'click',
            '#emp_table .datesFirst',function(){
            $(".dates").toggle();

        });
    });
    function daysInMonth (month, year) {
        return new Date(year, month, 0).getDate();
    }

    $('#employees').on( 'click','#searchTabel',  function () {
        // searchPerson();
        console.log('company');
        // $('#whichContracts').modal('show');
        var month=$('#month').find('option:selected').val();
        var year=$('#year').find('option:selected').val();
        console.log('month='+month);
        console.log('daysInMonth='+daysInMonth(month,year))
        var months=daysInMonth(month,year)
        var company_id=$('#company').find('option:selected').val();
       var company_name=$('#company').find('option:selected').text();
         $.ajax({
            url: "tab/get_tab_employees.php",
            type: "POST",
            data: { company_id:company_id},
            success: function (data) {
                // console.log('data=',data);
                // console.log('dataparseJSON=',$.parseJSON(data));
                // console.log('company_name='+company_name);
                var d = new Date();
                var currentDate=d.getDate() + "." + (d.getMonth()+1) + "." +d.getFullYear() ;
                console.log('currentDate='+currentDate);

                $('.company_name').text(company_name);
                $('.currentDate').text(currentDate);
                var table = '';
                $("table#emp_table thead").html('');
                $("table#emp_table tbody").html('');
                var row='<tr class="text-center">\n' +
                    '                                <th style="width:15px;" rowspan="2">No</th>\n' +
                    '                                <th style="width:15px;" rowspan="2"><?php echo $dil["fio"];?></th>\n' +
                    '                                <th style="width:150px;" rowspan="2"><?php echo $dil["position_n"];?></th>\n' +
                    '                                <th style="width:80px;" rowspan="2"><?php echo $dil["queue"];?></th>\n';

                row+='<th style="width:80px;" rowspan="2" class="datesFirst">1 <span>↔</span></th>';

                    for(var i=2;i<=months;i++){
                        row+='<th style="width:80px;" rowspan="2" class="dates">'+i+'</th>';
                    }



                row+= '                                <th style="width:150px;"><?php echo $dil["norm_schedule"];?></th>\n' +
                    '                                <th style="width:150px;"><?php echo $dil["total_processed"];?></th>\n' +
                    '                                <th style="width:150px;"><?php echo $dil["weekend"];?></th>\n' +
                    '                                <th style="width:150px;"><?php echo $dil["addition_working_hours"];?></th>\n' +
                    '                                <th style="width:150px;"><?php echo $dil["holidays_weekends"];?></th>\n' +
                    '                                <th style="width:150px;"><?php echo $dil["evening_time"];?></th>\n' +
                    '                                <th style="width:150px;"  rowspan="2"><?php echo $dil["night_time"];?></th>\n' +
                    '                                <th style="width:150px;"  rowspan="2"><?php echo $dil["vacation"];?></th>\n' +
                    '                                <th style="width:150px;" rowspan="2"><?php echo $dil["social_leave"];?></th>\n' +
                    '                                <th style="width:150px;" rowspan="2"><?php echo $dil["free_vacation_time"];?></th>\n' +
                    '                                <th style="width:150px;" rowspan="2"><?php echo $dil["illness"];?></th>\n' +
                    '                                <th style="width:150px;" rowspan="2"><?php echo $dil["business_trip"];?></th>\n' +
                    '                                <th style="width:150px;" rowspan="2"><?php echo $dil["missing_watch"];?></th>\n' +
                    '                                <th style="width:150px;" rowspan="2"><?php echo $dil["other_types_permissions"];?></th>\n' +
                    '                                <th style="width:150px;" rowspan="2"><?php echo $dil["monthly_norm"];?></th>\n' +
                    '                                </tr>\n' +
                    '                                <tr  style="font-size:12px;">\n' +
                    '                                    <td style="width:50px;border:1px solid grey;">gun</td>\n' +
                    '                                    <td style="width:80px;border:1px solid grey;">saat</td>\n' +
                    '                                    <td style="width:50px;border:1px solid grey;">gun</td>\n' +
                    '                                    <td style="width:80px;border:1px solid grey;">saat</td>\n' +
                    '                                    <td style="width:50px;border:1px solid grey;">gun</td>\n' +
                    '                                    <td style="width:80px;border:1px solid grey;">saat</td>\n' +
                    '                                </tr>'
                $("table#emp_table thead").html(row);
                $("#employee").css('display', 'block');
                // $('#tablePositions').find('tbody').html('');
                $.each($.parseJSON(data), function(k,value) {
                    table+='<tr class="typeOfDocument" >' +
                        '<td>No</td>'+
                        '<td>'+value.lastname+' '+value.firstname+' '+value.surname+'</td>'+
                        '<td>'+value.category+'</td>' +
                        '<td></td>';
                    table+='<td class="datesFirst">8.0</th>';
                        for(var i=2;i<=months;i++){
                            table+='<td class="dates">8.0</th>';
                        }

                    table+= '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td></td>';



                });
                $("table#emp_table tbody").append(table);


            }
        })
    });

</script>
</body>
</html>
