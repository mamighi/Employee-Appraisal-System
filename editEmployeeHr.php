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
					<li><a href="ManageCourts.html">Home</a></li>
					<li><a href="editBo.html">Menu</a></li>
					<li><a href="bookcourtBo.html">Profile</a></li>
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
								<h1>Edit Employee Details</h1>
							</header>
									  
					<div id="BO">
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
						<input type="text" name="ic" id="ic" value="" placeholder="Ic No" readonly>
						</div>
						<div class="6u 12u$(xsmall)">
					    Start Date:
						 <input type="date" id="datePicker" name="bday"  onchange="handler(event);" style="width:100%;">
						 </div>
						<div class="6u 12u$(xsmall)">
						Email:
						<input type="text" name="email" id="email" value="" placeholder="Email" readonly>
						</div>
						<div class="6u 12u$(xsmall)">
						Gender:
						<input type="text" name="gender" id="gender" value="" placeholder="Gender" readonly>
						</div>
						<div class="6u 12u$(xsmall)">
						Years Of Experience:
						<input type="text" name="yoe" id="yoe" value="" placeholder="years of experience" readonly>
						</div>
						<div class="6u 12u$(xsmall)">
						Academic Qualification:
						<input type="text" name="aq" id="aq" value="" placeholder="qualification" readonly>
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
						Department:
						<input type="text" name="department" id="department" value="" placeholder="department" readonly>
						</div>
						<div class="6u 12u$(xsmall)">
						Under Manager:
						<input type="text" name="um" id="um" value="" placeholder="Under Manager" readonly>
						</div>
						<div class="6u 12u$(xsmall)">
						Password:
						<input type="password" name="pas" id="pas" value="" placeholder="Password">
						</div>
						<div class="6u 12u$(xsmall)">
						Confirm Password:
						<input type="password" name="cpas" id="cpas" value="" placeholder="Password">
						</div>
						<div class="6u 12u$(xsmall)">
						</div>
						<div class="6u 12u$(xsmall)">
							<button id="save" class="button fit" style="width:50%; background:green">Save</button>
							<button id="del" class="button fit" style="width:50%; background:red">Delete</button>
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
		  //  alert(html);
			var jsonData = JSON.parse(html);
						
			for(x in jsonData)
			{
			//	if(jsonData[x].userName==queryString)
				{
						
						document.getElementById("uname").value=jsonData[x].userName;
						document.getElementById("fname").value=jsonData[x].firstName;
						document.getElementById("lname").value=jsonData[x].lastName;
						document.getElementById("email").value=jsonData[x].email;
						document.getElementById("con").value=jsonData[x].contactNo;
						document.getElementById("datePicker").value=jsonData[x].startDate;
						document.getElementById("ic").value=jsonData[x].icNo;
						document.getElementById("eAddress").value=jsonData[x].address;
						document.getElementById("gender").value=jsonData[x].gender;
						document.getElementById("yoe").value=jsonData[x].yearsOfExperience;
						document.getElementById("aq").value=jsonData[x].academicQualification;
						document.getElementById("department").value=jsonData[x].department;
						document.getElementById("um").value=jsonData[x].manager;
						document.getElementById("stafftype").value = jsonData[x].staffType;
						
				
				}
			}
		}
	});
//	document.getElementById('datePicker').value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
	document.getElementById('save').onclick=function() //when save button clicked
	{
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
		if(userName.length<1 || email.length<1 || address.length<1 || gender.length<1 || pass.length<1)
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
			   'action' :'addemployee',
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
			   window.location.href = "employList.php";
			}
		});
	}
	document.getElementById('del').onclick=function() //when delete button clicked
	{
	    	$.ajax({
			type:"post",
			url:"login.php",
			data: 
			{  
			   'action' :'delemployee',
			   'uid' :uid,
			   
			},
			cache:false,
			success: function (html) 
			{
		    	alert("The employee user is deleted");
			   window.location.href = "managerHome.php";
			}
		});
	     
	}
	</script>
</html>