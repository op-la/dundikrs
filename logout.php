<?php
session_start();
session_unset(); // Pasam semua data session
session_destroy(); //Hapuskan session

//Redirect ke halaman login
header("Location: index.php");
exit();
?>