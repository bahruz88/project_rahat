<?php    
 include('session.php');  
 $site_lang=$_SESSION['dil'] ;


 $sql_lang_level= "select * from $tbl_lang_level  where lang_short_name='$site_lang' ";

$employee_category= "select * from $tbl_employee_category WHERE structure_level = 1";
$result_employee_category = $db->query($employee_category);


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
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Arimo" />

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
	<br>
<div class="col-12 col-sm-6 col-lg-12">
 <div class="card">
<div class="card-body">


    <?php
    include  ('contracts/mainContractModal.php');
    ?>

<!-- Tab panes -->
<div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
    <div class="form-group row" id="dateQuery">
        <label class="col-sm-4 col-form-label" for="date_completion"><?php echo $dil["military_date_completion"];?></label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="date_completion" name="date_completion" placeholder="0000-00-00" />

        </div>
    </div>
    <div class="form-group row" id="dateQuery">
        <label class="col-sm-4 col-form-label" for="enterprise_name"><?php echo $dil["enterprise_name"];?></label>
        <div class="col-sm-6">
            <select data-live-search="true"  name="enterprise_name" id="enterprise_name"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["enterprise_name"];?>" >
                <option  value="0" >Seçin...</option>
                <?php
                if($result_employee_category->num_rows > 0) {
                    while($row_employee_category = $result_employee_category->fetch_assoc()) {
                ?>
                <option  value="<?php echo $row_employee_category['id']; ?>" ><?php echo $row_employee_category['category'];  ?></option>

                <?php } }?>
            </select>
        </div>
    </div>
    <canvas id="myCanvas" width="200" height="100" style="border:1px solid #d3d3d3;">
        Your browser does not support the HTML canvas tag.</canvas>



	<div class="tab-pane active" id="staff">
        <div class="staffText">
            <div class="container text-center"><span id="companyName"></span></div>
            <div class="container text-center">AZ1114, AZƏRBAYCAN, BAKI ŞƏHƏRİ, BİNƏQƏDİ RAYONU, M.RƏSULZADƏ ŞTQ, AĞAMALI OĞLU (RƏSULZADƏ QƏS.), EV 5A
                Tel: 012 404 19 19 / 050 265 14 36</div>
            <br/>
            <div class="row">
                <div class="col-md-8">2020-ci ilin iyun ayı üzrə ştat cədvəli</div>
                <div class="col-md-4">TƏSDİQ EDİRƏM:</div>
            </div>

            <br/>
            <div class="row">
                <div class="col-md-12  text-right">      Direktor _______________________ Aftandil Aftandil</div>
            </div>
            <div class="row">
                <div class="col-md-8">&nbsp;</div>
                <div class="col-md-4">01 iyun 2020-ci il</div>
            </div>
            <div class="row">
                <div class="col-md-4">Ştat vahidi     </div>
                <div class="col-md-1">5</div>
                <div class="col-md-6">nefer</div>
            </div>
            <div class="row">
                <div class="col-md-4">Aylıq əmək haqqı fondu     </div>
                <div class="col-md-1">5</div>
                <div class="col-md-6">manat</div>
            </div>
            <div class="row">
                <div class="col-md-1"><span id="companyDate"></span>     </div>
                <div class="col-md-11">-ci il tarixindən qüvvəyə minir</div>
            </div>
        </div>
		<table id="staff_table" class="table table-striped  table-bordered table-hover">

				<thead>
                    <th>No</th>
                    <th style="width:150px;">Struktur bölmələrin adı və vəzifələr</th>
                    <th style="width:150px;">Ştat sayı (vahid)</th>
					<th style="width:150px;">Vəzifə  maaşı (manatla)</th>
					<th style="width:150px;">Vəzifə maaşına əlavə</th>
					<th style="width:150px;"> Aylıq əmək haqqı fondu</th>
				</thead>
            <tbody>

            </tbody>



        </table>

	</div>

    <div id="editor"></div>
    <button onclick="printDiv('staff','Title')">print div</button>

    <button onclick="saveDiv('staff','Title')">view image</button>
    <button onclick="saveDiv2('staff','Title')">save div as pdf</button>

 </div>
</div>
     <div id="previewImage">
         Struktur bölmələrin adı və vəzifələr

     </div>

</div>
</div>
  </div>
  <!-- /.content-wrapper -->
<?php  include ("footer.php"); ?>


</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
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
 <script type="text/javascript" src="js/contracts.js"></script>
 <script type="text/javascript" src="js/Linearicons-Free-bold.js.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.0.0/jspdf.umd.min.js"></script>


</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

<!-- EDIT: For now, add this line between the libraries -->
<!-- The reason being that jspdf includes a version of requirejs which -->
<!-- jspdf-autotable currently is not expecting. You can also use version < 2.0.21 -->
<script>if (window.define) delete window.define.amd;</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.28/jspdf.plugin.autotable.js"></script>
<!--<script src="js/tableHTMLExport.js"></script>-->

<script>


    var doc = new jsPDF();

    var getCanvas; // global variable
    function saveDiv(divId, title) {
        var element = $("#staff"); // global variable


            html2canvas(element, {
                onrendered: function (canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;

                }
            });



    }
    function saveDiv2(divId, title) {
        var imgageData = getCanvas.toDataURL("image/png");
        var doc = new jsPDF('p', 'mm');
        var width = doc.internal.pageSize.getWidth();
        var height = doc.internal.pageSize.getHeight();
        doc.addImage(imgageData, 'PNG', 0, 0, width, height);
        doc.save('sample-file.pdf');
    }

    function printDiv(divId,
                      title) {

        let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

        mywindow.document.write(`<html><head><title>${title}</title>`);
        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById(divId).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }
    $('#date_completion').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date()
    });
    $("#enterprise_name").change(function(){
        console.log('enterprise_name change'+$(this).attr('name'));
        var id=$(this).find('option:selected').val();
        $.ajax({
            url: 'st_selectStaff.php',
            type: "POST",
            data: { id:id},
            success: function (data) {
                console.log('dataaaaaaa=' + data)
                var table='';
                $("table#staff_table tbody").html('');
                $.each($.parseJSON(data), function (key, value) {
                    table+='<tr class="typeOfDocument" >' +
                       '<td>'+value[0]+'</td>'+
                        '<td>'+value[1]+'</td>'+
                        '<td>'+1+'</td>'+
                        '<td>'+1000+'</td>'+
                        '<td>'+1000+'</td>'+
                        '<td>'+1000+'</td>';


                });

                $("table#staff_table tbody").append(table);


            },
        });
    })
</script>
