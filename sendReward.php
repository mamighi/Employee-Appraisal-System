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
				<div class="logo"><a href="index.html"> <span>Reward</span></a></div>
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
								<h1>Reward <div id="one"></div></h1>
							</header>
						<div >
							<div>
					     <div><h4>Employee Name:</h4> <span id ="two"></span></div></br>
							<div class="6u 12u$(xsmall)">
							  <h4>Reward:</h4>  
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
    //	alert(uid);
	$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'getUsers',
				   'id' : uid,
				},
				cache:false,
				success: function (html) 
				{
				 //   alert(html);
					 var jsonData = JSON.parse(html);
						for(x in jsonData)
            			{
            			//	if(jsonData[x].userName==queryString)
            				{
            						document.getElementById("two").innerHTML=jsonData[x].firstName+" "+jsonData[x].lastName;
            					
            						
            				}
            			}
				}
			});
			
			
	document.getElementById("confirm").onclick=function(){
    
    	var commentone=document.getElementById("commentone").value;
    // alert(critone)
     	$.ajax({
			type:"post",
			url:"login.php",
			data: 
			{  
			   'action' :'reward',
			   'eid' :uid,
			   'reward' :commentone,
			},
			cache:false,
			success: function (html) 
			{
			    
			    $.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'updateReward',
				   'uid':uid,
				},
				cache:false,
				success: function (html) 
				{
				   // alert(html);
				   alert("The reward is sent");
	                window.location.href = "hrHome.php";
				  
				}
				});
			   
			}
		});
}
	
	</script>

	</body>

</html>