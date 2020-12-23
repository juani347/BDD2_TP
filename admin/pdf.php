<?php
    include_once 'funciones/funciones.php';
    include_once 'funciones/sesion-admin.php';
    $db_base = new mysqli('localhost','root','','entorno_bdd');
?>
<?php ob_start(); ?>

<h2>Historial de consultas</h2>
<table id="registros" class="table table-bordered table-striped text-center" width="100%" cellpadding="5px" cellspacing="5px" border="0.5">
    <thead>
        <tr>
            <th class="col-md-2">Fecha</th>
            <th class="col-md-2">Hora</th>
            <th class="col-md-8">Consulta</th>
        </tr>
    </thead>
    <tbody>

        <?php
        try {
            include_once 'funciones/funciones.php';
            $sql = "
                    SELECT r.fecha, r.hora, r.consulta
                    FROM registro r
                    WHERE r.id_user=" . $id_user . "
                    ORDER BY r.fecha, r.hora";
            $tuplas = $db_base->query($sql);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        while ($registro = $tuplas->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo utf8_encode(strftime("%d-%m-%Y", strtotime($registro['fecha']))); ?></td>
                <td> <?php echo date_format(date_create($registro['hora']), 'H:i'); ?></td>
                <td> <?php echo $registro['consulta']; ?></td>
            </tr>
        <?php
        }
        ?>
        </tr>

        </tfoot>
</table>
<?php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "historial.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>