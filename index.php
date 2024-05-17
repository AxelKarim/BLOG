<?php 
session_start();
/*if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>window.location='index.php';</script>";
}*/
//$user=$_SESSION["user_id"];
include 'conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img_fem/logo-clima.png" type="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>SKYBLUE</title>
</head>
<body>
    <!---------Barra de arriba---------->
    <?php
        include'menu.php';
    ?>
    <section class="zona1"></section>

    <!--letras que cambian de color-->
    <div class="header-content container"> 
        <h1>SKYBLUE</h1>

        <p> 
            ESTA PAGINA ES PARA QUE SE PUEDAN INFORMAR 
            Y SABER DE LAS NUEVAS NOVEDADES DE LAS SOBRE
            LOS CLIMAS O CAMBIOS CLIMATICOS QUE SE ESTAN 
            LLEVANDO ACABO EN TODO EL PLANETA 
        </p>


     </div> 

     <section class="general-blog">
        <div class="general-blog1">
            <h2>¿QUE ES EL CLIMA 
                Y EN QUE NOS AFECTA EL CLIMA?</h2>
            <p>
                Como la violencia doméstica, el acoso 
                sexual, la trata de personas con fines 
                de explotación sexual, el matrimonio 
                forzado, entre otros.
            </p>
        </div>
         <div class="general-blog2"> </div>
    
    </section>

    <div class="general-blog"> </div>


 <!--------------Blog--------------->
<section class="blog-container">
    <h2>Publicaciones</h2>
    <p>Conseguir que exista igualdad de género 
        no es una tarea imposible, pero requiere 
        de la implicación de toda la ciudadanía.</p>
    <div class="blog-content">
        <?php
            $contador=1;
            $db=new Conect_MySql();
            $sql="SELECT t1.contenido,t1.titulo, t2.imagen from publicaciones t1 LEFT JOIN imagenes t2 ON t2.id_publicaciones=t1.id order by fecha DESC limit 3";
            $res = $db->execute($sql);
            while ($r=$res->fetch_array()) {
                if ($contador==2) {
                    echo '<div class="blog-1">
                    <img class="post-img" src="data:image/jpeg;base64,'.base64_encode($r["imagen"]).'"/>
                    <h3>'.$r['titulo'].'</h3>
                    <p>'.$r['contenido'].'</p>
                    <a href="publicaciones.php" class="btn-1"> Ver mas</a>
                    </div>';
                }
                else{
                    echo '<div class="blog-1">
                    <img class="post-img" src="data:image/jpeg;base64,'.base64_encode($r["imagen"]).'"/>
                    <h3>'.$r['titulo'].'</h3>
                    <p>'.$r['contenido'].'</p>
                </div>';
                }
                $contador++;
            }
        ?>
    </div>
</section>


    <!---Cuales son algunas formas...--->
    <section class="general-blog">
        <div class="general-blog1">
            <h2>¿POR QUE ES IMPORTANTE EL CLIMA EN EL PLANETA?</h2>
            <p>
                Como la violencia doméstica, el acoso 
                sexual, la trata de personas con fines 
                de explotación sexual, el matrimonio 
                forzado, entre otros.
            </p>
        </div>
         <div class="general-blog2"> </div>
    
    </section>

    <div class="general-blog"> </div>

   
    <script src="script.js"></script>
    <script src="bot.js"></script>
</body>
</html>