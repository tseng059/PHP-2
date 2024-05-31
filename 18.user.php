<html>
    <head><title>使用者管理</title></head>
    <body>
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
            // 顯示使用者管理標題及連結
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            // 連接到資料庫
            $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
            
            // 從資料庫中取得所有使用者資料
            $result=mysqli_query($conn, "select * from user");
            
            // 顯示使用者資料
            while ($row=mysqli_fetch_array($result)){
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            
            // 關閉資料庫連線
            mysqli_close($conn);
            
            echo "</table>";
        }
    ?> 
    </body>
</html>
