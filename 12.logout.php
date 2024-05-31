<?php
    // 開始會話或恢復目前的會話
    session_start();

    // 從會話陣列中刪除（移除）"id"鍵的值，有效地登出使用者
    unset($_SESSION["id"]);

    // 顯示登出成功的中文訊息
    echo "登出成功....";

    // 輸出一個 meta 標籤，指示瀏覽器在 3 秒後刷新頁面並將使用者重定向到 "2.login.html"
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
