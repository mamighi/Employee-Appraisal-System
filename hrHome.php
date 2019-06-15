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
tr{
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
            <td><button id="eer" class="button fit" style="width:270px;height:60px; background:grey">Employee Evaluation Result</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="training" class="button fit" style="width:270px;height:60px; background:grey">Training Management</button></td>
            <td></td>
          </tr>
          <tr>
             <td></td>
            <td style="text-align:center;"> </td>
            <td><button id="reward" class="button fit" style="width:270px;height:60px; background:grey">Manage Rewards</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="tf" class="button fit" style="width:270px;height:60px; background:grey">Training Feedback</button></td>
            <td></td>
          </tr>
           <tr>
             <td></td>
            <td style="text-align:center;"> </td>
            <td></td>
            <td style="text-align:center;"> </td>
            <td></td>
            <td></td>
          </tr>
          <tr>
             <td></td>
            <td style="text-align:center;"> </td>
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
	document.getElementById("profile").onclick=function(){ //when manage profile details clicked
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/employeeListHr.php";
				  
				}
				});
}
	document.getElementById("training").onclick=function(){  //when training management clicked
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/createTraining.php";
				  
				}
				});
}


document.getElementById("tf").onclick=function(){ //when training feedback clicked
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/empTrainFeedbackList.php";
				  
				}
				});
}

document.getElementById("reward").onclick=function(){  //when reward clicked
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/hrEmpRewardlist.php";
				  
				}
				});
}
document.getElementById("pwd").onclick=function(){  
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/changeHrPassword.php";
				  
				}
				});
}
document.getElementById("eer").onclick=function(){  //when employee evaluation report clicked
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/checkAppraisalReportHr.php";
				  
				}
				});
}
//<button id="pwd" class="button fit" style="width:270px;height:60px; background:grey">Change Password</button>
	</script>
</html>