<?php

require_once("libs/config.php");
if (isset($_POST["sub"])) {
	$errmsg = errorMessage("Yes post");
	alert("yes");
	if (count($_POST["ids"]) > 0 ) {
	    errorMessage("Greater");
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
		<title>Edit Training</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="ManageCourts.html"> <span>Training</span></a></div>
				<a href="#menu">Menu</a>
			</header>


		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
							<header class="align-center">
								<h1>Edit Training</h1>
							</header>
							<div id="crts" style="width:70%;margin-left:15%">
							      
							</div>
							 <p align="left">
                               <input type="submit" name="sub" value="Checked" class="submit_button" style="width:250px; background:green" onClick="javscript:return confirm('Are you sure you confirmed the request?');" > </p>
							   
			                   <div class="row uniform">
			                      
			                       <div class="6u 12u$(xsmall)">Programme Name:<input type="text" name="pp" id="pp" value="" 	placeholder="Programme Name"></br>Date:<input type="date" name="date" id="date" value="" 	placeholder="date">
			                       </div>
			                       <div class="6u 12u$(xsmall)">Venue:<input type="text" name="ven" id="ven" value="" 	placeholder="Venue">
			                       </div>
			                       <div class="6u 12u$(xsmall)">Time:<input type="time" name="tm" id="tm" value="" 	placeholder="time">
			                       </div>
			                       </div>
			                       </br></br>
			                     
					</div>
						
							
					</section>
					
					      <?php
	$sql = "SELECT * FROM `employee_details`";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="editTraining.php">
         	<div >
        <div class="height20"></div>
        <?php echo $errmsg; ?>
        <table>
            <td>
        <table  width="40%">
          <tr>
            <th><input type="checkbox" name="chk_all" class="chk_all"></th>
            <th>UserName</th>
             
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="checkboxes" value="<?php echo stripslashes($rs->uid); ?>" ></td>
            <td style="text-align:center;"><?php echo stripslashes($rs->userName); ?> </td>
         
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
		var uid=sessionStorage.getItem("id");
		alert(uid);
		var selImage='';
	//	var username=sessionStorage.getItem("userName");
		$.ajax({
		type:"post",
		url:"login.php",
		data: 
		{  
			'action' :'getTraining',
			'id': uid,
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
						
						document.getElementById("pp").value=jsonData[x].name;
						document.getElementById("ven").value=jsonData[x].venue;
						document.getElementById("date").value=jsonData[x].date;
						var tim =jsonData[x].time.substring(0,5);
						alert(tim);
						document.getElementById("tm").value=tim;
						
				
				}
			}
		
		   
		}
	});
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
</html>