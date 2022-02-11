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
<?php if(isset($_REQUEST['info']) && $_REQUEST['info']=="created"){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfull!</strong>  Post has been added successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
  </div>';
}
elseif(isset($_REQUEST['info']) && $_REQUEST['info']=="updated"){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Updated</strong>  Post has been Updated successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
  </div>';
}
elseif(isset($_REQUEST['info']) && $_REQUEST['info']=="deleted"){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Deleted</strong>  Post has been Deleted successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}

?>
<?php 
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<div class="container">
        <div class="text-center">
        <a href="create.php" class="btn btn-outline-success">Create A new Post +</a>
        </div>
        </div>
    </div>';
      }
      else {
      echo  '<div class="container">
      <h1 class="py-2 mx-2">Write A blog</h1>
      <p class="lead my-2">Your are not logged in. Please Login to write a Blog.</p>
      </div>';
    }
      
      ?>
    
<div class="container my-3 mb-5" id="blog">
<h2 class="text-center my-3">Different Blog</h2>
<div class="row my-3 justify-content-center">
<?php
$result_per_page = 2;
$sql = "SELECT * FROM `blog` ORDER BY `timestamp` ASC";
$blog_per_page = mysqli_query($conn,$sql);
$no_of_result = mysqli_num_rows($blog_per_page);
$no_of_page = ceil($no_of_result/$result_per_page);
  
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page=1;
}
$page_per_result = ($page -1)*$result_per_page;
$sql2 = "SELECT * FROM `blog` ORDER BY `timestamp` ASC LIMIT $page_per_result, $result_per_page";

$result=mysqli_query($conn,$sql2); 
 while($row=mysqli_fetch_assoc($result)){
    $title=$row['title'];
    $desc=$row['body'];
    $blog_id=$row['blog_id'];
    $user_id=$row['user_id'];

echo'<div class="col-md-4 my-3">
 <div class="card" style="width: 18rem;">
   <img src="https://source.unsplash.com/900x500/?'.$title.'" class="card-img-top" alt="">
    <div class="card-body">
         <h5 class="card-title"><a href="view.php?blogid='.$blog_id.'">'.$title.'</a></h5>
     <p class="card-text">'.substr($desc,0,124).'.<a href="view.php?blogid='.$blog_id.'"> Read more </a></p>
       <a href="view.php?blogid='.$blog_id.'" class="btn btn-outline-info">Read more</a>
   </div>
  </div>
</div>';
}
?>
</div>
<?php

$query = "SELECT COUNT(*) FROM `blog`";
$rs_result = mysqli_query($conn,$query);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
echo '<br>';
$total_page = ceil($total_records/ $result_per_page);
        $page_link = "";
        echo '<nav aria-label="...">
        <ul class="pagination justify-content-center">';
        if($page>=2){
            echo  '<li class="page-item">
            <a class="page-link" href="blog.php?page='.($page - 1).'">Previous</a>
          </li>';
        }else{
            echo'<li class="page-item disabled">
            <a class="page-link" href="blog.php?page" tabindex="-1" aria-disabled="true">Previous</a>
          </li>';
        }
        for ($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $page_link .='<li class="page-item active"><a class="page-link" href="blog.php?page='.($i).'">'.$i.'</a></li>';
            }else{
                $page_link .= '<li class="page-item"><a class="page-link" href="blog.php?page='.($i).'">'.$i.'</a></li>';
            } 
        };
        echo $page_link;
        if($page<$total_page){   
            echo'<li class="page-item">
            <a class="page-link" href="blog.php?page='.($page+1).'"">Next</a>
            </li> </ul></nav>';   
        }else{
          echo'<li class="page-item disabled">
            <a class="page-link" href="blog.php?page" tabindex="-1" aria-disabled="true">Next</a>
            </li> </ul></nav>';
        }
        echo'</ul></nav>';


?>
</div>
<?php include 'partial/_footer.php';?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>
</html>
