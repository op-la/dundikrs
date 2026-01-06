<?php
include "db_conn.php";

//Dapatkan input penggune dpd borang daftar

$no_ahli = $_POST['no'];
$nama_ahli = $_POST['nama'];
$pass_ahli = $_POST['pass'];

//Semak jika no_ahli telah wujud dalam pangkalan data
$semak = "SELECT no_ahli FROM AHLI WHERE no_ahli='$no_ahli'";
$result = mysqli_query($conn, $semak) or die(mysqli_error($conn));

//jika no-ahli sudah wujud, popup mesej
if(mysqli_num_rows($result) == 1){
    echo "<script>alert('Akaun anda telah didaftarkan dan sudah wujud!'); window.location.href='borang_daftar.php';</script>";
} else {
    //Jika no_ahli belum wujud, masukkan rekod baru ke dalam pangkalan data
    $mysql = "INSERT INTO AHLI (no_ahli, nama_ahli,kata_laluan) VALUES ('$no_ahli', '$nama_ahli', '$pass_ahli')";

    if (mysqli_query($conn, $mysql)) {
        echo "<script>alert('Pendaftaran berjaya! Sila log masuk.'); window.location.href='index.php';</script>";
    } else {
        echo "Ralat: " . $mysql . "<br>" . mysqli_error($conn);
    }
}
//Tutup sambungan PD
mysqli_close($conn);