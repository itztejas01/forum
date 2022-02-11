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
            var _owa = document.createElement('script');
            _owa.type = 'text/javascript';
            _owa.async = true;
            owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl);
            _owa.src = owa_baseUrl + 'modules/base/js/owa.tracker-combined-min.js';
            var _owa_s = document.getElementsByTagName('script')[0];
            _owa_s.parentNode.insertBefore(_owa, _owa_s);
        }());
        //]]>
    </script>
    <!-- End Open Web Analytics Code -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
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
    <?php include 'partial/_dbconnect.php';
    include 'partial/_header.php';
    include 'partial/_success.php';
    ?>
    <!-- slider for the page -->

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x800/?company,microsoft" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x800/?idea,coding" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x800/?technology,idea" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- category container start here -->
    <div class="container my-3 mb-5" id="ques">

        <h2 class="text-center my-3">Browse to Discussion-categories</h2>
        <div class="row my-3">
            <!-- use a loop to iterate -->
            <!-- fetch all the category -->
            <?php
            $result_per_page = 3;
            $sql = "SELECT * FROM `category`";
            $page_result = mysqli_query($conn, $sql);
            $no_of_result = mysqli_num_rows($page_result);
            $no_of_page = ceil($no_of_result/$result_per_page);
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page=1;
            }
            $page_per_result = ($page -1)*$result_per_page;

            $sql2 = 'SELECT * FROM `category` LIMIT '.$page_per_result.','.$result_per_page;
            $result = mysqli_query($conn, $sql2);
            // header("Content-Type: application/json; charset=UTF-8");
            while ($row = mysqli_fetch_assoc($result)) {
                $cat_name = $row['cat_name'];
                $cat_desc = $row['cat_desc'];
                $cat_id = $row['cat_id'];

                echo '<div class="col-md-4 my-2">
              <div class="card" style="width: 18rem;">
                  <img src="img/card-' . $cat_id . '.jpg" class="card-img-top" alt="image for' . $cat_name . '">
                  <div class="card-body">
                      <h5 class="card-title"><a href="discussion.php?catid=' . $cat_id . '">' . $cat_name . '</a></h5>
                      <p class="card-text">' . substr($cat_desc, 0, 120) . '....</p>
                      <a href="discussion.php?catid=' . $cat_id . '" class="btn btn-outline-info">View Discussion</a>
                  </div>
              </div>
              </div> 
              ';
              // json_encode($respone, JSON_PRETTY_PRINT);
            }
            ?>
            
        </div>
        <?php 
        $query = 'SELECT COUNT(*) FROM `category`';
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
            <a class="page-link" href="index.php?page='.($page - 1).'">Previous</a>
          </li>';
        }else{
            echo'<li class="page-item disabled">
            <a class="page-link" href="index.php?page" tabindex="-1" aria-disabled="true">Previous</a>
          </li>';
        }
        for ($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $page_link .='<li class="page-item active"><a class="page-link" href="index.php?page='.($i).'">'.$i.'</a></li>';
            }else{
                $page_link .= '<li class="page-item"><a class="page-link" href="index.php?page='.($i).'">'.$i.'</a></li>';
            } 
        };
        echo $page_link;
        if($page<$total_page){   
            echo'<li class="page-item">
            <a class="page-link" href="index.php?page='.($page+1).'"">Next</a>
            </li> </ul></nav>';   
        }else{
            echo'<li class="page-item disabled">
              <a class="page-link" href="blog.php?page" tabindex="-1" aria-disabled="true">Next</a>
              </li> </ul></nav>';
          }
        echo'</ul></nav>';   
        ?> 

    </div>

    <?php include 'partial/_footer.php'; ?>

    <!-- <h1>this is online Discussion forum</h1> -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>