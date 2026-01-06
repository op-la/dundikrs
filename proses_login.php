<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Check Database Connection
include "db_conn.php";
if (mysqli_connect_errno()) {
    header('Content-Type: application/json');
    echo json_encode([
        "success" => false,
        "message" => "Ralat Sambungan Pangkalan Data: " . mysqli_connect_error()
    ]);
    exit();
}

// ---------------------------------------------------------
// 1. ADMIN LOGIN (Updated to AJAX/JSON)
// ---------------------------------------------------------
if (isset($_POST['btnLog1'])){

    // Enforce JSON response
    header('Content-Type: application/json');

    $logid = $_POST['logid'];
    $pwdA = $_POST['passA'];

    // Hardcoded credentials check
    if ($logid == "admin" && $pwdA == "admin123"){
        $_SESSION['peranan'] = "admin";
        $_SESSION['login'] = $logid;
        $_SESSION['nama'] = "Admin";

        echo json_encode([
            "success" => true,
            "redirect" => "utama.php",
            "message" => "Berjaya login sebagai admin."
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "ACCESS DENIED. ID atau Kata Laluan Admin SALAH!!"
        ]);
    }
    exit(); // Stop execution here so it doesn't run the code below
}

// ---------------------------------------------------------
// 2. AHLI LOGIN (AJAX/Fetch Request)
// ---------------------------------------------------------
if (isset($_POST['btnLog2'])) {
    
    // Enforce JSON response
    header('Content-Type: application/json');

    $no_ahli = $_POST['no_ahli'];
    $pwdAh = $_POST['passAh'];

    // Basic query (Security risks ignored as requested)
    $sql = "SELECT * FROM AHLI WHERE no_ahli='$no_ahli' AND kata_laluan='$pwdAh'";
    
    $result = mysqli_query($conn, $sql); 

    if (!$result) {
        echo json_encode([
            "success" => false,
            "message" => "Server Query Error: " . mysqli_error($conn)
        ]);
        exit();
    }
    
    $count = mysqli_num_rows($result); 

    if ($count == 1){
        $data = mysqli_fetch_assoc($result);
        $_SESSION['peranan'] = "ahli";
        $_SESSION['no_ahli'] = $data['no_ahli']; 
        $_SESSION['nama'] = $data['nama_ahli'];
        
        echo json_encode([
            "success" => true,
            "redirect" => "utama.php"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Log Masuk Gagal. No. Ahli atau Kata Laluan SALAH!!"
        ]);
    }
    exit(); 
}

// Close connection
mysqli_close($conn);
?>