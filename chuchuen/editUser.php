<?php
require_once './db.inc.php';
require_once './checkSession.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTITIED</title>
    <style>
        .w200px {
            width: 200px;
        }
    </style>
    <script type="text/javascript">
        function display_alert()  {
            alert("確定要刪除帳號？")
        }
    </script>
</head>

<body>
    <?php require_once './template/navbar.php';
    require_once './template/linkTemplate.php';
    ?>


    <section class="py-5">
        <div class="container">
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="h2 text-uppercase mb-0">會員資料</h1>
                        </div>

                    </div>
                </div>
            </section>
            <form name="myForm" action="updatedUser.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tbody>
                        <?php

                        $sql = "SELECT `userImg`,`userName`, `userMail`,`userPwd`, `userGender`, `userBirth`, `userPhone`, `userAddress`
                        FROM `user` 
                        WHERE `userMail` = ? ";

                        $arrParam = [
                            $_SESSION['userMail']
                        ];
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute($arrParam);
                        if ($stmt->rowCount() > 0) {
                            $arr = $stmt->fetchAll()[0];

                        ?>
                            <div class="container" style="padding-left: 100px;">
                                <div class="col-lg-6 form-group">
                                    <a href="./deleteUser.php" onclick="display_alert()">刪除帳號</a>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label class="text-small text-uppercase">更換大頭貼</label><br>
                                    <?php if ($arr['userImg'] !== NULL) { ?>
                                        <img class="w200px" src="./images/<?php echo $arr['userImg'] ?>" />
                                    <?php } ?><br>
                                    <input type="file" name="userImg">
                                </div>
                                <div>
                                    <div class="col-lg-6 form-group">
                                        <label class="text-small text-uppercase">姓名</label>
                                        <input class="form-control form-control-lg" type="text" name="userName" value="<?php echo $arr['userName']; ?>" maxlength="50">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="text-small text-uppercase">帳號</label>
                                        <input class="form-control form-control-lg" type="text" name="userMail" value="<?php echo $arr['userMail'] ?>" maxlength="50" readonly="readonly">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="text-small text-uppercase">密碼</label>
                                        <input class="form-control form-control-lg" type="password" name="userPwd" value="<?php echo $arr['userPwd'] ?>" maxlength="40">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="text-small text-uppercase">性別</label>
                                        <select name="userGender" class="form-control form-control-lg">
                                            <option value="<?php echo $arr['userGender'] ?>" selected><?php echo $arr['userGender'] ?></option>
                                            <option value="男">男</option>
                                            <option value="女">女</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="text-small text-uppercase">生日</label>
                                        <input class="form-control form-control-lg" type="date" name="userBirth" value="<?php echo $arr['userBirth'] ?>">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="text-small text-uppercase">手機號碼</label>
                                        <input class="form-control form-control-lg" type="tel" name="userPhone" value="<?php echo $arr['userPhone'] ?>" maxlength="11">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="text-small text-uppercase">通訊地址</label>
                                        <input class="form-control form-control-lg" type="text" name="userAddress" value="<?php echo $arr['userAddress'] ?>" maxlength="50">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </div>

                                </div>

                            </div>
                        <?php }
                        ?>

                    </tbody>
                </table>
            </form>
        </div>



        <?php require_once './template/footer.php' ?>
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
</body>

</html>