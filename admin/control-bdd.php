<?php
    include_once 'funciones/sesion-admin.php';
    include_once 'funciones/funciones.php';
    
    if (isset($_POST['consulta'])){
        $query= $_POST['query'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $hora= date('H:i', time());
        $fecha= date('Y-m-d',time());
        $respuesta;
        try {
            $start = microtime(true);
			$tuplas=null;
            $tuplas= $db->query($query);
            $end = microtime(true);
            $tiempo= "La consulta tardó " . round(($end - $start), 6). " segundos.";
            if ($tuplas === FALSE) {
                throw new Exception($db->error);
            }else{
            
                $stmt= $db_base->prepare("INSERT INTO registro (fecha, hora, consulta, id_user) VALUES(?,?,?,?)");
                $stmt->bind_param("sssi", $fecha, $hora, $query, $id_user);
                $stmt->execute();

                /* if ($stmt->affected_rows){ 
                    $respuesta= array(
                        'res' => 'exito',
                    );
                    $id_actividad= mysqli_insert_id($db);
                }else{
                    $respuesta= array(
                        'res' => 'error',
                    );
                }; */

                $stmt->close();
                $db_base->close();
               
                if ((strpos($query, "SELECT") !== false && strpos($query, "SELECT") == 0) || (strpos($query, "EXPLAIN") !== false && strpos($query, "EXPLAIN") == 0)) { //&& str_replace(' ', '',$_POST['query'])!=''
                    while ($rta = $tuplas->fetch_assoc()) {
                    $indices = array_keys($rta);
                    $valores = array_values($rta);
                    }

                    ?>
                    <div class="row col-md-12 centrar-contenido" id="tabla">
                        <div class="">
                        <div class="box">
                            <div class="box-header">
                            <h3 class="box-title">Resultado</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <table id="registros" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <?php
									if($tuplas->num_rows != 0)
									{
                                    for ($i=0; $i<count($indices); $i++){
                                        ?>
                                        <th class="col-xs-2"><?php echo $indices[$i]?></th>
                                        <?php
                                    }
                                    ?>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                    for ($i=0; $i<count($valores); $i++)
									{
                                        ?>
                                        <td><?php echo $valores[$i]; ?></td>
                                        <?php
                                    }
									}
									else
										echo "No existen datos para su consulta."
                                    ?>

                                    </tr>
                                <!-- </tr> -->

                                </tfoot>
                            </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row col-md-12 centrar-contenido">
                        <p><?php echo $tiempo?></p>
                    </div>
                <?php
                } // if SELECT
                else{
                    ?>
                    <p><?php echo $tiempo?></p>
                    <?php
                }
            } //error

        } catch (Exception $e) {
            $respuesta= "Problema: " . $e->getMessage();
            echo json_encode($respuesta);
        }



        
    }
?>