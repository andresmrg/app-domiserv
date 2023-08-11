<!DOCTYPE html>
<html lang="es">
<head>

    <title><?php echo COMPANY; ?></title>
    <link rel="shortcut icon" href="<?php echo SERVERURL; ?>vistas/assets/img/logomio.ico" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/main.css">

    <?php
        $peticionAjax=false;
        require_once "./controladores/vistasControlador.php";
        $vt = new vistasControlador();

        $vistasR=$vt->obtener_vistas_controlador();

        if($vistasR=="login"){

        }else{ ?>

    <?php
        }
    ?>

    <!--===== Scripts -->
    <?php include "./vistas/modulos/script.php"; ?>
</head>
<body>


<?php
    /*require_once "./vistas/contenidos/404-view.php";
    exit;*/
$peticionAjax=false;
require_once "./controladores/vistasControlador.php";
$vt = new vistasControlador();

$vistasR=$vt->obtener_vistas_controlador();

if($vistasR=="login" || $vistasR=="404" || $vistasR == "pubhome"){
    if($vistasR=="login"){
        //include "./vistas/modulos/navprincipal.php";
        require_once "./vistas/contenidos/login-view.php";
    }else{
        if($vistasR == "pubhome"){
            include "./vistas/modulos/navprincipal.php";
            require_once "./vistas/contenidos/pubhome-view.php";
        }else{
            require_once "./vistas/contenidos/404-view.php";
        }
    }


}else{

    session_start(['name'=>'DSA']);
    if ($_SESSION['sesionactiva'] == true){
        require_once "./controladores/loginControlador.php";
        $lc = new loginControlador();
        if(!isset($_SESSION['token_dsa']) || !isset($_SESSION['usuario_dsa'])){
            //echo $lc->forzar_cierre_sesion_controlador();
        }


        ?>
        <!-- SideBar -->
        <?php include "./vistas/modulos/navlateral.php"; ?>

        <!-- Content formularios modales-->



        <?php
        if(isset($_GET['views'])){
            $ruta=explode("/", $_GET['views']);


            //muestra modales de los modulos
            if($ruta[0] == "tareas"){
                $peticionAjax=false;
                require_once "./controladores/proyectoControlador.php";
                $Vm = new proyectoControlador();
                $vistaM = $Vm->obtener_modales_proyecto_controlador();
            }
            if($ruta[0] == "companylist"){
                $peticionAjax=false;
                require_once "./controladores/empresaControlador.php";
                $Vm = new empresaControlador();
                $vistaM = $Vm->obtener_modales_empresa_controlador();
            }
            if($ruta[0] == "companyslist"){
                $peticionAjax=false;
                require_once "./controladores/companiaControlador.php";
                $Vm = new companiaControlador();
                $vistaM = $Vm->obtener_modales_compania_controlador();
            }
            if($ruta[0] == "cdrlist"){
                $peticionAjax=false;
                require_once "./controladores/cdrControlador.php";
                $Vm = new cdrControlador();
                $vistaM = $Vm->obtener_modales_cdr_controlador();
            }
            if($ruta[0] == "adminlist"){
                $peticionAjax=false;
                require_once "./controladores/administradorControlador.php";
                $Vm = new administradroControlador();
                $vistaM = $Vm->obtener_modales_administrador_controlador();
            }
            if($ruta[0] == "clientlist"){
                $peticionAjax=false;
                require_once "./controladores/clienteControlador.php";
                $Vm = new clienteControlador();
                $vistaM = $Vm->obtener_modales_cliente_controlador();
            }
            if($ruta[0] == "guialist"){
                $peticionAjax=false;
                require_once "./controladores/guiaControlador.php";
                $Vm = new guiaControlador();
                $vistaM = $Vm->obtener_modales_guia_controlador();
            }


            //muestra modales genarales
            $peticionAjax=false;
            require_once "./controladores/generalControlador.php";
            $Vm = new generalControlador();
            $vistaM = $Vm->obtener_modales_general_controlador();
        }
        ?>

        <!-- Content page-->


        <section class="full-box dashboard-contentPage">
        <!-- NavBar -->
        <?php include "./vistas/modulos/navbar.php"; ?>

        <!-- Content page -->
        <?php require_once $vistasR;
        ?>

        </section>
        <?php
            include "./vistas/modulos/logoutScript.php";
    }else{
        session_start(['name'=>'DSA']);
        session_destroy();
        echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
    }

}
?>
    <script>
    $.material.init();
</script>

</body>

</html>