<?php
session_start();
unset($_SESSION['user_name']);
unset($_SESSION['user_id']);
unset($_SESSION['user_type']);
session_destroy();
echo"<meta http-equiv='refresh' content='0;url=index.php'>";
?>