<?php
require_once('./db.inc.php');
require_once('./getRecursiveCategoryIds.php');
require_once './template/linkTemplate.php';
require_once './template/navbar.php';
require_once './template/modal.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <div class="page-holder">





        <!-- 商品項目清單 -->
        <div class="col-md-12">
            <?php
            if (isset($_GET['proId'])) {
                //SQL 敘述
                $sql = "SELECT `proId`, `proName`, `proImg`, `proPrice`, `proQty`, `proDes`
                    FROM `product` 
                    WHERE `proId` = ? ";

                $arrParam = [
                    (int)$_GET['proId']
                ];

                //查詢
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);


                //若商品項目個數大於 0，則列出商品
                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
                    <div class="container" style="margin-left: 22%;">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row mb-3 d-flex justify-content-center">
                                    <img style="width: 500px;" class="item-view border" src="./images/<?php echo $arr[0]["proImg"]; ?>">
                                </div>
                            </div>

                            <div class="col-md-6" style="position: relative; margin-left:50px;">
                                <p>商品名稱: <?php echo $arr[0]["proName"]; ?></p>
                                <p>商品價格: <?php echo $arr[0]["proPrice"]; ?></p>
                                <p>商品數量: <?php echo $arr[0]["proQty"]; ?></p>
                                <p>商品描述: <?php echo $arr[0]["proDes"]; ?></p>
                                <div style="position: absolute; top:450px;">
                                    <form name="cartForm" id="cartForm" method="POST" action="./addCart.php">
                                        <label>數量: </label>
                                        <input type="text" name="cartQty" id="cartQty" value="1" maxlength="5">
                                        <button type="button" class="btn btn-primary btn-lg" id="btn_addCart" data-item-id="<?php echo $_GET['proId'] ?>">加入購物車</button>
                                        <button type="button" class="btn btn-info btn-lg" id="btn_addItemTracking" data-item-id="<?php echo $_GET['proId'] ?>">追蹤此商品</button>
                                        <input type="hidden" name="proId" id="proId" value="<?php echo $_GET['proId'] ?>">
                                    </form>
                                </div>
                            </div>

                        </div>






                        <!-- comments list -->
                        <div class="container" id="comments">

                            <?php
                            require_once('./db.inc.php');

                            if (isset($_GET['proId'])) {

                                //SQL 敘述
                                $sql = "SELECT `id`, `name`,`content`, `rating`, `proId`, `created_at`
                                        FROM `comments`
                                        WHERE `proId` = ? 
                                        ORDER BY `created_at` DESC ";

                                //查詢分頁後的商品資料
                                $stmt = $pdo->prepare($sql);
                                $arrParam = [$_GET['proId']];
                                $stmt->execute($arrParam); //

                                //若商品項目個數大於 0，則列出商品
                                if ($stmt->rowCount() > 0) {
                                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    for ($i = 0; $i < count($arr); $i++) {
                            ?>
                                        <div class="row">
                                            <div class="media">
                                                <img src="./images/./S__29130790.jpg" style="width: 200px;" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h5 class="mt-0"><?php echo $arr[$i]["name"]; ?></h5>
                                                    <p><?php echo nl2br($arr[$i]["content"]); ?></p>

                                                    <?php $arr[$i]["rating"]; 
                                                    if($arr[$i]["rating"] == 1){
                                                        ?> <p>評分:<a class="text-decoration-none star-count-1">
                                                        <i class="fa fa-star text-warning"></i>
                                                         </a> </p>  <?php
                                                    }?>


                                                    <?php if($arr[$i]["rating"] == 2){
                                                        ?> <p>評分:<a class="text-decoration-none star-count-2">
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                         </a> </p>  <?php
                                                    }?>

                                                    <?php if($arr[$i]["rating"] == 3){
                                                        ?> <p>評分:<a class="text-decoration-none star-count-2">
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                         </a> </p>  <?php
                                                    }?>

                                                    <?php if($arr[$i]["rating"] == 4){
                                                        ?> <p>評分:<a class="text-decoration-none star-count-2">
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                         </a> </p>  <?php
                                                    }?>

                                                    <?php if($arr[$i]["rating"] == 5){
                                                        ?> <p>評分:<a class="text-decoration-none star-count-2">
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                         </a> </p>  <?php
                                                    }?>

                                                    
                      
                                               
                                                    
                                                    
                                                    
                                                    
                                                    <p>新增時間: <?php echo $arr[$i]["created_at"]; ?></p>
                                                </div>
                                            </div>
                                        </div>



                            <?php
                                    }
                                }
                            }
                            ?>



                        </div>


                        <!-- comments -->
                
                        <div class="table-responsive">
                            <form name="myForm" method="POST" action="./insertComments.php" class="col-12" style="padding: 2px; width:1500px;">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>姓名</th>
                                            <th>內容</th>
                                            <th>評分</th>
                                        </tr>
                                    </thead>

                                    <?php
                                //     $sql = "SELECT `username` FROM `admin`
                                //     WHERE `username` = ? ";
                                //     $arrParam = [$_GET['username']];
                                //     $stmt = $pdo->prepare($sql);
                                  
                                //   $stmt->execute($arrParam);

                                    
                                    ?>
                                    
                                    <tbody>
                                        <tr>
                                            <td class="border">
                                             <?php 
                                            //  if($stmt->rowCount() > 0) {
                                            //  $arr = $stmt->fetchAll()[0]; ?>
                                                <input type="text" name="name" 
                                                value="<?php
                                                //  echo $_SESSION['username'];
                                            // }
                                            ?>"
                                                  />
                                            </td>


                                            <td class="border">
                                                <textarea style="width: 650px;" name="content" value="" rows="10" cols="50"></textarea>
                                            </td>

                                            <td class="border">
<!-- 下方 JS 會判斷輸入的星數 -->
<div class="h5 mb-0">
    <a href="#" class="text-decoration-none commentStar star-count-1">
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
    </a>
    <a href="#" class="text-decoration-none commentStar star-count-2">
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
    </a>
    <a href="#" class="text-decoration-none commentStar star-count-3">
         <i class="fa fa-star text-secondary" aria-hidden="true"></i>
    </a>
    <a href="#" class="text-decoration-none commentStar star-count-4">
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
    </a>
    <a href="#" class="text-decoration-none commentStar star-count-5">
        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
    </a>
</div>
<input type="text" name="rating" id="rating" hidden>

                                                <script>
let starIcon = document.querySelectorAll('.commentStar i');
const abc = document.getElementById('rating')

for (let i = 0; i < starIcon.length; i++) {
    starIcon[i].addEventListener('click', function(event) {
            event.preventDefault();
            for (let j = 0; j <= i; j++) {
                starIcon[j].classList.add('text-warning');
            }
            for (let k = 4; k > i; k--) {
                starIcon[k].classList.remove('text-warning');
            }
            let starNumber = i + 1; 
            const abc = document.getElementById('rating')
            if (abc.value = 3){
            console.log("123123");
            abc.value = starNumber;
 
}
        },
        false
    );
}

// document.getElementById("rating").value = starNumber;


                                                </script>

                                                <!-- <select name="rating" id="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            </select> -->


                                            </td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="border" colspan="3">
                                                <input type="submit" name="btn_insertComments" id="btn_insertComments" class="btn btn-outline-primary" value="新增">

                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="text" name="proId" value="<?php echo (int)$_GET['proId']; ?> " hidden>
                                <input type="text" name="created_at" value="<?php date("YmdHis") ?>" hidden>
                            </form>
                        </div>




                    </div>


            <?php
                }
            }
            ?>
        </div>
    </div>



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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>