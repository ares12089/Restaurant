<?php include_once "headadmin.php" ?>
<?php
include_once "funciones.php";
$productos = obtenerProductos();
?>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

<div class="columns">
    <div class="column">
        <div class="ms-4">
            <h2 class="is-size-2">Platos existentes:</h2>
            <!-- Botón para abrir la ventana emergente -->
            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#agregarPlato">
                Nuevo&nbsp;<i class="fa fa-plus"></i>
            </button>
        </div>
        <!-- Ventana emergente add -->
        <div class="modal fade" id="agregarPlato" tabindex="-1" aria-labelledby="agregarPlatoLabel" aria-hidden="true" style="z-index: 9999;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarPlatoLabel">Agregar Plato:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido -->
                        <h2 class="is-size-2">Nuevo producto</h2>
                        <form action="guardar_platos.php" method="post" enctype="multipart/form-data">
                            <div class="field">
                                <label for="nombre">Nombre</label>
                                <div class="control">
                                    <input required id="nombre" class="input" type="text" placeholder="Nombre" name="nombre">
                                </div>
                            </div>
                            <div class="field">
                                <label for="descripcion">Descripción</label>
                                <div class="control">
                                    <textarea name="descripcion" class="textarea" id="descripcion" cols="10" rows="5" placeholder="Descripción" required></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label for="nombre">Adicion:</label>
                                <div class="control">
                                    <select required name="tipo" id="tipo">
                                        <option value="1">Salsas</option>
                                        <option value="2">no-adicion</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label for="precio">Precio</label>
                                <div class="control">
                                    <input required id="precio" name="precio" class="input" type="number" placeholder="Precio">
                                </div>
                            </div>
                            <!-- img -->
                            <div class="field">
                                <label for="precio">Imagen</label>
                                <div class="control">
                                    <input type="file" name="imagen" id="imagen" required>
                                </div>
                            </div>
                            <!-- img -->
                            <!-- Contenido -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button class="button is-success">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

      

        <style>
            #tablepr {
                background-color: #ffffff;
                border-collapse: collapse;
                box-shadow: 0px 5px 10px -5px #333333;
                font-size: 16px;
                width: 70vw;
            }

            #tablepr th,
            #tablepr td {
                border: none;
            }

            #tablepr th {
                background-color: #ffffff;
                color: #000000;
                padding: 10px;
            }

            #tablepr td {
                padding: 10px;
            }

            #tablepr tr:nth-child(odd) {
                background-color: #f8f9fa;
            }

            #tablepr tr:hover {
                background-color: #e9ecef;
            }

            .tbl_img {
                width: 40px;
                height: 40px;
                border-radius: 100%;
                object-fit: cover;
            }
        </style>

        <div class="container-fluid row">
            <div class="col-10 p-5" style="margin: center;">

                <table id="tablepr" class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">IMG</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Extras</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) { ?>
                            <tr>
                                <td><?php echo $producto->nombre ?></td>
                                <td>
                                    <a href="data:<?php echo $producto->tipo ?>;base64,<?php echo base64_encode($producto->img) ?>" data-lightbox="product-gallery" data-title="<?php echo $producto->nombre ?>">
                                        <?php echo '<img class="tbl_img" src="data:' . $producto->tipo . ';base64,' . base64_encode($producto->img) . '"/>' ?>
                                    </a>
                                </td>
                                <td><?php echo $producto->descripcion ?></td>
                                <td><?php echo $producto->tipo ?></td>
                                <td>$<?php echo number_format($producto->precio, 2) ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">

                                        <form action="editv_plato.php" method="post">
                                            <input type="hidden" name="id_plato" value="<?php echo $producto->id ?>">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pencil-square"></i>
                                            </button>
                                        </form>

                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>
                                </td>
                                <!-- confirmacion eliminacion -->
                                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmModalLabel">Confirmar eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <center>
                                                <div class="modal-body">
                                                    <h3><i class="fa-solid fa-circle-exclamation fa-shake fa-xl" style="color: #d31d1d;"></i></h3>
                                                    <p>¿Estás seguro de que deseas eliminar este elemento?</p>
                                                </div>
                                            </center>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="eliminar_plato.php" method="post">
                                                    <input type="hidden" name="id_plato" value="<?php echo $producto->id ?>">
                                                    <button class="btn btn-danger m-2">Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- confirmacion eliminacion -->
                            <?php } ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<?php include 'pie.php' ?>