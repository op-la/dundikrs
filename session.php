<?php
    session_start();
    include "db_conn.php";

    // Semak jika pengguna belum login, kembali ke index.
    if(!isset($_SESSION['peranan'])){
        header("Location: index.php");
        exit();
    }
?>

