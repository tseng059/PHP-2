<?php
    // 關閉錯誤報告
    error_reporting(0);
    // 啟動 session
    session_start();
    // 如果沒有登入，則顯示請先登入並導向登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 連接資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 更新佈告
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            // 如果更新失敗，顯示錯誤訊息並導向佈告列表頁面
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }else{
            // 如果更新成功，顯示成功訊息並導向佈告列表頁面
            echo "修改成功，三秒鐘後回到佈告欄列表";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
