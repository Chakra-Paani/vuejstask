<?php
include "connection.php";

 //Populate POST variable with incoming JSON from Axios.
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)):
        $_POST = (array) json_decode(file_get_contents('php://input'), true);
    endif;
	
	$response = array();
	if(!empty($_POST['events']) && ($_POST['events'] == 'All'))
	{
	   
		$quizData = mysqli_query($con,"select * from categories");

		while($row = mysqli_fetch_assoc($quizData)){

		   $response[] = $row;
	}
	
	}
	else if(($_POST['eventname'] != ''))
	{
		$cid =  $_POST['eventname'];
		$testData = mysqli_query($con,"select * from categories where cid='$cid' ");

		

		while($row = mysqli_fetch_assoc($testData)){

		   $response[] = $row;
		}
		
	} 
	if(!empty($_POST['eventquestions']) && ($_POST['eventquestions'] != ''))
	{
		$cid =  $_POST['eventquestions'];
		$testData = mysqli_query($con,"SELECT * FROM `questions` where cid='$cid' order by level ASC");

		$response = array();

		while($row = mysqli_fetch_assoc($testData)){

		   $response[] = $row;
		}
		//print_r($response);
		//echo json_encode($response);
		//exit;
	} 
	else
	{
		if(!empty($_POST['submitquestions']) && ($_POST['eventname1'] != ''))
		{
			$cid =  $_POST['eventname1'];
			$ans =  $_POST['submitquestions'];
			
			$testData = mysqli_query($con,"SELECT * FROM `questions` where cid='$cid' order by level ASC");
			$correctans = 0;
			
			$result = array();
			$response = array();
			
			while($row = mysqli_fetch_assoc($testData))
			{
				array_push($result,$row['answer']);
				
			}
			if(count($result) == count($ans))
			{
				for($i=0;$i<count($result);$i++)
				{
					$answer = $ans[$i];
					$rightanswer = $result[$i];
					if($answer == $rightanswer)
					{
						$correctans = $correctans+1;
					}
				}
				
				
				
			}
			$response = $correctans;
		
		}
	}
	echo json_encode($response);
	exit;

?>