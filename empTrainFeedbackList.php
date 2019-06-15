<?php
require_once("libs/config.php");

echo $uid = $_REQUEST['tid'];
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
								<h1>Attended Trainings</h1>
							</header>
							<div id="crts" style="width:70%;margin-left:15%">
							
					
					</section>
					
			</div>
				<div>
				          <?php
 	$sql = "select tp.id as tid, tp.name, tp.venue,tp.date,etf.employee_id as eiid,ed.userName as ename from training_programme AS tp inner join employeeTrainingFeedback AS etf ON tp.id=etf.training_id INNER JOIN employee_details AS ed ON etf.employee_id=ed.id";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="empTrainFeedbackReport.php">
         	<div >
        <div class="height20"></div>
        <?php echo $errmsg; ?>
       
        <table  width="40%">
          <tr>
             <th style="text-align:center;">Number</th>
            <th style="text-align:center;">Training</th>
            <th style="text-align:center;">Venue</th>
            <th style="text-align:center;">Date</th>
            <th style="text-align:center;">Employee User</th>
                 <th></th>
                 
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
             <td style="text-align:center;"><?php echo stripslashes($rs->tid); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->name); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->venue); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->date); ?> </td>
             <td style="text-align:center;"><?php echo stripslashes($rs->ename); ?> </td>
            <td style="text-align:center;"><button id="edit" class="button fit" onclick="edit_item(<?php echo $rs->tid;?>,<?php echo $rs->eiid;?>)"style="width:150px;height:40px; background:grey">Check Feedback</button></td>
            <td style="text-align:center;"></td>
          </tr>
          <?php } ?>
       
        </table>
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
		
		
		 function edit_item(id,uid) {
      
   //    alert(id);
  //     alert(uid);
       //sessionStorage.setItem("id",id);
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
				    //alert(html);
					sessionStorage.setItem("tid",id);
					sessionStorage.setItem("uid",uid);
	                window.location.href = "empTrainFeedbackReport.php";
				  
				}
				});
	   
	 
     }
    
	
	
			
	</script>
</html>