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



<?php 
        echo '<div class="container mt-5">
        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
        <div class="form-group">
        <label for="title">Title of Blog</label>
            <input type="text" placeholder="Blog Title" class="form-control my-3 text-black text-center" name="title" id="title" required>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            <div class="form-group">
            <label for="desc">Describe the blog</label>
            <textarea name="content" id="content" class="form-control my-3 text-black" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="new_post" id="new_post">Add a Post</button>
        </form>
   </div>';
      ?>

    

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>
</html>
