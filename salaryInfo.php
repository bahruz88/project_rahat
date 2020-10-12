<?php
include('session.php');
$site_lang=$_SESSION['dil'] ;



$sql_employees= "select * from $tbl_employees where  emp_status=1   ";
$sql_additions_salary= "select * from $tbl_additions_salary where lang='$site_lang'";


$sql_position_status= "select * from $tbl_position_status where lang='$site_lang'";
$sql_additions_salary= "select * from $tbl_additions_salary where lang='$site_lang'";
$sql_place_expenditure= "select * from $tbl_place_expenditure where lang='$site_lang'";

$sql_reward_period= "select * from $tbl_reward_period where lang='$site_lang'";
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




<!-- SUCCCES MODAL INSERT -->
<div class="modal fade" id="modalInsertSuccess">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo  $dil["user_input_title"];?></h5>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
              <p id="successp"> </p>
            </div>
            <div class="modal-footer justify-content-between"> 
              <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>	

<!-- ERROR  MODAL INSERT -->
<div class="modal fade" id="modalInsertError">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h5 class="modal-title"> <?php echo  $dil["input_error_title"];?></h5>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
              <p id="errorp"> </p>
            </div>
            <div class="modal-footer justify-content-between"> 
              <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>	  
<!-- SUCCCES  MODAL  DELETE -->
<div class="modal fade" id="modalDeleteSuccess">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $dil["delete_warning"];?></h4>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <p > <?php echo $dil["row_deleted"];?></p>
            </div>
            <div class="modal-footer justify-content-between"> 
              <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	  
<!-- SUCCCES  MODAL UPDATE -->
<div class="modal fade" id="modalUpdateSuccess">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $dil["user_update_title"];?></h4>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
              <p > <?php echo $dil["row_updated"];?></p>
            </div>
            <div class="modal-footer justify-content-between"> 
              <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>	  

<!-- DELETE  CONTENT MODAL  -->
<div class="modal fade" id="modalDelete" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $dil["delete_warning"];?></h4>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?php echo $dil["delete_warning_content"];?></p>
            </div>
            <div class="modal-footer justify-content-between">
			  <form id="salaryDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="id" name="id" value="" />
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	  

  <?php 
  include  ('salaryInfo/mainSalaryModal.php');
 include  ('additionSalary/mainAdditionModal.php');
//  include  ('payment_salary/paymentSalaryModal.php');
            ?>
  
  
  
<ul class="nav nav-tabs"  id="navtabs" role="tablist">
  <li Class="nav-item"><a href="#payrollInfo"  style="border-radius:0px;color:#494e53;" class="nav-link active" role="tab" data-toggle="tab"    ><?php echo $dil["payrollInfo"];?></a></li>



    <li Class="nav-item"><a href="#additionsDeductions"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" >
            <?php echo $dil["additionsDeductionsSalary"];?> </a></li>
</ul>
</li>


<!-- Tab panes -->
<div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
	<div class="tab-pane active" id="payrollInfo">
		<table id="salary_table" class="table table-striped  table-bordered table-hover">
            <thead>
				<tr>
                    <th>id</th>
                    <th><?php echo $dil["fio"];?></th>
                    <th><?php echo $dil["tariffRate"];?></th>
                    <th><?php echo $dil["positionStatus"];?></th>
                    <th><?php echo $dil["wage"];?></th>
                    <th><?php echo $dil["salaryChangeReason"];?></th>
                    <th><?php echo $dil["totalMonthlySalary"];?></th>
                    <th><?php echo $dil["prizeAmount"];?></th>
                    <th><?php echo $dil["rewardPeriod"];?></th>
                    <th><?php echo $dil["placeExpenditure"];?></th>
                    <th><?php echo $dil["otherConditions"];?></th>
 					<th><?php echo $dil["operation"];?></th>
				</tr>
            </thead>
        </table>
	</div>

   <div class="tab-pane" id="additionsDeductions">
       <table id="addition_table" class="table table-striped  table-bordered table-hover" >
           <thead>
           <tr>
               <th>id</th>
               <th><?php echo $dil["company"];?></th>
               <th><?php echo $dil["fio"];?></th>
               <th><?php echo $dil["additionsDeductionsSalary"];?></th>
               <th><?php echo $dil["additions_salary"];?></th>
               <th><?php echo $dil["start_date"];?></th>
               <th><?php echo $dil["end_date"];?></th>
                <th><?php echo $dil["operation"];?></th>
           </tr>
           </thead>
       </table>



       <!---->
