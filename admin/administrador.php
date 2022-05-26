<?php
    include_once('administrador.controller.php');
    include_once('usuario.controller.php');
    $administradores= new Administrador;
    $usuarios = new Usuario;
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    $tipos7= $usuarios->read();
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/administrador/form.php');
            break;

        case 'save':
            $administrador=$_POST['administrador'];
            $resultado = $administradores->create($administrador['id_usuario']);
            $datos = $administradores->read();
            include('views/administrador/index.php');
            break;
        case 'delete':
            $id_usuario=$_GET['id_usuario'];
            $resultado = $administradores->delete($id_usuario);
            $datos = $administradores->read();
            include('views/administrador/index.php');
            break;
        case 'show':
            $id_usuario = $_GET['id_usuario'];
            $datos = $administradores->readOne($id_usuario);
            include('views/administrador/form.php');
            break;
        case 'update': 
            $administrador = $_POST['id_usuario'];
            $resultado = $administradores->update($administrador['id_usuario']);
            $datos = $administradores->read();
            include('views/administrador/index.php');
            break;
        default:
            $datos = $administradores->read();
            include('views/administrador/index.php');
            break;
    }
    include('views/footer.php');