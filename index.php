<?php    
  include('session.php');  

?>
<!-- Tell the browser to be responsive to screen width -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo $company_name ; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">

  <!-- Navbar -->
 <?php  include ("navbar.php")?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/rhr.png" alt="" class="brand-image  elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">&ensp; </span>
    </a>

    <!-- Sidebar -->
   <?php  include("main_menu.php") ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
      
          <div class="col-sm-6">
         
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-2">
            <!-- AREA CHART -->
           
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
 
              <div class="card-body ">
			    <div class="row">
			  <div class="col">
			  <div class="chartjs-size-monitor">
			  <div class="chartjs-size-monitor-expand">
			  <div class=""></div>
			  </div>
			  <div class="chartjs-size-monitor-shrink">
			  <div class=""></div>
			  </div>
			  </div>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 765px;" width="765" height="250" class="chartjs-render-monitor"></canvas>
              </div>
			  
			  <div class="col"> <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 765px;" width="765" height="250" class="chartjs-render-monitor"></canvas>
              </div>
		
			  </div>
			  </div>
              <!-- /.card-body -->
            </div>
			
 
            <!-- PIE CHART -->
            <div class="card card-success">
 
              <div class="card-body">
                <div class="chart">
				<div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 765px;" width="765" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
		       <!-- BAR CHART -->
       
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
 
              <div class="card-body">
                <div class="chart">
				<div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="stackedBarChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 765px;" width="765" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- LINE CHART -->
            <div class="card card-info">
 
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="pieEdu" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 765px;" width="765" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

       

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php  include ("footer.php"); ?>

  <!-- Control Sidebar -->
 <!--   <aside class="control-sidebar control-sidebar-dark">
   Control sidebar content goes here -->
  <!--  </aside>
 /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
 
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/chart.js/charts_plugin.js"></script><!-- Sparkline -->
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
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
	  
    
	
	var sessCompany = '<?php echo $_SESSION['CompanyId']?>';
	
		if   (sessCompany=='NOCOMPANY'){
		 $('#modalCompanySelect').modal({
		  backdrop: 'static',
		  keyboard: false
		});

		}

	  $.ajax({
    url : "chart_data/get_employee_sex_count.php",
    type : "GET",
    success : function(data){
    console.log(data );
	var data = JSON.parse(data);
    var name = [];
    var mark = [];
	var reng = [];
	   for(var i in data) {
		name.push(data[i].name);
		mark.push(data[i].mark);
		reng.push(data[i].reng);
	   }
 
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: name,
      datasets: [
        {
			
		  label: '# of Votes',
          data: mark,
          backgroundColor : ["rgb(255, 99, 132)","rgb(54, 162, 235)"],
        }
      ]
    }

    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
	   legend: {
          display: true ,

        },
	  plugins: {
          labels: {
            render: ['value','percentage'],
            fontColor: ['white', 'white'],
            precision: 2 ,
 
          }
        },
    }
	
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })
 
 

	  }}) ;
	  
	 /*Structure  count*/ 
	    $.ajax({
    url : "chart_data/get_company_structure_count.php",
    type : "GET",
    success : function(data){
    console.log(data );
	var data = JSON.parse(data);
    var name = [];
    var mark = [];
	var reng = [];
	   for(var i in data) {
		name.push(data[i].name);
		mark.push(data[i].mark);
		reng.push(data[i].reng);
	   }
 
 // Bar chart
new Chart(document.getElementById("stackedBarChart2"), {
    type: 'bar',
    data: {
      labels: name,
      datasets: [
        {
		 
          label: "SAY ",
          backgroundColor: reng,
          data: mark  
        }
      ]
    },
    options: {
		     plugins: {
        labels: {
          render: () => {}
        }
      },
      legend: { display: false },
      title: {
        display: true,
        text: 'Struktur Vahidləri Üzrə Say Qrafiki'
      },
	  responsive              : true,
      maintainAspectRatio     : true,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }
	
	
	
});
new Chart(document.getElementById("pieChart"), {
    type: 'bar',
    data: {
      labels: ["20-30", "30-40", "40-50", "50-60"],
      datasets: [
        {
          label: "Kişi",
          backgroundColor: "#3e95cd",
          data: [133,221,783,2478]
        }, {
          label: "Qadın",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Cinslər üzrə yaş aralığı  qrafiki'
      }
    }
});

	  }}) ;
	  
	  
/*Marital Status*/
	  $.ajax({
    url : "chart_data/get_employee_marital_status_count.php",
    type : "GET",
    success : function(data){
    console.log(data );
	var data2 = JSON.parse(data);
    var name2 = [];
    var mark2 = [];

	   for(var i in data2) {
		name2.push(data2[i].name);
		mark2.push(data2[i].mark);
	   }

    var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
    var donutData2        = {
      labels: name2,
      datasets: [
        {
		  label: '# of Votes',
          data: mark2,
          backgroundColor : ["rgb(255, 99, 132)","rgb(54, 162, 235)"],
        }
      ]
    }

	
	
    var donutOptions2     = {
      maintainAspectRatio : false,
      responsive : true,
	   legend: {
          display: true ,

        },
	  plugins: {
          labels: {
            render: ['value','percentage'],
            fontColor: ['white', 'white'],
            precision: 2 ,
 
          }
        },
    }
	
    var donutChart2 = new Chart(donutChartCanvas2, {
      type: 'doughnut',
      data: donutData2,
      options: donutOptions2      
    })

 

 
	  }}) ;  
  
 
	  $.ajax({
    url : "chart_data/get_company_education_level_count.php",
    type : "GET",
    success : function(data){
    console.log(data );
	var data = JSON.parse(data);
    var name = [];
    var mark = [];
	var reng = [];
	   for(var i in data) {
		name.push(data[i].name);
		mark.push(data[i].mark);
		reng.push(data[i].reng);
	   }

 

new Chart(document.getElementById("pieEdu"), {
    type: 'pie',
    data: {
	labels: name ,
      datasets: [{
        label: "Təhsil  səviyyələri üzrə qrafik",
        backgroundColor: [ "#3cba9f","#8e5ea2","#c45850"],
        data: mark
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Təhsil  səviyyələri üzrə qrafik'
      },
	    plugins: {
          labels: {
            render: ['value','percentage'],
            fontColor: ['white', 'white', 'white', 'white', 'white'],
            
 
          }
        },
    }
});

 
	  }}) ;  
  
  })
</script>
</body>
</html>
