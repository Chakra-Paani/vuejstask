<?php
include "../connection.php";

 //Populate POST variable with incoming JSON from Axios.
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)):
        $_POST = (array) json_decode(file_get_contents('php://input'), true);
    endif;
	
	$response = array();
	if(!empty($_POST['name']))
	{
		$quizname = $_POST['name'];
		
		$sql = mysqli_query($con,"INSERT INTO `categories`(`name`) VALUES ('$quizname')");
		if($sql)
		{
			$response = "Submitted";
		}
		   
	}
	if(!empty($_POST['events'])  && ($_POST['getdata'] == 'Name'))
	{
		$cid = $_POST['events'];
		$testData = mysqli_query($con,"select name from categories where cid='$cid' ");
		$row = mysqli_fetch_array($testData);
		$response = $row['name'];
	}
	if(!empty($_POST['events']) && ($_POST['getdata'] == 'Allqns'))
	{
		$cid = $_POST['events'];
		$testData = mysqli_query($con,"SELECT a.*,b.name FROM `questions` as a INNER JOIN categories as b on a.cid=b.cid where a.cid='$cid' order by a.level ASC");
		
		while($row = mysqli_fetch_assoc($testData))
		{

		   $response[] = $row;
		}
		
	}
	if(!empty($_POST['events']) && ($_POST['getdata'] == 'insertqns'))
	{
		$cid 	= $_POST['events'];
		$qtitle = $_POST['quizquestion'];
		$level 	= $_POST['quizlevel'];
		$option1 = $_POST['quizoption1'];
		$option2 = $_POST['quizoption2'];
		$option3 = $_POST['quizoption3'];
		$option4 = $_POST['quizoption4'];
		$answer = $_POST['quizanswer'];
		$sql = mysqli_query($con,"INSERT INTO `questions`(`cid`, `level`, `qtitle`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES ('$cid','$level','$qtitle','$option1','$option2','$option3','$option4','$answer')");
		if($sql)
		{
			$response = "Submitted";
		}
	
	}
	echo json_encode($response);
	exit;

?>