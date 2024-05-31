<?php
    // 隱藏錯誤訊息
    error_reporting(0);
    
    // 開始會話或繼續目前的會話
    session_start();
    
    // 如果用戶未登錄，顯示一條消息並在 3 秒後重定向到登錄頁面
    if (!$_SESSION["id"]) {
        echo "請先登錄";
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    }
    // 如果用戶已登錄
    else{
        // 連接到資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 構建 SQL 語句，插入新的佈告資訊
        $sql="INSERT INTO bulletin(title, content, type, time) 
        VALUES('{$_POST['title']}', '{$_POST['content']}', {$_POST['type']}, '{$_POST['time']}')";
        
        // 執行 SQL 語句
        if (!mysqli_query($conn, $sql)){
            // 如果新增操作失敗，顯示錯誤訊息
            echo "新增命令錯誤";
        }
        else{
            // 如果新增操作成功，顯示成功訊息並在 3 秒後重新導向到佈告列表頁面
            echo "新增佈告成功，三秒後回到網頁";
            echo "<meta http-equiv=REFRESH content='3; url=11.bulletin.php'>";
        }
    }
?>