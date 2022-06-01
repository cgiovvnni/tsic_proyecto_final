<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Gaming Box </title>
    <!-- favicon -->
    <link rel="icon" href="https://yt3.ggpht.com/a/AGF-l78km1YyNXmF0r3-0CycCA0HLA_i6zYn_8NZEg=s900-c-k-c0xffffffff-no-rj-mo" type="image/gif" sizes="16x16">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="compra-finalizada.css">
</head>
<body>  
    <div id="orderContainer">
        <div id="check"><i class="fas fa-check-circle"></i></div>
        
        <div id="aboutCheck">
            <h1> Compra Realizada! </h1>
            <p> Gracias por comprar en GamingBox </p>
        </div>
    </div>
</body>
<script src="/orderPlaced.js"></script>
</html>

<?php
    $url ="http://localhost/GamingBox/index.php";
    $tiempo_espera = 5; 
    header("refresh: $tiempo_espera; url=$url");

?>