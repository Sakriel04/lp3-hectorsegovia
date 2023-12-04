<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
    $password = (isset($_POST['password'])) ? $_POST['password'] : null;

    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
    require_once(CONTROLLER_PATH.'usuarioController.php');
    $object = new usuarioController();
    $resultado = $object->search($usuario);
    
    if ( $resultado ) {
        $data = $resultado;
        $id_user = $resultado['id_user'];        
        $usuario = $resultado['alias'];
        $hash = $resultado['password'];
        $nombre = $resultado['nombre'];
        $apellido = $resultado['apellido'];

        if (password_verify($password, $hash)) {
            $_SESSION["id_user"] = $id_user;
            $_SESSION["usuario"] = $usuario; 
            $_SESSION["nombre"] = $nombre; 
            $_SESSION["apellido"] = $apellido;  
        } else {
            $_SESSION["id_user"] = null;
            $_SESSION["usuario"] = null;
            $_SESSION["nombre"] = null; 
            $_SESSION["apellido"] = null; 
            $data = null;
        }
    } else {
        $_SESSION["id_user"] = null;
        $_SESSION["usuario"] = null;
        $_SESSION["nombre"] = null; 
        $_SESSION["apellido"] = null; 
        $data = null;
    }
    print json_encode($data);
    exit();
?>