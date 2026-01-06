<?php
include "session.php";
?>

<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700&display=swap" rel="stylesheet">

    <title>D'Undi KRS</title>
    <style>
        body {
            margin: 0;
        }
        #navbar {
        position: fixed;
        top: 0; left: 0; right: 0;
        height: 60px;
        background: rgba(0,0,0,0.7);
        color: white;
        display: flex;
        align-items: center;
        padding: 0 20px;
        z-index: 1000;
        }
        #toggleBtn {
            background: transparent;
            border: none;
            color: white;
            font-size: 22px;
            cursor: pointer;
            margin-right: 15px;
        }

        #logo {
            font-style: bold, italic;
            font-size: 24px;
            font-family: 'Titillium Web', sans-serif;
            height: 100%; 
            display: flex;
            flex-shrink: 0;
            align-items: center; 

        }
        #nama {
            font-size: 18px;
            font-family: 'Titillium Web', sans-serif;            height: 100%;
            display: flex;
            margin-left: auto;
            padding-right: 20px;
            white-space: nowrap;        
            overflow: hidden;            
            text-overflow: ellipsis; 
            align-self: center;   
            display: flex;
            align-items: center; 
        }
    </style>
</head>  

<body>
    <div id="navbar">
        <button id="toggleBtn">☰</button>
        <div id="logo"><b>D'UNDI KRS</b></div>
        <div id="nama">Selamat Datang, <?php echo $_SESSION['nama']; ?></div>
    </div>
</body>
</html>

