<?php 
// session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
 echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
 <strong>Successfull</strong> Welcome '.$_SESSION['name'].' to our website. Now you can add comments and post questions
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>';
}
?>