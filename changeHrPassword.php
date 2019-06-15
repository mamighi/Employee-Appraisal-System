<?php
require_once("libs/config.php");
if (isset($_POST["sub"])) {
	$errmsg = '';;
	if (count($_POST["ids"]) > 0 ) {
		$all = implode(",", $_POST["ids"]);
		$sql = "UPDATE `RequestData` SET `checked`=1 WHERE uid in($all)";
		if ( @mysqli_query($conn,$sql)) {
			$errmsg = successMessage("Rows has been updated successfully");
		} else {
			$errmsg = errorMessage("Error while deleting.(".$all."):::". mysqli_error($conn));	
		}
	} else {
		$errmsg = errorMessage("You need to select atleast one checkbox to delete!");
	}
	
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Employee</title>
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
					<li><a href="employHome.html">Home</a></li>
					<li><a href="index.php">Sign Out</a></li>
				</ul>
			</nav>
			</header>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
							<header class="align-center">
								<h1>Change Password</h1>
							</header>
									  
					<div id="BO">
					<div class="row uniform">
				
						<div class="6u 12u$(xsmall)">
						 New Password:
						<input type="password" name="pas" id="pas" value="" placeholder="Password">
						</div>
						<div class="6u 12u$(xsmall)">
						Confirm Password:
						<input type="password" name="cpas" id="cpas" value="" placeholder="Password">
						</div>
						<div class="6u 12u$(xsmall)">
						</div>
					
					</div>
				</div>
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

	document.getElementById('ubo').onclick=function()
	{
		
		var pass=document.getElementById("pas").value;
		var cpass=document.getElementById("cpas").value;
		
			if(pass != cpass){
		    	alert("Check your password");
				return;
		}
		if( pass.length<1)
		{
			alert("Please Fill All The Field");
				return;
		}
		$.ajax({
			type:"post",
			url:"login.php",
			data: 
			{  
			   'action' :'updatePassword',
			   'uid' :uid,
			   'password' :pass,
			   
			},
			cache:false,
			success: function (html) 
			{
			    alert("The password is changed");
			   window.location.href = "hrHome.php";
			}
		});
	}

	</script>
</html>