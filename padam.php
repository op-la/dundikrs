<?php
//session
include "session.php";

$id = $_GET['id'];

//Dapatkan nama file gambar
$query = "SELECT * FROM CALON WHERE id_calon='$id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$gmbr = $row['gambar'];
$lokasi = "gambar/".$gmbr; // lokasi folder gambar

//Padam rekod jadual

$mysql = "DELETE FROM CALON WHERE id_calon='$id'";

if (mysqli_query($conn, $mysql)){
    //jika berjaya padam, padam gambar dari folder
    unlink($lokasi); //padam gambar

    //papar mesej berjaya padam
    echo "<script>alert('Rekod calon berjaya dipadam');";
    echo "window.location.href='calon.php';</script>";
} else {
    //papar mesej gagal padam
    echo "Error: " . mysqli_error($conn);
}