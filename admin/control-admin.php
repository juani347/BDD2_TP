<?php
    include_once 'funciones/funciones.php';

    if (isset($_POST['registrarse'])){
        $password= $_POST['password'];
        $usuario= $_POST['usuario'];
        $password_hashed= password_hash($password, PASSWORD_BCRYPT);

        //Creacion del usuario y LIMITACIONES
        $query=  " CREATE USER '" . $usuario . "'@'localhost' IDENTIFIED BY '" . $password ."'
                    WITH MAX_QUERIES_PER_HOUR 100
                    MAX_UPDATES_PER_HOUR 40
                    MAX_CONNECTIONS_PER_HOUR 100
                    MAX_USER_CONNECTIONS 2 ";
        
        $crear= $db->query($query);
        
        $sql_drop= "DROP DATABASE if exists entorno_bdd_" . $usuario;
        $sql_bd= "CREATE DATABASE entorno_bdd_" . $usuario;

            try {
                if ($crear === FALSE) {
                    throw new Exception($db->error);
                } else{
                    $db->query($sql_drop);

                    //Creamos la base del usuario
                    $bd= $db->query($sql_bd);

                    //Asignamos los privilegios
                    $db->query("GRANT ALL PRIVILEGES ON entorno_bdd_" . $usuario . ".* TO '" . $usuario . "'@'localhost';");
                    $db->query("FLUSH PRIVILEGES;");
                }
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
                $respuesta= array(
                    'respuesta' => 'error',
                );
            }
        

        echo json_encode($respuesta);
    }
    
?>