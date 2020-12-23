<?php 
    if (isset($_SESSION['usuario'])){
        $servidor='localhost';
        $base= 'entorno_bdd_'. $_SESSION['usuario'];
        $puerto='3306';
        $db = new mysqli($servidor, $_SESSION['usuario'], $_SESSION['clave'], $base, $puerto); //Base del usuario
        $db_base = new mysqli('localhost','root','','entorno_bdd'); //Base principal del sistema
    }
    else{
        $db = new mysqli('localhost','root','','entorno_bdd');
    }
    
    if ($db->connect_error){
        echo $db->connect_error;
    }

    $db->set_charset('utf8');
?>