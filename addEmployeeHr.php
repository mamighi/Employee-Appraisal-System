<?php
require_once("libs/config.php");


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Add Employee</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	</head>
	
<style>
    table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%; 
    background-color:#ffffff;
}
tr{
     background-color:#ffffff;
}

.bordered {
    border: solid #ccc 1px;
     -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;
     background-color:#ffffff;
}

.bordered td, .bordered th {
    padding: 10px 30px;
    border-bottom: 1px solid #ffffff;    
	
}

.bordered th {
	background-color:#292c2f;
	border-top: none;
	text-align:center;
        color: #ffffff;
}

.height10{clear:both;height:10px;}
.height20{clear:both;height:20px;}
.height30{clear:both;height:30px;}
.height60{clear:both;height:60px;}


.textboxes{ width:280px; border:1px solid #000; height:20px; }
.required{color:#F00;}
</style>
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
					<li><a href="hrHome.php">Home</a></li>
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
								<h1>New Employee Details</h1>
							</header>
									  
					<div>
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
						Username:
						<input type="text" name="UserName" id="uname" value="" placeholder="User Name">
						</div>
						<div class="6u 12u$(xsmall)">
						First Name:
						<input type="text" name="FirstName" id="fname" value="" placeholder="First Name">
						</div>
						<div class="6u 12u$(xsmall)">
						Last Name:
						<input type="text" name="lastname" id="lname" value="" placeholder="Last Name">
						</div>
						<div class="6u 12u$(xsmall)">
						Contact Number:
						<input type="text" name="con" id="con" value="" placeholder="Contact Number">
						</div>
				    	<div class="6u 12u$(xsmall)">
					    Address:
						<input type="text" name="Address" id="eAddress" value="" placeholder="Address">
						</div>
						<div class="6u 12u$(xsmall)">
						IC No:
						<input type="text" name="ic" id="ic" value="" placeholder="IC Number" >
						</div>
						<div class="6u 12u$(xsmall)">
					    Start Date:
						 <input type="date" id="datePicker" name="bday"style="width:100%;" >
						 </div>
						<div class="6u 12u$(xsmall)">
						Email:
						<input type="text" name="email" id="email" value="" placeholder="Email">
						</div>
						<div class="6u 12u$(xsmall)">
						Gender:
						<input type="text" name="gender" id="gender" value="" placeholder="Gender">
						</div>
						<div class="6u 12u$(xsmall)">
						Years Of Experience:
						<input type="text" name="yoe" id="yoe" value="" placeholder="yoe">
						</div>
						<div class="6u 12u$(xsmall)">
						Academic Qualification:
						<input type="text" name="aq" id="aq" value="" placeholder="aq">
						</div>
						<div class="6u 12u$(xsmall)">
						Department:
						<input type="text" name="department" id="department" value="" placeholder="department">
						</div>
							<div class="6u 12u$(xsmall)">
                		Staff Type:
                	
                             <select id = "stafftype" style="width:70%;">
                               <option value = "HR">HR</option>
                               <option value = "lecturer">lecturer</option>
                               <option value = "Non-Academic staff"> Non-Academic staff</option>
                             </select>
                        
                		</div>
						<div class="6u 12u$(xsmall)">
						Under Manager:
						<input type="text" name="um" id="um" value="" placeholder="Under Manager" >
						</div>
						<div class="6u 12u$(xsmall)">
						Password:
						<input type="password" name="pas" id="pas" value="" placeholder="Password">
						</div>
						<div class="6u 12u$(xsmall)">
						Confirm Password:
						<input type="password" name="cpas" id="cpas" value="" placeholder="Confirm Password">
						</div>
						<div class="6u 12u$(xsmall)">
						</div>
						<div class="6u 12u$(xsmall)">
							<button id="save" class="button fit" style="width:40%; background:green">Save</button>
						
							<button id="ubo" class="button fit" style="width:40%; background:green">Cancel</button>
						</div>
					</div>
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


	document.getElementById('save').onclick=function() //when save button clicked
	{
	   // retrieve data
		var userName=document.getElementById("uname").value;
		var firstName=document.getElementById("fname").value;
		var lastName=document.getElementById("lname").value;
		var email=document.getElementById("email").value;
		var pass=document.getElementById("pas").value;
		var cpass=document.getElementById("cpas").value;
		var contactNo=document.getElementById("con").value;
		var address=document.getElementById("eAddress").value;
		var icNo=document.getElementById("ic").value;
		var date=document.getElementById("datePicker").value;
		var gender=document.getElementById("gender").value;
		var yoe=document.getElementById("yoe").value;
		var acadQ=document.getElementById("aq").value;
		var department=document.getElementById("department").value;
		var manager=document.getElementById("um").value;
		var stype=document.getElementById("stafftype").value;
		
		if(pass != cpass){
		    	alert("Check your password");
				return;
		}
		if(userName.length<1 || email.length<1 || address.length<1 || gender.length<1 || pass.length<1 || icNo.length<1 || yoe.length<1 || acadQ.length<1 || manager.length<1 || stype.length<1 || department.length<1)
		{
			alert("Please Fill All The Field");
				return;
		}
	//	alert(userName);
		$.ajax({
			type:"post",
			url:"login.php",
			data: 
			{  
			   'action' :'addemployee',  //call login.php and send this data to add to database
			   'username' :userName,
			   'password' :pass,
			   'fname' :firstName,
			   'lname': lastName,
			   'email' : email,
			   'contactNo' :contactNo,
			   'address' :address,
			   'icNo' :icNo,
			   'date' :date,
			   'gender': gender,
			   'ysoe' : yoe,
			   'acadQ' :acadQ,
			   'department' : department,
			   'manager' :manager,
			   'stype' :stype,
			   
			},
			cache:false,
			success: function (html) 
			{
		    	alert("The employee user is created");
			   window.location.href = "hrHome.php";
			}
		});
	}
		document.getElementById('ubo').onclick=function()  //called when cancel button is clicked
	{
	    window.location.href = "hrHome.php";
	}

	</script>
</html>