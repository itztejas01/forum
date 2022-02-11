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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../forum/css/contact.css">
  <title> Online Discussion</title>
</head>

<body>
  <?php include 'partial/_dbconnect.php'; ?>
  <?php include 'partial/_header.php'; ?>

  <!-- <h1>Contact form design by tejas</h1> -->

  <section>
    <div class="container">
      <div class="contactinfo">
        <div>
          <h2>Contact Info</h2>
          <ul class="info">
            <li>
              <span><img src="img/location.png" alt="location"></span>
              <span>Somaiya Ayurvihar Complex Eastern Express Highway Near Everard Nagar,
              Sion East,<br>
              Mumbai,<br> 
              Maharashtra-400022</span>
            </li>
            <li>
              <span><img src="img/mail.png" alt="mail"></span>
              <span>principal.tech@somaiya.edu</span>
            </li>
            <li>
              <span><img src="img/call.png" alt="call"></span>
              <span>022 2406 5408</span>
            </li>
          </ul>
        </div>
        <ul class="sci">
          <li><a href=""><img src="img/1.png" alt="facebook"></a></li>
          <li><a href=""><img src="img/2.png" alt="twitter"></a></li>
          <li><a href=""><img src="img/3.png" alt="instagram"></a></li>
          <li><a href=""><img src="img/5.png" alt="linkedin"></a></li>
        </ul>
      </div>
      <div class="contactform">
        <h2>Send a Message</h2>
        <?php
      if (isset($_GET['success'])) {
      $msg = "Your Message has been delieverd";
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Successfull</strong> ' . $msg . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       </div>';
    }

    ?>
        <form action="partial/_handlecontact.php" method="post">
        <div class="formbox">
          <div class="inputbox w50">
            <input type="text" name="text_name" id="text_name" required>
            <span>Enter Your Name</span>
          </div>
          <div class="inputbox w50">
            <input type="email" name="user_email" id="user_email" required>
            <span>Email Address</span>
          </div>
          <div class="inputbox w50">
            <input type="text" name="usersubject" id="usersubject" required>
            <span>Enter Your Title</span>
          </div>
          <div class="inputbox w100">
            <textarea name="user_feedback" id="user_feedback"></textarea>
            <span>Write your message here</span>
          </div>
          <div class="inputbox w100">
            <input type="submit" value="submit">
          </div>

        </div>
        </form>
      </div>
    </div>
  </section>


  
  <?php include 'partial/_footer.php'; ?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>