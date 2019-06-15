<?php


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Department Review</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/radio.css" />

		
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="index.html"> <span>Reward</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="studentHome.php">Home</a></li>
					<li><a href="index.html">Sign Out</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
						<header class="align-center">
								<h1>Department Feedback <div id="one"></div></h1>
							</header>
						<div >
							<div>
					     <div>
					         <select name="State" id="state"style="width:700px;">
            					<option value="">- Department -</option>
            					<option value="Admin">Admin</option>
            					<option value="Student Services">Student Services</option>
            					<option value="Immigration">Immigration</option>
            					<option value="Accomodation">Accomodation</option>
            					<option value="Academic">Academic</option>
            					</select>
            					</br>
					     </div></br>
							<div class="6u 12u$(xsmall)">
							  <h4>Feedback:</h4>  
							<textarea name='commentone' id='commentone' style="width:700px;height:300px"></textarea>
							</div>
						
						
						</br>
						<button id="confirm" class="button fit" style="width:250px; background:green">Confirm</button>
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
	//	var tid=sessionStorage.getItem("tid");
    //	alert("yes");
   
			
			
	document.getElementById("confirm").onclick=function(){
    
    var department=document.getElementById("state").value;
			var commentone=document.getElementById("commentone").value;
		   
			if(department.length< 1 || commentone.length< 1)
			{
				alert("Please Fill ALl The Field");
				return;
			}
			else
			{
			    
				$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'studentfeedback',
				   'department' : department,
				   'commentone' :commentone,
				},
				cache:false,
				success: function (html) 
				{
					alert("Thankyou for the feedback!");
					window.location.href = "studentHome.php";
				}
				});
			}
			
}
	
	</script>

	</body>

</html>