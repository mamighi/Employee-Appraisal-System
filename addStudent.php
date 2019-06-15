<?php
require_once("libs/config.php");

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Add Student</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo">
				<a href="#"><img src="applogo.png" style="width:40px;height:40px; align:left;"></a>
                <a href="#">
                    <span>AHEIEPMSAS</span>			    
				    </a></div>
				<a href="#menu">Menu</a>
					<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="managerHome.php">Home</a></li>
					<li><a href="index.html">Sign Out</a></li>
				</ul>
			</nav>
			</header>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
							<header class="align-center">
								<h1>Add Student</h1>
							</header>
									  
					<div id="BO">
					<div class="row uniform">
				
						<div class="6u 12u$(xsmall)">
						 Student Id:
						<input type="text" name="sid" id="sid" value="" placeholder="Student Id">
						</div>
						<div class="6u 12u$(xsmall)">
						Full Name:
						<input type="text" name="name" id="name" value="" placeholder="Name">
						</div>
						<div class="6u 12u$(xsmall)">
						    Password:
						    <input type="password" name="pass" id="pass" value="" placeholder="Password">
						</div>
						<div class="6u 12u$(xsmall)">
						    Confirm Password:
						    <input type="password" name="cpass" id="cpass" value="" placeholder="Password">
						</div>
					
					</div>
				</div>
				   <div style="height:20px"></div>
					<div class="6u 12u$(xsmall)">
							<button id="ubo" class="button fit" style="width:50%; background:green">Save</button>
						</div>
				</div>
						
					</section>

			</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
	<script>
	var uid=sessionStorage.getItem("id");

	document.getElementById('ubo').onclick=function()  //when save button is clicked
	{
		//retrieve data from form
		var sid=document.getElementById("sid").value;
		var sname=document.getElementById("name").value;
		var pass=document.getElementById("pass").value;
		var cpass=document.getElementById("cpass").value;
		
		if(pass != cpass){   //check password with confirm password
		  	alert("Please check your password");  
		}
		if( sid.length<1 || sname.length<1 || pass.length<1 || cpass.length<1) //check for any empty entry
		{
			alert("Please Fill All The Field");
				return;
		}
		$.ajax({
			type:"post",
			url:"login.php",
			data: 
			{  
			   'action' :'addStudent',    //call login.php with those parameters to add data to database
			   'sid' :sid,
			   'sname' :sname,
			   'password' :pass,
			   
			},
			cache:false,
			success: function (html) 
			{
			    alert("The student is added");
			   window.location.href = "managerHome.php";
			}
		});
	}

	</script>
</html>