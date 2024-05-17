<header>
        <a href="#" class="logo"><img src="../img_fem/logo-clima.png"></a>

        <nav>
            <ul>
                
                <li><a href="index.php">Admin</a></li>
                <?php
                if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
                ?>
                <li><a href="../login.php">Iniciar sesion</a></li>
                <?php
                }else{
                ?>
                <li><a href="../index.php">Blog</a></li>
                <li><a href="../cerrar_sesion.php">Cerrar Sesión</a></li>
                <?php }?>
            </ul>
        </nav>
    </header>  