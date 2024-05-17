<?php
    include 'conexion/conexion.php';
    $db=new Conect_MySql();
    session_start();
    date_default_timezone_set('America/Mexico_City');
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
       
        $sql="INSERT INTO `comentarios`(`comentario`, `id_publicacion`) VALUES ('".$_POST['comentario']."','".$_POST['public']."')";
        $res = $db->execute($sql);
    }
    else{
        $user=$_SESSION["user_id"];
        $sql="INSERT INTO `comentarios`(`comentario`, `id_publicacion`, `id_user`) VALUES ('".$_POST['comentario']."','".$_POST['public']."','$user')";
        $res = $db->execute($sql);
    }
    
    
    echo $_POST['public'];
?>