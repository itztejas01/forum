<!doctype html>
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <title> Online Discussion</title>
</head>
<style>
#ques {
    min-height: 450px;
}
</style>

<body>
    <?php include 'partial/_dbconnect.php';?>
    <?php include 'partial/_header.php';?>
    
    <!-- search for the page -->

    <div class=" container py-2 my-2">
        <h1>Search result for "<em><?php echo $_GET['search'] ?></em>"</h1>
        
        <?php
    $search_query=mysqli_real_escape_string($conn,$_GET['search']) ;
    if($search_query!=null){
    $noResults=true;
    $sql = "SELECT `blog_id` AS `id`,`title`,`body`,'blog' AS `table` FROM `blog` WHERE `title` LIKE '%$search_query%' OR `body` LIKE '%$search_query%'
    UNION
    SELECT `dis_id`,`dis_title` AS `title`, `dis_desc`,'discussion' AS `table` FROM `discussion` WHERE `dis_title` LIKE '%$search_query%' OR `dis_desc` LIKE '%$search_query%'";
    $result=mysqli_query($conn,$sql);
    // var_dump($result);
    
    while($row=mysqli_fetch_assoc($result)){
        $noResults=false;
        $title=$row['title'];
        $desc=$row['body'];
        $id=$row['id'];
        $table=$row['table'];
        // echo $id;
         if($table=='blog'){
            $url="view.php?blogid=".$id;

        }elseif($table=='discussion'){

        $url="question.php?quesid=".$id;
        }
          
       
       
       echo '<div class="result py-2">
       <h4> <a href="'.$url.'" class="text-dark">'.$title.'</a></h4>
       <p>'.substr($desc,0,124).'</p>
   </div>';
   
    }


    if($noResults){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="display-4">No Reults found</p>
          <p class="lead"><h4> Suggestions :</h4><ul>
          <li>Make sure that all words are spelled correctly.</li>
          <li>Try different keywords.</li>
          <li>Try more general keywords.</li>
          <li>Try fewer keywords.</li></ul>
           </p>
        </div>
      </div>';
    }
}
else{
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Reults found for <strong>Blank Search</strong></p>
      <p class="lead"><h4> Suggestions :</h4><ul>
      <li>Make sure that all words are spelled correctly.</li>
      <li>Try different keywords.</li>
      <li>Try more general keywords.</li>
      <li>Try fewer keywords.</li></ul>
       </p>
    </div>
  </div>';
}

    ?>      

    </div>








    <?php include 'partial/_footer.php';?>
    <!-- <h1>this is online Discussion forum</h1> -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>