<?php
// include_once "funciones.php";
// $ordenes = obtenerTikets();

// $grupos = []; // Array para almacenar los grupos de registros

// Agrupar los registros por número de tiket
// foreach ($ordenes as $orden) {
//     $numTiket = $orden->num_tiket;
//     if (!isset($grupos[$numTiket])) {
//         $grupos[$numTiket] = []; // Inicializar el grupo si no existe
//     }
//     $grupos[$numTiket][] = $orden; // Agregar la orden al grupo correspondiente
// }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

    <script src="archivo.js"></script>

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
            background-color: whitesmoke;
        }

        .card-text {
            text-align: left;
        }
    </style>
</head>

<body class="bod">
    <div class="contlf">
        <div class="left">

            <div class="card-columns">
                <div class="myespacio">
                    <?php
                    //prueba 2
                    include_once "funciones.php";
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

                            // Mostrar los campos repetidos
                            // $html .= '<p class="card-text">' . $orden->nombre . '</p>';
                            // $html .= '<p class="card-text>' . $orden->extras . '</p>';
                            // $html .= '<p class="card-text>' . $orden->descripcion . '</p>';
                            // $html .= '<hr>';
                        }
                        // $html .= '<form action="env_tiket.php" method="post">
                        //         <input type="hidden" name="num_tiket" value="' . $orden->num_tiket . '">
                        //         <button class="btn btn-success">Listo
                        //             <i class="fa fa-share" aria-hidden="true"></i>
                        //         </button>
                        //     </form>';
                        $html .= '</div>';
                        $html .= '</div>';
                    }

                    // Devolver el HTML como respuesta
                    echo $html;

                    ?>
                </div>
            </div>



            <?php
            // foreach ($grupos as $numTiket => $grupo) {
            //     $primerRegistro = true; // Bandera para controlar el encabezado

            //     foreach ($grupo as $orden) {
            //         // Mostrar el encabezado solo en la primera iteración
            //         if ($primerRegistro) {
            //             echo '<div class="card text-white bg-danger mb-3">';
            //             echo '<div class="card-header">' . $orden->num_tiket . '-' . date("g:i A", strtotime($orden->hora)) . '</div>';
            //             echo '<div class="card-body">';
            //             echo '<h5 class="card-title">' . $orden->nombre . '</h5>';
            //             echo '<p class="card-text">' . $orden->descripcion . '</p>';
            //             echo '</div>';
            //             echo '</div>';
            //             $primerRegistro = false;
            //         } else {
            //             echo '<div class="card text-white bg-danger mb-3">';
            //             echo '<div class="card-body">';
            //             echo '<h5 class="card-title">' . $orden->nombre . '</h5>';
            //             echo '<p class="card-text">' . $orden->descripcion . '</p>';
            //             echo '</div>';
            //             echo '</div>';
            //         }
            //     }
            // }
            ?>
        </div>
        <div class="right">
            <ul class="list-group">
                <?php
                // include_once "funciones.php";
                // $ordenes = obtenerTikets();

                $html = '';
                if (!empty($ordenes)) {
                    $primerOrden = $ordenes[0]; // Obtener el primer elemento del array de órdenes

                    $html .= '<div class="card border-primary m-2">';
                    $html .= '<div class="card-body">';
                    $html .= '<h4 class="card-title">Tiket #' . $primerOrden->num_tiket . '- Hora:' . date("g:i A", strtotime($primerOrden->hora)) . '</h4>';
                    // $html .= '<p class="card-text">' . $primerOrden->nombre . '</p>';
                    // $html .= '<p class="card-text">' . $primerOrden->extras . '</p>';
                    // $html .= '<p class="card-text">' . $primerOrden->descripcion . '</p>';
                    $html .= '<hr>';

                    // Mostrar otros elementos con el mismo num_tiket
                    foreach ($ordenes as $orden) {
                        if ($orden->num_tiket == $primerOrden->num_tiket) {
                            // Mostrar los campos adicionales como nombre y precio
                            $html .= '<div class="card border-danger m-2">';
                            $html .= '<div class="card-body">';
                            $html .= '<h4 class="card-title">' . $orden->nombre . '</h4>';
                            $html .= '<p class="card-text">Extras: ' . $primerOrden->extras . '</p>';
                            // $html .= '<p class="card-text">' . $orden->precio . '</p>';
                            // $html .= '<hr>';
                            $html .= '</div>';
                            $html .= '</div>';
                        }
                    }

                    $html .= '<form action="env_tiket.php" method="post">';
                    $html .= '<input type="hidden" name="num_tiket" value="' . $primerOrden->num_tiket . '">';
                    $html .= '<button class="btn btn-success m-2">Listo <i class="fa fa-share" aria-hidden="true"></i></button>';
                    $html .= '</form>';

                } else {
                    $html .= '<h1>No hay órdenes disponibles.</h1>';
                }

                echo $html;
                // foreach ($grupos as $numTiket => $grupo) {
                // echo '<li class="list-group-item">Tiket ' . $numTiket . '</li>';
                // }
                ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-GDGOZSlU9i/UhsQWN57STn0rSg2Y5u28UvWbcQYgILq0Th3GOj2wHQ8TbYkSGpza" crossorigin="anonymous"></script>
</body>

</html>