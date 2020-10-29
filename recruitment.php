<?php
include('session.php');
$site_lang=$_SESSION['dil'] ;
function generateRandomString($length = 2) {
    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
if(isset($_POST["import"]))
{

    echo $filename=$_FILES["excel"]["tmp_name"];
    if($_FILES["excel"]["size"] > 0)
    {
        $file = fopen($filename, "r");
//$sql_data = "SELECT * FROM prod_list_1 ";

        $count = 0;                                         // add this line
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            print_r($emapData);
            $firstname=$emapData[0];
            $lastname=$emapData[1];
            $surname = $emapData[2];
            $sex = $emapData[3];
            $marital_status = $emapData[4];
            $birth_date = $emapData[5];
            $birth_place = $emapData[6];
            $citizenship = $emapData[7];
            $pincode = $emapData[8];
            $pass_seria_num = $emapData[9];
            $passport_date = $emapData[10];
            $passport_end_date = $emapData[11];
            $pass_given_authority = $emapData[12];
            $living_address = $emapData[13];
            $reg_address = $emapData[14];
            $mob_tel = $emapData[15];
            $home_tel = $emapData[16];
            $email = $emapData[17];
            $emr_contact = $emapData[18];
//            if(isset($emapData['imgName'])){
//                $imgName = $_POST['imgName'];
//            }else{
//                $imgName = "images/users/def.png";
//            }

//            $company_id = $emapData['company_id'];
//	echo 'company_id='.$company_id;
            //$empno_num='00000000' ;

            $empno=generateRandomString();
            $empno=$empno.mt_rand(10000000,99999999);


            $passport_date = strtr($passport_date, '/', '-');
            $passport_date= date('Y-m-d', strtotime($passport_date));

            $passport_end_date = strtr($passport_end_date, '/', '-');
            $passport_end_date= date('Y-m-d', strtotime($passport_end_date));

            $birth_date = strtr($birth_date, '/', '-');
            $birth_date= date('Y-m-d', strtotime($birth_date));

            $birth_date = strtr($birth_date, '/', '-');
            $birth_date= date('Y-m-d', strtotime($birth_date));

//-$passport_date=date('Y-m-d',strtotime($passport_date));



            $count++;                                      // add this line

            if($count>1){                                  // add this line
//                $sql = "INSERT into tbl_excel(excel_name,excel_email) values ('$emapData[0]','$emapData[1]')";
                $sql = "INSERT INTO $tbl_employees (id, firstname, lastname, surname, sex, marital_status, birth_date,
 birth_place,citizenship, pincode, passport_seria_number, passport_date, passport_end_date, pass_given_authority, 
 living_address, reg_address, home_tel, mob_tel, email, emr_contact,empno) 
 VALUES ('Null','$firstname','$lastname','$surname','$sex', '$marital_status','$birth_date','$birth_place','$citizenship','$pincode','$pass_seria_num','$passport_date','$passport_end_date',
 '$pass_given_authority','$living_address','$reg_address','$mob_tel','$home_tel','$email','$emr_contact','$empno')";

                $db->query($sql);
            }                                              // add this line
        }


        fclose($file);
        echo 'CSV File has been successfully Imported';
//        header('Location: index.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}

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
        .staffText,.staffText2{
            font-weight: 700;
            margin-top:20px;
            margin-bottom:20px;
        }
        /*table.fancytree-ext-table tbody tr td{*/
        /*    border: #c7c2c2 !important;*/
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
	<br>
<div class="col-12 col-sm-6 col-lg-12">
 <div class="card">
<div class="card-body">

    <div class="container box text-center">
        <h3 align="center">İşçilərin toplu şəkildə işə qəbulu</h3><br />

        <button type="button" class="btn btn-info" onclick="downloadCSV(dd)">Şablonu yükləyin</button>
         <br />
        <br />
        <form method="post" enctype="multipart/form-data" style="display:none;">
            <label>Doldurduğunuz şablonu seçin</label>
<!--            <input type="file" name="excel" value="Seçin"/>-->
            <div>
                <label for="files" class="btn btn-info">Seçin</label><br />
                <input id="files" style="visibility:hidden;"  name="excel" type="file">
            </div>

            <br />
            <input type="submit" name="import" class="btn btn-info" value="Əlavə edin" />
        </form>
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
        "Mobil telefonu","Vəsiqəni verən orqanın adı","Ev telefonu","Email","Təcili vəziyyətdə əlaqə"
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
</script>