<html>

    <title>Log Masuk Admin - D'Undi KRS</title>
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
             <form id="adminLoginForm" method="POST">
                <div style="text-align: left;">
                    <a href="index.php"><img src="gambar/back.jpg" width="30" height="30" alt="Icon Kembali" title="Kembali"></a>
                </div>
                <div id="tajuk">
                    <img src="gambar/logo.png" width="150" height="150" alt="Logo D'Undi KRS">
                    <h1>Selamat Datang ke D'Undi KRS</h1>
                    <p>Log Masuk Sebagai Admin</p>
                </div>
                <center>
                    <table cellpadding='5px'>
                        <tr>
                            <td style="width:20px"></td>
                            <td></td>
                            <td style="width:20px"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text" name="logid" placeholder="Login ID" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="password" name="passA" placeholder="Kata Laluan" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="button" id="btnLog1" value="Log Masuk Admin"></td>
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

        <div id="loader" style="display:none;">
            <svg viewBox="25 25 50 50">
                <circle r="20" cy="50" cx="50"></circle>
            </svg>
        </div>

       <script>
            // 1. Change the targeted element ID to btnLog1 (Admin Button)
            document.getElementById('btnLog1').addEventListener('click', function(e) {
                
                const form = this.closest('form');
                
                const logid = form.querySelector('input[name="logid"]').value; // Renamed for clarity
                const passA = form.querySelector('input[name="passA"]').value;
                
                if(!logid || !passA) {
                    // 2. Update validation message
                    alert("Sila isi Login ID dan Kata Laluan."); 
                    return;
                }

                // Papar loader
                document.getElementById('loader').style.display = 'flex';

                const formData = new FormData(form);
                
                // 3. CRITICAL: Append the Admin button key (btnLog1)
                formData.append('btnLog1', 'true'); 

                // 4. Ensure your PHP file name is correct here (using 'login.php' as suggested earlier)
                fetch('proses_login.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.indexOf("application/json") !== -1) {
                        return response.json();
                    } else {
                        throw new Error("Dapat balasan bukan JSON dari server.");
                    }
                }) 
                .then(data => {
                    if (data.success) {
                        
                        alert("Login Berjaya");
                        // Redirect 
                        window.location.href = data.redirect; 
                    } else {
                        alert(data.message);
                        // Hide loader jika gagal
                        document.getElementById('loader').style.display = 'none';
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Server error: Could not process request.');
                    document.getElementById('loader').style.display = 'none';
                });
            });
        </script>

        <?php include 'footer.php'; ?>
    </body>
</html>   
