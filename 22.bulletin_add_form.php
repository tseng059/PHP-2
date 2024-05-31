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
    // 如果用戶已登錄，顯示添加佈告的表單
    else{
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=23.bulletin_add.php>
                    標題：<input type=text name=title><br>
                    內容：<br><textarea name=content rows=20 cols=20></textarea><br>
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    發布時間：<input type=date name=time><p></p>
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
