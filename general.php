<?php
include('session.php');

if(isset($_GET['id_user'])){
    $id_user=$_GET['id_user'];
}


 $ses_users ="select * from $tbl_users where id =$id_user ";
// echo '$ses_users='.$ses_users;
$result_users = $db->query($ses_users);
$user_name = '';
$firstname = '';

$lastname = '';
$email= '';
$u_photo = '';
$login_lang = '';
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {

            $user_name = $row_users['username'];
            $firstname = $row_users['firstname'];
            $lastname = $row_users['lastname'];
            $email= $row_users['reg_mail'];
            $u_photo=$row_users['u_photo'];
            $login_lang = $row_users['def_lang'];
            $login_fullname= $row_users['firstname'].' '.$row['lastname'];

        }
    }
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .clearFix{
            clear: both;
        }
        .info{
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
        }
        .panel{
            box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
            margin:10px;
            padding:10px;
        }
        .profile-user-img{
            width:100px;
            height:100px;
        }
        .btn {
            padding:5px !important;
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
            <img src="dist/img/rhr.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">User Profile</li>
    </ol>
    </div>
    </div>
    </div>
    </section>-->
        <!-- /.container-fluid -->
        <!-- Main content --><br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <?php
                                    if($u_photo==''){
                                        $u_photo = 'images/users/def.png';
                                    }?>

                                    <form id="uploadForm" action="upload.php" method="post">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="<?php echo $u_photo; ?>" alt="User profile picture" id="default">
                                        <div id="targetLayer"></div>
                                        <div id="uploadFormLayer">
                                            <input name="uid" type="hidden" class="inputFile"  value="<?php  echo $uid ; ?>"/>
                                            <input name="emp_id" type="hidden" class="inputFile"  value="<?php  echo $emp_id ; ?>"/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <label for="files" class="btn btn-primary btn-block btn-outlined">Şəkli dəyiş</label>
                                                <input id="files"  name="userImage" style="display: none" type="file">
                                                <!--                            <input name="userImage" type="file" class="inputFile" /><br/>-->
                                                <input type="submit" value="Əlavə et" class="btnSubmit" style="display:none;" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="password" class="btn btn-primary btn-block btn-outlined">Şifrəni dəyiş</label>
                                                    <input id="password"  name="password" style="display: none" type="button">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="clearFix"></div>


                                <h3 class="profile-username text-center"><?php  echo $login_fullname ; ?></h3>

                                <p class="text-muted text-center"><?php echo $profession_user; ?></p>

<!--                                <ul class="list-group list-group-unbordered mb-3">-->
<!--                                    <li class="list-group-item">-->
<!--                                        <b>--><?php //echo $dil["mob_tel"];?><!--</b> <a class="float-right">--><?php //echo $mob_tel; ?><!--</a>-->
<!--                                    </li>-->
<!--                                    <li class="list-group-item">-->
<!--                                        <b>--><?php //echo $dil["home_tel"];?><!--</b> <a class="float-right">--><?php //echo $home_tel; ?><!--</a>-->
<!--                                    </li>-->
<!--                                    <li class="list-group-item">-->
<!--                                        <b>--><?php //echo $dil["company_name"];?><!--</b> <a class="float-right">--><?php //echo $company_name; ?><!--</a>-->
<!--                                    </li>-->
<!--                                </ul>-->

<!--                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Tab panes -->
                                    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
                                        <div class="tab-pane active" id="employees">
                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="firstname"><?php echo $dil["firstname"];?></label>
                                                    <input type="text" class="form-control" id="firstname" value="<?php echo $firstname; ?>" name="firstname" placeholder="<?php echo $dil["firstname"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="lastname"><?php echo $dil["lastname"];?></label>
                                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>"  placeholder="<?php echo $dil["lastname"];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group  row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="username"><?php echo $dil["username"];?></label>
                                                    <input type="text" class="form-control" id="username" value="<?php echo $user_name; ?>" name="username" placeholder="<?php echo $dil["username"];?>" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 col-form-label" for="email"><?php echo $dil["email"];?></label>
                                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>"  placeholder="<?php echo $dil["email"];?>" readonly />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <!--                      <div class="time-label">-->
                                    <!--                        <span class="bg-danger">-->
                                    <!--                          10 Feb. 2014-->
                                    <!--                        </span>-->
                                    <!--                      </div>-->
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="fas fa-envelope bg-primary"></i>-->
                                    <!---->
                                    <!--                        <div class="timeline-item">-->
                                    <!--                          <span class="time"><i class="far fa-clock"></i> 12:05</span>-->
                                    <!---->
                                    <!--                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>-->
                                    <!---->
                                    <!--                          <div class="timeline-body">-->
                                    <!--                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,-->
                                    <!--                            weebly ning heekya handango imeem plugg dopplr jibjab, movity-->
                                    <!--                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle-->
                                    <!--                            quora plaxo ideeli hulu weebly balihoo...-->
                                    <!--                          </div>-->
                                    <!--                          <div class="timeline-footer">-->
                                    <!--                            <a href="#" class="btn btn-primary btn-sm">Read more</a>-->
                                    <!--                            <a href="#" class="btn btn-danger btn-sm">Delete</a>-->
                                    <!--                          </div>-->
                                    <!--                        </div>-->
                                    <!--                      </div>-->
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="fas fa-user bg-info"></i>-->
                                    <!---->
                                    <!--                        <div class="timeline-item">-->
                                    <!--                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>-->
                                    <!---->
                                    <!--                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request-->
                                    <!--                          </h3>-->
                                    <!--                        </div>-->
                                    <!--                      </div>-->
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="fas fa-comments bg-warning"></i>-->
                                    <!---->
                                    <!--                        <div class="timeline-item">-->
                                    <!--                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>-->
                                    <!---->
                                    <!--                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>-->
                                    <!---->
                                    <!--                          <div class="timeline-body">-->
                                    <!--                            Take me to your leader!-->
                                    <!--                            Switzerland is small and neutral!-->
                                    <!--                            We are more like Germany, ambitious and misunderstood!-->
                                    <!--                          </div>-->
                                    <!--                          <div class="timeline-footer">-->
                                    <!--                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>-->
                                    <!--                          </div>-->
                                    <!--                        </div>-->
                                    <!--                      </div>-->
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <!--                      <div class="time-label">-->
                                    <!--                        <span class="bg-success">-->
                                    <!--                          3 Jan. 2014-->
                                    <!--                        </span>-->
                                    <!--                      </div>-->
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="fas fa-camera bg-purple"></i>-->
                                    <!---->
                                    <!--                        <div class="timeline-item">-->
                                    <!--                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>-->
                                    <!---->
                                    <!--                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>-->
                                    <!---->
                                    <!--                          <div class="timeline-body">-->
                                    <!--                            <img src="http://placehold.it/150x100" alt="...">-->
                                    <!--                            <img src="http://placehold.it/150x100" alt="...">-->
                                    <!--                            <img src="http://placehold.it/150x100" alt="...">-->
                                    <!--                            <img src="http://placehold.it/150x100" alt="...">-->
                                    <!--                          </div>-->
                                    <!--                        </div>-->
                                    <!--                      </div>-->
                                    <!-- END timeline item -->
                                    <!--                      <div>-->
                                    <!--                        <i class="far fa-clock bg-gray"></i>-->
                                    <!--                      </div>-->
                                </div>
                            </div>

                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->

        </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php  include ("footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">

    $(document).ready(function (e) {
        $(document).on('change', '#files', function () {
            console.log('on change')
            $("#uploadForm").submit();
        })

        $("#uploadForm").on('submit',(function(e) {
            console.log('on submit')
            e.preventDefault();
            $.ajax({
                url: "upload.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $('#default').css('display','none')
                    $("#targetLayer").html(data);

                },
                error: function()
                {
                }
            });
        }));




    });
    var atextEdu=$('#qual').text()
    var atextOther=$('#qual2').text()
    $(".dropdown-menu").on("click", "a", function () {
        console.log('sdsfsdf')
        var item=$(this).text();
        var parentId=$(this).closest('li').find('.dropdown-toggle').attr('id')
        if(parentId=='qual'){
            $(this).closest('li').find('a.nav-link').html(atextEdu+'/'+item)
            $('#qual2').text(atextOther)

        }else{
            $(this).closest('li').find('a.nav-link').html(atextOther+'/'+item)
            $('#qual').text(atextEdu)
        }
    })
    $('#password').on('click', function() {
        console.log('sss')
        // window.location.href='changePass.php;
        window.location.href ="/changePass.php?id_user=<?php  echo $id_user; ?>"
    });
    // $("#eduinfotab").on('click',(function(e) {
    //     console.log('salam='+$(this).closest('li').find('a').text())
    //     $(this).closest('li').find('a').append('/salam')
    //     console.log('salam2='+$(this).closest('li').find('a').text())
    // });
</script>

<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
</body>
</html>
