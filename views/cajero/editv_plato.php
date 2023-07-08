<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">

    <style>

        .tbl_img{ /* efecto sombreado y borde imagen */
            border-radius: 10px;
            box-shadow: -28px 0px 43px -10px rgba(0,0,0,0.18);

        }
        .form-column {
            flex: 2; /* Cambiado a 2 para hacerlo más ancho */
            padding: 5px; 
        }
        
        .image-column {
            flex: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 300px;
            background-color: #ffffff;
            box-shadow: -28px 0px 43px -10px rgba(0,0,0,0.18);/* efecto sombreado y borde contenedor imagen */
            border-radius: 10px;

        
        }
        
        .form-container {
            margin: 0 10px; /* Ajusta los márgenes izquierdo y derecho según tus necesidades */
        }
        
        @media (max-width: 768px) {
            .columns {
                flex-direction: column;
            }
            
            .form-column,
            .image-column {
                flex: none;
                width: 100%;
            }
        }
        
    </style>
</head>
<?php
if (!isset($_POST["id_plato"])) {
    exit("No hay datos"); // Si no se ha enviado el parámetro "id_plato", muestra un mensaje y finaliza la ejecución del script
}

include_once "funciones.php"; // Incluye el archivo "funciones.php" que contiene las funciones necesarias

$productoedit = obtenerUnProducto($_POST["id_plato"]); // Llama a la función obtenerUnProducto() pasando el valor del parámetro "id_plato" para obtener los datos del producto correspondiente y guarda el resultado en la variable $productoedit
?>


<?php foreach ($productoedit as $productoe) { ?>

<body>
<div class="columns">
    <div class="form-column">
        <!-- Encabezado del formulario -->
        <h2 class="is-size-2 col-6 p-5 mx-auto">Editar producto</h2>
        
        <!-- Formulario de edición del producto -->
        <form action="editar_plato.php" method="post" enctype="multipart/form-data" class="col-10 p-0 mx-auto">
            <div class="field">
                <label for="nombre">Nombre:</label>
                <div class="control">
                    <!-- Campo de entrada para el nombre del producto -->
                    <input required id="nombre" class="input" type="text" name="nombre" value="<?php echo $productoe->nombre ?>">
                </div>

                </div>
                <div class="field">
                    <label for="descripcion">Descripción:</label>
                    <div class="control">
                        <!-- Campo de entrada para la descripción del producto -->
                        <textarea name="descripcion" class="textarea" id="descripcion" cols="10" rows="5" placeholder="Descripción" required><?php echo $productoe->descripcion ?></textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="nombre">Adición:</label>
                    <div class="control">
                        <!-- Campo de selección para las adiciones -->
                        <select required name="tipo" id="tipo">
                            <option disabled value="">Selecciona las adiciones</option>
                            <option value="1" <?php if ($productoe->tipo == "salsas") echo 'selected' ?>>Salsas</option>
                            <option value="2" <?php if ($productoe->tipo == "no-aplica") echo 'selected' ?>>No-Adiciones</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="precio">Precio:</label>
                    <div class="control">
                        <!-- Campo de entrada para el precio del producto -->
                        <input required id="precio" name="precio" class="input" type="number" value="<?php echo $productoe->precio ?>">
                    </div>
                </div>

                <div class="field">
                    <label for="imagen">Nueva Imagen:</label>
                    <div class="control">
                        <!-- Campo de entrada de tipo file para seleccionar una nueva imagen -->
                        <input type="file" name="imagen" id="imagen">
                    </div>
                </div>


                <div class="field">
                    <div class="control">
                        <!-- Campo oculto para enviar el ID del producto -->
                        <input type="hidden" name="id_plato" value="<?php echo $productoe->id ?>">
                        
                        <!-- Botón para actualizar el producto -->
                        <button class="btn btn-warning">Actualizar</button>
                        
                        <!-- Enlace para volver a la página de productos -->
                        <a href="productos.php" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="image-column">
            <div class="field">
                <label for="precio">Imagen:</label>
                <div class="control">
                    <!-- Mostrar la imagen del producto -->
                    <?php echo '<img class="tbl_img" src="data:' . $productoe->tipo . ';base64,' . base64_encode($productoe->img) . '"/>' ?>
                </div>
            </div>
        </div>

    </div>
<?php } ?>
</body>
<?php
include 'pie.php'
?>
