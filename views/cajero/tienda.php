<?php include_once "head.php" ?>
<section class="col1">
    <?php
    include_once "funciones.php";
    $productos = obtenerProductos();
    ?>

    <?php foreach ($productos as $producto) { ?>
        <div class="card">
            <?php echo '<img class="card-img-top" src="data:' . $producto->tipo . ';base64,' . base64_encode($producto->img) . '"/>' ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $producto->nombre ?></h5>
                <p class="card-text">Extra:</p>
                <div class="control">
                    <form action="agregar_orden.php" method="post">
                        <?php if ($producto->tipo == "pizza") {
                            echo ("
                <select required name='extra' id='extra' class='select-css'>
                    <option value='Pequeña'>Pequeña</option>
                    <option value='Mediana'>Mediana</option>
                    <option value='Grande'>Grande</option>
                    <option value='Familiar'>Familiar</option>
                </select>
                ");
                        } else if ($producto->tipo == "alitas") {
                            echo ("
                    <select required name='extra' id='extra' class='select-css'>
                        <option value='Habanero'>Habanero</option>
                        <option value='BBQ'>BBQ</option>
                        <option value='Mayonesa'>Mayonesa</option>
                        <option value='Piña'>Piña</option>
                    </select>
                    ");
                        } else {
                            echo ("<p class='card-text'>No-aplica</p>");
                            echo ("<input type='hidden' class='text_body' name='extra' value='no-aplica'>");
                        } ?>
                </div>
                <input type="hidden" name="id_plato" value="<?php echo $producto->id ?>">
                <button class="btn btn-primary">
                    <span>$ <?php echo number_format($producto->precio, 2) //echo $producto->precio 
                            ?></span>
                </button>
                <!-- <a type="submit" class="btn btn-primary"><?php echo number_format($producto->precio, 2) ?></a> -->
                </form>
            </div>
        </div>
    <?php } ?>

    <!--  -->
    <!-- Ventana emergente -->
    <div class="modal fade" id="ordenes" tabindex="-1" aria-labelledby="ordenesLabel" aria-hidden="true" style="z-index: 9999;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordenesLabel">Ordenes:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p>Contenido de la Ventana Emergente</p>
                    <!--  -->
                    <?php
                    include_once "funciones.php";
                    $productos = obtenerProductosEnCarrito();
                    if (count($productos) <= 0) {
                    ?>
                        <section class="hero is-info">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title">
                                        Todavía no hay platos
                                    </h1>
                                    <h2 class="subtitle">
                                        Visita el menú para agregar productos
                                    </h2>
                                    <a href="tienda.php" class="button is-warning">Ver menú</a>
                                </div>
                            </div>
                        </section>
                    <?php } else { ?>
                        <div class="columns">
                            <div class="column">
                                <h2 class="is-size-2">Ordenes:</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Extras</th>
                                            <th>Precio</th>
                                            <th>Quitar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($productos as $producto) {
                                            $total += $producto->precio;
                                        ?>
                                            <tr>
                                                <td><?php echo $producto->nombre ?></td>
                                                <td><?php echo $producto->extras ?></td>
                                                <td>$<?php echo number_format($producto->precio, 2) ?></td>
                                                <td>
                                                    <form action="eliminar_orden.php" method="post">
                                                        <input type="hidden" name="id_orden" value="<?php echo $producto->id_orden ?>">
                                                        <input type="hidden" name="redireccionar_carrito">
                                                        <button class="button is-danger">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                                            <td colspan="2" class="is-size-4">
                                                $<?php echo number_format($total, 2) ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a href="terminar_compra.php" target="_blank" class="button is-success"><i class="fa fa-check"></i>&nbsp;Enviar Orden</a>
                            </div>
                        </div>
                    <?php } ?>
                    <!--  -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <?php
    include 'pie.php'
    ?>