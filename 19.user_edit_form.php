<html>
    <head><title>修改使用者</title></head>
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
        // 連接到資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 從資料庫中取得指定ID的使用者資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        $row=mysqli_fetch_array($result);
        
        // 顯示用於修改使用者資訊的表單
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
