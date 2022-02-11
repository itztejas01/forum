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
       
    #ques {
        min-height: 450px;
    }
    </style>
    <title> Online Discussion</title>
</head>

<body>
    <?php include 'partial/_dbconnect.php';?>
    <?php include 'partial/_header.php';?>
    <?php 
    $cat_id=$_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE cat_id=$cat_id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){

        $catname=$row['cat_name'];
        $cat_desc=$row['cat_desc'];

    }
    ?>


    <?php  
    include 'Profanus.php' ;

    $clean= new Profanus();
    $showalert= false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //insert in question database
        $qu_title=$_POST['title'];
        $qu_desc=$_POST['desc'];
        $qu_title = str_replace("<", "&lt;", $qu_title);
        $qu_title = str_replace(">", "&gt;", $qu_title); 

        $qu_desc = str_replace("<", "&lt;", $qu_desc);
        $qu_desc = str_replace(">", "&gt;", $qu_desc);
        $qu_title=$clean->censor($qu_title);
        $qu_desc=$clean->censor($qu_desc);

        $sno=$_POST['sno'];
        if ($qu_title==null){
            echo '<div class="alert alert-warning" role="alert">
            <strong>You cannot leave the title blank</strong>
          </div>';
        } 

        else{

        
        // $sno = $_POST['sno'];
        $sql = "INSERT INTO `discussion` (`dis_title`, `dis_desc`, `dis_user_id`, `dis_cat_id`, `timestamp`) VALUES ('$qu_title', '$qu_desc', '$sno', '$cat_id', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert= true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Question has been added Wait for others user to answer your question.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            ';
        }
        
    }

    }
    
    
    ?>
    <!-- category container start here -->
    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">This is <?php echo $catname; ?> Forum.</h1>
            <p class="lead"><?php echo $cat_desc; ?></p>
            <hr class="my-4">
            <p class="user-select-none">This is best forum for the knowledge sharing.</p>
            <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
            <!-- Button trigger modal -->
            <?php include 'partial/_rules.php';?>
        </div>

    </div>
    <?php 
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){                                           
    echo '<div class="container">
            <h1 class="py-2 mx-2">Start a Discussion</h1>
            <form action="'.$_SERVER["REQUEST_URI"] .'" method="post">
                <div class="form-group">
                    <label for="qtitle">Question Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
                    <small id="title2" class="form-text text-muted">Title must be crisp and short.</small>
                </div>
                <input type="hidden" name="sno" value="'. $_SESSION['sno'] .'">
                <div class="form-group">
                    <label for="desc">Ellaborate our Question</label>
                    <textarea class="form-control" id="desc" name="desc" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';}
        else{
            echo '
            <div class="container">
            <h1 class="py-2 mx-2">Start a Discussion</h1>
            <p class="lead my-2">Your are not logged in. Please Login to start discussion.</p>
            </div>
            
            ';
        }


    ?>

    <div class="container mb-5" id="ques">
        <h1 class="py-2 mx-2">Browse Question</h1>
        <?php 
    $cat_id=$_GET['catid'];
    $sql = "SELECT * FROM `discussion` WHERE dis_cat_id=$cat_id";
    $result=mysqli_query($conn,$sql);
    $noResult=true;
    while($row=mysqli_fetch_assoc($result)){
        $noResult=false;
        $id=$row['dis_id'];
        $question=$row['dis_title'];
        $desc=$row['dis_desc'];
        $dis_time=$row['timestamp'];
        $user_id=$row['dis_user_id'];
        
        $sql2="SELECT * FROM `signup` WHERE sno='$user_id'";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $name=$row2['user_name'];
        $gender=$row2['gender'];
        if($gender=="Male"){
            $img="img/male.png";
        }
        elseif($gender=="Female"){
            $img="img/female.png";
        }
        elseif($gender=="Other"){
            $img="img/user.png";
        }


       echo '<div class="media my-3">
          <img src="'.$img.'"width=50px class="mr-3" alt="...">
            <div class="media-body">'.'<h5 class="mt-0"><a class="text-dark" href="question.php?quesid='. $id .'">'.$question.'</a></h5>
                '. $desc .'
            </div>'.'<p class="font-weight-bold my-0">Asked by '.$name.' at '.$dis_time.' </p>'.'
        </div>';
    }
    // echo var_dump($noResult);
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="display-4">No question for these Cateogory</p>
    <p class="lead">Be the first person to write the question</p>
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