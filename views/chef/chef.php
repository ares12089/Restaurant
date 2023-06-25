<?php
// include_once "funciones.php";
// $ordenes = obtenerTikets();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

    <script src="archivo.js"></script>
</head>

<body>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .contlf {
            display: grid;
            /* grid-template-columns: 1fr 1fr; */
            /* height: 100vh; */
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
            background-color: aqua;
        }

        .card-text {
            text-align: left;
        }
    </style>
    <script>

    </script>
    <!-- D1
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: calc(100% + 100cm);
            margin-top: 1cm;
            padding: 10px;
            margin-bottom: 10px;
            width: 200px;
        }

        .button {
            background-color: orange;
            color: white;
            padding: 3px 10px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            position: relative;
            transition: transform 0.3s;
            left: 6cm;
        }


        .button:hover {
            transform: scale(1.2);
        }

        .custom-details {
            width: calc(100% + 5cm);
            margin-top: 2cm;
            transform: scale(1.5);

        }

        .content {
            text-align: left;
            margin: 0 auto;
            width: 80%;
        }
    </style> -->
    </head>

    <body>
        <div class="contlf">
            <!-- <div class="left"> -->
            <div class="card-columns">
                <div class="myespacio">
                    <!-- <center>
            <?php //foreach ($ordenes as $orden) { 
            ?>
                <div class="container" style="margin-top: 4cm; margin-left: -5cm;">
                    <details class="custom-details">
                        <summary><?php //echo $orden->num_tiket 
                                    ?> - <?php  //echo date('H:i', strtotime($orden->hora)) 
                                            ?><button class="button">Listo</button></summary>
                        <div class="content" style="padding-left: 4cm;">

                            <p><?php //echo $orden->nombre 
                                ?></p>
                            <p><?php //echo $orden->extras 
                                ?></p>
                            <p><?php //echo $orden->descripcion 
                                ?></p>
                        </div>
                    </details>
                </div>
            <?php //} 
            ?>
        </center> -->

                    <?php
                    // include_once "funciones.php";
                    // $ordenes = obtenerTikets();

                    // $grupos = []; // Array para almacenar los grupos de registros

                    // // Agrupar los registros por número de tiket
                    // foreach ($ordenes as $orden) {
                    //     $numTiket = $orden->num_tiket;
                    //     if (!isset($grupos[$numTiket])) {
                    //         $grupos[$numTiket] = []; // Inicializar el grupo si no existe
                    //     }
                    //     $grupos[$numTiket][] = $orden; // Agregar la orden al grupo correspondiente
                    // }

                    // // Mostrar los registros agrupados
                    // foreach ($grupos as $numTiket => $grupo) {
                    //     $primerRegistro = true; // Bandera para controlar el encabezado

                    //     foreach ($grupo as $orden) {
                    //         // Mostrar el encabezado solo en la primera iteración
                    //         if ($primerRegistro) {
                    //             echo '<center>';
                    //             echo '<div class="container" style="margin-top: 4cm; margin-left: -5cm; ">';
                    //             echo '<details class="custom-details">';
                    //             echo '<summary>' . $orden->num_tiket . ' - ' . /*$orden->hora*/date("g:i A", strtotime($orden->hora)) . '<button class="button">Listo</button></summary>';
                    //             echo '<div class="content" style="padding-left: 4cm;">';
                    //             $primerRegistro = false;
                    //         }

                    //         // Mostrar los campos repetidos
                    //         echo '<p>' . $orden->nombre . '</p>';
                    //         echo '<p>' . $orden->extras . '</p>';
                    //         echo '<p>' . $orden->precio . '</p>';
                    //         echo '<hr>';
                    //     }

                    //     echo '</div>';
                    //     echo '</details>';
                    //     echo '</div>';
                    //     echo '</center>';
                    // }

                    //2 //sirve
                    // archivo.php

                    // include_once "funciones.php";
                    // $ordenes = obtenerTikets();

                    // $grupos = []; // Array para almacenar los grupos de registros

                    // // Agrupar los registros por número de tiket
                    // foreach ($ordenes as $orden) {
                    //     $numTiket = $orden->num_tiket;
                    //     if (!isset($grupos[$numTiket])) {
                    //         $grupos[$numTiket] = []; // Inicializar el grupo si no existe
                    //     }
                    //     $grupos[$numTiket][] = $orden; // Agregar la orden al grupo correspondiente
                    // }

                    // // Construir la vista HTML con los datos actualizados
                    // $html = '';
                    // foreach ($grupos as $numTiket => $grupo) {
                    //     $primerRegistro = true; // Bandera para controlar el encabezado

                    //     foreach ($grupo as $orden) {
                    //         // Mostrar el encabezado solo en la primera iteración
                    //         if ($primerRegistro) {
                    //             $html .= '<center>';
                    //             $html .= '<div class="container" style="margin-top: 4cm; margin-left: -5cm; ">';
                    //             $html .= '<details class="custom-details">';
                    //             $html .= '<summary>' . $orden->num_tiket . ' - ' . date("g:i A", strtotime($orden->hora)) . '<button class="button">Listo</button></summary>';
                    //             $html .= '<div class="content" style="padding-left: 4cm;">';
                    //             $primerRegistro = false;
                    //         }

                    //         // Mostrar los campos repetidos
                    //         $html .= '<p>' . $orden->nombre . '</p>';
                    //         $html .= '<p>' . $orden->extras . '</p>';
                    //         $html .= '<p>' . $orden->precio . '</p>';
                    //         $html .= '<hr>';
                    //     }

                    //     $html .= '</div>';
                    //     $html .= '</details>';
                    //     $html .= '</div>';
                    //     $html .= '</center>';
                    // }

                    // // Devolver el HTML como respuesta
                    // echo $html;

                    //3

                    // Obtener y mostrar las órdenes actualizadas en formato HTML

                    // Aquí debes incluir la lógica para obtener las órdenes de tu base de datos
                    // $ordenes = obtenerTikets(); // Función para obtener las órdenes

                    // Generar el HTML con las órdenes
                    // $html = '';
                    // foreach ($ordenes as $orden) {
                    //     $html .= '<center>';
                    //     $html .= '<div class="container" style="margin-top: 4cm; margin-left: -5cm;">';
                    //     $html .= '<details class="custom-details">';
                    //     $html .= '<summary>' . $orden->num_tiket . ' - ' . date("g:i A", strtotime($orden->hora)) . '<button class="button">Listo</button></summary>';
                    //     $html .= '<div class="content" style="padding-left: 4cm;">';
                    //     $html .= '<p>' . $orden->nombre . '</p>';
                    //     $html .= '<p>' . $orden->extras . '</p>';
                    //     $html .= '<p>' . $orden->precio . '</p>';
                    //     $html .= '</div>';
                    //     $html .= '</details>';
                    //     $html .= '</div>';
                    //     $html .= '</center>';
                    // }

                    // echo $html;

                    //4 card

                    // Obtener y mostrar las órdenes actualizadas en formato HTML

                    // Aquí debes incluir la lógica para obtener las órdenes de tu base de datos
                    // $ordenes = obtenerTikets(); // Función para obtener las órdenes

                    // Generar el HTML con las órdenes
                    // $html = '';
                    // foreach ($ordenes as $orden) {
                    //     $html .= '<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">';
                    //     $html .= '<div class="card-header">' . $orden->num_tiket . '-' . date("g:i A", strtotime($orden->hora)) . '</div>';
                    //     $html .= '<div class="card-body">';
                    //     $html .= '<h5 class="card-title">' . $orden->nombre . '</h5>';
                    //     $html .= '<p class="card-text">' . $orden->extras . '</p>';
                    //     $html .= '<p class="card-text">' . $orden->precio . '</p>';
                    //     $html .= '</div>';
                    //     $html .= '</div>';
                    // }

                    // echo $html;

                    //prueba mod diseño //sirve
                    // include_once "funciones.php";
                    // $ordenes = obtenerTikets();
                    // Generar el HTML con las órdenes
                    // $html = '';
                    // foreach ($ordenes as $orden) {
                    //     $html .= '<div class="card border-info m-2">';
                    //     $html .= '<div class="card-body text-center">';
                    //     $html .= '<h4 class="card-title">' . $orden->num_tiket .'- Hora:'.date("g:i A", strtotime($orden->hora)).'</h4>';
                    //     $html .= '<p class="card-text"></p>';
                    //     $html .= '<a href="#" class="btn btn-primary">Preparar</a>';
                    //     $html .= '</div>';
                    //     $html .= '</div>';
                    // }

                    // echo $html;

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
                                $html .= '<div class="card border-success ms-5 me-5 mt-4">';
                                $html .= '<div class="card-body">';
                                $html .= '<h4 class="card-title">' . $orden->num_tiket . '- Hora:' . date("g:i A", strtotime($orden->hora)) . '</h4>';
                                $html .= '<p class="card-text"></p>';

                                $primerRegistro = false;
                            }

                            // Mostrar los campos repetidos
                            $html .= '<p class="card-text">' . $orden->nombre . '</p>';
                            $html .= '<p class="card-text>' . $orden->extras . '</p>';
                            $html .= '<p class="card-text>' . $orden->descripcion . '</p>';
                            $html .= '<hr>';
                        }
                        $html .= '<form action="env_tiket.php" method="post">
                                    <input type="hidden" name="num_tiket" value="'.$orden->num_tiket.'">
                                    <button class="btn btn-success">Enviar
                                        <i class="fa fa-share" aria-hidden="true"></i>
                                    </button>
                                </form>';
                        $html .= '</div>';
                        $html .= '</div>';
                    }

                    // Devolver el HTML como respuesta
                    echo $html;

                    ?>
                    <!-- <div class="contlf">
            <div class="left">
                <div class="card-columns">
                    <div class="card border-info m-2">
                        <div class="card-body text-center">
                            <h4 class="card-title">Codigo-Tiket y Hora</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lectus sem,
                                tempor vitae mattis malesuada, ornare sed erat. Pellentesque nulla dui, congue
                                nec tortor sit amet, maximus mattis dui. </p>
                            <a href="#" class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                right
            </div>
        </div> -->
                </div>
            </div>
            <!-- </div> -->
            <!-- <div class="right">
            </div> -->
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>

</html>