<!--            <div class="form-group row">-->
<!--               <div class="form-group col-md-3 col-sm-3">-->
<!--                   <label class=" col-form-label" for="additionsDeductionsSalary">--><?php //echo $dil["additionsDeductionsSalary"];?><!--</label>-->
<!---->
<!--                   <select data-live-search="true"  name="additionsDeductionsSalary"  id="additionsDeductionsSalary" title="--><?php //echo $dil["selectone"];?><!--" class="form-control selectpicker"  placeholder="--><?php //echo $dil["additionsDeductionsSalary"];?><!--">-->
<!--                       --><?php
//                       $result_additions_salary = $db->query($sql_additions_salary);
//                       if ($result_additions_salary->num_rows > 0) {
//                           while($row_additions_salary= $result_additions_salary->fetch_assoc()) {
//
//                               ?>
<!--                               <option  value="--><?php //echo $row_additions_salary['id']; ?><!--"  data-code="--><?php //echo $row_additions_salary['code']; ?><!--" >--><?php //echo $row_additions_salary['title'];  ?><!--</option>-->
<!---->
<!--                           --><?php //} }?>
<!--                   </select>-->
<!--               </div>-->
<!--               <div class="form-group col-md-2 col-sm-2">-->
<!--                   <label class=" col-form-label" for="begin_date">--><?php //echo $dil["additions_salary"];?><!--</label>-->
<!---->
<!--                   <input type="text" class="form-control" id="additions_salary" name="additions_salary"   placeholder="--><?php //echo $dil["additions_salary"];?><!--" />-->
<!---->
<!--               </div>-->
<!--               <div class="form-group col-md-2 col-sm-2">-->
<!--                   <label class=" col-form-label" for="begin_date">--><?php //echo $dil["start_date"];?><!--</label>-->
<!---->
<!--                   <input type="text" class="form-control" id="begin_date" name="begin_date"    placeholder="0000-00-00"  />-->
<!--               </div>-->
<!--               <div class="form-group col-md-2 col-sm-2">-->
<!--                   <label class="  col-form-label" for="begin_date">--><?php //echo $dil["end_date"];?><!--</label>-->
<!---->
<!--                   <input type="text" class="form-control" id="end_date" name="end_date"    placeholder="0000-00-00"  />-->
<!---->
<!--               </div>-->
<!--               <div class="form-group col-md-2 col-sm-2" style="padding-top:38px;">-->
<!--                   <button type="button" class="btn btn-primary" id="addSalary">Əlavə et</button>-->
<!--               </div>-->
<!--           </div>-->
<!--           <div class="form-group row">-->
<!--               <table id="additionSalary_table" style="display: none;width:100%;" class="table table-striped  table-bordered table-hover">-->
<!--                   <thead style="font-weight: bold;">-->
<!--                   <td width="250px;">Vəzifə maaşına əlavə və kəsintilər</td>-->
<!--                   <td width="150px;" >Maaşa əlavə</td>-->
<!--                   <td>Başlama tarixi</td>-->
<!--                   <td>Bitmə tarixi</td>-->
<!--                   <td>Əməliyyat</td>-->
<!--                   </thead>-->
<!--                   <tbody></tbody>-->
<!---->
<!--               </table>-->
<!--        </div>-->
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
 <script type="text/javascript" src="js/salaryInfo.js"></script>
 
</body>
</html>
<script>
    $('.update_company_id').change(function(){

        var deptid =$(this).find('option:selected').val();
        $.ajax({
            url: 'employees/getEmployee.php',
            type: 'post',
            data: {company_id:deptid},
            dataType: 'json',
            success: function (data) {
                var option='<select data-live-search="true"  name="update_emplo" id="update_employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
                option += '<option value="">Seçin..</option>';
                $.each(data, function(k,v) {
                    option += '<option value="' + v[0] + '" >' + v[1]  + '</option>';
                });
                option+=' </select>';
                $('#update_emp').html(option);
                $(".selectpicker").selectpicker();
                console.log('update_company_id bitdi')
                if(up_emp!=''){
                    $("#update_employee").val(up_emp).change();
                }
            }
        })
    });
    $(".company_id").change(function(){
        var deptid = $(this).val();
        console.log("deptid="+deptid) ;
        $.ajax({
            url: 'employees/getEmployee.php',
            type: 'post',
            data: {company_id:deptid},
            dataType: 'json',
            success:function(response){
                console.log('response=',response)
                $("#employee").empty();
                var option='<select data-live-search="true"  name="emplo" id="employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
                option += '<option value="">Seçin..</option>';
                $.each(response, function(k,v) {
                    console.log('v=',v[1])
                    option += '<option value="' + v[0] + '" >' + v[1] +'</option>';
                });
                option += '</select>';
                console.log('emp='+option)
                $(".emp").html(option);

                $(".selectpicker").selectpicker();
                console.log('emp hrml='+$("#emp").html())

            }
        });
    });
</script>