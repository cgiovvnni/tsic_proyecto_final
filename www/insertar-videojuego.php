<?php
$bd_connection = mysqli_connect(
  'mysql',
  'giovanni',
  'admin',
  'gamingbox'
) or die(mysqli_erro($mysqli));
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
            <h1>Agregar Producto</h1>
            <p>
                Agrega los datos del producto.
            </p>
        </section>
        <section class="form-container">
            <form action="">
                <label for="name">Nombre:</label>
                <input type="text" name="name" required>

                <label for="price">Precio:</label>
                <input type="number" name="price" required>

                <label for="inventory">Cantidad:</label>
                <input type="number" name="inventory" required>

                <label for="category">Categoría:</label>
                <input type="text" name="category" required>

                <label for="image">Imagen del producto:</label>
                <input type="text" name="image" required>

                <input type="submit"  name="save_item" value="Agregar">
            </form>
            <div>
                <img src="https://cdn.wallpapersafari.com/63/24/LihKu3.jpg" alt="">
            </div>
        </section>

        <?php
            //traspasamos a variables locales, para evitar complicaciones con las comillas:
            if (isset($_REQUEST['save_item'])){
                $name = $_REQUEST["name"];
                $price = $_REQUEST["price"];
                $inventory = $_REQUEST["inventory"];
                $category = $_REQUEST["category"];
                $image = $_REQUEST["image"];

                //Preparamos la orden SQL
                $consulta = "INSERT INTO videojuegos
                (nombre,precio,inventario,categoria,imagen,created_at) VALUES ('$name','$price','$inventory','$category','$image',current_timestamp())";

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

