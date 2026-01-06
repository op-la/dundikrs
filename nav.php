<html>
<head>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


        #menuTepi {
            position: fixed;
            top: 60px;            
            left: -200px;        
            width: 200px;
            height: calc(100% - 60px); 
            background: rgba(0,0,0,0.8);
            color: white;
            padding-top: 20px;
            transition: left 0.3s ease;
            z-index: 999;        
        }
        #menuTepi a {
            display: block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
        }
        #menuTepi a:hover {
            background-color: #575757;
            font-weight: bold;
        }
        #menuTepi.active {
            left: 0;
        }

        #toggleBtn {
            background: transparent;
            border: none;
            color: white;
            font-size: 22px;
            cursor: pointer;
            margin-right: 15px; 
        }


        #toggleBtn:hover {
            background: rgba(0,0,0,0.9);
        }


    </style>
</head>
<body>

    

   
    <div id="menuTepi">
        <?php
            if ($_SESSION['peranan'] == "admin"){
                echo '<a href="utama.php">Utama</a>';
                echo '<a href="calon.php">Calon</a>';
                echo '<a href="pengundi.php">Pengundi</a>';
                echo '<a href="keputusan.php">Keputusan</a>';
                echo '<a href="logout.php">Log Keluar</a>';
            } else {
                echo '<a href="utama.php">Utama</a>';
                echo '<a href="borang_undi.php">Undi</a>';
                echo '<a href="keputusan.php">Keputusan</a>';
                echo '<a href="logout.php">Log Keluar</a>';                    
            }
        ?>    
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const menuTepi = document.getElementById('menuTepi');

        toggleBtn.addEventListener('click', () => {
            menuTepi.classList.toggle('active');
        });
    </script>

</body>
</html>
