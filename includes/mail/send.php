<?php
include '../../load.php';

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json; charset=UTF-8');
$results = [];
$visitor_name = '';
$visitor_email= '';
$visitor_message= '';
$error_message= '';

if(!empty($_POST['name'])){
    $visitor_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
}else{ $error_message.="* Fullname is required.\n";}

if(!empty($_POST['email'])){
    $visitor_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
}else{ $error_message.="* Email is required.\n";}

if(!empty($_POST['message'])){
    $visitor_message = filter_var(htmlspecialchars($_POST['message']), FILTER_SANITIZE_STRING);
    //we dont want anything harmful to be injected into our databases. This can stop bad actors
}

//validate the recapta response
// if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
// {
//       $secret = '6Lcb7-cZAAAAAIjTo9n00ZRiaeiU6FQF0MIT-lBx';
//       $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
//       $responseData = json_decode($verifyResponse);
//       if(!$responseData->success){
//           $error_message .= "Are you sure you are not a robot? recaptcha failed!\n";
//       }
//       //add in the error handling for recaptcha and prevent submission 
   
//  }else{
//     $error_message .= "Are you sure you are not a robot? recaptcha failed!\n";
//  }


if($error_message){
    //set a status code and then return error as json. 
    http_response_code(400);
    echo json_encode([
        'error' => $error_message
    ]);
    exit;
}

$email_headers = array(
    'From' =>'selenawells@selenawells.ca',
    'Reply-To' => $visitor_email
    //Best practise  but it may need to to have an email set up via your domaine - do it this way so that the emails are not flagged by the browser

    //You can do this if the above is not possible
    // 'From' => $visitor_email
);

$results['name'] = $visitor_name;
$results['message'] = $visitor_message;

// 2. Prepare the email [print out the labels and apply to package/ prepare the package in a certain format]
$email_subject = 'LRG Inquiry from'. $visitor_name;
//change this to be a real email
$email_recipient = 'selena.elise.wells@gmail.com';
$email_message = sprintf('Name: %s, Email: %s, Message: %s', $visitor_name, $visitor_email, $visitor_message);
//creates a template to insert the user data into a formated string

mail($email_recipient, $email_subject, $email_message, $email_headers);

//change page to thanks for sending us a message page - if successfully send an email
$_SESSION['contact_form_submitted'] = true;
header('Location: ../../contact.php');