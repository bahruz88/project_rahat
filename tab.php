<?php
include('session.php');
$site_lang = $_SESSION['dil'];
$sql_fam_member_type = "select * from $tbl_family_member_types  where lang='$site_lang' ";
$sql_military_rank = "select * from $tbl_military_rank  where lang='$site_lang' ";
$sql_military_staff = "select * from $tbl_military_staff  where lang='$site_lang' ";
$sql_driving_category = "select * from $tbl_driver_lic_cat  where lang='$site_lang' ";

$sql_lang_level = "select * from $tbl_lang_level  where lang_short_name='$site_lang' ";

$sql_position_level = "select * from $tbl_position_level lang='$site_lang'";
$sql_employee = "select * from $tbl_employees where  emp_status=1";

$commands = "select * from $tbl_commands where lang='$site_lang'";
$sql_month = "select * from $tbl_month  where lang='$site_lang' ";
//$result_month = $db->query($sql_month);

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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />-->


    <style>
        .ui-datepicker-calendar {
            display: none;
        }

        .arrow {
            color: blue;
            font-size: 28px;
            cursor: pointer;
        }

        .tableFixHead {
            overflow-y: auto;
            height: 500px;
            width: 100%;
        }

        .tableFixHead .fix {
            background: #eee;
            position: sticky;
            left: 0;
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .tableFixHead thead td {
            background: #eee;
            position: sticky;
            top: 45px;
        }

        /* Just common table stuff. Really. */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px 16px;
        }

        th {
            background: #eee;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <?php include("navbar.php") ?>
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
        <?php include("main_menu.php") ?>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header)
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0 text-dark"><?php echo $dil["employees"]; ?></h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href=""><?php echo $dil["employees"]; ?></a></li>
<li class="breadcrumb-item active"><?php echo $dil["employee_list"]; ?></li>
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
//                    include('contracts/mainContractModal.php');
                    ?>

                    <!-- Tab panes -->
                    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
                        <div class="tab-pane active" id="employees" style="padding: 10px;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                       for="company"><?php echo $dil["company"]; ?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true" name="company" id='company'
                                            title="<?php echo $dil["selectone"]; ?>" class="form-control selectpicker"
                                            placeholder="<?php echo $dil["company"]; ?>">
                                        <option value="">Seçin...</option>

                                        <?php
                                        $result_company = $db->query($sql_employee_company);
                                        if ($result_company->num_rows > 0) {
                                            while ($row_company = $result_company->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row_company['id']; ?>"><?php echo $row_company['company_name']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="year"><?php echo $dil["dates"]; ?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="year_date" name="year_date"
                                           placeholder="0000-00-00"/>


                                </div>

                            </div>

                            <button id="searchTabel">Axtar</button>
                            <!--                            <button  class="exportToExcel">Exel</button>-->
                            <button id="exportToExcel"> EXCEL</button>
                        </div>


                    </div>
                    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">


                        <div class="tab-pane active table2excel" id="employee"
                             style="padding: 10px;display: none;overflow-x: auto;overflow-y: auto;">
                            <div class="textTab" style="display: none;">
                                <h1 style="font-weight: bold;font-size: 24px;text-align: center;" class="text-center">
                                    "<span class="company_name"></span>"-nin <span
                                            class="yearSelect"></span>-ci ilin <span class="monthSelect"></span>
                                    ayı üçün iş vaxtının istifadəsi cədvəlinin hesabatı</h1>
                                <h1 style="font-weight: bold;font-size: 26px;margin-top:60px;text-align: center;"
                                    class="text-center">TƏSDİQ EDİRƏM</h1>
                                <h1 style="font-weight: bold;font-size: 20px;margin-top:30px;margin-right:60px;text-align: right;"
                                    class="text-right">_____________________ <span
                                            class="head_name"></span>  / Tarix <span class="currentDate"></span></h1>

                            </div>
                            <div class="tableFixHead">

                                <table id="emp_table" class="table table-striped   table-bordered table-hover">

                                    <thead>

                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>


                            </div>

                        </div>

                        <!--                        <button id="exportToExcel"> EXCEL</button>-->

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->


</div> <?php include("footer.php"); ?>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrap-datetimepicker.js"></script>
<!--<script type="text/javascript" src="js/contracts.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
      rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<!--<script src="js/jquery.table2excel.js"></script>-->

<script>
    $(function () {
        // $("[id$=exportToExcel]").click(function(e) {
        //     window.open('data:application/vnd.ms-excel,' + encodeURIComponent( $('div[id$=employee]').html()));
        //     e.preventDefault();
        // });
        $("#exportToExcel").click(function (e) {
            window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#employee').html()));
            e.preventDefault();
        });
        $("#year_date").datepicker({
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });

    });

    function daysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }

    $('#employees').on('click', '#searchTabel', function () {
        // searchPerson();
        // $('#whichContracts').modal('show');
        var year_date = $('#year_date').val();

        var month = year_date.substr(0, 2);
        var monthSelect = '';
        var year = year_date.substr(3, 4);
        console.log('year_date=' + year_date)
        console.log('month=' + month)
        console.log('monthSelect=' + monthSelect)
        var months = daysInMonth(month, year)
        var company_id = $('#company').find('option:selected').val();
        var company_name = $('#company').find('option:selected').text();
        console.log('months=' + months)
        $.ajax({
            url: "tab/get_tab_months.php",
            type: "POST",
            async: false,
            data: {month: month},
            success: function (data) {
                $.each($.parseJSON(data), function (k, value) {
                    monthSelect = value.title;
                })

            }
        })
        $.ajax({
            url: "tab/get_tab_employees.php",
            type: "POST",
            data: {company_id: company_id},
            success: function (data) {
                var d = new Date();
                var currentDate = d.getDate() + "." + (d.getMonth() + 1) + "." + d.getFullYear();

                $('.company_name').text(company_name);
                $('.yearSelect').text(year);
                $('.monthSelect').text(monthSelect);
                $('.currentDate').text(currentDate);
                var table = '';
                $("table#emp_table thead").html('');
                var row = '<tr class="text-center">\n' +
                    '                                <th style="width:30px;" rowspan="2">No</th>\n' +
                    '                                <th style="width:150x;" rowspan="2" class="fix"><?php echo $dil["fio"];?></th>\n' +
                    '                                <th style="width:100px;" rowspan="2"><?php echo $dil["position_n"];?></th>\n' +
                    '                                <th style="width:70px;" rowspan="2"><?php echo $dil["queue"];?></th>\n';

                row += '<th style="width:40px;" rowspan="2" class="dates1">1 <span class="arrow">↔</span></th>';

                for (var i = 2; i <= months; i++) {
                    row += '<th style="width:40px;" rowspan="2" class="dates' + i + '">' + i + ' <span class="arrow">↔</span></th>';
                }


                row += '                                <th style="width:150px;" colspan="2"><?php echo $dil["norm_schedule"];?></th>\n' +
                    '                                <th style="width:150px;" colspan="2"><?php echo $dil["total_processed"];?></th>\n' +
                    '                                <th style="width:150px;" colspan="2"><?php echo $dil["weekend"];?></th>\n' +
                    '                                <th style="width:150px;"  rowspan="2"><?php echo $dil["addition_working_hours"];?></th>\n' +
                    '                                <th style="width:150px;"  rowspan="2"><?php echo $dil["holidays_weekends"];?></th>\n' +
                    '                                <th style="width:150px;"  rowspan="2"><?php echo $dil["evening_time"];?></th>\n' +
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
                    '                                    <td style="width:50px;border:1px solid grey;"><?php echo $dil["day"];?></td>\n' +
                    '                                    <td style="width:80px;border:1px solid grey;"><?php echo $dil["hour"];?></td>\n' +
                    '                                    <td style="width:50px;border:1px solid grey;"><?php echo $dil["day"];?></td>\n' +
                    '                                    <td style="width:80px;border:1px solid grey;"><?php echo $dil["hour"];?></td>\n' +
                    '                                    <td style="width:50px;border:1px solid grey;"><?php echo $dil["day"];?></td>\n' +
                    '                                    <td style="width:80px;border:1px solid grey;"><?php echo $dil["hour"];?></td>\n' +
                    '                                </tr>'
                $("table#emp_table thead").html(row);
                $("#employee").css('display', 'block');
                $('.head_name').text('')
                $.each($.parseJSON(data), function (k, value) {
                    var cat = '';
                    if (value.category) {
                        cat = value.category;
                    }

                    if (k === 'head_name') {
                        $('.head_name').text(value);
                    } else if (k !== 'head_name') {
                        table += '<tr class="typeOfDocument" >' +
                            '<td>' + (k + 1) + '</td>' +
                            '<td  class="fix">' + value.lastname + ' ' + value.firstname + ' ' + value.surname + '</td>' +
                            '<td>' + cat + '</td>' +
                            '<td></td>';
                        table += '<td class="dates1">8.0</th>';
                        for (var i = 2; i <= months; i++) {
                            table += '<td class="dates' + i + '">8.0</th>';
                        }

                        table += '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>';
                    }
                });
                $("table#emp_table tbody").append(table);
                for (var i = 1; i <= months; i++) {
                    $('#employee').on(
                        'click',
                        '#emp_table .dates' + i, function () {
                            var countt = $(this).attr("class").substring(5);
                            console.log('countt=' + countt)
                            for (var j = parseInt(countt) + 1; j <= months; j++) {
                                $(".dates" + j).toggle();
                            }
                        });
                }

            }
        })
    });

</script>
</body>
</html>
