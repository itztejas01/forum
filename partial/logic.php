<?php include 'partial/_dbconnect.php';
require 'Profanus.php';

$clean= new Profanus();
$showalert=false;
// $method=$_SERVER['REQUEST_METHOD'];
if(isset($_REQUEST['new_post'])){
    $title=$_POST['title'];
    $content=$_POST['content'];
    $title = str_replace("<", "&lt;", $title);
    $title = str_replace(">", "&gt;", $title); 
    $title=$clean->censor($title);

    $content=$clean->censor($content);
    $content = str_replace("<", "&lt;", $content);
    $content= str_replace(">", "&gt;", $content);
    $sno=$_POST['sno'];
    $showalert=true;
    
    
    $sql="INSERT INTO `blog`(`user_id`, `title`, `body`, `timestamp`) VALUES ('$sno','$title','$content',current_timestamp())";
    $result=mysqli_query($conn,$sql);
      
    header('Location: blog.php?info=created');
}

if(isset($_REQUEST['blogid'])){
    $id=$_REQUEST['blogid'];
    $sql="SELECT * FROM `blog` WHERE `blog_id`=$id";
    $result=mysqli_query($conn,$sql);
}

if(isset($_REQUEST['update_post'])){
    $title=mysqli_real_escape_string($conn,$_POST['e_title']);
    $content=mysqli_real_escape_string($conn,$_POST['e_content']);
    $id=$_REQUEST['blogid'];
    $user=mysqli_real_escape_string($conn,$_POST['userid']);
    $title=$clean->censor($title);
    $title = str_replace("<", "&lt;", $title);
    $title = str_replace(">", "&gt;", $title); 

    $content=$clean->censor($content);
    $content = str_replace("<", "&lt;", $content);
    $content= str_replace(">", "&gt;", $content);

    $sno=$_POST['sno'];
    $sql="UPDATE `blog` SET `user_id`='$user',`title`='$title',`body`='$content',`timestamp`= current_timestamp() WHERE blog_id=$id";
    $result=mysqli_query($conn,$sql);
    header("Location: blog.php?info=updated");
    exit();
}

if(isset($_REQUEST['delete'])){
    $id=$_REQUEST['blogid'];
    $sql="DELETE FROM `blog` WHERE `blog`.`blog_id`=$id";
    $result=mysqli_query($conn,$sql);
    header("Location: blog.php?info=deleted");
    exit();
}

?>