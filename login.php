<?php
	$servername = "localhost";
	$Dusername = "id8338712_root_admin";
	$Dpassword = "root123";
	$dbname = "id8338712_appraisaldb";
	$action=$_POST['action'];
	if($action=='login')
	{
		$userName=$_POST['username'];
		$password=$_POST['pass'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
	// Check connection
		if ($conn->connect_error) {
			echo json_encode("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT id, username,staffType FROM employee_details WHERE email='$userName' AND password='$password'";
	
		$result = $conn->query($sql);
		if ($result){
		   // echo json_encode("wrong");
			$value = $result->fetch_assoc()	;
			if($value["staffType"]=="Manager")
			{
				echo json_encode($value);	
			}
			else if($value["staffType"]=="lecturer")
			{
				echo json_encode($value);	
			}
			else if(!$value["staffType"]){
			    echo json_encode("wrong");
			}
			else{
			    echo json_encode($value);
			}
		}
		else
		{
			 echo json_encode("wrong");
		}
		$conn->close();
	}
	else if($action=='signup')
	{
		if($_POST['ut']=='bo')
		{
			$userName=$userName=$_POST['username'];
			$pass=$_POST['pass'];
			$name=$_POST['name'];
			$state=$_POST['state'];
			$fcname=$_POST['fcname'];
			$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
			if ($conn->connect_error) {
				echo json_encode("Connection failed: " . $conn->connect_error);
			}
			$sql = "INSERT INTO users (userName, password, email,fcName,state,ut,st,fname)
				VALUES ('$userName', '$pass', '$userName','$fcname','$state','bo','pending','$name')";
				if ($conn->query($sql) === TRUE) {
				echo json_encode("success");
			} else {
				echo json_encode("failed");
			}
			$conn->close();
		}
		else if($_POST['ut']=='fu')
		{
			$userName=$userName=$_POST['username'];
			$pass=$_POST['pass'];
			$name=$_POST['name'];
			$con=$_POST['con'];
			$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
			if ($conn->connect_error) {
				echo json_encode("Connection failed: " . $conn->connect_error);
			}
			$sql = "INSERT INTO users (userName, password, email,contactNo,ut,fname)
				VALUES ('$userName', '$pass', '$userName','$con','fu','$name')";
			if ($conn->query($sql) === TRUE) {
				echo json_encode("success");
			} else {
				echo json_encode("failed");
			}
			$conn->close();
		}
		else
		{
			$userName=$_POST['username'];
			$pass=$_POST['pass'];
			$name=$_POST['name'];
			$con=$_POST['con'];
			$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
			if ($conn->connect_error) {
				echo json_encode("Connection failed: " . $conn->connect_error);
			}
			$sql = "INSERT INTO users (userName, password, email,contactNo,ut,fname)
				VALUES ('$userName', '$pass', '$userName','$con','admin','$name')";
			if ($conn->query($sql) === TRUE) {
				echo json_encode("success");
			} else {
				echo json_encode("failed");
			}
			$conn->close();
		}
	}
	else if($action=='getpendingAccount')
	{
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
	// Check connection
		if ($conn->connect_error) {
			echo json_encode("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM users WHERE ut='bo' AND st='pending'";
	
		$result = $conn->query($sql);
		if ($result){
			  while($row = $result->fetch_assoc())
			  {
				  
					echo "<tr><td><input type='radio' id='".$row["userName"]."' name='priority'/></td><td>".$row["userName"]."</td><td>".$row["fcName"]."</td><td> ".$row["state"]."</td></tr>";
			  }
		}
		else
		{
			echo json_encode("wrong");
		}
		$conn->close();
	}
	else if($action=='getUsers')
	{
	    $uid=$_POST['id'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
	// Check connection
		if ($conn->connect_error) {
			echo json_encode("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM employee_details where id = '$uid'";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
	}
	else if($action=='check')
	{
	    echo "sucess";
	}
	else if($action=='addemployee')
	{
	     $uid=$_POST['id'];
	     $userName=$_POST['username'];
	     $pass=$_POST['password'];
	     $firstName=$_POST['fname'];
	     $lastName=$_POST['lname'];
	      $email=$_POST['email'];
	     $contactNo=$_POST['contactNo'];
	     $lastName=$_POST['lname'];
	     $address=$_POST['address'];
	      $icNo=$_POST['icNo'];
	     $date=$_POST['date'];
	     $gender=$_POST['gender'];
	     $ysoe=$_POST['ysoe'];
	      $acadQ=$_POST['acadQ'];
	     $department=$_POST['department'];
	     $manager=$_POST['manager'];
	      $stype=$_POST['stype'];
	     
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
	// Check connection
		if ($conn->connect_error) {
			echo json_encode("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO `employee_details`(`id`,`userName`, `firstName`, `lastName`, `contactNo`, `address`, `icNo`, `startDate`, `email`, `gender`, `yearsOfExperience`, `academicQualification`, `department`, `manager`, `password`, `staffType`) VALUES (0,'$userName','$firstName','$lastName','$contactNo','$address','$icNo','$date','$email','$gender','$ysoe','$acadQ','$department','$manager','$pass','$stype')";
	
		$result = $conn->query($sql);
    	if ($result) {
			echo "Record updated successfully";
		} 
		else {
			echo "Error updating record: " . $conn->error;
		}
		$conn->close();
	}
	else if($action=='Accept')
	{
		$username=$_POST['username'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "UPDATE users SET st='accept' WHERE userName='$username'";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
	else if($action=='training')
	{
		$pName=$_POST['progName'];
		$pVenue=$_POST['venue'];
		$pDate=$_POST['date'];
		$pTime=$_POST['time'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `training_programme`(`name`, `venue`, `date`, `time`) VALUES ('$pName','$pVenue','$pDate','$pTime')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
	else if($action=='criteria')
	{
	    $cName=$_POST['cname'];
		$cObj=$_POST['cobj'];
		$csType=$_POST['cstype'];
		$comp=$_POST['comp'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `criteria_details`( `name`, `objective`, `staffType`, `compulsary`) VALUES ('$cName','$cObj','$csType','$comp')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	
	
	}
	else if($action=='appraisal'){
	    $empNo=$_POST['empNo'];
		$ename=$_POST['ename'];
		$stype=$_POST['stype'];
		$ep=$_POST['ep'];
		$crit1=$_POST['crit1'];
		$crit2=$_POST['crit2'];
		$crit3=$_POST['crit3'];
		$crit4=$_POST['crit4'];
		$crit5=$_POST['crit5'];
		$year=$_POST['year'];
		$cdate=$_POST['cdate'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `appraisal_employee`(`employee_id`, `employee_name`, `staffType`, `evaluationPeriod`, `criteria_one`, `criteria_two`, `year`, `dueDate`,`criteria_three`,`criteria_four`,`criteria_five`) VALUES ('$empNo','$ename','$stype','$ep','$crit1','$crit2','$year','$cdate','$crit3','$crit4','$crit5')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	    
	}
    	else if($action=='getTraining'){
	    $uid=$_POST['id'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM training_programme where id = '$uid'";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
	    
	}
	else if($action=='getappraisal'){
	    $uid=$_POST['id'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM `appraisal_employee` where `employee_id` = '$uid'";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
	    
	}	else if($action=='criteria_detail'){
	    $cone=$_POST['criteria_one'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM `criteria_details` where `id` = '$cone'";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
		
}	
else if($action=='employFeedback')
	{
		$appraisalId=$_POST['appraisalId'];
		$eId=$_POST['employeeId'];
		$oneComment=$_POST['criteria1Comment'];
		$twoComment=$_POST['criteria2Comment'];
		$threeComment=$_POST['criteria3Comment'];
		$fourComment=$_POST['criteria4Comment'];
		$fiveComment=$_POST['criteria5Comment'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `evaluation_employee`( `appraisal_id`, `employee_id`, `criteriaOne_comment`, `criteriaTwo_comment`,`criteriaThree_comment`,`criteriaFour_comment`,`criteriaFive_comment`) VALUES ('$appraisalId','$eId','$oneComment','$twoComment','$threeComment','$fourComment','$fiveComment')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
		else if($action=='empEvaluation'){
	    $aid=$_POST['aid'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM `evaluation_employee` where `appraisal_id` = '$aid'";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
		
}	
else if($action=='empReview')
	{
		$appraisalId=$_POST['aid'];
		$eId=$_POST['empId'];
		$oneComment=$_POST['cone'];
		$twoComment=$_POST['ctwo'];
		$threeComment=$_POST['cthree'];
		$fourComment=$_POST['cfour'];
		$fiveComment=$_POST['cfive'];

		$userId=$_POST['uid'];
		$rating=$_POST['rating'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `employee_review`(`appraisal_id`, `employee_id`, `reviewer_id`, `criteriaOne_comment`, `criteriaTwo_comment`, `criteriaThree_comment`, `criteriaFour_comment`, `criteriaFive_comment`, `rating`, `isManager`) VALUES ('$appraisalId','$eId','$userId','$oneComment','$twoComment','$threeComment','$fourComment','$fiveComment','$rating','1')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
		else if($action=='updateAppraisal')
	{
		$aid=$_POST['aid'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "UPDATE appraisal_employee SET reviewLevel='2' WHERE id='$aid'";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}else if($action=='managerEval'){
	    $aid=$_POST['aid'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM `employee_review` WHERE `appraisal_id`='$aid' AND isManager=1";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
		
}else if($action=='getrating'){
	    $aid=$_POST['aid'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT count(*) as total, sum(rating) AS rating FROM `employee_review` WHERE `employee_id`=$aid";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
		
}		
	else if($action=='updateEAppraisal')
	{
		$aid=$_POST['aid'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "UPDATE appraisal_employee SET `reviewLevel`='1' WHERE id='$aid'";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}	
	else if($action=='updateTraining')
	{
		$eid=$_POST['eid'];
		$tid=$_POST['tid'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "UPDATE `training_employees` SET `attended`='1' WHERE `training_id`='$tid' and `employee_id`='$eid'";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
	else if($action=='getTrainings'){
		$tid=$_POST['tid'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM `training_programme` WHERE id='$tid'";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
		
}
else if($action=='employTrainFeedback')
	{
		$eId=$_POST['eid'];
		$oneComment=$_POST['cone'];
		$tid=$_POST['tid'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `employeeTrainingFeedback`(`training_id`, `employee_id`, `employee_feedback`) VALUES ('$tid','$eId','$oneComment')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
		else if($action=='getTrainingFeedback'){
		$tid=$_POST['tid'];
		$uid=$_POST['eid'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM `employeeTrainingFeedback` WHERE training_id='$tid' AND employee_id='$uid'";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
		
}
	else if($action=='updateTrainingNew')
	{
		$eid=$_POST['eid'];
		$tid=$_POST['tid'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "UPDATE `training_employees` SET `attended`='2' WHERE `training_id`='$tid' and `employee_id`='$eid'";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
		else if($action=='updatePassword')
	{
		$eid=$_POST['uid'];
		$pd=$_POST['password'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "UPDATE `employee_details` SET `password`='$pd' WHERE `id`='$eid'";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
		else if($action=='delemployee')
	{
		$eid=$_POST['uid'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "DELETE FROM `employee_details` WHERE `id`='$eid'";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
	else if($action=='reward')
	{
		$eId=$_POST['eid'];
		$oneComment=$_POST['reward'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `employee_reward`( `emp_id`, `reward`) VALUES ('$eId','$oneComment')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
	else if($action=='updateReward')
	{
		$eid=$_POST['uid'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "UPDATE `employee_review` SET `rewarded`='1' WHERE `employee_id`='$eid'";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
	else if($action=='studentfeedback')
	{
		$department=$_POST['department'];
		$oneComment=$_POST['commentone'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `student_feedback`( `department`, `feedback`) VALUES ('$department','$oneComment')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
		else if($action=='studentloginn')
	{
		$sid=$_POST['sid'];
		$pass=$_POST['pass'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM `student_details` WHERE `sid`='$sid' AND `password`='$pass'";
        	$result = $conn->query($sql);
		if ($result){
		   echo "successfull";
		}
		else
		{
			 echo json_encode("wrong");
		}
	
		$conn->close();
	}
	else if($action=='addStudent')
	{
		$sid=$_POST['sid'];
		$sname=$_POST['sname'];
		$pass=$_POST['password'];
		
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO `student_details`( `sid`, `name`, `password`) VALUES ('$sid','$sname','$pass')";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully:::$sql";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
		else if($action=='getreward'){
		$uid=$_POST['eid'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM `employee_reward` WHERE  employee_id='$uid'";
	
		$result = $conn->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$conn->close();
		
}

else if($action=='checkemployee'){
		$email=$_POST['email'];
		$conn = new mysqli($servername, $Dusername, $Dpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        
		$sql = "SELECT * FROM `employee_details` WHERE  email='$email'";
	
		$result = $conn->query($sql);
		if ($result){
		   echo "exists";
		}
		else
		{
			 echo json_encode("new");
		}
		$conn->close();
		
}
?>