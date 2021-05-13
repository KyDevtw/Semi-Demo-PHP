<?php
require_once './db.inc.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ARTITIED</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <?php
  require_once './template/linkTemplate.php';
  ?>
</head>

<body>
  <div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
      <div class="container px-0 px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">ARTITIED</span></a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <!-- Link--><a class="nav-link active" href="index.php"></a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="shop.php"></a>
              </li>
              <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.php"></a><a class="dropdown-item border-0 transition-link" href="shop.php"></a><a class="dropdown-item border-0 transition-link" href="detail.php"></a></div>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><span class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-white"></i></span></li>
              <li class="nav-item"><a class="nav-link" href="./loginPage.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- HERO SECTION-->
    <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./images/006.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./images/003.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./images/104.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./images/101.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./images/002.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!-- CATEGORIES SECTION-->
    <section class="py-5">
      <header class="text-center">
        <p class="small text-muted small text-uppercase mb-1">一同與藝術，共襄盛舉</p>
        <h2 class="h5 text-uppercase mb-4">活動清單</h2>
      </header>
      <!-- 測試區 -->
      <div class="row">
        <?php
        // SQL 敘述
        $sql = "SELECT `id`, `eventName`, `eventDescription`, `eventPrice`, `eventImg`,`eventId`
                    FROM `event` 
                    ORDER BY `id` ASC";

        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
          $arr = $stmt->fetchAll();
          for ($i = 0; $i < count($arr); $i++) {
        ?>
            <div class="col-md-6 mb-4 mb-md-0 py-3 px-5"><a class="category-item" href="./eventDetail.php?itemId=<?php echo $arr[$i]['eventId'] ?>"><img class="img-fluid" src="./images/<?php echo $arr[$i]['eventImg'] ?>" alt=""><strong><?php echo $arr[$i]['eventName'] ?><a class="text-muted font-weight-normal" href="./edit.php?id=<?php echo $arr[$i]['id']; ?>">編輯 |</a><a class="text-muted font-weight-normal" href="./delete.php?id=<?php echo $arr[$i]['id']; ?>"> 刪除</a></strong></a></div>
        <?php
          }
        }
        ?>
      </div>
      <!-- 測試區 -->
      <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">藝術博物館</h6>
              <ul class="list-unstyled mb-5">
                <li><a class="footer-link" href="../museum/musList.php">Josie</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">商品列表</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="../Jeffrey-work/eventList.php">Jeffrey</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">展覽工作坊</h6>
              <ul class="list-unstyled mb-5">
                <li><a class="footer-link" href="../event/eventList.php">Kurt</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">競標拍賣</h6>
              <ul class="list-unstyled mb-5">
                <li><a class="footer-link" href="../artdict-little--main/admin.php">劉暢</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">會員中心</h6>
              <ul class="list-unstyled mb-5">
                <li><a class="footer-link" href="../chuchuen/">竹君</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">購物車功能</h6>
              <ul class="list-unstyled mb-5">
                <li><a class="footer-link" href="../PHP-project-Gary/admin.php">Gary</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-lg-6">
                <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
              </div>
              <div class="col-lg-6 text-lg-right">
                <p class="small text-muted mb-0">Ddesigned by ARTDDICT</p>
              </div>
            </div>
          </div>
        </div>

      </footer>
      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/lightbox2/js/lightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
      <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
      <script src="js/front.js"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {

          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
          }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </div>
</body>

</html>