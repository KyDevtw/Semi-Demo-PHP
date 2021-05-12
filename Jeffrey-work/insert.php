<?php
require_once('./checkSession.php'); // 引入判斷是否登入機制
require_once('./db.inc.php'); // 引用資料庫連線

// SQL 敘述
$sql = "INSERT INTO `product` 
        (`proName`, `proClass`, `proId`, `proDes`, `proPrice`, `proQty`, `proImg` ) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

if ($_FILES["proImg"]["error"] === 0) {
    // 為上傳檔案命名
    $strDatetime = date("YmdHis");

    // 找出副檔名
    $extension = pathinfo($_FILES["proImg"]["name"], PATHINFO_EXTENSION);

    // 建立完整名稱
    $imgFileName = $strDatetime . "." . $extension;

    // 移動暫存檔案到實際存放位置
    $isSuccess = move_uploaded_file($_FILES["proImg"]["tmp_name"], "./images/" . $imgFileName);
}

// 繫結用陣列
$arr = [
    $_POST['proName'],
    $_POST['proClass'],
    $_POST['proId'],
    $_POST['proDes'],
    $_POST['proPrice'],
    $_POST['proQty'],
    $imgFileName
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arr);
if ($stmt->rowCount() > 0) {
    header("Location: ./eventList.php");
    echo "新增成功";
} else {
    header("Refresh: 3; url=./addEvent.php");
    echo "新增失敗";
}
