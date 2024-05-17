<?php
    $a = $_POST['usu'];
    $b = $_POST['pass'];
    include 'conexion/conexion.php';
    $db=new Conect_MySql();
    $sql="select * from usuarios where usuario='".$a."' and password='".$b."'";
    $res = $db->execute($sql);
	while ($r=$res->fetch_array()) {
        $user_id=$r["id"];
		$admin=$r["admin"];
		break;
	}
    session_start();
	$_SESSION["user_id"]=$user_id;
    if($admin=="si"){
        print "<script>window.location='admin/index.php?inicio=1';</script>";
    }
    else{
        print "<script>window.location='index.php?inicio=1';</script>";
    }
	//
     