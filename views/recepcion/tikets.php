<?php
include_once "funciones.php";
$tikets = mostrarTiketEnv();
// var_dump($tiket)
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin: auto;
            background-color: gray;
            text-align: center;
            align-items: center;
        }

        .table {
            /* transform: scale(2.0); */
            text-align: center;
            align-items: center;
            font-size: 6rem;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="temp.js"></script>
</head>

<body>
    <!-- <a href="../../index.html" class="btn btn-outline-secondary" style="z-index: 2000;">Volver</a> -->
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Tiket</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $grupos = []; // Array para almacenar los grupos de registros

            // Agrupar los registros por número de tiket
            foreach ($tikets as $tiket) {
                $numTiket = $tiket->num_tiket;
                if (!isset($grupos[$numTiket])) {
                    $grupos[$numTiket] = []; // Inicializar el grupo si no existe
                }
                $grupos[$numTiket][] = $tiket; // Agregar la orden al grupo correspondiente
            }

            // Construir la vista HTML con los datos actualizados
            $html = '';
            foreach ($grupos as $numTiket => $grupo) {
                $primerRegistro = true; // Bandera para controlar el encabezado
                $html .= '<tr>';
                foreach ($grupo as $tiket) {
                    // Mostrar el encabezado solo en la primera iteración

                    if ($primerRegistro) {
                        $html .= '<th>' . $tiket->num_tiket . '</th>';

                        $primerRegistro = false;
                    }

                    // Mostrar los campos repetidos

                }
                $html .= '</tr>';
            }

            // Devolver el HTML como respuesta
            echo $html;

            ?>

        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>