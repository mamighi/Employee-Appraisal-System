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
					<li><a href="employHome.php">Home</a></li>
					<li><a href="index.html">Sign Out</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
						<header class="align-center">
								<h1>Performance Evaluation <div id="one"></div></h1>
							</header>
						<div >
							<div>
					     <div><h4>Evaluation Period:</h4> <span id ="two"></span></div></br>
						 <div><h5>Criteria 1:</h5></div><span id ="three"></span></br>
						   <div> <h5>Objective:</h5></div><div id ="four"></div>
							<div class="6u 12u$(xsmall)">
							<textarea name='commentone' id='commentone'></textarea>
							</div>
							
							</br></br>
						 <div><h5>Criteria 2:</h5></div><span id ="six"></span></br>
						   <div> <h5>Objective:</h5></div><div id ="seven"></div>
							<div class="6u 12u$(xsmall)">
							Comment:
							<textarea name='commenttwo' id='commenttwo'></textarea>
						     
						</div>
						</br>
							</br></br>
						 <div><h5>Criteria 3:</h5></div><span id ="eight"></span></br>
						   <div> <h5>Objective:</h5></div><div id ="nine"></div>
							<div class="6u 12u$(xsmall)">
							Comment:
							<textarea name='commentthree' id='commentthree'></textarea>
						</div>
						</br>
							</br></br>
						 <div><h5>Criteria 4:</h5></div><span id ="ten"></span></br>
						   <div> <h5>Objective:</h5></div><div id ="eleven"></div>
							<div class="6u 12u$(xsmall)">
							Comment:
							<textarea name='commentfour' id='commentfour'></textarea>
						</div>
						</br>
							</br></br>
						 <div><h5>Criteria 5:</h5></div><span id ="twelve"></span></br>
						   <div> <h5>Objective:</h5></div><div id ="thirteen"></div>
							<div class="6u 12u$(xsmall)">
							Comment:
							<textarea name='commentfive' id='commentfive'></textarea>
						     
						
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
var yearx="one";
var critone="one";
var critwo ="two";
var critthree="one";
var critfour ="two";
var critfive="one";

var appraisalId="0";
    	var uid=sessionStorage.getItem("id");
    //	alert("yes");
    //	alert(uid);
	$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'getappraisal',
				   'id' : uid,
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
            					   appraisalId =jsonData[x].id;
            						yearx=jsonData[x].year;
            					//	alert(yearx);
            						document.getElementById("one").innerHTML=yearx;
            						document.getElementById("two").innerHTML=jsonData[x].evaluationPeriod;
            						critone =jsonData[x].criteria_one;
            					//	alert(critone);
            						critwo = jsonData[x].criteria_two;
            					    crithree = jsonData[x].criteria_three;
            					    critfour= jsonData[x].criteria_four;
            					    critfive = jsonData[x].criteria_five;
            					
            						$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'criteria_detail',
				   'criteria_one' : critone,
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
            						
            					
            				
            						document.getElementById("three").innerHTML=jsonData[x].name;
            						document.getElementById("four").innerHTML=jsonData[x].objective;
            				
            				
            				}
            			}
            				$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'criteria_detail',
				   'criteria_one' : critwo,
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
            						
            					
            				//		alert(yearx);
            						document.getElementById("six").innerHTML=jsonData[x].name;
            						document.getElementById("seven").innerHTML=jsonData[x].objective;
            					
            						
            				
            				}
            			}
            				$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'criteria_detail',
				   'criteria_one' : crithree,
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
            						
            					
            				//		alert(yearx);
            						document.getElementById("eight").innerHTML=jsonData[x].name;
            						document.getElementById("nine").innerHTML=jsonData[x].objective;
            					
            						
            				
            				}
            			}
            				$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'criteria_detail',
				   'criteria_one' : critfour,
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
            						
            					
            				//		alert(yearx);
            						document.getElementById("ten").innerHTML=jsonData[x].name;
            						document.getElementById("eleven").innerHTML=jsonData[x].objective;
            					
            						
            				
            				}
            			}
            				$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'criteria_detail',
				   'criteria_one' : critfive,
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
            						
            					
            				//		alert(yearx);
            						document.getElementById("twelve").innerHTML=jsonData[x].name;
            						document.getElementById("thirteen").innerHTML=jsonData[x].objective;
            					
            						
            				
            				}
            			}
				}
			});
				}
			});
				}
			});
				}
			});
				}
			});
            						
            				
            				}
            			}
				}
			});
			
			
	document.getElementById("confirm").onclick=function(){
    
    	var commentone=document.getElementById("commentone").value;
    	var commenttwo=document.getElementById("commenttwo").value;
    	var commentthree=document.getElementById("commentthree").value;
    	var commentfour=document.getElementById("commentfour").value;
    	var commentfive=document.getElementById("commentfive").value;
    // alert(critone)
     	$.ajax({
			type:"post",
			url:"login.php",
			data: 
			{  
			   'action' :'employFeedback',
			   'appraisalId' :appraisalId,
			   'employeeId' :uid,
			   'criteria1Comment' :commentone,
			   'criteria2Comment' : commenttwo,
			   'criteria3Comment' :commentthree,
			   'criteria4Comment' : commentfour,
			   'criteria5Comment' :commentfive,
			},
			cache:false,
			success: function (html) 
			{
			   // alert(html);
		
			 $.ajax({
            				type:"post",
            				url:"login.php",
            				data: 
            				{  
            				   'action' :'updateEAppraisal',
            				    'aid' : appraisalId,
            				   
            				},
            				cache:false,
            				success: function (html) 
            				{
            				 	alert("Evaluation is completed");
            				
            				}
            			});
			   window.location.href = "employHome.php";
			}
		});
}
	
	</script>

	</body>

</html>