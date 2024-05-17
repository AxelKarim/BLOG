<header>
        <a href="#" class="logo"><img src="img_fem/logo-clima.png"></a>

        <nav>
            <ul>
                <?php
                $db=new Conect_MySql();
                if(isset($_SESSION["user_id"])){
                $sql="select * from usuarios where id='".$_SESSION["user_id"]."'";
                $res = $db->execute($sql);
                while ($r=$res->fetch_array()) {
                    $isadmin=$r["admin"];
                }
                if ($isadmin=="si") {
                ?>
                <li><a href="admin/index.php">Admin</a></li>
                <li><a href="index.php">BLog</a></li>
                <?php
                }else {
                ?>
                <li><a href="index.php">Inicio</a></li>
                <?php   
                }}else {
                ?>
                <li><a href="index.php">Inicio</a></li>
                <?php   
                }
                ?>
                <?php
                if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
                ?>
                <li><a href="login.php">Iniciar sesion</a></li>
                <?php
                }else{
                ?>
                <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                <?php }?>
            </ul>
        </nav>
    </header>  