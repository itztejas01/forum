<?php include 'partial/_like.php'; 
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            /* background: rgba(0, 0,0, 0.50) url("https://source.unsplash.com/1600x900/?discussion,tech"); */
            background: whitesmoke;
            background-size: cover;
        }
    </style>

    <title> Online Discussion</title>
    <style>
        .post {
            width: 90%;
            margin: 20px auto;
            padding: 10px 5px 0px 5px;
            border: 1px solid green;
        }

        .post-info {
            margin: 10px auto 0px;
            padding: 5px;
        }

        .fa {
            font-size: 1.2em;
        }

        .fa-thumbs-down,
        .fa-thumbs-o-down {
            transform: rotateY(180deg);
        }

        .logged_in_user {
            padding: 10px 30px 0px;
        }

        i {
            color: blue;
        }

        #ques {
            min-height: 530px;
        }
    </style>
</head>

<body>
    <?php include 'partial/_dbconnect.php'; ?>
    <?php include 'partial/_header.php'; ?>
    <?php
    $ques_id = $_GET['quesid'];
    $sql = "SELECT * FROM `discussion` WHERE dis_id='$ques_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $title = $row['dis_title'];
        $desc = $row['dis_desc'];
        $user_id = $row['dis_user_id'];


        //query for finding the posted question user name

        $sql2 = "SELECT * FROM `signup` WHERE sno='$user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_name'];
    }
    ?>


    <?php
    include './Profanus.php';

    $clean = new Profanus();
    // var_dump($clean);
    $showalert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //insert in comment database
        $comment_content = $_POST['comment'];
        // $qu_desc=$_POST['desc'];
        $comment_content = str_replace("<", "&lt;", $comment_content);
        $comment_content = str_replace(">", "&gt;", $comment_content);
        $comment_content = $clean->censor($comment_content);
        $sno = $_POST['sno'];

        // $qu_desc = str_replace("<", "&lt;", $qu_desc);
        // $qu_desc = str_replace(">", "&gt;", $qu_desc);
        if ($comment_content == null) {
            echo '<div class="alert alert-warning" role="alert">
            <strong>You cannot leave the title blank</strong>
          </div>';
        } else {


            // $sno = $_POST['sno'];
            $sql = "INSERT INTO `comments`(`comment_con`, `dis_id`, `comment_by`, `comment_time`) VALUES ('$comment_content','$ques_id','$sno',current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showalert = true;
            if ($showalert) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Comment has been added.
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
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <!-- <p>This is best forum for the knowledge sharing.</p> -->
            <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
            <!-- Button trigger modal -->
            <p>Posted by : <em><?php echo $posted_by; ?></em></p><br>
            <?php include 'partial/_rules.php'; ?>
        </div>

    </div>


    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

        echo '
    <div class="container">
        <h1 class="py-2 mx-2">Post your comment</h1>
        <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type Your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="' . $_SESSION['sno'] . '">
            </div>
            <button type="submit" class="btn btn-success">Post your comment</button>
        </form>
    </div>
';
    } else {
        echo '
        <div class="container">
        <h1 class="py-2 mx-2">Post your comment</h1>
        <p class="lead my-2">Your are not logged in. Please Login to Post a Comment.</p>
        </div>
        
        ';
    }

    ?>


    <div class="container" id="ques">
        <h1 class="py-2 mx-2 mb-5">Discussion</h1>
        <?php
        
        $ques_id = $_GET['quesid'];
        $sql = "SELECT * FROM `comments` WHERE dis_id=$ques_id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $comm_content = $row['comment_con'];
            $comm_time = $row['comment_time'];
            // $date=date_parse($comm_time);
            $user_id = $row['comment_by'];



            $sql2 = "SELECT * FROM `signup` WHERE sno='$user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $name = $row2['user_name'];
            $gender = $row2['gender'];
            if ($gender == "Male") {
                $img = "img/male.png";
            } elseif ($gender == "Female") {
                $img = "img/female.png";
            } elseif ($gender == "Other") {
                $img = "img/user.png";
            }


            // $desc=$row['dis_desc'];

            echo '<div class="media my-3">
            <img src="' . $img . '" width=50px class="mr-3" alt="...">
            <div class="media-body">
               <p class="font-weight-bold my-0">' . $name . ' at ' . $comm_time . ' </p>
              <p class="font-weight-400 my-0"> ' . $comm_content . ' </p>
            </div>';
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '
            <div class="question-info">
            <input type="hidden" id="user_id" value="'.$_SESSION['sno'].'" />

            <i '; if(userLiked($id)){
                echo'
                class="fa fa-thumbs-up like-btn" ';
            }else{

            echo'
            class="fa fa-thumbs-o-up like-btn" ';
            }echo'
            data-id="'.$id.'""></i>            
            <span class="likes">'.getLikes($id).'</span>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <i ';if(userDisliked($id)){
                echo '
                class="fa fa-thumbs-down dislike-btn" ';
            }else{
                echo 'class="fa fa-thumbs-o-down dislike-btn"';
            }
            echo'
            data-id="'.$id.'"></i>
            <span class="dislikes">'.getdisLikes($id).'</span>
            </div>
        </div>';
        }else {
            echo '
      <div class="fluid-container">
        <p>Please login for Like and Dislike</p>
    </div>
            ';
        }
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <p class="display-4">No Comment for these Cateogory</p>
        <p class="lead">Be the first person to write the Comment</p>
      </div>
    </div>';
        }        
        ?>





    </div>
    <?php include 'partial/_footer.php'; ?>
    <!-- <h1>this is online Discussion forum</h1> -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="./script/ScriptLike.js"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>