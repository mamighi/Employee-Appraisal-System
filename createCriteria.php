<?php
require_once("libs/config.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Criteria Management</title>
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
					<li><a href="index.php">Sign Out</a></li>
				</ul>
			</nav>
			</header>
		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
						<header class="align-center">
								<h1>Criteria Management</h1>
							</header>
							<div id="crts" style="width:70%;margin-left:15%">
							</div>
							<button id="add" class="button fit" style="width:250px; background:green">Add Criteria</button>
						</div>
						
					
					</section>
					
			</div>
				<div>
				          <?php
	$sql = "SELECT * FROM `criteria_details`";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="employeeList.php">
         	<div >
        <div class="height20"></div>
        <?php echo $errmsg; ?>
       
        <table  width="40%">
          <tr>
            <th><input type="checkbox" name="chk_all" class="chk_all"></th>
            <th>Criteria Name</th>
            <th>Objective</th>
             <th>StaffType</th>
             <th> </th>
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="checkboxes" value="<?php echo stripslashes($rs->uid); ?>" ></td>
            <td style="text-align:center;"><?php echo stripslashes($rs->name); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->objective); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->staffType); ?> </td>
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
		var queryString = decodeURIComponent(window.location.search);
		queryString = queryString.substring(1);
		
				function save()
				{
				    alert("save is clicked");
					var cname=document.getElementById("cn").value;
					var cobj=document.getElementById("obj").value;
					var cstype=document.getElementById("st").value;
					var comp=document.getElementById("comp").value;
					if(cname.length<1 || cobj.length<1 || cstype.length<1 || comp.length<1)
					{
						alert("Please Fill All the Field");
						return;
					}
					alert(cname);
					$.ajax({
						type:"post",
						url:"login.php",
						data: 
						{  
						   'action' :'criteria',
						   'cname' :cname,
						   'cobj' : cobj,
						   'cstype' : cstype,
						   'comp' :comp,
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
		
				var newdiv='<div class="row uniform"><div class="6u 12u$(xsmall)">Criteria Name:<input type="text" name="cn" id="cn" value="" 	placeholder="Criteria Name"></br>Objective:<input type="text" name="obj" id="obj" value="" 	placeholder="Objective"></div><div class="6u 12u$(xsmall)">Staff Type:<input type="text" name="st" id="st" value="" 	placeholder="Staff Type"></div><div class="6u 12u$(xsmall)">Compulsary:<input type="text" name="comp" id="comp" value="" 	placeholder="yes/no"></div></div></br></br><button id="save" class="button fit" style="width:250px; background:green" onclick="save()">Save</button>';
				document.getElementById("crts").innerHTML +=newdiv;
				var elem = document.getElementById('add');
                elem.parentNode.removeChild(elem);
		
		}
		
		 function edit_item(id) {
      
       
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
				    alert(html);
					sessionStorage.setItem("id",id);
	                window.location.href = "https://appraizal.000webhostapp.com/addEmployee.html";
				  
				}
				});
	   
	 
     }
		
			
	</script>
</html>