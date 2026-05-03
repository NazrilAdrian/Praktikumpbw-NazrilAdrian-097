<?php
session_start();
$_SESSION = [];
session_destroy();
header("Location: login.php?message=" . urlencode("Anda sudah logout."));
exit;
