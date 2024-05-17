<?php 
session_start();

//$user=$_SESSION["user_id"];
include 'conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img_fem/logo-clima.png" type="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKYBLUE</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="comentarios.css">
    <link rel="stylesheet" href="like.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<body>
    <?php
        include'menu.php';
    ?>

    <!------------------publicacion 1------------------->
    <div class="container2">
        <div class="blog-content">
            <div class="segundo-bloque">
                <?php
                    $phpArray=array();
                    $contador=0;
                    $sql="select t1.id,t1.fecha,t1.contenido,t1.titulo, t2.imagen from publicaciones t1 JOIN imagenes t2 ON t2.id_publicaciones=t1.id order by fecha DESC";
                    $res = $db->execute($sql);
                    while ($r=$res->fetch_array()) {
                        array_push($phpArray,$r['id']);
                ?>
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="img_fem/img_comu.jpg">
                            <div>
                                <p>Unigen</p>
                                <span><?php echo date("d/m/Y H:i",strtotime($r["fecha"]))?></span>
                            </div>
                        </div>

                        </a>
                    </div>
                    <h1><?php echo $r["titulo"]?> </h1>
                        <p class="post-text"><?php echo $r["contenido"]?> </p>
                        <?php
                            echo '<img class="post-img" src="data:image/jpeg;base64,'.base64_encode($r["imagen"]).'"/>';
                            
                            if(isset($_SESSION["user_id"])){
                                $sql1="select count(id) as a FROM likes WHERE id_publicaciones='".$r['id']."' AND id_user='".$_SESSION["user_id"]."'";
                                $res1 = $db->execute($sql1);
                                while ($rr=$res1->fetch_array()) {
                                    $islike=$rr["a"];
                                }   
                                $sql1="select count(id) as a FROM likes WHERE id_publicaciones='".$r['id']."' ";
                                $res1 = $db->execute($sql1);
                                while ($rr=$res1->fetch_array()) {
                                    $countlike=$rr["a"];
                                }   
                                if($islike==1){
                                    $srcimg="images-3/like-blue.png";
                                
                                }
                                else{
                                    $srcimg="images-3/like.png";
                                }
                        ?>
                        <div style="width:80px;display:inline-block;" class="like" id="like-button-<?php echo $contador;?>" >
                            <img id="like-icon<?php echo $contador;?>" src="<?php echo $srcimg ?>">
                            <span id="like-text<?php echo $contador; ?>"><?php echo $countlike; ?></span>
                        </div>
                        <?php
                            }
                        ?>
                        <div style="display:inline-block;" style class="comentarios-btn comentarios" id="comentario-button-<?php echo $contador."-".$r['id'];?>">
                            <img id="comentarios.icon" src="images-3/comentarios.png">
                        </div>
                        <div  id="comentarios-area"> 
                        </div>
                </div>
                <?php
                    $contador++;
                    }
                    
                ?>
            
                
            </div>
        </div>
    </div>
</div> 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="comentarios"></div>
        </div>
        <div class="modal-footer">
            <h4 style="float:left">Deja tu comentario</h4>
            <input type="hidden" id="id_publicacion" >
            <textarea class="form-control" id="text-comentario" rows="4" style="width:100%" placeholder="Escribe tu comentario aquí" ></textarea>
            <br>
            <button id="sendcomentario" class="btn btn-primary">Enviar</button>
        </div>
        </div>
    </div>
</div>

<div class="footer">
    <p>Copyright 2024 - SKYBLUE &copy;</p>
</div>

<script src="script3.js"></script>
<script>
    let isLiked=false
    $(document).on('click','.like',function(){
        
        
        const likeButton = $(this).attr("id");
        var like=likeButton.split("-")
        var j= <?php echo json_encode($phpArray ); ?>;
        var isLiked=0;
        $.ajax({
            url: "like.php",
            type: "post",
            data: {id:j[like[2]],fu:"consulta"},
            success: function (results) {
                isLiked=results;
                if (isLiked==1) {
                    $('#like-icon'+like[2]).attr('src', 'images-3/like.png');
                    $.ajax({
                        url: "like.php",
                        type: "post",
                        data: {id:j[like[2]],fu:"dislike"},
                        success: function (result) {
                            $('#like-text'+like[2]).text( result );
                        }
                    });
                    isLiked = false;
                } else {
                    $('#like-icon'+like[2]).attr('src', 'images-3/like-blue.png');
                    $.ajax({
                        url: "like.php",
                        type: "post",
                        data: {id:j[like[2]],fu:"like"},
                        success: function (result) {
                            $('#like-text'+like[2]).text( result );
                        }
                    });
                    isLiked = true;
                }
            }
        }); 
    });
    $(document).on('click','.comentarios',function(){
        $('#exampleModal').modal('show');
        const likeButton = $(this).attr("id");
        var like=likeButton.split("-")
        $('#id_publicacion').val(like[3])
        var j= <?php echo json_encode($phpArray ); ?>;
        $.get("comentarios.php",{id:j[like[2]]},function(htmlexterno){$("#comentarios").html(htmlexterno);});
    });
    $(document).on('click','#sendcomentario',function(){
        $('#exampleModal').modal('show');
        const id_publicacion=$('#id_publicacion').val()
        const comentario=$('#text-comentario').val()
        $.ajax({
            url: "agregarcomentarios.php",
            type: "post",
            data: {comentario:comentario,public:id_publicacion},
            success: function (result) {
                $('#text-comentario').val('');
                $.get("comentarios.php",{id:id_publicacion},function(htmlexterno){$("#comentarios").html(htmlexterno);});
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>