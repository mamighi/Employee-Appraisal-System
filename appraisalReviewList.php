<?php

require_once("libs/config.php");

?>
<?php
	$sql = "SELECT * FROM `appraisal_employee` where reviewLevel=1";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	}
	?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Appraisal Review list</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	</head>
<style>
* {
  box-sizing: border-box;
}
#window {
    width: 1000px; 
    height:1000px;
    border: 1px solid green;
    overflow-x: scroll;
    overflow-y: scroll;
}
#tableContainer {
    height: 100%; width: 100%;
    
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 20%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  height:2%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
  background-color: #ffffff;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>


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
								<h1>Review Appraisal</h1>
							</header>	
					<div id="BO">
					    	
					<div class="row uniform">
<div>

<div><h3>Latest Employee Evaluations</h3></div>
<div id="window">
 <div id="tableContainer">
<table id="myTable">
   <tr>
            <th style="text-align:center;">Number</th>
            <th style="text-align:center;">Name</th>
            <th style="text-align:center;">DueDate</th>
            <th style="text-align:center;">StaffType</th>
                 <th></th>
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
            <td style="text-align:center;"><?php echo stripslashes($rs->employee_id); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->employee_name); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->dueDate); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->staffType); ?> </td>
            <td style="text-align:center;"><button id="edit" class="button fit" onclick="edit_item(<?php echo $rs->employee_id;?>)"style="width:80px;height:40px; background:grey">View</button></td>
          </tr>
          <?php } ?>
</table>
</div>
</div>
<div style="height:30px"></div>

		</div>
</div>
	
	</div>
		</div>
		</div>
		</section>
		</div>
		

 
 	<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
<script>

   	var uid=sessionStorage.getItem("id");

    var _table = document.getElementById("myTable"),rIndex;
    for(var i=0; i< _table.rows.length;i++){
        
        _table.rows[i].onclick = function(){
            rIndex= this.rowIndex;
            document.getElementById("eno").value = this.cells[0].innerHTML
            document.getElementById("name").value = this.cells[1].innerHTML+" "+this.cells[2].innerHTML;
            document.getElementById("stafftype").value = this.cells[3].innerHTML;
        }
    }
    
$(document).ready(function() {
   $('#window').draggable();
   $('#window').resizable();    
});

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
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
				    //alert(id);
					sessionStorage.setItem("xid",id);
					sessionStorage.setItem("uid",uid);
	                window.location.href = "rateAppraisal.php";
				  
				}
				});
	   
	 
     }
     
</script>

</body>
</html>
