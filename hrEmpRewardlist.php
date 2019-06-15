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
	$sql = "select ed.id as eid,ed.userName as usr,ed.staffType as stype, erv.rating as rate from employee_details AS ed INNER JOIN employee_review AS erv ON ed.id =erv.employee_id and erv.rating >3 and ed.staffType !='HR'and erv.rewarded='0' ORDER BY erv.rating DESC";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="sendReward.php">
         	<div >
        <div class="height20"></div>
        <?php echo $errmsg; ?>
       
        <table  width="40%">
          <tr>
             <th style="text-align:center;">Employee Id</th>
            <th style="text-align:center;">UserName</th>
            <th style="text-align:center;">StaffType</th>
            <th style="text-align:center;">Rating</th>
                 <th></th>
                  <th></th>
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
             <td style="text-align:center;"><?php echo stripslashes($rs->eid); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->usr); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->stype); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->rate); ?> </td>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"><button id="send" class="button fit" onclick="sendreport(<?php echo $rs->eid;?>)"style="width:120px;height:40px; background:grey">Send Reward</button></td>
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
	
	 function sendreport(id) {
      
       
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
				   // alert(html);
					sessionStorage.setItem("uid",id);
	                window.location.href = "https://appraizal.000webhostapp.com/sendReward.php";
				  
				}
				});
	   
	 
     }	
			
	</script>
</html>