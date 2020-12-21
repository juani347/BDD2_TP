<?php
    include_once 'funciones/funciones.php';
    $usuario= $_POST['usuario'];
    
    if (isset($_POST['login-admin'])){
        $password= $_POST['password'];
        /* $opciones= array(
        'cost'=> 12
        ); */

        try {
            $stmt= $db->prepare(" SELECT u.id_user, u.usuario, u.clave FROM usuario u WHERE usuario=? ");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $stmt->bind_result($id_user, $user, $clave);
            $stmt->store_result();  //para poder usar num_rows
            $stmt->fetch();

            if ($stmt->num_rows){
                if (password_verify($password, $clave)){    //compara la password ingresada con la encriptada en la bdd
                    session_start();
                    $_SESSION['usuario']= $user;
                    $_SESSION['id_user']= $id_user;
                    $_SESSION['clave']= $password;

                    $respuesta= array(
                        'respuesta' => 'exito',
                    );
                }else{
                    $respuesta= array(
                        'respuesta' => 'clave incorrecta',
                    );
                };
            }else{
                $respuesta= array(
                    'respuesta'=> 'no existe',
                );
            };
            $stmt->close();
            $db->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        echo json_encode($respuesta);
    }

?>