<?php
//mostrar errores en el navegador
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
//aumentar memoria para la generacion del PDF
// ini_set('memory_limit', '256M');
//new
// $codigoValue = $_GET['codigoValue'];

// Realizar cualquier procesamiento adicional con $codigoValue

// Imprimir el valor recibido
// echo $codigoValue;

ob_start();

// que hacer con los productos
include_once "funciones.php";
// $productos = obtenerProductosEnCarrito();

//mod
// Archivo 2: recibir.php
// $variable = $_GET['var'];
// echo $variable; // Muestra "Hola mundo"

//mod
// $var = $_POST['var'];
// echo $var;

// $codigo = generarCodigo();
// //new
// if (!isset($codigo)) {
//     exit("No hay numero de tiket");
// }

// crearTiket($codigo);
$productos = obtenerPlatosTiket($_GET['cod']);

// eliminarordenes();

// obtenerPlatosTiket($_GET['var']);



//new
// var_dump($productos);
//eliminarOrden();

?>
<!-- <div class="columns">
    <div class="column">
        <h2 class="is-size-2">Mi carrito de compras</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Extras</th>
                    <th>Precio</th>
                    <th>TIKET</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $total = 0;
                // foreach ($productos as $producto) {
                //     $total += $producto->precio;
                ?>
                    <tr>
                        <td><?php //echo $producto->nombre ?></td>
                        <td><?php //echo $producto->extras ?></td>
                        <td>$<?php //echo number_format($producto->precio, 2) ?></td>
                        <td><?php //echo $producto->num_tiket ?></td>
                    <?php //} ?>
                    </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                    <td colspan="2" class="is-size-4">
                        $<?php //echo number_format($total, 2) ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div> -->


<h1>Restaurant</h1>
<p>ORDEN NO. <?php echo ($_GET['cod']) ?></p>
<p>---------------------------------------</p>
<table>
    <thead>
        <tr>
            <th>Cant.</th>
            <th>Nombre</th>
            <th>Extras</th>
            <th>PrecioU.</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $subtotal = 0;
        foreach ($productos as $producto) {
            $subtotal += $producto->precio;
        ?>
            <tr>
                <td>2</td>
                <td><?php echo $producto->nombre ?></td>
                <td><?php echo $producto->extras ?></td>
                <td><?php echo number_format($producto->precio, 2) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<br>
<p>SUBTOTAL: $<?php echo number_format($subtotal, 2) ?></p>
<p>IPOCONSUMO: $<?php
    $consu = 5 / 100 * $subtotal;
    echo number_format($consu, 2) ?></p>
<h2>TOTAL: $<?php
    $total = $consu + $subtotal;
    echo number_format($total, 2) ?></h2>

<?php
$html = ob_get_clean();
// echo $html;

//incluir la libreria dompdf que se encuentra:
require_once 'dompdf/autoload.inc.php';
//crear obj para trabajar con todas las funcionalidades para la conversion

//obj
use Dompdf\Dompdf;

$dompdf = new Dompdf();

//permite a dompdf obtener y mostrar las img
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

//cargo la vista html que vamos a pasar a PDF
$dompdf->loadHtml($html);

//formato de la hoja
$dompdf->setPaper('A5', 'landscape');
//$dompdf->setPaper('letter');
//$dompdf->setPaper('A4','landscape');

//poner todo lo ya indica en el obj visible
$dompdf->render();

//verlo en el navegador
//se genera el pdf con el nombre asignado y despues se elije si este se descarga directamente(false-no,true-si)
$dompdf->stream("Recivo_" . $producto->num_tiket . ".pdf", array("Attachment" => false));

// header("Location: tienda.php")


?>