<?php
    include "session.php";
    //Format file" csv yang diterima browser

    $jenis = array(
        'text/csv',
        'application/vnd.ms-excel',
        'application/csv',
        'text/comma-separated-values',
        'text/x-comma-separated-values',
        'text/x-csv',
        'application/x-csv',
        'application/vnd.msexcel'

    );

    //Dapatkan fail yang dimuatnaik
    $file = $_FILES['file_csv']['tmp_name'];

    //Pastikan hanya .csv terima
    if (in_array($_FILES['file_csv']['type'], $jenis)){
        //Buka fail untuk dibaca
        $file_open = fopen($file, "r");
        //Baca setiap baris line by line
        while (($data = fgetcsv($file_open)) !== FALSE){
            //Simpan data dlm tatasusunan
            $no = $data[0];
            $nama = $data[1];
            $pwd = $data[2];

            //Semak jika no_ahli sudah wujud dlm jadual
            $sql = "SELECT * FROM AHLI
                    WHERE no_ahli = '$no'";
            $result = mysqli_query($conn, $sql) or die ("Error: " . mysqli_error($conn));

            //Jika no_pekerja wujud, paparkan mesej popup
            if (mysqli_num_rows($result) == 1){
                echo "<script>alert('No. Ahli $no sudah wujud dalam pangkalan data. Data tidak dimuatnaik. Sila semak fail anda.'); window.location.href='pengundi.php';</script>";
                exit();
            } else {
                //Jika no_ahli belum wujud, masukkan rekod baru
                $insert = "INSERT INTO AHLI (no_ahli, nama_ahli, kata_laluan)
                           VALUES ('$no', '$nama', '$pwd')";
                if (mysqli_query($conn, $insert)){
                    //Rekod berjaya dimasukkan
                    echo "<script>alert('Data pengundi berjaya dimuatnaik.'); window.location.href='pengundi.php';</script>";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }

        //Paparkan popup mesej jika bukan fail csv
    } else {
        echo "<script>alert('Sila muatnaik fail dalam format .csv sahaja.'); window.location.href='pengundi.php';</script>";
    }   
    mysqli_close($conn);
?>