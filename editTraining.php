<?php
require_once("libs/config.php");
//echo "<br>".$trainId = $_REQUEST['tid'];
      
    //  $errmsg = errorMessage("yes::".$trainId);
      
  //    echo "<br>".$tid =$trainId;
	if (count($_POST["ids"]) > 0 ) {
if (isset($_POST["sub"])) {
    
    
    echo "<br>".$tid = $_POST["hid"];

	if (count($_POST["ids"]) > 0 ) {
	//	$all = implode(",", $_POST["ids"]);
	    foreach($_POST["ids"] as $ab){
	        echo "<br>".$trainId ;
	       echo $sql = "INSERT INTO `training_employees`(`training_id`, `employee_id`) VALUES ($tid,$ab)";
	   

		if ( @mysqli_query($conn,$sql)) {
		    $errmsg = errorMessage("Successfully Inserted");

		} else {
					$errmsg = errorMessage("Error while inserting.(".$tid.".$ab):::". mysqli_error($conn));
		}
	    }
	} else {
		$errmsg = errorMessage("You need to select atleast one checkbox to delete!");
	}
	
}}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Training</title>
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
							</header>
							<div id="crts" style="width:70%;margin-left:15%">
							       
							</div>
			             
					</section>
					  <p align="left">
               <button id="ret" class="button fit" style="width:250px;height:40px; background:green">Return</button>
           </p>	
					
					      <?php
	$sql = "select ed.userName as usr, erv.rating as rate from employee_details AS ed INNER JOIN employee_review AS erv ON ed.id =erv.employee_id and erv.rating <=3 and staffType !='HR' ORDER BY erv.rating ASC";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="editTraining.php">
     <div id ="load_tweets">
        <div>
            <input type="hidden" id="hid" name="hid" value="<?php echo $_REQUEST['tid']; ?>" />
         <p align="left">   <input type="submit" name="sub" value="Assign" class="submit_button"  style="width:250px; background:green" onClick="javscript:return confirm('Are you sure you confirmed the request?');" > </p>
        </div>
<div  style="height:20px;">
							       
							</div>
        <?php echo $errmsg; ?>
        <table class="bordered" >
          <tr>
            <th width="10%"><input type="checkbox" name="chk_all" class="chk_all"></th>
            <th >Username</th>
            <th >Rating</th>
                 
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){ 
          
          ?>
          <tr>
            <td style="text-align:center;"><input type="checkbox" name="ids[]" class="checkboxes" value="<?php echo stripslashes($rs->id); ?>" ></td>
            <td style="text-align:center;"><?php echo stripslashes($rs->usr); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->rate); ?> </td>
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
    </article>
    <div class="height10"></div>
    <footer>
    
    </footer>
  </div>
  </section>
</div>
<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript">
	var uid=sessionStorage.getItem("id");
	
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

document.getElementById("ret").onclick=function(){
    
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
				    sessionStorage.setItem("id",uid);
	                window.location.href = "https://appraizal.000webhostapp.com/hrHome.php";
				  
				}
				});
}
</script>
</body>
</html>