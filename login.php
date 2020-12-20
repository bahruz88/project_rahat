<?php
   include("config/config.php");
   session_start();
   $error='';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = md5(mysqli_real_escape_string($db,$_POST['password'])); 
      
      $sql = "SELECT * FROM $tbl_users WHERE username = '$myusername' and upass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $uid = $row['id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		  $_SESSION['username']=$myusername ;
		  $_SESSION['uid']=$uid ;
      //   session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>DEP HR</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="dist/img/icons/favicon.ico"/>
<!--===============================================================================================-->
 
</head>
<style>



@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f3e0e2;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
}

.log-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}


.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
}


.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: linear-gradient(to right, #FF4B2B, #FF416C);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 71%;
	color: #fefefe;
}


.overlay-right {
	right: 0;
}


.social-container {
	height: 15px;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

 


 /* The navigation bar */
.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
}

/* Links inside the navbar */
.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 2px 20px 1px 22px;
  text-decoration: none;
}

/* Change background on mouse-over */
.navbar a:hover {
  background: #ddd;
  color: black;
}

/* Main content */
.main {
  margin-top: 30px; /* Add a top margin to avoid content overlay */
} 



#slider, ul
{
	height: 9000px;
}

#slider
{
	margin: auto;
	overflow: hidden;
	padding: 20px;
	margin-top: 50px;
	position: relative;
	width: 120000px;
}

#slider li
{
	float: left;
	position: relative;
	width: 600px;
	display: inline-block;
	height: 900px;
}

#slider ul
{
	list-style: none;
	position: absolute;
	left: 0px;
	top: 0px;
	width: 120000px;
	transition: left .2s linear;
	-moz-transition: left .2s linear;
	-o-transition: left .2s linear;
	-webkit-transition: left .2s linear;
	margin-left: -25px;

  color: #666;
}

/*** Content ***/

.slider-container
{
  color:#fff;
	margin: 0 auto;
	padding: 0;
	width: 600px;
  min-height: 180px;
  text-align:center;
}

.slider-container h2
{
 	color: #fff;
}

.slider-container  p
{
	margin: 10px 25px;
	font-weight: semi-bold;
	line-height: 150%;
}

/*** target hooks ****/

@-webkit-keyframes slide-animation {
	0% {opacity:0;}
	2% {opacity:1;}
	20% {left:0px; opacity:1;}
	22.5% {opacity:0.6;}
	25% {left:-600px; opacity:1;}
	45% {left:-600px; opacity:1;}
	47.5% {opacity:0.6;}
	50% {left:-1200px; opacity:1;}
	70% {left:-1200px; opacity:1;}
	72.5% {opacity:0.6;}
	75% {left:-1800px; opacity:1;}
	95% {opacity:1;}
	98% {left:-1800px; opacity:0;} 
	100% {left:0px; opacity:0;}
}

#slider ul
{
	-webkit-animation: slide-animation 15s infinite;
}

#slider ul:hover
{
	-moz-animation-play-state: paused;
	-webkit-animation-play-state: paused;
}
.img {
  width: 300px;
  height: 200px;
  object-fit: fill;	
	
}

</style>
<body>
	<div class="navbar">
  <a href="login.php">ANA SƏHİFƏ</a>
  <a href="contact.php">ƏLAQƏ</a>
</div>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="#" method="post">
				<h1> <div style="float:left ;"><img src="dist/img/logo.jpeg" width="200" height="50" alt="logo"></div>
				<div style="float:right ;"><img src="dist/img/logo.png" width="70" height="60" alt="logo"></div> </h1>
				<div class="social-container"  >
 
				</div>
				<input type="text" placeholder="İstifadəçi adı:" name="username" />
				<input type="password" name="password" placeholder="Şifrə:"  />
				<a href="#">Şifrəni unutmusan?</a>
				<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error ; ?></div>
				<button type="submit">Daxil ol</button>
			</form>
			
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
 <div id="slider">
<ul>
  <li>
  <div class="slider-container"><h2>Dünyanın işini <br>avtomatlaşdırırıq</h2> 
    <p> Azərbaycanda insan resursları <br> 
	modullarının ən dijital və avtomatik<br> idareedilmesi sistemleri quraraq,<br> 
	kiçik ve orta bizneslerin insan resursları<br> idareetme sistemlerini təkmilleşdirməyi <br>qarşımıza hədəf qoymuşuq.</p>
  </div>
  </li>
 
    <li>
    <div class="slider-container"><h2>Əsas məlumatların idarəsi</h2>
    <p><img src="dist/img/home.png" alt="logo" class="img"  ></p>
  </div>
  </li>
       <li>
    <div class="slider-container"><h2>Geniş  hesabatlılıq  imkanları</h2>
    <p><img src="dist/img/graph.png"  class="img" alt="logo"></p>
  </div>
  </li>
  <li>
    <div class="slider-container"><h2>İş vaxtının  uçotu və <br>daha çox fərqli  <br>funksiyanallıq 1 platformada </h2>
    <p><img src="dist/img/sch.png" class="img" alt="logo"></p>
  </div>
  </li>
    <li>
    <div class="slider-container"><h2>BBB</h2>
    <p> dddddd</p>
  </div>
  </li>
 

</ul>
</div>

				</div>
			</div>
		</div>
	</div>
 
	
 

</body>
</html>