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
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="themes/css-stars.css" />

		
	</head>
	
<style>


</style>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="index.html"> <span>Booking</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="managerHome.php">Home</a></li>
					<li><a href="editBo.html">Profile</a></li>
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
							    Employee Comment:
							<textarea name='commentOne' id='commentOne' readonly></textarea>
							</div>
							<div style="height:10px"></div>
							<div class="6u 12u$(xsmall)">
							 Manager Comment:
							<textarea name='commentThree' id='commentThree' readonly></textarea>
							</div>
							
							<div style="height:10px"></div>
							<div class="6u 12u$(xsmall)">
							 Your Comment:
							<textarea name='commentNine' id='commentNine' ></textarea>
							</div>
							<select id="example-css" name="rating" autocomplete="off">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
							
							</br></br>
						 <div><h5>Criteria 2:</h5></div><span id ="six"></span></br>
						   <div> <h5>Objective:</h5></div><div id ="seven"></div>
							<div class="6u 12u$(xsmall)">
							Employee Comment:
							<textarea name='commentTwo' id='commentTwo' readonly></textarea>
						     
						
						</div>
						<div style="height:10px"></div>
						<div class="6u 12u$(xsmall)">
						    Manager Comment:
							<textarea name='commentFour' id='commentFour' readonly></textarea>
							</div>
						
							
						<div style="height:10px"></div>
						<div class="6u 12u$(xsmall)">
						    Your Comment:
							<textarea name='commentTen' id='commentTen' ></textarea>
							</div>
					   <select id="example-css" name="rating" autocomplete="off">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
						</br>
						<div id ="rating">
						 <select id="example-css1" name="rating1" autocomplete="off">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
					   </div>
							<div style="height:20px"></div>
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
			<script src="js/test/jquery-1.11.2.min.js"></script>
	    	<script src="js/test/jquery.barrating.min.js"></script>
	    	<script src="js/test/examples.js"></script>
				
				
<script>
var yearx="one";
var critone="one";
var critwo ="two";
var aid="0";
    	var empid=sessionStorage.getItem("xid");
    	var uid=sessionStorage.getItem("uid");
    	//alert(aid);
	$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'getappraisal',
				   'id' : empid,
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
            						
            						yearx=jsonData[x].year;
            					//	alert(yearx);
            						document.getElementById("one").innerHTML=yearx;
            						document.getElementById("two").innerHTML=jsonData[x].evaluationPeriod;
            						critone =jsonData[x].criteria_one;
            					//	alert(critone);
            						critwo = jsonData[x].criteria_two;
            					    aid = jsonData[x].id;
            					
            				}
            			}
            			
            			// to get 1st criteria details
            			
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
            			
            			//criteria 2
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
            						
            					
            			
            						document.getElementById("six").innerHTML=jsonData[x].name;
            						document.getElementById("seven").innerHTML=jsonData[x].objective;
            				
            				
            				}
            			}
            			
            				// comment details
            				$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'empEvaluation',
				   'aid' : aid,
				   
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
            						
            			
            						document.getElementById("commentOne").innerHTML=jsonData[x].criteriaOne_comment;
            						document.getElementById("commentTwo").innerHTML=jsonData[x].criteriaTwo_comment;
            				
            						
            				
            				}
            			}
            			//start of manager comment
            			$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'managerEval',
				   'aid' : aid,
				   
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
            						
            			
            						document.getElementById("commentThree").innerHTML=jsonData[x].criteriaOne_comment;
            						document.getElementById("commentFour").innerHTML=jsonData[x].criteriaTwo_comment;
            				
            						
            				
            				}
            			}
            			//get rating start
			$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'getrating',
				   'aid' : aid,
				   
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
            						
            			           var total = jsonData[x].total;
            			           var sum =   jsonData[x].rating;
            			           var final = 3;//sum/total;
            			      //     alert(total);
            			      //     alert(final);
            						document.getElementById("example-css").value=final;
            				
            						
            				
            				}
            			}
				}
			});
            			
            			//get rating end
				}
			});
            			
            			
            			//end of manager comment
				}
			});
            			
            				// end of comment details
				}
			});
            			
            								
            			// end of criteria 2 details	
            				}
            			
			});
            			// end of criteria 1 details
			
				}
	});
			
			
	document.getElementById("confirm").onclick=function(){
	     window.location.href = "checkAppraisalReport.php";
	   
}
	
	</script>

	</body>

</html>