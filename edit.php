<html lang="en">
<head>
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
    echo' <form method="POST">
    <input type="text" hidden name="id" value="'.$id.'">
    <input type="text" hidden name="userid" value="'.$user.'">
    <label for="e_title" class="text-white">Edit the Title</label>
        <input type="text" placeholder="Blog Title" class="form-control my-3 bg-dark text-white text-center" name="e_title" id="e_title" value="'.$title.'" required>
        <label for="e_content" class="text-white">Edit the Content</label>
        <textarea name="e_content" id="e_content" class="form-control my-3 bg-dark text-white" cols="30" rows="10">'.$desc.'</textarea>
        <button class="btn btn-outline-dark text-white" name="update_post" id="update_post">Update</button>
    </form>';
}


?>
   </div>
    

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>
</html>
