<?php
    include "session.php";
    
    //Dapatkan data dari input di borang_calon.php
    $idC = $_POST['id'];
    $namaC = $_POST['nama'];

    // Untuk dapatkan maklumat file gambar yang di upload
    $fileExt = strtolower(pathinfo($_FILES['gmbr']['name'], PATHINFO_EXTENSION));
    $gambar = $_FILES['gmbr']['name'];

    //Untuk simpan gambar ke dalam folder 'gambar'
    $tempname = $_FILES['gmbr']['tmp_name']; # Simpan lokasi sementara gambar
    $folder = "gambar/".$gambar; #Dptkan Nama folder dan nama gambar
    move_uploaded_file($tempname, $folder); # Pindahkan gambar ke dalam folder

    //Simpan data ke PD

    $mysql = "INSERT INTO CALON (id_calon, nama_Calon, gambar) VALUES ('$idC', '$namaC', '$gambar')";

    if (mysqli_query($conn, $mysql)){
        echo "<script>alert('Calon Berjaya Ditambah'); window.location.href='calon.php';</script>";
    } else {
        echo "Ralat: " . mysqli_error($conn);
    }
    mysqli_close($conn);;
?>