 <?php  			
 $result_lang_nav = $db->query($sql_lang);
 $nav_companyid=$_SESSION["CompanyId"];
   $sql_def_company = mysqli_query($db,"select * from $tbl_employee_company where id = '$nav_companyid' ");
   $row_def_company = mysqli_fetch_array($sql_def_company,MYSQLI_ASSOC);
?>
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link"><?php echo $dil["homepage"];?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?php echo $dil["contact"];?></a>
      </li>-->
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="<?php echo $dil["search"];?>" placeholder="<?php echo $dil["search"];?>" aria-label="<?php echo $dil["search"];?>">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

	       <!-- Languages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas  mr-2"><img src="<?php echo  $lang_image; ?>" width ="25px" height="25px" class="img-circle elevation-2" ></i>
 
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
			<?php if ($result_lang_nav->num_rows > 0) {
					while($row_lang_nav = $result_lang_nav->fetch_assoc()) {
						
					?>						
          <div class="dropdown-divider"></div>
          <a href="./?dil=<?php echo $row_lang_nav['short_name']; ?>" class="dropdown-item">
            <i class="fas  mr-2"><img src="<?php echo $row_lang_nav['image_path']; ?>" width ="25px" height="25px" class="img-circle elevation-2" ></i><?php echo $dil[$row_lang_nav['lang_code']];?>
          </a>
		  <?php } }?>
	 
   
        </div>
      </li>	 
	 
    <li class="nav-item dropdown">
	        <a class="nav-link "   data-toggle="dropdown" href="#">
			<i class="fas  fa-sitemap nav-icon mr-1"></i> <b> <?php  if  (isset($row_def_company['company_name'])) {echo $row_def_company['company_name'];} ?></b>
			</a>
  
        <div class="dropdown-menu dropdown-menu-lg  dropdown-menu-right" >
             <?php
			 
			 
			 if(empty($_GET["company_id_main"])){
			 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
				$link = "https"; 
				else  	$link = "http"; 
				$link .= "://"; 
				$link .= $_SERVER['HTTP_HOST']; 
				$link .= $_SERVER['REQUEST_URI']; 
			  $symb_cnt=strpos($link,"?");
			  }
			  else {
				   if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
				$link = "https"; 
				else  	$link = "http"; 
				$link .= "://"; 
				$link .= $_SERVER['HTTP_HOST']; 
				$link .= $_SERVER['REQUEST_URI']; 
				
				 $link = substr($link,0,strpos($link,"&company_id_main="));
				  
				  $symb_cnt=strpos($link,"?");
			  }
                 $result_company = $db->query($sql_employee_company);
                 if ($result_company->num_rows > 0) {
                     while($row_company= $result_company->fetch_assoc()) {
                         ?>
			<div class="dropdown-divider"></div>
			<?php
			 if ($symb_cnt>0){
			
			?>
		  <a href="<?php echo $link ; ?>&company_id_main=<?php echo  $row_company["id"]  ; ?>" class="dropdown-item " style="white-space:normal;">
            <i class="flag-icon flag-icon-us mr-2"></i> <?php echo  $row_company['company_name'];  ?> 
          </a>
			 <?php } else{?>
             
		  <a href="<?php echo $link ; ?>?company_id=<?php echo  $row_company["id"]  ; ?>" class="dropdown-item " style="white-space:normal;">
            <i class="flag-icon flag-icon-us mr-2"></i> <?php echo  $row_company['company_name'];  ?> 
          </a>
			 
			 <?php
					 }} }?>
        </div>
      </li>
	  <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user "></i>
		  <i class="fas"><?php  echo $login_fullname ; ?></i>
 
        </a>
        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right" >
        
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" alt="User profile picture" src="<?php if ($u_photo_user!='') { echo $u_photo_user ;}else { echo 'images/users/def.png' ;} ?>">
                </div>

                <h3 class="profile-username text-center"><?php  echo $login_fullname ; ?></h3>

                <p class="text-muted text-center"><?php echo $profession_user; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                 </ul>
  <div class="btn-group btn-group-lg" style="text-align:center;width:100%;">

    <a type="button" href="general.php?id_user=<?php  echo $id_user ; ?>" class="btn btn-primary"><?php echo $dil["profile"];?></a>
    <a type="button" href="logout.php" class="btn btn-primary"><?php echo $dil["logout"];?></a>         
			 </div>
              <!-- /.card-body -->
            </div>
		 
		  
  
   
        </div>
      </li>

      <!-- Notifications Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
       -->
    </ul>
	
  </nav>