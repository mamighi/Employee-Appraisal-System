<?php
require_once("libs/config.php");
if (isset($_POST["sub"])) {
    $all = $_POST["sub"];
	$errmsg = errorMessage("You need to select atleast one checkbox to delete!".$all);
		$all = implode(",", $_POST["ids"]);

	
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
    
 td,tr{
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
					<li><a href="managerHome.php">Home</a></li>
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
								<h1>Training Programmes</h1>
							</header>
							<div id="crts" style="width:70%;margin-left:15%">
							</div>
							<button id="add" class="button fit" style="width:250px; background:green">Create Training Programme</button>
						</div>
						
					
					</section>
					
			</div>
				<div>
				          <?php
	$sql = "SELECT * FROM `training_programme`";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="createTraining.php">
         	<div >
        <div class="height20"></div>
        <?php echo $errmsg; ?>
        <table>
            <td>
        <table  width="40%">
          <tr>
            <th><input type="checkbox" name="chk_all" class="chk_all"></th>
            <th>Training Name</th>
            <th>Venue</th>
             <th>Date</th>
             <th></th>
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="checkboxes" value="<?php echo stripslashes($rs->uid); ?>" ></td>
            <td style="text-align:center;"><?php echo stripslashes($rs->name); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->venue); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->date); ?> </td>
            <td style="text-align:center;"><button id="edit" class="button fit" onclick="edit_item(<?php echo $rs->id;?>)"style="width:120px;height:40px; background:grey">Assign Users</button></td>
         
          </tr>
          <?php } ?>
        </table>
        </td>
        <td>
            <table></table>
        </td>
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
		var queryString = decodeURIComponent(window.location.search);
		queryString = queryString.substring(1);
		
				function save()
				{
				    alert("save is clicked");
					var pname=document.getElementById("pn").value;
					var pdate=document.getElementById("date").value;
					var pvenue=document.getElementById("ven").value;
					var ptime=document.getElementById("tm").value;
					alert(ptime);
					if(pname.length<1 || pdate.length<1 || pvenue.length<1 || ptime.length<1)
					{
						alert("Please Fill All the Field");
						return;
					}
					alert(pvenue);
					$.ajax({
						type:"post",
						url:"login.php",
						data: 
						{  
						   'action' :'training',
						   'progName' :pname,
						   'venue' : pvenue,
						   'date' : pdate,
						   'time' :ptime,
						},
						cache:false,
						success: function (html) 
						{
							alert(html);
							window.location.reload();
						}
						});
				}
		document.getElementById("add").onclick=function()
		{
		
				var newdiv='<div class="row uniform"><div class="6u 12u$(xsmall)">Programme Name:<input type="text" name="pp" id="pn" value="" 	placeholder="Programme Name"></br>Date:<input type="date" name="date" id="date" value="" 	placeholder="date"></div><div class="6u 12u$(xsmall)">Venue:<input type="text" name="ven" id="ven" value="" 	placeholder="Venue"></div><div class="6u 12u$(xsmall)">Time:<input type="time" name="tm" id="tm" value="" 	placeholder="time"  min="9:00" max="18:00" required></div></div></br></br><button id="save" class="button fit" style="width:250px; background:green" onclick="save()">Save</button>';
				document.getElementById("crts").innerHTML +=newdiv;
				var elem = document.getElementById('add');
                elem.parentNode.removeChild(elem);
		
		}
		
		 function edit_item(id) {
      
       
       //sessionStorage.setItem("id",id);
     //  alert(id);
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
				  //  alert(html);
				  //  alert(id);
				    
					sessionStorage.setItem("id",id);
	                window.location.href = "https://appraizal.000webhostapp.com/meditTraining.php?tid="+id;
				  
				}
				});
	   
	 
     }
		
			
	</script>
</html>