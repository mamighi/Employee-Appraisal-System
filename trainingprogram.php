<?php

require_once("libs/config.php");
if (isset($_POST["sub"])) {
	$errmsg = '';;
	if (count($_POST["ids"]) > 0 ) {
	//	$all = implode(",", $_POST["ids"]);
	    foreach($_POST["ids"] as $idx){
	        $sql = "INSERT INTO `training_employees`(`training_id`, `employee_id`) VALUES (1,$idx);";
	        alert($sql);
	    }
	//	$sql = "UPDATE `RequestData` SET `checked`=1 WHERE uid in($all)";
		if ( @mysqli_query($conn,$sql)) {
			$errmsg = successMessage("Rows has been updated successfully");
		} else {
				
		}
	} else {
		$errmsg = errorMessage("You need to select atleast one checkbox to delete!");
	}
	
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
    table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%; 
    background-color:#ffffff;
}
tr{
     background-color:#ffffff;
}

.bordered {
    border: solid #ccc 1px;
     -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;
     background-color:#ffffff;
}

.bordered td, .bordered th {
    padding: 10px 30px;
    border-bottom: 1px solid #ffffff;    
	
}

.bordered th {
	background-color:#292c2f;
	border-top: none;
	text-align:center;
        color: #ffffff;
}

.height10{clear:both;height:10px;}
.height20{clear:both;height:20px;}
.height30{clear:both;height:30px;}
.height60{clear:both;height:60px;}


.textboxes{ width:280px; border:1px solid #000; height:20px; }
.required{color:#F00;}
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
					<li><a href="ManageCourts.html">Home</a></li>
					<li><a href="editBo.html">Menu</a></li>
					<li><a href="bookcourtBo.html">Profile</a></li>
					<li><a href="index.php">Sign Out</a></li>
				</ul>
			</nav>
			</header>

	<!-- Header -->
				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
							<header class="align-center">
								<h1>Training Management</h1>
							</header>
									 
				</div>
						
					</section>
      <?php
	$sql = "SELECT * FROM employee_details";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="employeeList.php">
         	<div id="BO">
          	<div class="row uniform">
					<div class="6u 12u$(xsmall)">
					Programme Name:
					<input type="text" name="pName" id="pname" value="" placeholder="Programme Name">
					</div>
					<div class="6u 12u$(xsmall)">
					Venue:
					<input type="text" name="venue" id="venue" value="" placeholder="Venue">
					</div>
					<div class="6u 12u$(xsmall)">
					Date:
					<input type="date" name="date" id="email" value="" >
					</div>
					<div class="6u 12u$(xsmall)">
					Time:
					<input type="time" name="time" id="pas" value="">
					</div>
				
				</div>
        <div class="height20"></div>
        <?php echo $errmsg; ?>
        <table class="bordered" >
          <tr>
            <th width="10%"><input type="checkbox" name="chk_all" class="chk_all"></th>
            <th>FirstName</th>
            <th>LastName</th>
             <th>Email</th>
             
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="checkboxes" value="<?php echo stripslashes($rs->uid); ?>" ></td>
            <td style="text-align:center;"><?php echo stripslashes($rs->firstName); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->lastName); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->email); ?> </td>
         
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
    </article>
    <div class="height10"></div>
    <footer>
      
    </footer>
  </div>
</div>
<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript">

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
     
document.getElementById("add").onclick=function(){
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/addEmployee.html";
				  
				}
				});
}
$(document).ready(function () { 

	// binding the check all box to click event
    $(".chk_all").click(function () {
	
		var checkAll = $(".chk_all").prop('checked');
		if (checkAll) {
			$(".checkboxes").prop("checked", true);
		} else {
			$(".checkboxes").prop("checked", false);
		}	
        
    });
 
    // if all checkbox are selected, check the selectall checkbox and vise versa
    $(".checkboxes").click(function(){
 
        if($(".checkboxes").length == $(".subscheked:checked").length) {
            $(".chk_all").attr("checked", "checked");
        } else {
            $(".chk_all").removeAttr("checked");
        }
 
    });
	
});
</script>
</body>
</html>
