<?php
    include 'conexion/conexion.php';
    $db=new Conect_MySql();
    session_start();
    date_default_timezone_set('America/Mexico_City');
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
        print "<script>window.location='index.php';</script>";
    }
    $user=$_SESSION["user_id"];
    if($_POST['fu']=="consulta"){
        $sql1="select count(id) as a FROM likes WHERE id_publicaciones='".$_POST['id']."' AND id_user='$user'";
        $res1 = $db->execute($sql1);
        while ($rr=$res1->fetch_array()) {
            $islike=$rr["a"];
        }   
        echo $islike;
    }
    elseif($_POST['fu']=="like"){
        $sql="INSERT INTO `likes`(`id_publicaciones`, `id_user`) VALUES ('".$_POST['id']."','$user')";
        $res = $db->execute($sql);
        $sql1="select count(id) as a FROM likes WHERE id_publicaciones='".$_POST['id']."'";
        $res1 = $db->execute($sql1);
        while ($rr=$res1->fetch_array()) {
            $islike=$rr["a"];
        }
        echo $islike;
    }
    else{
        $sql="DELETE FROM `likes` WHERE id_publicaciones='".$_POST['id']."' AND id_user='$user'";
        $res = $db->execute($sql);
        $sql1="select count(id) as a FROM likes WHERE id_publicaciones='".$_POST['id']."'";
        $res1 = $db->execute($sql1);
        while ($rr=$res1->fetch_array()) {
            $islike=$rr["a"];
        }
        echo $islike;
    }
?>