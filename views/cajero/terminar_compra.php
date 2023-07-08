<?php

ob_start();

// que hacer con los productos
include_once "funciones.php";


// crearTiket($codigo);
$productos = obtenerPlatosTiket($_GET['cod']);

?>
                <?php
               
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

<style>
    img{
        height: 50px;
        width: 50px;
        margin: 0 0 0 60;
        padding: 0;
    }
    h1{
        margin: 0;
        padding: 0;
    }
    p{
        margin: 1;
        padding: 1;
    }
</style>
<img src="http://localhost/phpy/Restaurant/img/food-and-restaurant.png" alt="Imagen del negocio">
</img>
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


//poner todo lo ya indica en el obj visible
$dompdf->render();

//verlo en el navegador
//se genera el pdf con el nombre asignado y despues se elije si este se descarga directamente(false-no,true-si)
$dompdf->stream("Recivo_" . $producto->num_tiket . ".pdf", array("Attachment" => false));



?>