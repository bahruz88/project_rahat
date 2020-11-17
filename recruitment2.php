<?php
include('session.php');
$site_lang=$_SESSION['dil'] ;


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

    <div class="container box text-center">
        <h3 align="center">İşçilərin toplu şəkildə işə qəbulu</h3><br />

        <button type="button" class="btn btn-info" onclick="downloadCSV(dd)">Şablonu yükləyin</button>
         <br />
        <br />
        <form method="post" enctype="multipart/form-data"   id="target">
            <label>Doldurduğunuz şablonu seçin</label>
<!--            <input type="file" name="excel" value="Seçin"/>-->
            <div>
                <label for="files" class="btn btn-info">Əlavə edin</label><br />
                <input id="files" style="display: none;"  name="excel" type="file">
            </div>

            <br />
            <input type="submit" name="import" style="display: none;" id="import" class="btn btn-info" value="Əlavə edin" />
        </form>
        <div id="success"></div>
        <button type="button" class="btn btn-info"  id="importTab" >İşə qəbul edin</button>

        <div id="employee_tab" style="display:none;overflow-x: auto;">
            <table id="employee_table" class="table table-striped  table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Ataadı</th>
                    <th>Cinsi</th>
                    <th>Ailə vəziyyəti</th>
                    <th>Doğum tarixi</th>
                    <th>Doğum yeri</th>
                    <th>Vətəndaşlığı</th>
                    <th>FİN</th>
                    <th>Vəsiqənin seriya və nömrəsi</th>
                    <th>Vəsiqənin verilmə tarixi</th>
                    <th>Etibarlılıq müddəti</th>
                    <th>Vəsiqəni verən orqanın adı</th>
                    <th>Yaşadığı ünvan</th>
                    <th>Qeydiyyat ünvan</th>
                    <th>Mobil telefonu</th>
                    <th>Ev telefonu</th>
                    <th>Email</th>
                    <th>Təcili vəziyyətdə əlaqə</th>

                </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
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


</body>
</html>
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>-->
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/FileSaver.js"></script>
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/jquery.wordexport.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- jquery-contextmenu (https://github.com/mar10/jquery-ui-contextmenu/) -->


<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script>
    JsonFields = ["Ad","Soyad","Ata adı","Cinsi",
        "Ailə vəziyyəti","Doğum tarixi","Doğum yeri",
        "Vətəndaşlığı","FİN","Vəsiqənin seriya və nömrəsi","Vəsiqənin verilmə tarixi",
        "Etibarlılıq müddəti","Vəsiqəni verən orqanın adı","Yaşadığı ünvan","Qeydiyyat ünvanı",
        "Mobil telefonu","Ev telefonu","Email","Təcili vəziyyətdə əlaqə"
    ]

    function JsonToCSV(){
        var csvStr = JsonFields.join(",") + "\n";
        return csvStr;
    }
    var dd=JsonToCSV()
    // downloadCSV(dd);
    function downloadCSV(csvStr) {
        $('form').css('display','block')

        var hiddenElement = document.createElement('a');
        hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csvStr);
        hiddenElement.target = '_blank';
        hiddenElement.download = 'output.csv';
        hiddenElement.click();
    }
    function convert(str)
    {
        str = str.replace(/&/g, "&amp;");
        str = str.replace(/>/g, "&gt;");
        str = str.replace(/</g, "&lt;");
        str = str.replace(/"/g, "&quot;");
        str = str.replace(/'/g, "&#039;");
        return str;
    }
    $('#target').submit(function(event){
        console.log('imppp')
        event.preventDefault();
       var file_data = $('#files').prop('files')[0];
        var form_data = new FormData();
        form_data.append('excel', file_data);
        console.log(form_data);
        $.ajax({
            url: 'recruitmentAj.php', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data){
                console.log('data',data); // display response from the PHP script, if any
                console.log('data',$.parseJSON(data)); // display response from the PHP script, if any
                $('#employee_tab').css('display','block');
                $("table#employee_table tbody").html('')
                var table='';
                $.each($.parseJSON(data), function(k,value) {
                    console.log('value=',value)
                        table+=' <tr class="typeOfDocument" >' +
                            '<td>'+parseInt(k+1)+'</td>'+
                            '<td>'+value[0]+'</td>'+
                            '<td>'+value[1]+'</td>'+
                            '<td>'+convert(value[2])+'</td>'+
                            '<td>'+value[3]+'</td>'+
                            '<td>'+value[4]+'</td>'+
                            '<td>'+value[5]+'</td>'+
                            '<td>'+value[6]+'</td>'+
                            '<td>'+value[7]+'</td>'+
                            '<td>'+value[8]+'</td>'+
                            '<td>'+value[9]+'</td>'+
                            '<td>'+value[10]+'</td>'+
                            '<td>'+value[11]+'</td>'+
                            '<td>'+value[12]+'</td>'+
                            '<td>'+value[13]+'</td>'+
                            '<td>'+value[14]+'</td>'+
                            '<td>'+value[15]+'</td>'+
                            '<td>'+value[16]+'</td>'+
                            '<td>'+value[17]+'</td>'+
                            '<td>'+value[18]+'</td></tr>';

                });
                // $('#success').text('İşçilər  işə qəbul edildi')

                $("table#employee_table tbody").append(table);
            }
        });


    })
    $('#importTab').on('click',function(event){
        console.log('imppp')
       var file_data = $('#files').prop('files')[0];
        var form_data = new FormData();
        form_data.append('excel', file_data);
        console.log(form_data);
        $.ajax({
            url: 'recruitmentAjInsert.php', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data){
                console.log('data',data); // display response from the PHP script, if any
                console.log('data',$.parseJSON(data)); // display response from the PHP script, if any
                $('#employee_tab').css('display','block');
                $("table#employee_table tbody").html('')
                var table='';
                $.each($.parseJSON(data), function(k,value) {
                    console.log('value=',value)
                        table+=' <tr class="typeOfDocument" >' +
                            '<td>'+parseInt(k+1)+'</td>'+
                            '<td>'+value[0]+'</td>'+
                            '<td>'+value[1]+'</td>'+
                            '<td>'+value[2]+'</td>'+
                            '<td>'+value[3]+'</td>'+
                            '<td>'+value[4]+'</td>'+
                            '<td>'+value[5]+'</td>'+
                            '<td>'+value[6]+'</td>'+
                            '<td>'+value[7]+'</td>'+
                            '<td>'+value[8]+'</td>'+
                            '<td>'+value[9]+'</td>'+
                            '<td>'+value[10]+'</td>'+
                            '<td>'+value[11]+'</td>'+
                            '<td>'+value[12]+'</td>'+
                            '<td>'+value[13]+'</td>'+
                            '<td>'+value[14]+'</td>'+
                            '<td>'+value[15]+'</td>'+
                            '<td>'+value[16]+'</td>'+
                            '<td>'+value[17]+'</td>'+
                            '<td>'+value[18]+'</td></tr>';

                });
                $('#success').text('İşçilər  işə qəbul edildi')

                $("table#employee_table tbody").append(table);
            }
        });


    })
    $(document).on('change', '#files', function () {

        // $("#uploadForm").submit();
        $("#target").submit();
       // var idArray =  <?php //echo json_encode($data); ?>//;
       //console.log('on change=',idArray);
    })
</script>