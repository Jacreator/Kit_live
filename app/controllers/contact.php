<?php
if (isset($_POST['contact'])) {
	
	// removing the button variable
	unset($_POST['contact']);

	// post variavle
	$name = $_POST['name'];
    $emailAddress = $_POST['email'];
    $message = $_POST['message'];

    // feedback
    feedback($emailAddress, $name);

    // prepare mail
    $to = "jambone.james82@gmail.com";
    $subject = "Contact Form Kit";
    $body = "From: ".$name." with email Address as " .$emailAddress . "\r\n";
    $body .= "Said: ". $message;

    // send mail
    mail($to, $subject, $body);

    // back to index page
    header("Location: index.php?contactRes=$name");
}

// feedback function
function feedback($emailAddress, $name){
	$to = $emailAddress;
	$subject = "Reply";
	$body = "Thank you ".$name." for reaching out to us @ Kit \r\n";
	$body .= "Your Information have been recieved with thanks \r\n";
	$body .= "we sure will get back to you shortly. \r\n";

	$body .= "\r\n";
	$body .= "\r\n";
	$body .= "Thank You, ". $name . "\r\n";
	$body .= "Kit Team";

	// sending mail
	mail($to, $subject, $body);
}
