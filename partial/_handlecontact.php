<?php
// echo 'your message has been deliverd';
require 'Profanus.php';

$clean= new Profanus();
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $name=mysqli_real_escape_string($conn, $_POST['text_name']);
    $email=mysqli_real_escape_string($conn, $_POST['user_email']);
    $subject=mysqli_real_escape_string($conn, $_POST['usersubject']);
    $feedback=mysqli_real_escape_string($conn, $_POST['user_feedback']);
    
    // curse filter start here
    
    $subject=$clean->censor($subject);
    $feedback=$clean->censor($feedback);

    // $feedback=$intances->setReplacementMethod($feedback);
    // $feedback=$intances->insert(array("shit" => "poop"));
    // $feedback=$intances->insert(array("ass" => "butt"));
    // $feedback=$intances->filter($feedback);




    // setReplacementMethod($feedback);
    

    $sql="INSERT INTO `contact_us` (`c_name`, `c_email`, `c_subject`, `c_desc`,`timestamp`) VALUES ('$name', '$email', '$subject', '$feedback',current_timestamp())";
    $result=mysqli_query($conn,$sql);
    header("Location: /forum/contact.php?success");
    exit();
}

?>