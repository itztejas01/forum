<?php 
include '_dbconnect.php';

// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

if(isset($_POST['action'])){
    $answer_id = intval( $_POST['answer_id']);
    $action = $_POST['action'];
    $user_id = $_POST['user_id'];
    // var_dump($_POST);
    switch($action){
        case 'like':
            $sql = "INSERT INTO `rating_info` (`answer_id`, `user_id`, `rating_action`) VALUES ('$answer_id', '$user_id', '$action') ON DUPLICATE KEY UPDATE rating_action='like'";
            break;
        case 'dislike':
            $sql = "INSERT INTO `rating_info` (`answer_id`, `user_id`, `rating_action`) VALUES ('$answer_id', '$user_id', '$action') ON DUPLICATE KEY UPDATE rating_action='dislike'";
            break;
        case 'unlike':
            $sql = "DELETE FROM `rating_info` WHERE `rating_info`.`user_id` =  $user_id AND `rating_info`.`answer_id` = $answer_id";
            break;
        case 'undislike':
            $sql = "DELETE FROM `rating_info` WHERE `rating_info`.`answer_id` = $answer_id AND `rating_info`.`user_id` = $user_id";
            break;
        
        default:
            break;
    }
    //excecute query 
    $result = mysqli_query($conn,$sql);
    echo getRating($answer_id);
    exit(0);
}
// Rating counts
function getRating($id){
    global $conn;
    $rating = array();
    $likes_query = "SELECT COUNT(*) FROM rating_info WHERE `rating_info`.`answer_id` = $id AND `rating_action`='like'";
    $dislikes_query = "SELECT COUNT(*) FROM rating_info WHERE `rating_info`.`answer_id` = $id AND `rating_action`='dislike'";
    $likes_rs = mysqli_query($conn, $likes_query);
    $dislikes_rs = mysqli_query($conn, $dislikes_query);
    $likes = mysqli_fetch_array($likes_rs);
    $dislikes = mysqli_fetch_array($dislikes_rs);
    $rating = [
  	'likes' => intval($likes[0]),
  	'dislikes' => intval($dislikes[0])
    ];
  return json_encode($rating);
}

// likes count
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE `rating_info`.`answer_id` = $id AND rating_action='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);

  return $result[0];
}

// dislikes count
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE `rating_info`.`answer_id` = $id AND rating_action='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);

  return $result[0];
}


function userLiked($answer_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM `rating_info` WHERE `user_id`=$user_id 
  		  AND `rating_info`.`answer_id` = $answer_id AND `rating_action`='like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}


function userDisliked($answer_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM `rating_info` WHERE `user_id`=$user_id 
  		  AND `rating_info`.`answer_id` = $answer_id AND `rating_action`='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}
?>