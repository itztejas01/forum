<?php 
require 'Profanus.php';

$clean= new Profanus();
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $name=$_POST['text_name'];
    
    $pass=$_POST['signupPassword'];
    $cpass=$_POST['signupcPassword'];

    $name=$clean->censor($name);
    
    $gender=$_POST['gender'];
    if(filter_has_var(INPUT_POST,'signupEmail')){
        $email_id=$_POST['signupEmail'];
        $email_id=$clean->censor($email_id);
    // $email_id= filter_var($email_id,FILTER_SANITIZE_EMAIL);

    
    if(filter_var($email_id, FILTER_VALIDATE_EMAIL)){

        $existSql="SELECT * FROM `signup` WHERE user_email_id='$email_id'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows>0){
            $showError="Email already Exist";
        }
        else{
            if($pass==$cpass){
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $sql="INSERT INTO `signup`(`user_name`, `user_email_id`, `user_pass`, `gender`, `timestamp`) VALUES ('$name','$email_id','$hash','$gender',current_timestamp())";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $showAlert=true;
                    header("Location: /forum/index.php?signupsuccess=true");
                   exit();
                }
            }
            else{
                $showError="Password Do not match";
            }
        }
    }
    else{
        $showError="email error";
    }
}

    //checking if email exist or not 
    header("Location: /forum/index.php?signupsuccess=false&showerror=".$showError);


}

?>