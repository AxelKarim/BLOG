<?php 
session_start();
date_default_timezone_set('America/Mexico_City');
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>window.location='index.php';</script>";
}
//$user=$_SESSION["user_id"];
include '../conexion/conexion.php';
$db=new Conect_MySql();
if(isset($_POST['publicar'])){
    
    $sql="INSERT INTO `publicaciones`(`titulo`, `contenido`, `fecha`) VALUES ('".$_POST["titulo"]."','".$_POST["contenido"]."','".date('Y-m-d H:i:s')."')";
    $res = $db->execute($sql);
    $sql="select id from publicaciones order by fecha DESC limit 1";
    $res = $db->execute($sql);
    while ($r=$res->fetch_array()) {
        $id_pu=$r["id"];
    }
    $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    $sql="INSERT INTO `imagenes`(`id_publicaciones`, `imagen`) VALUES ('$id_pu','$imgContent')";
    $res = $db->execute($sql);
}
if(isset($_POST["borrar"])){
    $sql= "DELETE FROM publicaciones WHERE `id` = '".$_POST['id']."'";
    $res = $db->execute($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../img_fem/logo-clima.png" type="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>SKYBLUE</title>
    <link rel="stylesheet" href="../style4.css">
</head>
<body>
    <?php
        include'menu.php';
    ?>
    
    <!------------------main.content------------------->

    <div class="container">
    
        <div class="main-content">
           

        <div class="write-post-container">
             <div class="user-profile">
                <img src="../img_fem/img_comu.jpg">
                <div>
                     <p>Unigen</p>
                </div>
            </div>
            <form method="post" action="" class="form" enctype="multipart/form-data">
                <div class="post-input-container">
                    <label>Titulo</label><input type="text" name="titulo" class="form-control" required><br>
                    <label>Información</label><textarea rows="5" placeholder="contenido" name="contenido" required></textarea>
                </div>
                <div class="photo-submit">
                <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <input type="submit" value="Publicar" name="publicar">
            </form>
        </div>

        


        </div> <!--Aqui acaba el main content-->

        <!------------------publicacion 1------------------->
        <div class="container2">

            <div class="segundo-bloque">
                <?php
                $sql="select t1.id,t1.fecha,t1.contenido,t1.titulo, t2.imagen from publicaciones t1 JOIN imagenes t2 ON t2.id_publicaciones=t1.id order by fecha DESC";
                $res = $db->execute($sql);
                while ($r=$res->fetch_array()) {
                    
                ?>
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="../img_fem/img_comu.jpg">
                            <div>
                                <p>Unigen</p>
                                <span><?php echo date("d/m/Y H:i",strtotime($r["fecha"]))?></span>
                            </div>
                        </div>
    
                    </div>
                    <h1><?php echo $r["titulo"]?> </h1>
                    <p class="post-text"><?php echo $r["contenido"]?> </p>
                        <?php
                            echo '<img class="post-img" src="data:image/jpeg;base64,'.base64_encode($r["imagen"]).'"/>'; 
                        ?>
                       
                        <div class="post-row">

                            <!--
                            <div class="activity-icons">
                                <div><img src="images-3/like-blue.png">120</div>
                                <div><img src="images-3/comments.png">25</div>
                                <div><img src="images-3/share.png">9</div>
                            </div>
                            <div class="post-profile-icon">
                                <img src="images-3/profile-pic.png"><i class='bx bxs-chevron-down'></i>
                            </div>
                            -->
                        </div>
                    <form method="post" action="" class="form" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $r["id"]?>">   
                        <input type="submit" value="Borrar" name="borrar">
                    </form>
                </div>
                
                <?php
                }
                ?>
            </div>
        </div>
    </div> <!--Aqui acaba el primer container-->
    <!------------------right-sidebar------------------>
        
    

    <div class="footer">
        <p>Copyright 2024 - UNIGEN &copy;</p>
    </div>

    <script src="script4.js"></script>
</body>
</html>