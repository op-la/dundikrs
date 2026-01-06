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
            padding: 8px;
            height: 30px;
        }

        tr{
            background-color: #ffffff;
        }

        tr:nth-child(2){
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td:nth-child(1){
            text-align: left;
            padding-left: 20px;

        }


    </style>
    <body>
        <div id="mainbody">
            <div id="tajuk">Keputusan Undian</div>

            <!--SQL UTK KIRA UNDIAN-->
            <?php
            $query = "SELECT nama_calon, COUNT(id_calon) AS jumlah_undi FROM UNDIAN INNER JOIN CALON USING (id_calon) GROUP BY id_calon, nama_Calon ORDER BY jumlah_undi DESC";
            $result = mysqli_query($conn, $query) or die ("Error: " . mysqli_error($conn));
            $bil = 0;

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                <col width='250'>
                <col width='150'>
                <tr>
                <th>Nama Calon</th>
                <th>Jumlah Undian</th>
                </tr>";

                //Papar semua data dari jadual PD
                while ($row = mysqli_fetch_assoc($result)) {
                    $bil++;
                    echo "<tr height='10'>";
                    echo "<td>" . $row['nama_calon'] . "</td>";
                    echo "<td>" . $row['jumlah_undi'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<center>Tiada rekod ditemui.</center>";
            }
            ?>
        </div>
    <?php include "footer.php"; ?>
    </body>
</html>

<?php
mysqli_close($conn);
?>  