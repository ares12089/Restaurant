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
    exit("No hay datos");
}

include_once "funciones.php";
$productoedit = obtenerUnProducto($_POST["id_plato"]);
?>

<?php foreach ($productoedit as $productoe) { ?>

<body>
    <div class="columns">
        <div class="form-column">
            <h2 class="is-size-2 col-6 p-5 mx-auto">Editar producto</h2>
            <form action="editar_plato.php" method="post" enctype="multipart/form-data" class="col-10 p-0 mx-auto">
                <div class="field">
                    <label for="nombre">Nombre:</label>
                    <div class="control">
                        <input required id="nombre" class="input" type="text" name="nombre" value="<?php echo $productoe->nombre ?>">
                    </div>
                </div>
                <div class="field">
                    <label for="descripcion">Descripción:</label>
                    <div class="control">
                        <textarea name="descripcion" class="textarea" id="descripcion" cols="10" rows="5" placeholder="Descripción" required><?php echo $productoe->descripcion ?></textarea>
                    </div>
                </div>
                <div class="field">
                    <label for="nombre">Tipo:</label>
                    <div class="control">
                        <select required name="tipo" id="tipo">
                            <option disabled value="">Selecciona un tipo</option>
                            <option value="1" <?php if ($productoe->tipo == "burguer") echo 'selected' ?>>Hamburguesas</option>
                            <option value="2" <?php if ($productoe->tipo == "pizza") echo 'selected' ?>>Pizzas</option>
                            <option value="3" <?php if ($productoe->tipo == "alitas") echo 'selected' ?>>Alitas</option>
                            <option value="4" <?php if ($productoe->tipo == "bebidas") echo 'selected' ?>>Bebidas</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="precio">Precio:</label>
                    <div class="control">
                        <input required id="precio" name="precio" class="input" type="number" value="<?php echo $productoe->precio ?>">
                    </div>
                </div>
                <div class="field">
                    <label for="imagen">Nueva Imagen:</label>
                    <div class="control">
                        <input type="file" name="imagen" id="imagen">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="hidden" name="id_plato" value="<?php echo $productoe->id ?>">
                        <button class="btn btn-primary">Actualizar</button>
                        <a href="productos.php" class="btn btn-warning">Volver</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="image-column">
            <div class="field">
                <label for="precio">Imagen:</label>
                <div class="control">
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
