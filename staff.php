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
<!--    <link rel="stylesheet" type="text/css" href="dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Arimo" />
    <style>
        .staffText{
            font-weight: 700;
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
	<div class="tab-pane active" id="staff" style="display: none;width:800px;margin:auto;">
        <div class="staffText">
        <div class="container text-center"><span id="companyName"></span></div>
        <div class="container text-center"><span class="company_adress"></span><span class="company_tel"></span></div>
        <br/>
        <div class="row">
            <div class="col-md-8"><span class="year"></span>-ci ilin <span class="month"></span> ayı üzrə ştat cədvəli</div>
            <div class="col-md-4">TƏSDİQ EDİRƏM:</div>
        </div>

        <br/>
        <div class="row">
            <div class="col-md-9  text-right">      <span class="enterprise_head_position"></span>   </div>
            <div class="col-md-3  text-left">       <span class="enterprise_head_fullname"></span></div>
        </div>
        <div class="row">
            <div class="col-md-8">&nbsp;</div>
            <div class="col-md-4"><span class="day"></span> <span class="month"></span> <span class="year"></span>-ci il</div>
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
            <div class="col-md-2"><span class="day"></span> <span class="month"></span> <span class="year"></span>     </div>
            <div class="col-md-10">-ci il tarixindən qüvvəyə minir</div>
        </div>
        </div>
        <div id="staffTab" >

		<table id="staff_table" class="table table-striped  table-bordered table-hover">

				<thead>
                    <th style="width:15px;">No</th>
                    <th style="width:150px;">Struktur bölmələrin adı və vəzifələr</th>
                    <th style="width:80px;">Ştat sayı (vahid)</th>
					<th style="width:150px;">Vəzifə  maaşı (manatla)</th>
					<th style="width:150px;">Vəzifə maaşına əlavə</th>
					<th style="width:150px;"> Aylıq əmək haqqı fondu</th>
				</thead>
            <tbody>

            </tbody>



        </table>

	</div>

	</div>
    <button onclick="saveDiv('staff2')" id="download" style="display: none">Yüklə</button>
    <button onclick="printDiv('staff','Title')"  id="print" style="display: none">Çap et</button>
    <div id="previewImage"  style="display: none">

    </div>
    <input type="hidden" class="form-control" id="tableStaff" name="tableStaff"   />
    <input type="hidden" class="form-control" id="company_name" name="company_name"   />
    <input type="hidden" class="form-control" id="company_address" name="company_address"   />
    <input type="hidden" class="form-control" id="company_tel" name="company_tel"   />
     <input type="hidden" class="form-control" id="enterprise_head_fullname" name="enterprise_head_fullname"   />
     <input type="hidden" class="form-control" id="enterprise_head_position" name="enterprise_head_position"   />
     <input type="hidden" class="form-control" id="day" name="day"   />
     <input type="hidden" class="form-control" id="month" name="month"   />
     <input type="hidden" class="form-control" id="year" name="year"   />


    <div id="editor"></div>

<!--    <button onclick="printDiv('staff','Title')">Print</button>-->
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
<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>


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
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


</body>
</html>
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>-->
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/FileSaver.js"></script>
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/jquery.wordexport.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

<script  charset="UTF-8">
    var arrayData2=[];
    var arrayData=[];



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
                var data1=$.parseJSON(data);

                $('#companyDate').text($('#date_completion').val())
                var table='';
                // console.log('day='+$('#date_completion').val().substr(0, 2))
                // console.log('month='+$('#date_completion').val().substr(3, 2))
                var year=$('#date_completion').val().substr(6, 4);
                var month=$('#date_completion').val().substr(3, 2);
                switch ($('#date_completion').val().substr(3, 2)) {
                    case "01":
                        month = "Yanvar";
                        break;
                    case "02":
                        month = "Fevral";
                        break;
                    case "03":
                        month = "Mart";
                        break;
                    case "04":
                        month = "Aprel";
                        break;
                    case "05":
                        month = "May";
                        break;
                    case "06":
                        month = "İyun";
                        break;
                    case "07":
                        month = "İyul";
                        break;
                    case "08":
                        month = "Avqust";
                        break;
                    case "09":
                        month = "Sentyabr";
                        break;
                    case "10":
                        month = "Oktyabr";
                        break;
                    case "11":
                        month = "Noyabr";
                        break;
                    case "12":
                        month = "Dekabr";
                        break;
                }
                var day=$('#date_completion').val().substr(0, 2);

                $('#year').val(year)
                $('#month').val(month)
                $('#day').val(day)

                $('.year').text(year)
                $('.month').text(month)
                $('.day').text(day)
                $('.enterprise_head_fullname').text(data1["enterprise_head_fullname"])
                $('.enterprise_head_position').text(data1["enterprise_head_position"])
                $('#companyName').text('"'+data1["company_name"]+'"')
                $('.company_address').text(data1["company_address"])
                $('.company_tel').text(data1["company_tel"])

                    $('#enterprise_head_fullname').val(data1["enterprise_head_fullname"])
                    $('#enterprise_head_position').val(data1["enterprise_head_position"])
                    $('#company_name').val(data1["company_name"])
                    $('#company_address').val(data1["company_address"])
                    $('#company_tel').val(data1["company_tel"])


                $("table#staff_table tbody").html('');
                $.each(data1, function (key, value) {
                    if(key!="company_tel" && key!="company_address" && key!="company_name" && key!="enterprise_head_fullname"&& key!="enterprise_head_position" )
                    {
                        table+='<tr class="typeOfDocument" >' +
                            '<td>'+value.id+'</td>'+
                            '<td>'+value.category+'</td>'+
                            '<td>'+1+'</td>'+
                            '<td>'+1000+'</td>'+
                            '<td>'+1000+'</td>'+
                            '<td>'+1000+'</td>';
                        arrayData2.push({"id":value.id,"category":value.category})
                    }

                });
                console.log('arrayData2=',JSON.stringify(arrayData2))
                arrayData=JSON.stringify(arrayData2);

                $("table#staff_table tbody").append(table);
                $("#staff").css("display","block");
                $("#download").css("display","block");
                $("#print").css("display","block");
                $("#tableStaff").val( $("table#staff_table").html());
                var element = $("#staff"); // global variable


                html2canvas(element, {
                    onrendered: function (canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;

                    }
                });


            },
        });
    })
    function printDiv(divId,
                      title) {

        let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

        mywindow.document.write(`<html><head><title>${title}</title>`);

        mywindow.document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >'+
            '<link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">'+
            '<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">'+
            '<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">'+
            '<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">'+
            '<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">'+
            ' <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">'+
            '<link rel="stylesheet" href="dist/css/adminlte.min.css">'+
            ' <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">'+
            ' <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">'+
            '<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">'+
        '<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">'+
        '<link rel="stylesheet" type="text/css" href="css/datatables.min.css" />'+
        '<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">');

        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById(divId).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        setTimeout(function () {
            mywindow.close();
        }, 250);

        return true;
    }
    var getCanvas; // global variable
    function saveDiv(divId) {
        // generate(divId)
        var imgageData = getCanvas.toDataURL("image/png");
        var doc = new jsPDF('p', 'mm');
        // var width = doc.internal.pageSize.getWidth();
        // var height = doc.internal.pageSize.getHeight();
        // doc.addImage(imgageData, 'PNG', 0, 0, width, height);
        doc.addImage(imgageData, 'PNG', 10, 10);
        doc.save('sample-file.pdf');
    }

</script>

