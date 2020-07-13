 <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Qasimov  Bəhruz</a>
        </div>
      </div>

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
           


		   <li class="nav-item">
                <a href="users.php?dil=<?php echo $_SESSION["dil"]; ?>&module=admin&submodule=users" class="nav-link <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="users") { ?>active <?php }}?>">
                 
                  <p>  <?php echo $dil["users"];?></p>
                </a>
              </li>
			  
			  
			  
              <li class="nav-item " >
                <a href="companies.php?dil=<?php echo $_SESSION["dil"]; ?>&module=admin&submodule=companies" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="companies") { ?>active<?php }}?>">
                 
                  <p>  <?php echo $dil["companies"];?></p>
                </a>
              </li>
			  <li class="nav-item " >
                <a href="users.php?dil=<?php echo $_SESSION["dil"]; ?>&module=admin&submodule=modules" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="modules") { ?>active<?php }}?>">
                 
                  <p>  <?php echo $dil["modules"];?></p>
                </a>
              </li>
     
     
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
                <a href="employees.php?dil=<?php echo $_SESSION["dil"]; ?>&module=employees&submodule=employee_list" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="employee_list") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["employee_list"];?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  
                  <p>Təlim, tədris və sertifikatlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  
                  <p>Bacarıqlar</p>
                </a>
              </li>
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
                <a href="schedule.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=schedule_list" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="schedule_list") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["schedule_list"];?></p>
                </a>
              </li>
               <li class="nav-item">
                <a href="overtime.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=overtime" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="overtime") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["overtime_settings"];?></p>
                </a>
              </li>
              
			  <li class="nav-item">
                <a href="overtime.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=overtime_list" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="overtime_list") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["overtime_list"];?></p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="overtime.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=permit_list" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="permit_list") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["permits"];?></p>
                </a>
              </li>
			  
			  <li class="nav-item">
                <a href="overtime.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=exceptions" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="exceptions") { ?>active<?php }}?>" class="nav-link">
                  
                  <p><?php echo $dil["exceptions"];?></p>
                </a>
              </li>
              
			  <li class="nav-item">
                <a href="overtime.php?dil=<?php echo $_SESSION["dil"]; ?>&module=time_management&submodule=inout_list" class="nav-link  <?php  if (isset($_GET["submodule"])) { if ($_GET["submodule"]=="inout_list") { ?>active<?php }}?>" class="nav-link">                  
                  <p><?php echo $dil["inouttime"];?></p>
                </a>
              </li>  
			  
			  
			  <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  
                  <p>Bacarıqlar</p>
                </a>
              </li>
            </ul>
          </li>


		  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Ödəmə məlumatları
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  
                  <p>Əsas ödənişlər</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  
                  <p>Əlavə ödəmə/kəsintilər</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  
                  <p>Məsrəf dağıtımı</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  
                  <p>Bank məlumatları</p></a></li>
            </ul>
          </li>
		  
		  
		  
		  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
			   Digər məlumatlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  
                  <p>Sürücülük vəsiqəsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  
                  <p>Miqrasiya Məlumatları</p>
                </a>
              </li>
              <li class="nav-item">        
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
                <a href="struktur2/index.php" class="nav-link">
                  
                  <p>Struktur</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="struktur/org/index.php" class="nav-link">

                  <p>Struktur menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  
                  <p>İş yeri barədə</p>
                </a>
              </li>
              <li class="nav-item">        
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Sənədlər
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  
                  <p>Editors</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Şirkət Məlumatları
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Əlavələr</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar</p>
            </a>
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e_commerce.html" class="nav-link">
                  
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_add.html" class="nav-link">
                  
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_edit.html" class="nav-link">
                  
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_detail.html" class="nav-link">
                  
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Digər
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Sistem Məlmatları</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Sənədləşmə</p>
            </a>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>