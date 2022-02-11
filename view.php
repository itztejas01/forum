<html lang="en">
<head>
    <!-- Start Open Web Analytics Tracker -->
<script type="text/javascript">
//<![CDATA[
var owa_baseUrl = 'http://localhost/Open-Web-Analytics-1.7.3/';
var owa_cmds = owa_cmds || [];
owa_cmds.push(['setSiteId', 'bb8fc33ff622daa082d3584d336c4c6b']);
owa_cmds.push(['trackPageView']);
owa_cmds.push(['trackClicks']);

(function() {
    var _owa = document.createElement('script'); _owa.type = 'text/javascript'; _owa.async = true;
    owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl );
    _owa.src = owa_baseUrl + 'modules/base/js/owa.tracker-combined-min.js';
    var _owa_s = document.getElementsByTagName('script')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
}());
//]]>
</script>
<!-- End Open Web Analytics Code -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
        body{
            /* background: rgba(0, 0,0, 0.50) url("https://source.unsplash.com/1600x900/?discussion,tech"); */
            background: whitesmoke;
            background-size: cover;
        }
        </style>
        

    <title>Blog</title>
</head>
<body>
<?php include 'partial/_dbconnect.php';?>
<?php include 'partial/logic.php'; ?>
<?php include 'partial/_header.php';?>
<div class="container mt-5">
<?php
while($row=mysqli_fetch_assoc($result)){
    $title=$row['title'];
    $desc=$row['body'];
    $id=$row['blog_id'];
    $user=$row['user_id'];

    $sql2="SELECT * FROM `signup` WHERE sno='$user'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $name=$row2['user_name'];

    echo '<div class="jumbotron rounded-lg">
    <h1 class="display-4 text-center">'.$title.'</h1>
    <hr class="my-4">
    <p class="lead">'.$desc.'</p>
    <div class="d-flex mt-3 justify-content-center align-items-center">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
        if($user == $_SESSION['sno']){
        echo '<form method="POST">
        <a href="edit.php?blogid='.$id.'&userid='.$user.'" class="btn btn-outline-success btn-sm py-2 px-3 mb-0" name="edit" id="edit">Edit</a>
        <input type="text" hidden name="id" value="'.$id.'">
        <button class="btn btn-outline-danger btn-sm ml-2 ml-3 py-2" name="delete" id="delete">Delete</button>
        </form>
        </div>';
    }
    // else{
    //     echo '<div class="container">
    //     <p class="lead my-2">Your cannot Edit this blog.</p>
    //     </div>';
    // }
}
}
echo '<div class="container">
<p>This is a blog written by '.$name.'</p>';
include 'partial/_rules.php';
echo '</div>';
?>





</div>


</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>
</html>
