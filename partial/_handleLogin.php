<?php
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
$email=$_POST['loginEmail'];
$password=$_POST['loginpass'];

$sql="SELECT * FROM `signup` WHERE user_email_id='$email'";
$result=mysqli_query($conn,$sql);
$numRows = mysqli_num_rows($result);
if ($password==""){
    $showError="Password not Entered";
    header("Location: /forum/index.php?showerror=".$showError);
}
elseif($email==""){
    $showError="Email id not Entered";
    header("Location: /forum/index.php?showerror=".$showError);
}
else{
    if($numRows==1){
        $row=mysqli_fetch_assoc($result);
        
        if(password_verify($password,$row['user_pass'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['useremail']=$email;
            $_SESSION['name']=$row['user_name'];
            $_SESSION['sno']=$row['sno'];
            
            header("Location: /forum/index.php?loginsuccess");
            
            exit();

        }
        header("Location: /forum/index.php");
    }
    $showError="Email id not registered";
    header("Location: /forum/index.php?showerror=".$showError);
    


}

}





?>