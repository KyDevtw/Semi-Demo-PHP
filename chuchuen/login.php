<?php
require_once './db.inc.php';

if (isset($_POST['userMail']) && isset($_POST['userPwd'])) {
    $sql = "SELECT `userMail`, `userPwd` FROM `user`
            WHERE  `userMail` = ?
            AND `userPwd` = ? ";

    $arrParam = [
        $_POST['userMail'],
       sha1( $_POST['userPwd'])
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);

    if ($stmt->rowCount() > 0) {
        session_start();
        $_SESSION['userMail'] = $_POST['userMail'];
        header('Refresh:3;url=./editUser.php');
        echo "登入成功！！";
    } else {
        header('Refresh:1;url=./login.php');
        echo "登入失敗...";
    }
} else {
    header('Refresh:1;url=./loginPage.php');
    echo "請註冊會員！！";
}
