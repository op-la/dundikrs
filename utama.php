<?php
include "header.php";
include "nav.php";
?>

<html>
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
        table {
            width: 300px;
            border-collapse: collapse;
            background-color: #4cc0f5;
            border: 2px solid #000000;
        }
        td:nth-child(2){
            text-align: center;

        }
        tr{
            height: 20px;
        }
        input[type=submit]{
            background-color: #388e3c;
            color: #ffffff;
            padding: 16px 32px;
            font-size: 20px;
            border: none;
            border-radius: 25px;
            margin-top: 30px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        input[type=submit]:hover{
        background-color: #4caf50;
        box-shadow: 0 6px 15px rgba(0,0,0,0.4);
        transform: scale(1.05);
        transform: translateY(-2px);
        }


    </style>

    <body>
        <div id="mainbody">
            <form action="borang_undi.php" method="POST">
                <div id ="tajuk">
                    <br><br>
                    <img src="gambar/logo.png" alt="logo" width="300" height="300">
                    <p>Sistem Undian
                        <br>Pengerusi Kadet Remaja Sekolah
                    </p>

                <!-- Jika pengundi yang login, papar butang undi -->
                <?php
                    if ($_SESSION['peranan'] == "ahli"){
                        echo '<br><input type="submit" name="btn" value="Undi Sekarang">';
                    } else {
                        echo '<br><p>Selamat Datang Admin</p>';
                    }
                ?>    

                </div>
            </form>
        </div>

      

    </body>
      <?php
        include "footer.php";
         ?>
</html>