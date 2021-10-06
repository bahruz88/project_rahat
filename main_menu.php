
 <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <?php   if   ($uid!=71){?> <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Qasimov  Bəhruz</a>
        </div>
      </div>
	  <?php }?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
 


          <li class="nav-item has-treeview <?php if (isset($_GET["module"])) { if ($_GET["module"]=='admin') { ?> menu-open <?php }} ?>">
		  <a href="#" class="nav-link <?php /*if (isset($_GET["module"])) { if ($_GET["module"]=='admin') { ?> active <?php }}*/ ?>">
            <i class="nav-icon fas fa-tools"></i>
          <p>
                <?php echo $dil["adminpage"];?>
			  <i class="right fas fa-angle-left"></i>
			  </p>
          </a>
            <ul class="nav nav-treeview nav-item ">
           

 <?php   if   ($uid!=71){?>
		   <li class="nav-item">
                <a href="users.php?dil=<?php echo $_SESSION["dil"]; ?>&module=admin&submodule=users&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="users") { ?>active <?php }}?>">
                 
                  <p>  <?php echo $dil["users"];?></p>
                </a>
              </li>
		 <?php  }?>	  
			  
			  
              <li class="nav-item " >
                <a href="companies.php?dil=<?php echo $_SESSION["dil"]; ?>&module=admin&submodule=companies&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="companies") { ?>active<?php }}?>">
                 
                  <p>  <?php echo $dil["companies"];?></p>
                </a>
              </li>
	  <?php   if   ($uid!=71){?>
			  <li class="nav-item " >
                <a href="users.php?dil=<?php echo $_SESSION["dil"]; ?>&module=admin&submodule=modules&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="modules") { ?>active<?php }}?>">
                 
                  <p>  <?php echo $dil["modules"];?></p>
                </a>
              </li>
      <?php  }?>
	  
	   <?php   if   ($uid!=71){?>
			  <li class="nav-item " >
                <a href="users.php?dil=<?php echo $_SESSION["dil"]; ?>&module=admin&submodule=groups&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="groups") { ?>active<?php }}?>">
                 
                  <p>  <?php echo $dil["groups"];?></p>
                </a>
              </li>
      <?php  }?>
     
	   <?php   if   ($uid!=71){?>
			  <li class="nav-item " >
                <a href="users.php?dil=<?php echo $_SESSION["dil"]; ?>&module=admin&submodule=roles&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="roles") { ?>active<?php }}?>">
                 
                  <p>  <?php echo $dil["roles"];?></p>
                </a>
              </li>
      <?php  }?>

            </ul>
          </li>

			 <li class="nav-item has-treeview <?php if (isset($_GET["module"])) { if ($_GET["module"]=='employees') { ?> menu-open <?php }} ?>">
			 <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
          <p>
              <?php echo $dil["employees"];?>
			  <i class="fas fa-angle-left right"></i>
		    </p>
          </a>
         
         
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employees.php?dil=<?php echo $_SESSION["dil"]; ?>&module=employees&submodule=employee_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="employee_list") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["employee_list"];?></p>
                </a>
              </li>
