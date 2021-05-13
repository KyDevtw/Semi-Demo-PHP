<?php
require_once './checkSession.php';
require_once './db.inc.php';

$sqlGetImg = "SELECT `userImg` FROM `user` WHERE `userMail` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

$arrGetImgParam = [
    $_SESSION['userMail']
];


$stmtGetImg->execute($arrGetImgParam);


if ($stmtGetImg->rowCount() > 0) {

    $arrImg = $stmtGetImg->fetchAll();


    if ($arrImg[0]['userImg'] !== NULL) {

        @unlink("./images/" . $arrImg[0]['userImg']);
    }
}


$sql = "DELETE FROM `user` WHERE `userMail` = ?";


$arrParam = [
    $_SESSION['userMail']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("Refresh: 1; url=./index.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=./editUser.php");
    echo "刪除失敗";
}
