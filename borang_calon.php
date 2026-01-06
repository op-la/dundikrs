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
            width: 300px;
            border-collapse: collapse;
            background-color: #4cc0f5;
            border: 2px solid #000000;
        }
        td:nth-child(2){
            text-align: right;

        }
        tr{
            height: 20px;
        }
        input{
            width: 300px;
        }
    </style>
    <body>
        <div id="mainbody">
            <form action="proses_calon.php" method="POST" enctype="multipart/form-data">
                <div id ="tajuk">
                    <img src="gambar/logo.png" alt="logo" width="300" height="300">
                    <p>Borang tambah calon
                    </p>
                </div>
                
                <table cellpadding="10" align="center">
                    <tr>
                        <td style = "width: 30px"></td>
                        <td></td>
                        <td></td>
                        <td style = "width: 40px"></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>ID Calon:</td>
                        <td><input type="text" name="id" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nama Calon:</td>
                        <td><input type="text" name="nama" required></td>
                        <td></td>
                    </tr>

                   <tr>
                        <td></td>
                        <td>Gambar Calon:</td>
                        <td><input type="file" name="gmbr" accept=".png,.jpg,.jpeg" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" name="simpan" value="SIMPAN"></td>
                        <td></td>
                    </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
            include "footer.php";
        ?>
    </body>
</html>