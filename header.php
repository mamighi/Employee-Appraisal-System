<?php
  $dashboard= "myButton";
  $oldrequests = "myButton";
$menulinkid = basename($_SERVER['PHP_SELF'],".php");
if($menulinkid == "dashboard"){
    $dashboard="myActiveButton";
}else {
    $oldrequests = "myActiveButton";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--iOS/android/handheld specific -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="Approved Requests">
<meta name="keywords" content="Proccessed Requests">
<meta name="author" content="Emad">
<title>Approved Requests</title>
<!--<link rel="stylesheet" href="style.css" type="text/css" /> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="assets/demo.css">
  <link rel="stylesheet" href="assets/header-login-signup.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
 <!-- <link rel="stylesheet" href="assets/css/main.css" /> -->

<style>
.submit_button {
	width:95px;
	height:35px;
	cursor:pointer;
        font-weight: bold;
	background-color: #3a3c3e;
	padding: 10px 15px;
	border-radius: 3px;
        color:#fffff;
        align:left;	
}
html, body {
   margin:0;
   padding:0;
   height:100%;
}
body {
	border: 0;
    font: 12px "Trebuchet MS";
	color: #000;
	background:#ffffff;
}

#body{ 
	width:100%;
    margin: 0 auto;
    max-width: 100%;
	padding:0px 0 0px 0;
	height: 100%;
}

#container {
   min-height:100%;
   position:relative;
}


footer {
    position: absolute;
    bottom: 0;
	left:0;
    height: 70px;
    width: 100%;
	background:#f7f7f7;
	color:#000;
}
.copyright{float:left;padding:10px 0 0 20px; }
.footerlogo{float:right;padding:10px 20px 0 0;}
.resultRow{width:100%; margin:2px 0; border:1px solid #8D8D8D;padding:2px; color:#000;}
.height10{clear:both;height:10px;}
.height20{clear:both;height:20px;}
.height30{clear:both;height:30px;}
.height60{clear:both;height:60px;}


.title{ font-size:20px; padding:10px; text-align:center;}

.links{border:1px solid #000; padding:5px; text-decoration:none;color:#000;}
.links:hover{text-decoration:underline;color:#fff; background:#6D37B0;}
.selected{border:1px solid #000; padding:5px; text-decoration:none;color:#fff; background:#6D37B0;}
/****************************************************/

table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered td, .bordered th {
    padding: 0px;
    border-bottom: 1px solid #f2f2f2;    
	
}

.bordered th {
	background-color:#292c2f;
	border-top: none;
	text-align:center;
        color: #ffffff;
}



.textboxes{ width:280px; border:1px solid #000; height:20px; }
.required{color:#F00;}


#container{
    text-align: center;
}

 .header-limiter nav {
	font:16px Arial, Helvetica, sans-serif;
	line-height: 40px;
    
	float: left;
	margin: 0 0 0 60px;
	padding: 0px 0px;
}
.header-login-signup{
	background-color:#292c2f;
	box-shadow:0 1px 1px #ccc;
	padding: 0px 0px;
	height:70px;
	width:100%;
	color: #ffffff;
	box-sizing: border-box;
	float: left;
}
.header-login-signup .header-limiter nav a{
	font-size: 14px;
	display: inline-block;
	padding: 0px 0px;
	
	text-decoration:none;
	line-height: 1;
}

.header-login-signup .header-limiter nav a:hover {
	opacity: 1;
}
.header-login-signup .header-limiter nav ul {
	font: 14px Arial, Helvetica, sans-serif;
	list-style: none;
	line-height: 1;
	float: left;
        
}
.header-login-signup .header-limiter ul {
	font: 14px Arial, Helvetica, sans-serif;
	list-style: none;
	line-height: 1;
	float: right;
}

.header-login-signup .header-limiter ul li {
	display: inline-block;
	margin-left: 1px;
        opacity: 0.9;
        
	
}
.header-login-signup .header-limiter ul li a {
	font-weight: bold;
	background-color:#3a3c3e;
	border-radius: 3px;
        opacity: 0.9;
}



.header-login-signup .header-limiter ul li:hover{
	opacity: 1;
}
.header-login-signup .header-limiter ul li a.myButton{
       font-weight: bold;
	background-color:#3a3c3e;
	padding: 10px 25px ;
	border-radius: 3px;
        opacity: 0.9;

}
.header-login-signup .header-limiter ul li a.myActiveButton{
        font-weight: bold;
	background-color: #ffffff;
	padding: 10px 25px ;
	border-radius: 3px;
        opacity: 0.9;
	background-color:white;
        color:black
}




</style>
</head>

<body>
<div id="container">
  <div id="body">
<header class="header-login-signup">

	<div id="menu" class="header-limiter">
  
		<h1><a href="#"><img src="applogo.png" style="width:70px;height:60px; align:left;"></a>
                <a href="#" >AHEIEPMSAS</a>
                 </h1>
                 		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="ManageCourts.html">Home</a></li>
					<li><a href="editBo.html">Menu</a></li>
					<li><a href="bookcourtBo.html">Profile</a></li>
					<li><a href="index.php">Sign Out</a></li>
				</ul>
			</nav>


	</div>

</header>
   <div class="height10"></div>
   <article>
      <div class="height20"></div>