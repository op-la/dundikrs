<?php
include "header.php";
include "nav.php";
?>

<html>
    <style>

        #mainbody{
            background-color: #f2f2f2;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        #tajuk{

            font-size: 24px;
            font-weight: bold;
            text-align:center;
            font-family: Arial, sans-serif;
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
            <div id="tajuk">Senarai Pengundi</div>
                <!-- borang query-->
                <form action="" method="post">
                    <center>
                        <select name="kategori">
                            <option>Pilih Carian</option>
                            <option value="nama">Nama Ahli</option>
                            <option value="no">No. Ahli</option>
                        </select>
                        : <input type="text" name="carian">
                        <input type="submit" value="Cari" name="cari">
                    </center>
                </form> 

                <!-- query carian-->
                <?php
                    //Jika user klik butang cari dan input carian tidak kosong
                    if(isset($_POST['cari']) && !empty($_POST['carian'])){
                        //Kenalpasti kategori carian
                        $kategori = $_POST['kategori'];
                        switch($kategori){
                            case "no": // Jika pilih kategori no ahli
                                $query = "SELECT * FROM AHLI
                                          WHERE no_ahli = '$_POST[carian]'";
                                break;
                            default: // Jika pilih kategori nama ahli
                                $query = "SELECT * FROM AHLI
                                          WHERE nama_ahli LIKE '%$_POST[carian]%'
                                          ORDER BY nama_ahli ASC";
                                break;                                                                      
                        }
                    }else{
                        //Jika pengguna tak buat carian, papar semua rekod
                        $query = "SELECT * FROM AHLI
                                  ORDER BY no_ahli ASC";
                    }  
                    $mysql = $query;
                    $result = mysqli_query($conn, $mysql) or die ("Error: " . mysqli_error($conn));
                    $bil = 0;
                    if (mysqli_num_rows($result) > 0){
                        //Table paparan data
                        echo "<table>
                                <col width='80'>
                                <col width='150'>
                                <col width='250'>
                                <tr>
                                    <th>Bil</th>
                                    <th>No. Ahli</th>
                                    <th>Nama Ahli</th>
                                </tr>";
                        //Papar data
                        while($row = mysqli_fetch_assoc($result)){
                            $bil++;
                            echo "<tr height='10'>
                                    <td>$bil</td>
                                    <td>$row[no_ahli]</td>
                                    <td>$row[nama_ahli]</td>
                                    <td>$row[kelas]</td>
                                  </tr>";
                        }
                        echo "</table>";
                        echo "<center><p><button onclick='window.print()'>Cetak</button></p></center>";
                        
                    } else {
                        echo "<center>Tiada rekod pengundi dijumpai.</center>";
                    }
                ?>  

                <div id="tajuk">
                    <h5>Muat Naik Data Pengundi</h5>
                </div>
                <form action="proses_muatnaik.php" method="post" enctype="multipart/form-data">
                    <center>
                        Pilih fail untuk dimuatnaik (.csv sahaja):
                        <input type="file" name="file_csv" accept=".csv" required>
                        <p><input type="submit" value="Muat Naik" name="upload"></p>    

                    </center>
                </form>

                <form action="export.php" method="post">
                    <center>
                        <input type="submit" value="Eksport Data Pengundi" name="export">
                    </center>
                </form>
        </div>
    <?php include "footer.php"; ?>
    </body>
</html>
