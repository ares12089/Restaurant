
<?php

if (!isset($_POST["id_plato"])) {
    exit("No hay datos");
}

include_once "funciones.php";
$productoedit = obtenerUnProducto($_POST["id_plato"]);
?>

<?php foreach ($productoedit as $productoe) { ?>

    <!-- Contenido -->
    <!-- <div class="column is-one-third"> -->
    <div class="columns">
        <div class="column">
            <h2 class="is-size-2 col-4 p-5 mx-auto">Editar producto</h2>
            <form action="editar_plato.php" method="post" enctype="multipart/form-data" class="col-4 p-5 mx-auto">
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
                <!-- img -->
                <div class="field">
                    <label for="precio">Imagen:</label>
                    <div class="control">
                        <?php echo '<img class="tbl_img" src="data:' . $productoe->tipo . ';base64,' . base64_encode($productoe->img) . '"/>' ?>
                    </div>
                </div>
                <!-- nueva v - antigua ^ -->
                <div class="field">
                    <label for="precio">Nueva Imagen:</label>
                    <div class="control">
                        <input type="file" name="imagen" id="imagen">
                    </div>
                </div>
                <!-- img -->
                <div class="field">
                    <div class="control">
                        <input type="hidden" name="id_plato" value="<?php echo $productoe->id ?>">
                        <button class="btn btn-primary">Actualizar</button>
                        <a href="productos.php" class="btn btn-warning">Volver</a>
                    </div>
                </div>
            </form>
            <!-- </div> -->
            <!-- </div> -->
            <!-- Contenido -->
        </div>
    </div>
<?php }
include 'pie.php'
?>