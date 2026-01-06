<?php

include "header.php"; 
include "session.php";

if ($_SESSION['peranan'] == "ahli") {
    // If the user is a member, deny access and redirect or show an error.
    echo "<script>alert('Akses Ditolak. Halaman ini hanya untuk Admin.'); window.location.href='utama.php';</script>";
    exit(); // IMPORTANT: Stop script execution
}


include "nav.php";

?>

<html>

    <title>Senarai Calon - D'Undi KRS</title>
    <link href="gambar/logo.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700&display=swap" rel="stylesheet">


    <style>

        #mainbody{
            background-color: #f2f2f201;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        body{
            font-family: 'Titillium Web', sans-serif;
            padding-top: 60px;   /* header height */
            padding-bottom: 60px;/* footer height */
            background: url('https://a-static.besthdwallpaper.com/sherwood-forest-wallpaper-1280x768-98899_13.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(1px);
            
        }
        h1, h2, h3, h4, h5, h6, p {
         margin-block: 0;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
            }
        #tajuk{

            font-size: 30px;
            font-weight: bold;
            text-align:center;
             font-family: 'Titillium Web', sans-serif;
             color: #ffffffff;
        }
        #tajuk p{
                text-shadow: 0 0 10px #0ff,
                0 0 20px #0ff,
                0 0 40px #0ff;
                color: #354035ff;
            }
        table {
            margin-left: auto;
            margin-right: auto;
            margin: auto;
            border-collapse: collapse;

        }

        th{
            height: 30px;
            text-align: center;
            background-color: #4cc0f5;
            color: white;
            font-weight: bold;

        }

        td{
            text-align: center;
            height: 30px;
        }

        tr:nth-child(even){
            background-color: #f2f2f2;
        }

        tr:nth-child(odd){
            background-color: #ffffff;
        }

        td:nth-child(3){
            text-align: left;

        }

        th:nth-child(3){
            text-align: left;

        }

    </style>
    <body>
        <div id="mainbody">
            <br><br><br><br>
            <div id ="tajuk">
                <p>Senarai Calon Pengerusi Kadet Remaja Sekolah</p>
                <button onclick="window.location.href='borang_calon.php'">Tambah Calon</button>
            </div>

            <?php
                // Assuming $conn is available from header.php or nav.php
                $query = "SELECT * FROM CALON
                          ORDER BY nama_Calon ASC";
               
                $result = mysqli_query($conn, $query) or die ("Error: " . mysqli_error($conn));
                $bil = 0;

                if(mysqli_num_rows($result) > 0){

                    #Table paparan data
                    echo "<table>
                            <col width='50'>
                            <col width='100'>
                            <col width='250'>
                            <col width='90'>
                            <col width='90'>
                            <tr>
                                <th>Bil</th>
                                <th>Gambar</th>
                                <th>Nama Calon</th>
                                <th>Edit</th>
                                <th>Padam</th>
                             </tr>";
                    
                    //Dapatkan data dari pangkalan data
                    while ($row = mysqli_fetch_assoc($result)){
                        $bil++;
                        $gmbr = "gambar/".$row['gambar'];

                        echo "<tr height='10'>
                                <td>".$bil."</td>
                                <td><img src='".$gmbr."' alt='gambar' width='80' height='80'></td>
                                <td>".$row['nama_Calon']."</td>
                                <td><a href='edit.php?id=".$row['id_calon']."'> <img src='gambar/edit.png' title='edit' width='15' height='15'></a></td>
                                <td><a href='padam.php?id=".$row['id_calon']."'><img src='gambar/delete.png' title='padam' width='15' height='15'> </a></td>
                            </tr>";
                    }             

                   
                    echo "</table>";


                } else {
                    echo "<center>Tiada rekod calon dijumpai.</center>";
                }
            ?>




        </div>
        <?php
        include "footer.php";
        ?>

    </body>

</html>