<!--              <li class="nav-item">-->
<!--                <a href="pages/charts/flot.html" class="nav-link">-->
<!--                  -->
<!--                  <p>Təlim, tədris və sertifikatlar</p>-->
<!--                </a>-->
<!--              </li>-->
<!--              <li class="nav-item">-->
<!--                <a href="pages/charts/inline.html" class="nav-link">-->
<!--                  -->
<!--                  <p>Bacarıqlar</p>-->
<!--                </a>-->
<!--              </li>-->
            </ul>
          </li>


			 <li class="nav-item has-treeview <?php if (isset($_GET["module"])) { if ($_GET["module"]=='time_management') { ?> menu-open <?php }} ?>">
			 <a href="#" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
          <p>
              <?php echo $dil["time_management"];?>
			  <i class="fas fa-angle-left right"></i>
		    </p>
          </a>
         
         
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="schedule.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=schedule_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="schedule_list") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["schedule_list"];?></p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="employee_schedules.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=employee_schedules&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="employee_schedules") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["employee_schedules"];?></p>
                </a>
              </li>			  
               <li class="nav-item">
                <a href="overtime_settings.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=overtime&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="overtime") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["overtime_settings"];?></p>
                </a>
              </li>
           <?php   if   ($uid!=71){?>
			  <li class="nav-item">
                <a href="overtime_list.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=overtime_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="overtime_list") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["overtime_list"];?></p>
                </a>
              </li>

			  			  <li class="nav-item">
                <a href="overtime_settings.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=permit_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="permit_list") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["permits"];?></p>
                </a>
              </li>
			  
			  <li class="nav-item">
                <a href="overtime_settings.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=exceptions&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="exceptions") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["exceptions"];?></p>
                </a>
              </li>
              
			  <li class="nav-item">
                <a href="overtime_settings.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=inout_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="inout_list") { ?>active<?php }}?>" class="nav-link">                  
                  <p><?php echo $dil["inouttime"];?></p>
                </a>
              </li>  
			  
			   <?php  }?>
			  <li class="nav-item">
                  <a href="tab.php?dil=<?php echo $_SESSION["dil"]; ?>&module=tab&submodule=tab_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link">

                      <p><?php echo $dil["tab"];?></p>
                  </a>
              </li>
		  
            </ul>
          </li>

 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-sitemap"></i>
              <p>
			  			   Struktur Məlumatları
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="struktur.php?dil=<?php echo $_SESSION["dil"]; ?>&module=structure&submodule=structure_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link">
                  
                  <p>Struktur</p>
                </a>
              </li>
                <li class="nav-item">
 
                <a href="orgchart.php?dil=<?php echo $_SESSION["dil"]; ?>&module=orgchart&submodule=orgchart_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link">

                  <p>Struktur menu</p>
                </a>
              </li>
                <li class="nav-item">

                <a href="staff.php?dil=<?php echo $_SESSION["dil"]; ?>&module=staff&submodule=staff_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link">

                  <p>Ştat cədvəli</p>
                </a>
              </li>
<!--              <li class="nav-item">-->
<!--                <a href="pages/charts/flot.html" class="nav-link">-->
<!--                  -->
<!--                  <p>İş yeri barədə</p>-->
<!--                </a>-->
<!--              </li>-->
              <li class="nav-item">        
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
<!--              <i class="fas fa-sitemap"></i>-->
<!--                <i class="fas fa-users-class"></i>-->
                <i class="fas fa-users-cog"></i>
              <p>
                  <?php echo $dil["bulk_operation"];?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="recruitment.php?dil=<?php echo $_SESSION["dil"]; ?>&module=recruitment&submodule=recruitment_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link">

                  <p><?php echo $dil["recruitment"];?></p>
                </a>
              </li>

            </ul>
          </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-money-bill-alt"></i>
                    <!--                    <i class="fas fa-sitemap"></i>-->
                    <p>
                        Payroll
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="salaryInfo.php?dil=<?php echo $_SESSION["dil"]; ?>&module=salaryInfo&submodule=salaryInfo_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link">

                            <p>Əmək Haqqı məlumatları</p>
                        </a>
                    </li>
                    <li class="nav-item">

                        <a href="orgchart.php" class="nav-link">

                            <p>Əmək haqqı cədvəli</p>
                        </a>
                    </li>
             
                    <li class="nav-item">
                </ul>
            </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="far fa-file"></i>
                <p>
                Sənədlər
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="contracts.php?dil=<?php echo $_SESSION["dil"]; ?>&module=contracts&submodule=contracts_list&company_id_main=<?php echo $_SESSION["CompanyId"]; ?>" class="nav-link">
                  
                  <p>Müqavilələr və Əmrlər</p>
                </a>
              </li>
            
        
            </ul>
          </li>
          
 
		   <?php   if   ($uid!=71){?>
          <li class="nav-header">Əlavələr</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar</p>
            </a>
          </li>
         <?php  }?>

 
    <!--
          <li class="nav-header">Sistem Məlmatları</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Sənədləşmə</p>
            </a>
          </li>-->
		  
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>