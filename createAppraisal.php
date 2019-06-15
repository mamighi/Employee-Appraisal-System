<?php

require_once("libs/config.php");

?>
<?php
$Manager="Manager";
	$sql = "SELECT * FROM `employee_details` WHERE id NOT IN (SELECT employee_id FROM appraisal_employee) AND `staffType` != '$Manager' AND `staffType` != 'HR'";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	}
	?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Create Appraisal</title>
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
    width: 400px; 
    height:200px;
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
}

#myTable td {
  
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
								<h1>Create Appraisal</h1>
							</header>	
					<div id="BO">
					    	
					<div class="row uniform">
<div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" style="width:100%;">
<div id="window">
 <div id="tableContainer">
<table id="myTable">
   <tr>
            <th>No</th>
            <th>FirstName</th>
            <th>LastName</th>
             <th>StaffType</th>       
          </tr>
          <?php while($rs = mysqli_fetch_object ($query)){  ?>
          <tr>
            <td style="text-align:center;"><?php echo stripslashes($rs->id); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->firstName); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->lastName); ?> </td>
            <td style="text-align:center;"><?php echo stripslashes($rs->staffType); ?> </td>
          </tr>
          <?php } ?>
</table>
</div>
</div>
		</div>
</div>
<div>
    <div style="height:10px;"></div>
    	<div class="6u 12u$(xsmall)">
		Employee No:
		<input type="text" name="eno" id="eno" value=""   style="width:70%;"readonly>
		</div>
		<div style="height:10px;"></div>
		<div class="6u 12u$(xsmall)">
		Name:
		<input type="text" name="name" id="name" value=""style="width:70%;" readonly>
		</div>
		<div style="height:10px;"></div>
		<div class="6u 12u$(xsmall)">
		Staff Type:
	
             <select id = "stafftype" style="width:70%;">
               <option value = "HR">HR</option>
               <option value = "lecturer">lecturer</option>
               <option value = "Non-Academic staff"> Non-Academic staff</option>
             </select>
        
		</div>
		<div style="height:10px;"></div>
		<div class="6u 12u$(xsmall)">
		Evaluation Period:
		 <select id = "evalp" style="width:70%;">
               <option value = "Monthly">Monthly</option>
               <option value = "Quaterly">Quaterly</option>
               <option value = "Yearly"> Yearly</option>
             </select>
		</div>
	</div>
	<div>
	    <?php
	$sql = "SELECT * FROM criteria_details";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	}
	?>
	 <form style="width:50%;">
       <fieldset>
          <legend>Selecting Criteria</legend>
          <p>
             <label>Criteria 1</label>
             <select id = "myList" style="width:70%;">
               <?php while($rs = mysqli_fetch_object ($query)){  ?>
               <option value = "<?php echo stripslashes($rs->id);?>"><?php echo stripslashes($rs->name); ?></option>
                <?php } ?>
             </select>
          </p>
           <?php
	$sql = "SELECT * FROM criteria_details";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	}
	?>
           <p>
             <label>Criteria 2</label>
             <select id = "myList1" style="width:70%;">
               <?php while($rs = mysqli_fetch_object ($query)){  ?>
               <option value = "<?php echo stripslashes($rs->id);?>"><?php echo stripslashes($rs->name); ?></option>
                <?php } ?>
             </select>
          </p>
          
              <?php
	$sql = "SELECT * FROM criteria_details";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	}
	?>
           <p>
             <label>Criteria 3</label>
             <select id = "myList2" style="width:70%;">
               <?php while($rs = mysqli_fetch_object ($query)){  ?>
               <option value = "<?php echo stripslashes($rs->id);?>"><?php echo stripslashes($rs->name); ?></option>
                <?php } ?>
             </select>
          </p>
          
              <?php
	$sql = "SELECT * FROM criteria_details";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	}
	?>
           <p>
             <label>Criteria 4</label>
             <select id = "myList3" style="width:70%;">
               <?php while($rs = mysqli_fetch_object ($query)){  ?>
               <option value = "<?php echo stripslashes($rs->id);?>"><?php echo stripslashes($rs->name); ?></option>
                <?php } ?>
             </select>
          </p>
          
              <?php
	$sql = "SELECT * FROM criteria_details";
	$q =mysqli_query($conn,$sql);
	$totalCnt =mysqli_num_rows($q);
	if ($totalCnt > 0) {
	$query = mysqli_query($conn,$sql);
	}
	?>
           <p>
             <label>Criteria 5</label>
             <select id = "myList4" style="width:70%;">
               <?php while($rs = mysqli_fetch_object ($query)){  ?>
               <option value = "<?php echo stripslashes($rs->id);?>"><?php echo stripslashes($rs->name); ?></option>
                <?php } ?>
             </select>
          </p>
          
       </fieldset>
    </form>
	</div>
	<div>
    	<div class="6u 12u$(xsmall)">
		Year:
		<input type="text" name="year" id="year" value="2018" style="width:50%;" readonly>
		</div>
		<div style="height:10px;"></div>
		<div class="6u 12u$(xsmall)">
		    <div>
		      Due Date:  
		    </div>
		
		<input type="date" name="date" id="date" value="" style="width:50%;">
		</div>
		<div style="height:10px;"></div>
		<div class="6u 12u$(xsmall)">
		<button id="ubo" class="button fit" style="width:30%; background:green" onclick="save()">Save</button>
		</div>
		<div class="6u 12u$(xsmall)">
			<button id="ubo" class="button fit" style="width:30%; background:grey"onclick="cancel()">Cancel</button>
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

   
    var _table = document.getElementById("myTable"),rIndex;
    for(var i=0; i< _table.rows.length;i++){
        
        _table.rows[i].onclick = function(){
            
            rIndex= this.rowIndex;
            document.getElementById("eno").value = this.cells[0].innerHTML;
            document.getElementById("name").value = this.cells[1].innerHTML+" "+this.cells[2].innerHTML;
             
           // set drop down menu stafftype value
            var type = this.cells[3].innerHTML; 
           
            if(type.includes("lecturer")){
               $('#stafftype').val("lecturer").change(); //set value
            } else if(type.includes("HR")){
               $('#stafftype').val("HR").change(); //set value
            }else if(type.includes("Non-Academic staff")){
               $('#stafftype').val("Non-Academic staff").change(); //set value
            }
        }
           
        }
    
    
