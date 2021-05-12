<?php
session_start();
require_once './db.inc.php';

$objResponse['success'] = false;
$objResponse['info'] = "請輸入完整資料！";

if (
    $_POST["userMail"] == "" || $_POST["userPwd"] == "" || $_POST["userName"] == "" ||
    $_POST["userGender"] == "" || $_POST["userPhone"] == "" || $_POST["userBirth"] == "" ||
    $_POST["userAddress"] == ""
) {
    header("Refresh: 3; url=./userRegister.php");
    $objResponse['info'] = "請輸入完整資料";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

$sql = "INSERT INTO `user` (`userMail`,`userPwd`,`userName`,`userGender`,`userPhone`,`userBirth`,`userAddress`,`userImg`) 
        VALUES (?,?,?,?,?,?,?,?)";


if ($_FILES["userImg"]["error"] === 0) {
    $strDatetime = date("YmdHis");
    $extension = pathinfo($_FILES["userImg"]["name"], PATHINFO_EXTENSION);
    $imgFileName = $strDatetime . "." . $extension;

    $isSuccess = move_uploaded_file($_FILES["userImg"]["tmp_name"], "./images/" . $imgFileName);

}

$arrParam = [
    $_POST["userMail"],
    sha1($_POST["userPwd"]),
    $_POST["userName"],
    $_POST["userGender"],
    $_POST["userPhone"],
    $_POST["userBirth"],
    $_POST["userAddress"],
    $imgFileName
];

//查詢
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("Refresh: 1; url=./editUser.php");

    //註冊 session
    $_SESSION["userMail"] = $_POST["userMail"];
    $_SESSION["userName"] = $_POST["userName"];

    $objResponse['success'] = true;
    $objResponse['info'] = "註冊成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
} else {
    header("Refresh: 1; url=./index.php");
    $objResponse['info'] = "註冊失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
}
