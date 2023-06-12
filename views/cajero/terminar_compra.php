<?php
ob_start();
// que hacer con los productos
include_once "funciones.php";
$productos = obtenerProductosEnCarrito();
//solo los ids, para ello invoca a obtenerIdsDeProductosEnCarrito();
//var_dump($productos);
?>
<div class="columns">
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
                $total = 0;
                foreach ($productos as $producto) {
                    $total += $producto->precio;
                ?>
                    <tr>
                        <td><?php echo $producto->nombre ?></td>
                        <td><?php echo $producto->extras ?></td>
                        <td>$<?php echo number_format($producto->precio, 2) ?></td>
                        <td><?php echo $producto->id_sesion ?></td>
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
    </div>
</div>

<?php 
$html = ob_get_clean();
//echo $html;

//incluir la libreria dompdf que se encuentra:
require_once 'libreria/dompdf/autoload.inc.php';
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
$dompdf->setPaper('A6','landscape');
//$dompdf->setPaper('letter');
//$dompdf->setPaper('A4','landscape');

//poner todo lo ya indica en el obj visible
$dompdf->render();

//verlo en el navegador
//se genera el pdf con el nombre asignado y despues se elije si este se descarga directamente(false-no,true-si)
$dompdf->stream("Recivo_".$producto->id_orden.".pdf", array("Attachment"=>false));


?>