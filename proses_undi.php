<?php
include "session.php";

//Dptkn data pengungi dan undian yg dibuat
$noP = $_SESSION['no_ahli'];//pengundi
$idC = $_POST['calon'];//undiannya

//Semak sama ada pengundi telah mengundi atau belum
//Jika sudah, papar mesej dan jangan benarkan undi dibuat lagi
$semak = "SELECT no_ahli FROM UNDIAN
          WHERE no_ahli = '$noP'";
$result = mysqli_query($conn, $semak) or die ("Error: " . mysqli_error($conn));
if(mysqli_num_rows($result) == 1){
    echo "<script>alert('Anda sudah membuat undian sebelum ini!!'); window.location.href='keputusan.php';</script>";
}else{
    //Jika belum, rekodkan undian dlm jadual UNDIAN
    $mysql = "INSERT INTO UNDIAN (no_ahli, id_calon,tarikhmasa)
              VALUES ('$noP', '$idC', NOW())";
    
    if (mysqli_query($conn, $mysql)){
        echo "<script>alert('Terima kasih kerana mengundi!'); window.location.href='keputusan.php';</script>";
    } else {
        echo "Error: " . $mysql . "<br>" . mysqli_error($conn);;
    }
}

mysqli_close($conn);
?>