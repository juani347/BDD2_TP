<?php 
    if (isset($_SESSION['usuario'])){
        $servidor='localhost';
        $base= 'entorno_bdd_'. $_SESSION['usuario'];
        $puerto='3306';
        $db = new mysqli($servidor, $_SESSION['usuario'], $_SESSION['clave'], $base, $puerto);
        $db_base = new mysqli('localhost','root','','entorno_bdd');
    }
    else{
        $db = new mysqli('localhost','root','','entorno_bdd');
    }
    
    if ($db->connect_error){
        echo $db->connect_error;
    }

    $db->set_charset('utf8');
?>