<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){

}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum">Discussion forum</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="blog.php">Blog</a>
    </li>
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Categories
      </a>
      
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

      $sql="SELECT cat_name,cat_id FROM `category` LIMIT 5";
      $reslut=mysqli_query($conn, $sql);
      while($row=mysqli_fetch_assoc($reslut)){
        echo '<a class="dropdown-item" href="discussion.php?catid='. $row['cat_id'] .'">'.$row['cat_name'].'</a>';
      }
      echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact us</a>
    </li>
  </ul>
  <div class="row mx-2">';
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    <p class="text-light mx-2 my-2">Welcome '. $_SESSION['name'].'</p>
    <a href="partial/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
    
  </form>';
  }

  else{ 
  echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
  <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Sign up</button>';
  }
  echo '</div>

</div>
</nav>
          
';
include 'partial/_loginmodal.php';
include 'partial/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Signup Successfull !</strong> You can now Login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
elseif(isset($_GET['logout']) && $_GET['logout']=='true'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Logout !</strong> Your are successfully logout.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
elseif(isset($_GET['showerror']) && $_GET['showerror']=='Email already Exist'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Unsuccessfull !</strong> Email Id already has been registered. Please try with different email id.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
elseif(isset($_GET['showerror']) && $_GET['showerror']=='Password Do not match'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Unsuccessfull !</strong> Please enter the same password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}
elseif(isset($_GET['showerror']) && $_GET['showerror']=='Password not Entered'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Unsuccessfull !</strong> Please Enter the password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
elseif(isset($_GET['showerror']) && $_GET['showerror']=='Email id not Entered'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Unsuccessfull !</strong> Please Enter the Email id. <strong> It should not be blank</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
elseif(isset($_GET['showerror']) && $_GET['showerror']=='Email id not registered'){
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Eww !</strong> You are not registered in our forum. <strong> Please Signup to take advantage of our features.</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
elseif(isset($_GET['showerror']) && $_GET['showerror']=='email error'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Awful !</strong> Please Enter Proper Email id. <strong> It should not have different characters.</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}

?>