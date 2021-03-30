<?php
	include 'app/database/db.php';

	// table name
	$tableName = "project";
	if (isset($_POST['project'])) {

		// removing the button variable
		unset($_POST['project']);

		// post variable to local variable
		$username = $_POST['name'];
	    $emailAddress = $_POST['email'];
	    $phoneNumber = $_POST['phoneNumber']; 
	    $budget = $_POST['budget'];
	    $duration = $_POST['months'];
	    $app = $_POST['app'];
	    $aboutProject = $_POST['message'];

	    $data=[
	    	'full_name'=>$username,
	    	'email' => $emailAddress,
	    	'phone_number'=> $phoneNumber,
	    	'budget' => $budget,
	    	'months' => $duration,
	    	'app' => $app,
	    	'message' => $aboutProject
	    ];

	    // insert new information to database
	    $userId = create($tableName, $data);
	    
	    // make the user_id with id and name
	    $unqiueId = 

	    // update the user_id field
	     
		// give feedback
		feedback($emailAddress, $username);

		// send mail to kit user
		$to = "jambone.james82@gmail.com";
		$subject = "Potencial Client";
		$body = "From: " . $username. " \r\n";
		$body .= "Email: ". $emailAddress. " \r\n";
		$body .= "Phone Number: ". $phoneNumber . " \r\n";
		$body .= "Messgage: wants a ". $app . " that can do " . $aboutProject. " for " . $budget. " amount and for the duration of". $duration ." month(s)";

		// send the mail 
		mail($to, $subject, $body);

		// back to index page
		header("Location: index.php?projectRes=$username");
	}
?>