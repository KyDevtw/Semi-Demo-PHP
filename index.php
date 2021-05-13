<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ARTDDICT</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <?php
  require_once './template/linkTemplate.php';
  ?>
  <style>
    .grayscale {
      -webkit-filter: grayscale(95%);
      -moz-filter: grayscale(95%);
      -ms-filter: grayscale(95%);
      -o-filter: grayscale(95%);
    }

    .grayscale:hover {
      -webkit-filter: grayscale(0);
      -moz-filter: grayscale(0);
      -ms-filter: grayscale(0);
      -o-filter: grayscale(0);
    }
  </style>
</head>

<body>
  <div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white shadow-sm">
      <div class="container px-0 px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">ARTDDICT</span></a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <!-- Link--><a class="nav-link active" href="index.html"></a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="shop.html"></a>
              </li>
              <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html"></a><a class="dropdown-item border-0 transition-link" href="shop.html"></a><a class="dropdown-item border-0 transition-link" href="detail.html"></a></div>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <?php
              if (!isset($_SESSION['username'])) {
              ?>
                <li class="nav-item"><span class="nav-link" href="cart.html"> <i class="fas fa-dolly-flatbed mr-1 text-white"></i></span></li>
                <li class="nav-item"><a class="nav-link" href="./loginPage.php"> <i class="fas fa-user-alt mr-1 text-grey"></i>Login</a></li>
              <?php
              } else {
              ?>
                <li class="nav-item"><span class="nav-link" href="cart.html"> <i class="fas fa-dolly-flatbed mr-1 text-white"></i></span></li>
                <li class="nav-item"><a class="nav-link" href="./logout.php"> <i class="fas fa-user-alt mr-1 text-grey"></i>Logout</a></li>

              <?php
              }
              ?>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <?php require_once './template/modal.php'; ?>
    <!-- HERO SECTION-->
    <!-- <div class="container">
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
    <span id="EventList"></span> -->


    <!-- CATEGORIES SECTION-->
    <section class="pt-5">
      <header class="text-center">
        <p class="small text-muted small text-uppercase mb-1">一同與藝術，共襄盛舉</p>
        <h2 class="h5 text-uppercase mb-4">分頁清單</h2>
      </header>




      <!-- 測試區 -->
      <div class="container mb-5">
        <div class="row">

          <div class="col-md-6 mb-4 mb-md-0 py-3 px-3">
            <span class="category-item" href="./museum/musList.php">
              <a href="./museum/musList.php">
                <img class="img-fluid mb-3 grayscale" src="./images/005_museum.png" alt="">
                <strong>藝術博物館</strong>
              </a>
            </span>
          </div>

          <div class="col-md-6 mb-4 mb-md-0 py-3 px-3">
            <span class="category-item" href="./Jeffrey-work/eventList.php">
              <a href="./Jeffrey-work/eventList.php">
                <img class="img-fluid mb-3 grayscale" src="./images/005_product.png" alt="">
                <strong>商品列表</strong>
              </a>
            </span>
          </div>

          <div class="col-md-6 mb-4 mb-md-0 py-3 px-3">
            <span class="category-item" href="./event/eventList.php">
              <a href="./event/eventList.php">
                <img class="img-fluid mb-3 grayscale" src="./images/005_exhibition.png" alt="">
                <strong>展覽工作坊</strong>
              </a>
            </span>
          </div>

          <div class="col-md-6 mb-4 mb-md-0 py-3 px-3">
            <span class="category-item" href="./artdict-little--main/admin.php">
              <a href="./artdict-little--main/admin.php">
                <img class="img-fluid mb-3 grayscale" src="./images/005_auction.png" alt="">
                <strong>競標拍賣</strong>
              </a>
            </span>
          </div>

          <div class="col-md-6 mb-4 mb-md-0 py-3 px-3">
            <span class="category-item" href="./chuchuen/">
              <a href="./chuchuen/">
                <img class="img-fluid mb-3 grayscale" src="./images/005_member.png" alt="">
                <strong>會員中心</strong>
              </a>
            </span>
          </div>

          <div class="col-md-6 mb-4 mb-md-0 py-3 px-3">
            <span class="category-item" href="./PHP-project-Gary/admin.php">
              <a href="./PHP-project-Gary/shop-admin.php">
                <img class="img-fluid mb-3 grayscale" src="./images/005_cart.png" alt="">
                <strong>購物車功能</strong>
              </a>
            </span>
          </div>


        </div>
      </div>

      <!-- 測試區 -->


      <?php require_once './template/footer.php'; ?>
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
    </section>
  </div>

  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
  <script src="https://cdpn.io/cp/internal/boomboom/pen.js?key=pen.js-c3fe5f08-872b-282a-a8b0-15d141c4aeb8" crossorigin=""></script>

</body>

</html>