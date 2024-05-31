<?php
    // 隱藏錯誤訊息
    error_reporting(0);

    // 開始會話或恢復目前的會話
    session_start();

    // 如果使用者未登入，則顯示提示訊息並重新導向到登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 連接到資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 構建 SQL 語句，刪除指定 ID 的使用者
        $sql="delete from user where id='{$_GET["id"]}'";

        if (!mysqli_query($conn,$sql)){
            // 如果操作失敗，顯示錯誤訊息
            echo "使用者刪除錯誤";
        }else{
            // 如果操作成功，顯示成功訊息
            echo "使用者刪除成功";
        }

        // 重新導向到使用者管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>

