<?php
// உ
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'dundikrs';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Connection gagal" . mysqli_connect_error());
}
// echo "Sambungan ke pangkalan data berjaya!";
?>