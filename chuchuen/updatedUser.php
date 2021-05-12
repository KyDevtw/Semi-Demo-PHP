<?php
require_once './db.inc.php';
require_once './checkSession.php';

$sql = "UPDATE `user` 
SET 
`userName` = ?,
`userPwd` = ?,
`userGender` = ?,
`userBirth` = ?, 
`userPhone` = ?, 
`userAddress` = ? ";

$arrParam = [
    $_POST['userName'],
    sha1($_POST['userPwd']),
    $_POST['userGender'],
    $_POST['userBirth'],
    $_POST['userPhone'],
    $_POST['userAddress']
];

if ($_FILES["userImg"]["error"] === 0) {
    $strDatetime = date("YmdHis");
    $extension = pathinfo($_FILES["userImg"]["name"], PATHINFO_EXTENSION);
    $studentImg = $strDatetime . "." . $extension;

    if (move_uploaded_file($_FILES["userImg"]["tmp_name"], "./images/" . $studentImg)) {

        $sqlGetImg = "SELECT `userImg` FROM `user` WHERE `userMail` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);

        $arrGetImgParam = [
            $_SESSION['userMail']
        ];

        $stmtGetImg->execute($arrGetImgParam);

        if ($stmtGetImg->rowCount() > 0) {
            $arrImg = $stmtGetImg->fetchAll();

            if ($arrImg['userImg'] !== NULL) {
                @unlink("./images/" . $arrImg['userImg']);
            }
            $sql .= ",";
            $sql .= "`userImg` = ? ";

            $arrParam[] = $studentImg;
        }
    }
}


$sql .= "WHERE `userMail` = ? ";
$arrParam[] = $_SESSION['userMail'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 1; url=./editUser.php");

if ($stmt->rowCount() > 0) {
    echo "更新成功";
} else {
    echo "沒有任何更新";
}
