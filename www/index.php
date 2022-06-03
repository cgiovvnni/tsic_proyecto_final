<?php
include("db.php");

if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"product_id");
        if (!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_precio' => $_POST["hidden_precio"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="index.php"</script>';
            // Actualizar el inventario
            $update = "UPDATE table SET inventario = inventario - '$inventario' WHERE id = '$id'";
            $result=mysqli_query($bd_connection, $update);
        }else{
            echo '<script>alert("Producto existente en el carrito")</script>';
            echo '<script>window.location="index.php"</script>';
        }
    }else{
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_precio' => $_POST["hidden_precio"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["product_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Producto eliminado!")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="https://icon-library.com/images/neon-icon-png/neon-icon-png-29.jpg">
    <script src="https://kit.fontawesome.com/913708e9b9.js" crossorigin="anonymous"></script>
    <title>GamingBox</title>
    <!-- Google Fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

</head>
<body>
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
                            <a href="#seccion-ps">PlayStation</a>
                        </li>
                        <li>
                            <a href="#seccion-xbox">Xbox</a>
                        </li>
                        <li>
                            <a href="#seccion-acc">Accesorios y Coleccionables</a>
                        </li>
                    </ul>
                </li>     
                <li class="nav-item"><div><a href="contacto.php">Contacto</a></div></li>
                <li class="nav-item"><div><a href="ubicacion.php">Donde Econtrarnos</a></div></li>
                <li class="nav-item"><div><a href="reporte.php">Generar Reporte</a></div></li>
            </ul>
        </nav>
    </div>
    <article>
        <div class="grid-container">
            <div class="grid-main">
                <div class="swiper-part">
                    <h2 class="swiper-tittle">Novedades</h2>
                    <p class="swiper-paragraph">
                        No te pierdas de las últimas novedades del momento.
                    </p>
                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://static1.abc.es/media/tecnologia/2020/12/18/cyberpunk-kcrB--620x349@abc.jpg" alt="">
                                <div class="game-description">
                                    <p class="game-description-text">
                                        Cyberpunk 2077.<br>
                                        <a>Precio :</a><b> $800 MXN</b>
                                    </p>  
                                    <!-- <button class="Comprar Ahora" tabindex="-1">Buy now</button> --> 
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://www.abyx.es/wp-content/uploads/2020/08/portada_Ghost-of-Tsushima.jpg" alt="">
                                <div class="game-description">
                                    <p class="game-description-text">
                                        Ghost of Tsushima.<br>
                                        <a>Precio :</a><b> $1200 MXN</b>
                                    </p>  
                                    <!-- <button class="buy-now" tabindex="-1">Buy now</button> --> 
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://www.residentevil.com/village/assets/images/common/share.png" alt="">
                                <div class="game-description">
                                    <p class="game-description-text">
                                        Resident Evil: Village.<br>
                                        <a>Precio :</a><b> $1000 MXN</b>
                                    </p>  
                                    <!-- <button class="buy-now" tabindex="-1">Buy now</button> -->  
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://media.contentapi.ea.com/content/dam/ea/madden-nfl/madden-nfl-22/global-assets/common/m22-featuredimage.jpg.adapt.crop191x100.1200w.jpg" alt="">
                                <div class="game-description">
                                    <p class="game-description-text">
                                        Madden: 22.<br>
                                        <a>Precio :</a><b> $999 MXN</b>
                                    </p>  
                                    <!-- <button class="buy-now" tabindex="-1">Buy now</button> -->  
                                </div>
                            </div>
                            <!-- <div class="swiper-slide">Slide 6</div> -->   
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
        
        <a name="seccion-carrito"></a> 
        <h1> Carrito de Compras </h1>
        <div id="box">
            <table>
            <tr>
                <th width="10%">Nombre</th>
                <th width="10%">Cantidad</th>
                <th width="13%">Precio</th>
                <th width="10%">Precio Total</th>
                <th width="10%">Remover producto</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; 
								$name = $value["item_name"];
							?></td> 
                            <td><?php echo $value["item_quantity"]; 
								$cantidad = $value["item_quantity"];
							?></td>
                            <td><?php echo $value["product_precio"]; 
								$precio = $value["product_precio"];
							?></td>
                            <td><?php echo number_format($value["item_quantity"] * $value["product_precio"], 2); ?></td>
                            <td><a href="index.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remover producto</span></a></td>
                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_precio"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }

					$query = "INSERT INTO ventas (id_videojuego,nombre,cantidad,precio,created_at) VALUES (1,'$name','$cantidad','$precio',current_timestamp())";
					
					if(mysqli_query($bd_connection, $query)){
                    echo "<h3>Se ha agregado el producto de manera exitosa.</h3>"; 
						} else{
                    echo "ERROR: Hush! Sorry $query. " 
                        . mysqli_error($bd_connection);
						}
                ?>
            </table>

            <button onclick="window.location.href='pagar.php'">Comprar</button>


            
        </div>
                <!-- PlayStation Section --> 
                <a name="seccion-ps"></a> 
                <h1> Lo mejor de PlayStation! </h1>
                <div id="containerItems">
                    <?php $query = "SELECT * FROM videojuegos WHERE categoria = 'ps5'";
                    $result = mysqli_query($bd_connection, $query);
                    while($row = mysqli_fetch_array($result)){  ?>

                        <div id="box">

                                <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">

                                    <div id = "box">
                                        <img src= "<?php echo $row['imagen'] ?>" >
                                        <h3>  <?php echo $row['nombre'] ?>          </h3>
                                        <h4>  Inventario: <?php echo $row['inventario'] ?>  </h4>
                                        <h3>  Precio: <?php echo $row['precio'] ?>  </h3>
                                        <input type="text" name="quantity" class="form-control" value="1">
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["nombre"]; ?>">
                                        <input type="hidden" name="hidden_precio" value="<?php echo $row["precio"]; ?>">
                                        <input type="submit" name="add" class="btn btn-success"
                                               value="Agregar al carrito">
                                    </div>
                                </form>
                            </div>

                    <?php }?>
                </div>

                <!-- Xbox Section --> 
                <a name="seccion-xbox"></a> 
                <h1> Lo mejor de Xbox! </h1>
                <div id="containerItems">
                    <?php $query = "SELECT * FROM videojuegos WHERE categoria = 'xbox'";
                    $result = mysqli_query($bd_connection, $query);
                    while($row = mysqli_fetch_array($result)){  ?>

                        <div id="box">

                                <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">

                                    <div id = "box">
                                        <img src= "<?php echo $row['imagen'] ?>" >
                                        <h3>  <?php echo $row['nombre'] ?>          </h3>
                                        <h4>  Inventario: <?php echo $row['inventario'] ?>  </h4>
                                        <h3>  Precio: <?php echo $row['precio'] ?>  </h3>
                                        <input type="text" name="quantity" class="form-control" value="1">
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["nombre"]; ?>">
                                        <input type="hidden" name="hidden_precio" value="<?php echo $row["precio"]; ?>">
                                        <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                               value="Agregar al carrito">
                                    </div>
                                </form>
                            </div>

                    <?php }?>
                </div>

                <!-- Accesorios y Collecionables Section --> 
                <a name="seccion-acc"></a> 
                <h1> Accesorios, tarjetas de regalo y colecionables! </h1>
                <div id="containerItems">
                    <?php $query = "SELECT * FROM videojuegos WHERE categoria = 'accesorios'";
                    $result = mysqli_query($bd_connection, $query);
                    while($row = mysqli_fetch_array($result)){  ?>
                    
                        <div id="box">

                                <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">

                                    <div id = "box">
                                        <img src= "<?php echo $row['imagen'] ?>" >
                                        <h3>  <?php echo $row['nombre'] ?>          </h3>
                                        <h4>  Inventario: <?php echo $row['inventario'] ?>  </h4>
                                        <h3>  Precio: <?php echo $row['precio'] ?>  </h3>
                                        <input type="text" name="quantity" class="form-control" value="1">
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["nombre"]; ?>">
                                        <input type="hidden" name="hidden_precio" value="<?php echo $row["precio"]; ?>">
                                        <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                               value="Agregar al carrito">
                                    </div>
                                </form>
                            </div>

                    <?php }?>
                </div>
                
            </div>
        
            <div class="grid-aside">
                <div class="information-part">
                    <h3>Sobre Nosotros</h3>
                        <div class="first info-section">
                            <h4>¿Quiénes Somos? <i class="fas fa-sort-down"></i></h4>
                            <p>GamingBox es una empresa 100% mexicana dedicada a la venta de videojuegos, consolas, accesorios y productos coleccionables.
                            </p>
                        </div>
                        <div class="second info-section">
                            <h4>Misión <i class="fas fa-sort-down"></i></h4>
                            <p>Satisfacer las necesidades de nuestros clientes en lo que respecta a videojuegos físicos y digitales, proporcionándoles la mayor confianza, seguridad, comodidad y facilidad en compras por internet, ofreciéndo los mejores títulos a precios justos y el envío al menor tiempo posible.
                            </p>
                        </div>
                        <div class="third info-section">
                            <h4>Visión <i class="fas fa-sort-down"></i></h4>
                            <p>Servir cada vez a un mayor número de clientes, al ofrecer la mejor experiencia de compra, derivado de una constante innovación viéndonos a futuro como una empresa reconocida.
                            </p>
                        </div>
                        <div class="fourth info-section">
                            <h4>Valores <i class="fas fa-sort-down"></i></h4>
                            <p>Accesibilidad, medio ambiente, inclusión y diversidad.
                            </p>
                        </div>
                </div>
                <div class="filling-part">
                    <div class="img-container">
                        <img src="https://cdn-products.eneba.com/resized-products/0IBzh6SnVR-aqFFcp1bKfg5B8zpECweF0yc5cf6s8kw_350x200_1x-0.jpeg" alt="">
                    </div>
                    <div class="img-container">
                        <img src="https://www.dsogaming.com/wp-content/uploads/2021/08/Call-of-Duty-Vanguard-feature.jpg" alt="">
                    </div>
                    <div class="img-container">
                        <img src="https://as01.epimg.net/meristation/imagenes/2020/04/16/cover/585416471587067415.jpg" alt="">
                    </div>
                    <div class="img-container">
                        <img src="https://i.pinimg.com/236x/40/1b/61/401b61f9949d460e2bb93ac607ae2bfc.jpg" alt="">
                    </div>
                    <div class="img-container">
                        <img src="https://as01.epimg.net/meristation/imagenes/2014/12/10/noticia/1418205540_400472_1532528006_miniatura_normal.jpg" alt="">
                    </div>
                    <div class="img-container">
                        <img src="https://picfiles.alphacoders.com/199/thumb-199320.jpg" alt="">
                    </div>
                    <div class="img-container">
                        <img src="https://images6.alphacoders.com/115/thumb-350-1157073.png" alt="">
                    </div>
                </div>
            </div>
            <div class="grid-footer" id="a">
                <h5>¡Gracias por comprar en Gaming Box!</h5>
                <p>Copyright © 2022 Gaming Box. All rights reserved.</p>
                <p>This webpage was created by Gaming Box</p>
            </div>
        
    </article>    
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
