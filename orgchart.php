<?php
 include('session.php');
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



    <link rel="stylesheet" href="css/demo.css"/>
    <link rel="stylesheet" href="css/jquery.orgchart.css"/>
    <style>
        div.orgChart div.node {
            padding: 4px 4px;
            width: auto !important;
            height:auto !important;
            min-height: 30px !important;

            min-width: 100px !important;
        }
        .fullName{
            margin-top: 10px;
            font-size:14px;
            color:#1a252fc9;
        }
        .structureName{
            font-size:20px;
            font-weight: 700;
        }
        body {
            width: auto !important;
        }
        .line_center{
            width:50% !important;
        }
    </style>
    <script type='text/javascript' src='js/jquery.js'></script>
    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>




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
    <div id="companyDiv">
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


    <div id="tree"></div>
</div>
		  

</div>
</div>
  </div>
  <!-- /.content-wrapper -->
<?php  include ("footer.php"); ?>


</div>
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
 <script type="text/javascript" src="js/employee.js"></script>
<script src="js/jquery.orgchart.js"></script>
<script type='text/javascript'>
    var company_id=''
    var company_name=''
    $('#companyDiv').on( 'change','#company',  function () {
        console.log("company CHANGE")
        if($(this).find('option:selected').val()!="0"){
            company_id=$(this).find('option:selected').val()
            company_name=$(this).find('option:selected').text()
            $("#mainContainer").html("")
            load(company_id,company_name)
        }
    });
    function load(company_id,company_name){
        var members;
        $.ajax({
            url:'loadorg.php',
            async:false,
            type: "POST",
            data: { company_id:company_id},
            success:function(data){
                console.log('data='+data);
                members=$.parseJSON(data);
                var member=[];
                member.push({ id: 0, name: company_name })
                $.each(members,function(k,v){
                    console.log('v=',v);
                    if(v.pid){
                        member.push({ id: v.id,pid:v.pid, name: v.name, title: v.title })
                    }else{
                        member.push({ id: v.id,pid:0, name: v.name, title: v.title })
                    }

                })
                console.log('members=',members);
                console.log('member=',member);
                var chart = new OrgChart(document.getElementById("tree"), {
                    enableDragDrop: false,
                    enableSearch: false,
                    //  showYScroll: true,
                    // showXScroll: true,
                    // mouseScrool: true,
                     nodeMouseClick: false,
                    nodeBinding: {
                        field_0: "name",
                        field_1: "title"
                    },
                    nodes:member
                });
            },
        });
    }

</script>
</body>
</html>
