<?php


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Performance Appraisal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/radio.css" />

		
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="index.html"> <span>Booking</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="hrHome.php">Home</a></li>
					<li><a href="index.html">Sign Out</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
						<header class="align-center">
								<h1>Training Feedback <div id="one"></div></h1>
							</header>
						<div >
							<div>
					     <div><h4>Training Name:</h4> <span id ="two"></span></div></br>
						 <div><h5>Venue:</h5></div><span id ="three"></span></br>
						   <div> <h5>Date:</h5></div><div id ="four"></div>
							<div class="6u 12u$(xsmall)">
							  <h5>Employee Feedback</h5>  
							<textarea name='commentone' id='commentone' style="width:700px;height:300px" readonly></textarea>
							</div>
						
						
						</br>
						<button id="confirm" class="button fit" style="width:250px; background:green">Return</button>
						</div>
						
						
					</section>
					
			</div>
					

			</div>
		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
				
				
<script>
    	var uid=sessionStorage.getItem("uid");
		var tid=sessionStorage.getItem("tid");
    	//alert(uid);
    //	alert(tid);
	$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'getTrainings',
				   'tid' : tid,
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
            					//	document.getElementById("one").innerHTML=jsonData[x].;
            						document.getElementById("two").innerHTML=jsonData[x].name;
            						document.getElementById("three").innerHTML=jsonData[x].venue;
            						document.getElementById("four").innerHTML=jsonData[x].date;
            						
            				
            				}
            			}
            			
            			
			$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'getTrainingFeedback',
				   'tid' : tid,
				   'eid' : uid,
				},
				cache:false,
				success: function (html) 
				{
				    //alert(html);
					 var jsonData = JSON.parse(html);
						for(x in jsonData)
            			{
            			//	if(jsonData[x].userName==queryString)
            				{
            					
            					document.getElementById("commentone").value=jsonData[x].employee_feedback;
            				
            				}
            			}
				}
			});
				}
			});
			
			
	document.getElementById("confirm").onclick=function(){
    
			   window.location.href = "hrHome.php";
		
}
	
	</script>

	</body>

</html>