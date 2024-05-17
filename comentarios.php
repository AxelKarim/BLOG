<style type="text/css">
	#global {
		height: 300px;
		
		border: 1px solid #ddd;
		background: #f1f1f1;
		overflow-y: scroll;
	}
	#mensajes {
		height: auto;
	}
	.texto {
		padding:4px;
		background:#fff;
	}
</style>
<div id="global">
  	<div id="mensajes">
		<?php 
			include 'conexion/conexion.php';
			$db=new Conect_MySql();
			session_start();
			date_default_timezone_set('America/Mexico_City');
			$sql1="SELECT comentario,usuario FROM comentarios LEFT JOIN usuarios ON comentarios.id_user=usuarios.id
			WHERE comentarios.id_publicacion='".$_GET['id']."'";
			$res1 = $db->execute($sql1);
			while ($rr=$res1->fetch_array()) {
				
		?>
		<div class="user-profile">
			<img src="img_fem/img_comu.jpg">
			<div>
				<p><?php if($rr['usuario']==null){
					echo "Anonimo";
				}else{
					echo $rr['usuario'];
				} ?></p>
			</div>
		</div>
  		<p style="text-align:justify"><?php echo $rr['comentario'] ?></p>
		<hr>
		<?php
			}
		?>
  	</div>
</div>