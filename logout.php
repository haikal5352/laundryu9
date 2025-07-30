<?php
// Pastikan tidak ada spasi/enter sebelum <?php
session_start();

// Hapus session
$_SESSION = [];
session_destroy();

// Hapus cookies
setcookie("user_id", "", time()-3600, "/");

// Redirect ke login page dengan BASE_URL
header("Location: http://localhost/laundry/index.php");
exit;
?>