<html>
    <title>Daftar Akaun Baharu - D'Undi KRS</title>
    <link href="gambar/logo.png" rel="icon">
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
            #tajuk{
                font-family: 'Titillium Web', sans-serif;
                font-size: 19px;
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

            #tajuk p{
                font-size: 30px;

                text-shadow: 0 0 10px #0ff,
                0 0 20px #0ff,
                0 0 40px #0ff;
                color: #e0f2f1ff;
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
            td:nth-child(2){
                text-align: center;
            }
            tr{
                height: 30px;
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

            input[type="button"]{
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
            input[type="button"]:hover{
                background-color: #4caf50;
               transform: scale(1.05);
            }
    </style>
    <body>
        <div id="mainbody">
            <form action="proses_daftar.php" method="POST">
                <div style="text-align:left;">
                    <a href="index.php"><img src="gambar/back.jpg" alt="Kembali" width="120" height="30" title="Kembali"></a>
                </div>
                <div id="tajuk">
                    <img src="gambar/logo.png" alt="logo" width="250" height="250">
                    <p>Daftar akaun baharu</p>
                </div>

                <center>
                    <table cellpadding='5px'>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text" name="no" placeholder="No. Ahli" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text" name="nama" placeholder="Nama Ahli" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="password" name="pass" placeholder="Kata Laluan" required pattern=".{5,8}" title="5-8 aksara sahaja"></td>
                            <!-- pattern untuk hadkan aksara antara 5 hingga 8 sahaja -->
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="button" name="btn" value="Daftar"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td> 
                            <td></td>
                        </tr>
                    </table>
                </center>
            </form>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>