$(document).ready(function() {
  // $('#window').draggable();
   //$('#window').resizable();    
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
function cancel(){ //when cancel button is clicked
    	window.location.href = "https://appraizal.000webhostapp.com/managerHome.php";
						
}
function save() //when save button is clicked
{
  //  alert("save is clicked");
	var empNo=document.getElementById("eno").value;
	var ename=document.getElementById("name").value;
	var stype=document.getElementById("stafftype").value;
	var ep=document.getElementById("evalp").value;
	var crit1=document.getElementById("myList").value;
	var crit2=document.getElementById("myList1").value;
	var crit3=document.getElementById("myList2").value;
	var crit4=document.getElementById("myList3").value;
	var crit5=document.getElementById("myList4").value;
	var year=document.getElementById("year").value;
	var cdate=document.getElementById("date").value;
	if(ename.length<1 || ep.length<1 || stype.length<1 || cdate.length<1)
	{
		alert("Please Fill All the Field");
		return;
	}
//	alert(crit1);
	$.ajax({
		type:"post",
		url:"login.php",
		data: 
		{  
		   'action' :'appraisal',
		   'empNo' :empNo,
		   'ename' : ename,
		   'stype' : stype,
		   'ep' :ep,
		   'crit1' :crit1,
		   'crit2' :crit2,
		    'crit3' :crit3,
		   'crit4' :crit4,
		    'crit5' :crit5,
		   'year' : year,
		   'cdate' : cdate,
		},
		cache:false,
		success: function (html) 
		{
			alert("Appraisal Created");
			window.location.href = "https://appraizal.000webhostapp.com/managerHome.php";
		}
		});
}

	

</script>

</body>
</html>
