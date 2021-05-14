<?php
require_once('./db.inc.php'); //引用資料庫連線

//預設訊息 (錯誤先行)
$objResponse['success'] = false;
$objResponse['info'] = "評論新增失敗";

$sql = "INSERT INTO `comments`(`name`, `content`, `rating`,`proId`,`created_at`) 
VALUES (?,?,?,?,?)";
$arrParam = [
    $_POST['name'],
    $_POST['content'],
    $_POST['rating'],
    $_POST['proId'],
    $_POST['created_at']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if ($stmt->rowCount() > 0) {
    header("Refresh: 1; url=./eventDetail.php?proId={$_POST['proId']}");

    //取得最後新增的流水號
    $newId = $pdo->lastInsertId();

    try {
        //開始交易
        $pdo->beginTransaction();

        //取得最後一次新增的資料
        $sqlComments = "SELECT `id`, `name`,`content`, `rating`, `proId`,`created_at`
                        FROM `comments`
                        WHERE `id` = ?
                        ORDER BY `created_at` ASC ";
        $stmtComments = $pdo->prepare($sqlComments);
        $arrCommentsParam = [$newId];
        $stmtComments->execute($arrCommentsParam);
        if ($stmtComments->rowCount() > 0) {
            $objResponse['data'] = $stmtComments->fetchAll(PDO::FETCH_ASSOC)[0];
        }

        //執行 SQL
        $pdo->commit();

        $objResponse['success'] = true;
        $objResponse['info'] = "評論新增成功";


        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
        exit();
    } catch (PDOException $e) {
        //交易失敗，回復原先的資料狀態
        $pdo->rollBack();

        $objResponse['success'] = false;
        $objResponse['info'] = "評論新增失敗: " . $e->getMessage();
        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    }
} else {
    header("Refresh: 1; url=./itemDetail.php?itemId={$_POST['proId']}");
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
}
