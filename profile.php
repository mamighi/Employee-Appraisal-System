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
		<title>Profile</title>
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
					<li><a href="employHomes.html">Home</a></li>
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
								<h1>Profile Details</h1>
							</header>
									  
					<div id="BO">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
						<b>Username:</b>
						<div name="UserName" id="uname" > </div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>First Name:</b>
						<div  name="FirstName" id="fname" > </div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>Last Name:</b>
						<div  name="lastname" id="lname"> </div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>Contact Number:</b>
						<div name="con" id="con" > </div>
						</div>
				    	<div class="6u 12u$(xsmall)">
					    <b>Address:</b>
						<div  name="Address" id="eAddress"> </div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>IC No:</b>
						<div name="ic" id="ic" > </div>
						</div>
						<div class="6u 12u$(xsmall)">
					    <b>Start Date:</b>
						 <div id="datePicker" name="bday"> </div>
						 </div>
						<div class="6u 12u$(xsmall)">
						<b>Email:</b>
						<div name="email" id="email" > </div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>Gender:</b>
						<div name="gender" id="gender"> </div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>Years Of Experience:</b>
						<div name="yoe" id="yoe"></div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>Academic Qualification:</b>
						<div name="aq" id="aq" > </div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>Department:</b>
						<div name="department" id="department"> </div>
						</div>
						<div class="6u 12u$(xsmall)">
						<b>Under Manager:</b>
						<div name="um" id="um"></div>
						</div>
					
					</div>
				</div>
				<div style="height:20px"></div>
					<div class="6u 12u$(xsmall)">
							<button id="ubo" class="button fit" style="width:50%; background:green">Return</button>
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
	var uid=sessionStorage.getItem("xid");
//	var queryString = decodeURIComponent(window.location.search);
	//	queryString = queryString.substring(1);
		//alert(uid);
	$.ajax({
		type:"post",
		url:"login.php",
		data: 
		{  
			'action' :'getUsers',
			'id': uid,
		},
		cache:false,
		success: function (html) 
		{
		   // alert(html);
			var jsonData = JSON.parse(html);
						
			for(x in jsonData)
			{
			//	if(jsonData[x].userName==queryString)
				{
						
						document.getElementById("uname").innerHTML=jsonData[x].userName;
						document.getElementById("fname").innerHTML=jsonData[x].firstName;
						document.getElementById("lname").innerHTML=jsonData[x].lastName;
						document.getElementById("email").innerHTML=jsonData[x].email;
						document.getElementById("con").innerHTML=jsonData[x].contactNo;
						document.getElementById("datePicker").innerHTML=jsonData[x].startDate;
						document.getElementById("ic").innerHTML=jsonData[x].icNo;
						document.getElementById("eAddress").innerHTML=jsonData[x].address;
						document.getElementById("gender").innerHTML=jsonData[x].gender;
						document.getElementById("yoe").innerHTML=jsonData[x].yearsOfExperience;
						document.getElementById("aq").innerHTML=jsonData[x].academicQualification;
						document.getElementById("department").innerHTML=jsonData[x].department;
						document.getElementById("um").innerHTML=jsonData[x].manager;
						
				
				}
			}
		}
	});

	document.getElementById('ubo').onclick=function()
	{
		$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'check',
				   
				},
				cache:false,
				success: function (html) 
				{
				 	window.location.href = "employHome.php";
				
				}
			});
	       
	}

	</script>
</html>