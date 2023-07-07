<!DOCTYPE html>
<html lang="es">
<?php include_once './headchef.php' ?>

    <style>
        body {
            margin: 0;
            padding: 0;

        }

        .contlf {
            display: grid;
            grid-template-columns: 1fr 1fr;
            height: 100vh;
        }

        .left {
            overflow-y: scroll;
            margin: 0;
            padding: 0;
            background-color: #cbdbb8;
        }

        .left::-webkit-scrollbar {
            -webkit-appearance: none;
        }

        .left::-webkit-scrollbar:vertical {
            width: 10px;
        }

        .left::-webkit-scrollbar-button:increment,
        .left::-webkit-scrollbar-button {
            display: none;
        }

        .left::-webkit-scrollbar:horizontal {
            height: 10px;
        }

        .left::-webkit-scrollbar-thumb {
            background-color: grey;
            border-radius: 20px;
            border: 2px solid #f1f2f3;
        }

        .left::-webkit-scrollbar-track {
            border-radius: 10px;
        }

        .right {
            background-color: #cbdbb8;
        }

        .card-text {
            text-align: left;
        }
    </style>

<body class="bod">
    <div class="contlf">
        <div class="left">

            <div class="card-columns">
                <div class="myespacio">
                    <?php
                    //prueba 2
                    include_once "../../controller/funciones.php";
                    $ordenes = obtenerTikets();

                    $grupos = []; // Array para almacenar los grupos de registros

                    // Agrupar los registros por número de tiket
                    foreach ($ordenes as $orden) {
                        $numTiket = $orden->num_tiket;
                        if (!isset($grupos[$numTiket])) {
                            $grupos[$numTiket] = []; // Inicializar el grupo si no existe
                        }
                        $grupos[$numTiket][] = $orden; // Agregar la orden al grupo correspondiente
                    }

                    // Construir la vista HTML con los datos actualizados
                    $html = '';
                    if (!empty($grupos)) {

                        foreach ($grupos as $numTiket => $grupo) {
                            $primerRegistro = true; // Bandera para controlar el encabezado

                            foreach ($grupo as $orden) {
                                // Mostrar el encabezado solo en la primera iteración
                                if ($primerRegistro) {
                                    $html .= '<div class="card border-primary ms-5 me-5 mt-4">';
                                    $html .= '<div class="card-body">';
                                    $html .= '<h4 class="card-title text-center">Tiket #' . $orden->num_tiket . '- Hora:' . date("g:i A", strtotime($orden->hora)) . '</h4>';
                                    // $html .= '<p class="card-text"></p>';

                                    $primerRegistro = false;
                                }
                            }
                            $html .= '</div>';
                            $html .= '</div>';
                        }

                        
                    } else {
                        //si no hay datos que mostrar
                        $html .= '<style>
                        .left{
                        background-image: url(../../img/burger-skate.gif);
                        background-position: center; 
                        }
                        </style>';
                    }

                    // Devolver el HTML como respuesta
                    echo $html;

                    ?>
                </div>
            </div>
        </div>
        <div class="right">
            <ul class="list-group">
                <?php
                $html = '';
                if (!empty($ordenes)) {
                    $primerOrden = $ordenes[0]; // Obtener el primer elemento del array de órdenes

                    $html .= '<div class="card border-primary m-2">';
                    $html .= '<div class="card-body">';
                    $html .= '<h4 class="card-title">Tiket #' . $primerOrden->num_tiket . '- Hora:' . date("g:i A", strtotime($primerOrden->hora)) . '</h4>';
                    $html .= '<hr>';

                    // Mostrar otros elementos con el mismo num_tiket
                    foreach ($ordenes as $orden) {
                        if ($orden->num_tiket == $primerOrden->num_tiket) {
                            // Mostrar los campos adicionales como nombre y precio
                            $html .= '<div class="card border-secondary m-2">';
                            $html .= '<div class="card-body">';
                            $html .= '<h4 class="card-title">' . $orden->nombre . '</h4>';
                            $html .= '<p class="card-text">Extras: ' . $orden->extras . '</p>';
                            $html .= '</div>';
                            $html .= '</div>';
                        }
                    }

                    $html .= '<form action="env_tiket.php" method="post">';
                    $html .= '<input type="hidden" name="num_tiket" value="' . $primerOrden->num_tiket . '">';
                    $html .= '<button class="btn btn-outline-success m-2">Listo <i class="fa fa-share" aria-hidden="true"></i></button>';
                    $html .= '</form>';
                } else {
                    //si no hay datos que mostrar
                    $html .= '<style>
                    .right{
                        background-image: url(../../img/burger-skate.gif);
                        background-position: center; 
                        }
                        </style>';
                }

                echo $html;
                ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-GDGOZSlU9i/UhsQWN57STn0rSg2Y5u28UvWbcQYgILq0Th3GOj2wHQ8TbYkSGpza" crossorigin="anonymous"></script>
</body>

</html>