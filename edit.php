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
        tr:nth-child(2){
            text-align: center;

        }
        input{
            width: 300px; /* Saiz kotak input */
        }

        input[type=submit]{
            width: 120px; /* Saiz butang kemaskini */         
        }
        input[type=button]{
            width: 120px; /* Saiz butang kembali */         
        }

    </style>
    <body>

        <?php
        //Dapatkan id calon
        $id = $_GET['id'];
        ############### Jika user klik butang kemaskini, update rekod dlm jadual############
        if(isset($_POST['edit'])){
            $query = "UPDATE CALON SET nama_Calon='".$_POST["nm"]."' WHERE id_calon='$id'";
            if (mysqli_query($conn, $query)){
                echo "<script>alert('Rekod calon berjaya dikemaskini'); window.location.href='calon.php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            
        }
        # Tamat Proses

        //Dapatkan data calon dari jadual
        //untuk diletakkan dalam textbox
        $sql = "SELECT * FROM CALON WHERE id_calon='$id'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        //Dptkan gambar dari folder gambar
        $gmbr = "gambar/".$row['gambar'];
        ?>
        <div id="mainbody">
            <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                <div id ="tajuk">
                   <p>Kemaskini Maklumat Calon
                    </p>
                </div>
                
                <table cellpadding="5" align="center" >
                    <tr>
                        <td colspan="4">
                            <img src="<?php echo $gmbr; ?>" width="150" height="150">
                        </td>>

                    </tr>
                    <tr>
                        <td></td>
                        <td>ID Calon:</td>
                        <td><?php echo $row['id_calon']; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nama Calon:</td>
                        <td><input type="text" name="nm" value="<?php echo $row['nama_Calon']; ?>" required></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="button" name="back" value="KEMBALI" onclick="javascript:history.go(-1);">
                            <input type="submit" name="edit" value="KEMASKINI">
                        </td>
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