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

      <?php
	$sql = "SELECT * FROM employee_details";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	?>
      <form name="f" method="post" action="employeeList.php">
     <div id ="load_tweets">
        <div>
           <p align="left">
               <button id="add" class="button fit" style="width:250px;height:60px; background:white">Add New Employee</button>
           </p>
        </div>
        <div class="height20"></div>
        <?php echo $errmsg; ?>
        <table class="bordered" >
          <tr>
            <th>FirstName</th>
            <th>LastName</th>
             <th>Address</th>
             <th>Email</th>
              <th>Contact No</th>
             <th></th>       
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
            <td style="text-align:center;"><?php echo stripslashes($rs->firstName); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->lastName); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->address); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->email); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->contactNo); ?> </td>
            <td style="text-align:center;"><button id="edit" class="button fit" onclick="edit_item(<?php echo $rs->id;?>)"style="width:40px;height:40px; background:white">EDIT</button></td>
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
				    alert(id);
					sessionStorage.setItem("xid",id);
	                window.location.href = "editEmployee.php";
				  
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
	                window.location.href = "addEmployee.html";
				  
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