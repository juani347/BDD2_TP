<?php 
    if (isset($_SESSION['usuario'])){
        $db = new mysqli('localhost',$_SESSION['usuario'],$_SESSION['clave'],'entorno_bdd_'. $_SESSION['usuario']);
    }
    else{
        $db = new mysqli('localhost','root','secret','entorno_bdd');
    }

    if ($db->connect_error){
        echo $db->connect_error;
    }

    $db->set_charset('utf8');
?>