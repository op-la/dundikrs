<?php
include "session.php"; 

if (isset($_POST['export'])) {

    $datetime = date('ymdHis'); // contoh 25043012103211

    // Nama file custom
    $filename = "D'UNDIKRS-SenaraiPengundi-" . $datetime . ".csv";
    // Jadi browser akan tau yg ni csv download
    
    header('Content-Type: text/csv; charset=utf-8');
    header("Content-Disposition: attachment; filename=\"$filename\"");



    // stream outpt
    $output = fopen('php://output', 'w');

    // field name db
    fputcsv($output, array('no_ahli', 'nama_ahli', 'kata_laluan'));

    // Query from AHLI
    $query = "SELECT no_ahli, nama_ahli, kata_laluan FROM AHLI";
    $result = mysqli_query($conn, $query);






    // Line by line save dekat csv
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
}
?>
