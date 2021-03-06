<?php
require_once("libs/config.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Appraisal Report List</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<style>
    
 td,tr {
  background-color: #ffffff;
}

th{
  background-color: #ACA6A4;
}

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
								<h1>Appraisal Report List</h1>
							</header>
							<div id="crts" style="width:70%;margin-left:15%">
							
					
					</section>
					
			</div>
				<div>
				          <?php
	$sql = "SELECT * FROM `appraisal_employee` where reviewLevel=2";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="appraisalReportHr.php">
         	<div >
        <div class="height20"></div>
        <?php echo $errmsg; ?>
       
        <table  width="40%">
          <tr>
             <th style="text-align:center;">Number</th>
            <th style="text-align:center;">Name</th>
            <th style="text-align:center;">DueDate</th>
            <th style="text-align:center;">StaffType</th>
                 <th></th>
                  <th></th>
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
             <td style="text-align:center;"><?php echo stripslashes($rs->employee_id); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->employee_name); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->dueDate); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->staffType); ?> </td>
            <td style="text-align:center;"><button id="edit" class="button fit" onclick="edit_item(<?php echo $rs->employee_id;?>)"style="width:120px;height:40px; background:grey">View</button></td>
            <td style="text-align:center;"></td>
          </tr>
          <?php } ?>
       
        </table>
    </div>
    <div class="6u 12u$(xsmall)">
		<button id="sub" name="sub" class="button fit" style="width:60px; background:white">Create</button>
	</div>
      </form>
      <?php
	} else {
	?>
      <table class="bordered" >
        <tr>
          <td>No rows to display</td>
        </tr>
      </table>
      <?php
	}
	?>
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
		
		 function edit_item(id) {
      
       alert("here");
       //sessionStorage.setItem("id",id);
     /*  $.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'check',
				},
				cache:false,
				success: function (html) 
				{
				    //alert(html);
					
				  
				}
				});*/
				
	     	$.ajax({
				type:"post",
				url:"login.php",
				data: 
				{  
				   'action' :'getrating',
				   'aid' : id,
				   
				},
				cache:false,
				success: function (html) 
				{
				    alert(html);
					 var jsonData = JSON.parse(html);
						for(x in jsonData)
            			{
            			//	if(jsonData[x].userName==queryString)
            				{
            						
            			           var total = jsonData[x].total;
            			           var sum =   jsonData[x].rating;
            			           
            			           rate =  parseInt(sum/total);  //getting the average of rating 
            				
            						sessionStorage.setItem("xid",id);
                					sessionStorage.setItem("uid",uid);
                					sessionStorage.setItem("rate",rate);
                	                window.location.href = "https://appraizal.000webhostapp.com/appraisalReportHr.php";
            				
            				}
            			}
				}
			});
	   
	 
     }
	
			
	</script>
</html>