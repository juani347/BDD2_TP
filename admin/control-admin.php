<?php
    include_once 'funciones/sesion-admin.php';
    include_once 'funciones/funciones.php';
    $usuario= $_POST['usuario'];

    if (isset($_POST['crear-admin'])){
        $password= $_POST['password'];

        $password_hashed= password_hash($password, PASSWORD_BCRYPT);/* , $opciones */
                                                               // agrego ADMIN SISTEMA
            try {
                $stmt_admin= $db->prepare("INSERT INTO usuario (usuario, clave) VALUES(?,?)");
                $stmt_admin->bind_param("ss", $usuario, $password_hashed);
                $stmt_admin->execute();

                if (mysqli_affected_rows($db)){ 
                    $respuesta= array(
                        'respuesta' => 'exito',
                    );
                    echo mysqli_insert_id($db) . "</br>";
                }else{
                    $respuesta= array(
                        'respuesta' => 'error',
                    );
                };
                $stmt_admin->close();
                $db->close();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        

        echo json_encode($respuesta);
    }
    
?>