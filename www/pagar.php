<?php
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insertar-videojuego.css">
    <title>Change your Games</title>
    <link rel="icon" href="https://icon-library.com/images/neon-icon-png/neon-icon-png-29.jpg">
    <script src="https://kit.fontawesome.com/913708e9b9.js" crossorigin="anonymous"></script>
    <!-- Google Fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="logo-container">
            <div class="logo-tittle"><i class="fas fa-dice-d20"></i>GamingBox</div>
            <div class="logo-items">
                <i class="fab fa-playstation"></i>
                <i class="fab fa-xbox"></i>
                <i class="fab fa-steam"></i>
                <i class="fas fa-grip-lines-vertical"></i>
            </div>
        </div>
    </header>
    <div>
        <nav>
            <ul class="nav-items-container">
                <li class="nav-item"><div><a href="index.php">Inicio</a></div></li>
                <li class="nav-item"><div>Productos<i class="fas fa-angle-down"></i></div>
                    <ul class="submenu">
                        <li>
                            <a href="index.php#seccion-ps">PlayStation</a>
                        </li>
                        <li>
                            <a href="index.php#seccion-xbox">Xbox</a>
                        </li>
                        <li>
                            <a href="index.php#seccion-acc">Accesorios y Coleccionables</a>
                        </li>
                    </ul>
                </li>     
                <li class="nav-item"><div><a href="contacto.php">Contacto</a></div></li>
                <li class="nav-item"><div><a href="ubicacion.php">Donde Econtrarnos</a></div></li>
            </ul>
        </nav>
    </div>
    <article>
        <section>
            <h1>Agregar Información de Pago</h1>
            <p>
                Agrega los datos de pago
            </p>
        </section>
        <section class="form-container">
            <form method="POST" action="compra-finalizada.php"> 
                <label for="name">Nombre:</label>
                <input type="text" name="name" required>

                <label for="tarjeta">Tarjeta:</label>
                <input type="number" name="tarjeta" required>

                <label for="mes">Mes:</label>
                <input type="number" name="mes" required>

                <label for="año">Año:</label>
                <input type="number" name="año" required>

                <label for="cvc">CVC:</label>
                <input type="number" name="cvc" required>

                <input type="submit"  name="save_item" value="Comprar">
            </form>
            <div>
                <img src="https://cdn.wallpapersafari.com/63/24/LihKu3.jpg" alt="">
            </div>
        </section>

        <?php
            //traspasamos a variables locales, para evitar complicaciones con las comillas:
            if (isset($_REQUEST['save_item'])){
                $name = $_REQUEST["name"];
                $tarjeta = $_REQUEST["tarjeta"];
                $mes = $_REQUEST["mes"];
                $año = $_REQUEST["año"];
                $cvc = $_REQUEST["cvc"];

                //Preparamos la orden SQL
                $consulta = "INSERT INTO TARJETAS
                (nombre,mes,año,tarjeta,cvc,created_at) VALUES ('$name','$mes','$año','$tarjeta','$cvc',current_timestamp())";

                if(mysqli_query($bd_connection, $consulta)){
                    echo "<h3>Se ha agregado el producto de manera exitosa.</h3>"; 
                } else{
                    echo "ERROR: Hush! Sorry $consulta. " 
                        . mysqli_error($bd_connection);
                }
                header("location:insertar-videojuego.php");
            }
            // Close connection
            mysqli_close($bd_connection);
        ?>

        <div class="grid-footer" id="a">
                <h5>¡Gracias por comprar en Gaming Box!</h5>
                <p>Copyright © 2022 Gaming Box. All rights reserved.</p>
                <p>This webpage was created by Gaming Box</p>
            </div>
    </article>
</body>
</html>

