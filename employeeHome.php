<?php

require_once("libs/config.php");
if (isset($_POST["sub"])) {
	$errmsg = '';;
	if (count($_POST["ids"]) > 0 ) {
		$all = implode(",", $_POST["ids"]);
		$sql = "UPDATE `RequestData` SET `checked`=1 WHERE uid in($all)";
		if ( @mysqli_query($conn,$sql)) {
			$errmsg = successMessage("Rows has been updated successfully");
		} else {
			$errmsg = errorMessage("Error while deleting.(".$all."):::". mysqli_error($conn));	
		}
	} else {
		$errmsg = errorMessage("You need to select atleast one checkbox to delete!");
	}
	
}
include 'header.php';
?>
      <form name="f" method="post" action="dashboard.php">
     <div id ="load_tweets">
        
        <div class="height20"></div>
        <?php echo $errmsg; ?>
        <table class="bordered" >
          <tr>
            <th><a href="#"><img src="epm.jpg" style="width:270px;height:160px; align:left;"></a></th>
            <th></th>
             <th><a href="#"><img src="metrics.jpg" style="width:270px;height:160px; align:left;"></a></th>
             <th></th>
              <th><a href="#"><img src="training.jpg" style="width:270px;height:160px; align:left;"></th>
             <th></th>       
          </tr>
          <tr>
             <td><button id="profile" class="button fit" style="width:250px;height:60px; background:white">Manage Profile Details</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="confirm" class="button fit" style="width:250px;height:60px; background:white">Employee Evaluation Result</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="confirm" class="button fit" style="width:250px;height:60px; background:white">Training Management</button></td>
            <td></td>
          </tr>
          <tr>
             <td><button id="confirm" class="button fit" style="width:250px;height:60px; background:white">Change Password</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="confirm" class="button fit" style="width:250px;height:60px; background:white">Reward History</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="confirm" class="button fit" style="width:250px;height:60px; background:white">Training Feedback</button></td>
            <td></td>
          </tr>
           <tr>
             <td></td>
            <td style="text-align:center;"> </td>
            <td><button id="confirm" class="button fit" style="width:250px;height:60px; background:white">Review Training After Performance Appraisal</button></td>
            <td style="text-align:center;"> </td>
            <td><button id="confirm" class="button fit" style="width:250px;height:60px; background:white">View Training Report</button></td>
            <td></td>
          </tr>
          <tr>
             <td></td>
            <td style="text-align:center;"> </td>
            <td></td>
            <td style="text-align:center;"> </td>
            <td><button id="confirm" class="button fit" style="width:250px;height:60px; background:white">View Performance Appraisal Report</button></td>
            <td></td>
          </tr>
        </table>
    </div>
      </form>
     
     
    </article>
    <div class="height10"></div>
    <footer>
      
    </footer>
  </div>
</div>
<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript">

document.getElementById("profile").onclick=function(){
    
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
	                window.location.href = "https://appraizal.000webhostapp.com/employeeList.php";
				  
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