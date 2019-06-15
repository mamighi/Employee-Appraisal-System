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
	
<style>
    table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%; 
    background-color:#ffffff;
}
td{
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
					<li><a href="managerHome.php">Home</a></li>
					<li><a href="index.html">Sign Out</a></li>
				</ul>
				</ul>
			</nav>
			</header>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
							
					<div id="BO">
					<div class="row uniform">
						<table class="bordered" >
          <tr>
            <th><a href="#"><img src="epm.jpg" style="width:270px;height:220px; align:left;"></a></th>
            <th></th>
             <th><a href="#"><img src="metrics.jpg" style="width:270px;height:220px; align:left;"></a></th>
             <th></th>
              <th><a href="#"><img src="training.jpg" style="width:270px;height:220px; align:left;"></th>
             <th></th>       
          </tr>
          <tr>
             <td><button id="profile" class="button fit" style="width:270px;height:60px; background:grey">Manage Profile Details</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="appraise" class="button fit" style="width:270px;height:60px; background:grey"> Create Appraisal</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="training" class="button fit" style="width:270px;height:60px; background:grey">Criteria Management</button></td>
            <td></td>
          </tr>
          <tr>
             <td><button id="as" class="button fit" style="width:270px;height:60px; background:grey">Add Student</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="revap" class="button fit" style="width:270px;height:60px; background:grey">Review Appraisals</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="tm" class="button fit" style="width:270px;height:60px; background:grey">Training Management</button></td>
            <td></td>
          </tr>
           <tr>
            
            <td ><button id="sfeed" class="button fit" style="width:270px;height:60px; background:grey">Student Feedback</button></td>
            <td></td>
            <td><button id="par" class="button fit" style="width:270px;height:60px; background:grey">View Performance Appraisal Report</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="tf" class="button fit" style="width:270px;height:60px; background:grey">Training Feedback</button></td>
            <td></td>
            
          </tr>
          <tr>
            
            <td ></td>
            <td></td>
            <td style="text-align:center;"> </td>
            <td></td>
            <td></td>
          </tr>
        </table>
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
	var uid=sessionStorage.getItem("id");

	document.getElementById("profile").onclick=function(){ //when manage profile clicked
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/employList.php";
				  
				}
				});
}
	document.getElementById("training").onclick=function(){  //when manage training clicked
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/createCriteria.php";
				  
				}
				});
}
document.getElementById("appraise").onclick=function(){   //when create appraisal clicked
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/createAppraisal.php";
				  
				}
				});
}
document.getElementById("revap").onclick=function(){
    
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
				    	sessionStorage.setItem("id",uid);
	                window.location.href = "https://appraizal.000webhostapp.com/appraisalReviewList.php";
				  
				}
				});
}
document.getElementById("par").onclick=function(){
    
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
				    sessionStorage.setItem("id",uid);
	                window.location.href = "https://appraizal.000webhostapp.com/checkAppraisalReport.php";
				  
				}
				});
}

	document.getElementById("tm").onclick=function(){
    
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
	                window.location.href = "mcreateTraining.php";
				  
				}
				});
}


document.getElementById("tf").onclick=function(){
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/mempTrainFeedbackList.php";
				  
				}
				});
}
document.getElementById("sfeed").onclick=function(){
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/studentFeedback.php";
				  
				}
				});
}
document.getElementById("as").onclick=function(){
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/addStudent.php";
				  
				}
				});
}
//<button id="pwd" class="button fit" style="width:270px;height:60px; background:grey">Change Password</button>
	</script>
</html>