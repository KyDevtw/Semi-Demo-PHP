<?php
//搭配全域變數，遞迴取得上下階層的 id 字串集合
function getRecursiveCategoryIds($pdo, $proId){
    global $strCategoryIds;
    $sql = "SELECT `proId`
            FROM `product` 
            WHERE `id` = ?";
    $stmt = $pdo->prepare($sql);
    $arrParam = [$proId];
    $stmt->execute($arrParam);
    if($stmt->rowCount() > 0) {
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($arr); $i++) {
            $strCategoryIds.= ",".$arr[$i]['proId'];
            getRecursiveCategoryIds($pdo, $arr[$i]['proId']);
        }
    }
}