<?php include_once "head.php" ?>

<section class="col1">
    <?php
    include_once "funciones.php";
    $productos = obtenerProductos();
    ?>

    <style>
.fixed-card img.card-img-top {
    width: 200px; 
    height: 200px; 
    object-fit: cover; 
    align-items: center;
}
</style>

    <?php foreach ($productos as $producto) { ?>
        <div class="card m-4 p-3 fixed-card">
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
                    <span>$ <?php echo number_format($producto->precio, 2)
                            ?></span>
                </button>
                </form>
            </div>
        </div>
    <?php } ?>

    <!--  -->
    <!-- Ventana emergente -->
    <div class="modal fade" id="ordenes" tabindex="-1" aria-labelledby="ordenesLabel" aria-hidden="true" style="z-index: 2000;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordenesLabel">Ordenes:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <!-- <div class="modal-body"> -->
                <!--  -->
                <?php
                include_once "funciones.php";
                $productos = obtenerProductosEnCarrito();
                if (count($productos) <= 0) {
                ?>
                    <div class="modal-body">
                        <section class="hero is-info">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title">
                                        Todavía no hay platos
                                    </h1>
                                    <h2 class="subtitle">
                                        Visita el menú para agregar productos
                                    </h2>
                                </div>
                            </div>
                        </section>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        <?php } else { ?>
            <div class="modal-body">
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
                                                <button class="btn btn-danger">
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
                        <!-- <a href="terminar_compra.php" target="_blank" ><button class="btn btn-outline-primary m-2" onclick="reloadPage()">Enviar Orden</button></a> -->
                        <!-- <a href="generar_cod.php" target="_blank" class="btn btn-outline-primary m-2" onclick="reloadPage()"><i class="fa fa-check"></i>&nbsp;Enviar Orden</a> -->
                        <!-- Reload Pag -->
                        <script>
                            function reloadPage() {
                                // window.location.reload();
                                location.reload();
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="generar_cod.php" target="_blank" class="btn btn-outline-primary m-2" onclick="reloadPage()"><i class="fa fa-check"></i>&nbsp;Enviar Orden</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        <?php } ?>
        <!--  -->
        <!-- </div> -->
        <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div> -->
        </div>
    </div>
    </div>
    <!-- ventana emerjente -->

    <?php
    include 'pie.php'
    ?>