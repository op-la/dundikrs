<?php
    include "header.php";
    include "nav.php";
?>  
<html>
    <title>Borang Undian - D'Undi KRS</title>
    <link href="logo.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
      #mainbody {
                background-color: #f1f1f105;
                padding: 20px;
                margin-bottom: 40px;
            }
            body{
                background: url('https://a-static.besthdwallpaper.com/sherwood-forest-wallpaper-1280x768-98899_13.jpg') no-repeat center center fixed;
                background-size: cover;
                font-family: 'Titillium Web', sans-serif;
                margin: 0;
            }
            #tajuk p{
                font-family: 'Titillium Web', sans-serif;
                font-size: 22px;
                text-align: center;
                padding: 10px;
                color: #ffffffff;
            }

            #tajuk h1{
                text-shadow: 0 0 10px #0ff,
                0 0 20px #0ff,
                0 0 40px #0ff;
                color: #354035ff;
            }

            table{
                width: 400px;
                border-collapse: collapse;
                padding: 12px;
                border-radius: 12px;
                border: none;
                margin-bottom: 15px;
                background: linear-gradient(to bottom right, #2e5d44c0, #1b3d2fea);

            }


            /* Loader CSS */
            #loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
                background: rgba(0, 0, 0, 0.8);
                z-index: 9999;
            }
            svg {
                width:3.25em;
                transform-origin:center;
                animation:rotate4 2s linear infinite;
            }
            circle {
                fill:none;
                stroke:hsl(214,97%,59%);
                stroke-width:2;
                stroke-dasharray:1,200;
                stroke-dashoffset:0;
                stroke-linecap:round;
                animation:dash4 1.5s ease-in-out infinite;
            }
            @keyframes rotate4 { 100% { transform:rotate(360deg);} }
            @keyframes dash4 {
                0% { stroke-dasharray:1,200; stroke-dashoffset:0; }
                50% { stroke-dasharray:90,200; stroke-dashoffset:-35px; }
                100% { stroke-dashoffset:-125px; }
            }

            input[type="text"], input[type="password"]{
                width: 100%;
                font-family: 'Titillium Web', sans-serif;
                padding: 12px;
                border-radius: 12px;
                border: none;
                margin-bottom: 15px;
                background-color: #e8f5e9;
                color: #1b3d2f;
                font-size: 16px;
            }

            input[type="submit"]{
                background-color: #388e3c;
                color: #ffffff;
                padding: 14px 28px;
                font-size: 18px;
                border: none;
                border-radius: 25px;
                cursor: pointer;
                box-shadow: 0 4px 10px rgba(0,0,0,0.3);
                transition: all 0.3s ease;
            }
            input[type="submit"]:hover{
                background-color: #4caf50;
               transform: scale(1.05);
            }

            table {
                border-collapse: separate;
                border-spacing: 30px; /* Space between cards */
                border: none;
                margin: 0 auto;
            }

            td {
                border: none !important;
                padding: 0;
                vertical-align: top;
            }

            /* Base Card Style */
            .goodboy-card {
                cursor: pointer;
                display: block;
            }

            /* Hide the actual radio circle */
            .goodboy-card input[type="radio"] {
                display: none;
            }

            /* The Card Container */
            .goodboy-info {
                background-color: #1b3d2f;
                border-radius: 20px;
                padding: 20px;
                width: 200px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.3);
                transition: all 0.3s ease;
                text-align: center;
                border: 3px solid transparent; /* Prevents jumping when border appears */
            }

            .goodboy-info img {
                width: 150px;
                height: 150px;
                object-fit: cover;
                border-radius: 12px;
            }

            .goodboy-info h1 {
                font-size: 18px;
                color: #a5d6a7;
                margin: 10px 0 5px;
            }

            .goodboy-info h2 {
                font-size: 14px;
                color: #c8e6c9;
                margin: 0;
            }


            .goodboy-info:hover {
                background-color: #24523f;
            }


            .goodboy-card input[type="radio"]:checked + .goodboy-info {
                border: 3px solid #66bb6a;
                transform: scale(1.05);
                background-color: #24523f;
                box-shadow: 0 8px 20px rgba(0,0,0,0.5);
            }

    </style>
    <body>
        <div id="mainbody">
            <br><br><br>
            <div id="tajuk"><h1>Borang Undian</h1>

            <center><p>Sila pilih SATU calon Pengerusi Kadet Remaja Sekolah</p></center>



            </div>
            
            <!-- Papar senarai calon dari pangkalan data -->
             <?php 
                $query = "SELECT * FROM CALON ORDER BY nama_Calon ASC";
                $result = mysqli_query($conn, $query) or die ("Error: " . mysqli_error($conn));

                //Dapatkan jumlah rekod dalam jadual
                $jumlah = mysqli_num_rows($result);

                //Jika ada calon dlm Pd, paparkan borang undian
                if($jumlah > 0){
                    echo "<form action='proses_undi.php' method='post'>";
                    echo "<table border='1'>";
                    echo "<tr>";

                    foreach($result as $i => $row){
                        //Dapatkan gambar
                        $gmbr = "gambar/".$row['gambar'];
                        $id = $row['id_calon'];

                        //Paparkan maklumat calon
                        echo "<td>
                            <label class='goodboy-card'>
                                <input type='radio' name='calon' value='".$id."' required>
                                <div class='goodboy-info'>
                                    <img src='".$gmbr."' width='150' height='150'>
                                    <h1>".$row['nama_Calon']."</h1>
                                    <h2>".$row['id_calon']."</h2>
                                </div>
                            </label>
                        </td>";
                        //Hadkan data yang dipaparkan dlm satu baris
                        $i++;
                        $lajur = 3;
                        if($i != $jumlah && $i >= $lajur && $i % $lajur == 0){
                            echo "</tr><tr>";
                        }
                    }
                    echo "</tr></table>
                          <br><center><input type='submit' name='btnUndi' value='UNDI'></center></form>";
                }else{
                    echo "<center><h3>Tiada calon untuk dipaparkan</h3></center>";
                }
            ?>
                        
        </div>
        <?php
            include "footer.php";
        ?>
    </body>
</html>

<?php
    mysqli_close($conn);
?>
