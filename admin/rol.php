<?php
    include_once('rol.controller.php');
    include_once('sistema.controller.php');
    $roles= new Rol;
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/rol/form.php');
            break;

        case 'save':
            $rol=$_POST['rol'];
            $resultado = $roles->create($rol['rol']);
            $datos = $roles->read();
            include('views/rol/index.php');
            break;
        case 'delete':
            $id_rol=$_GET['id_rol'];
            $resultado = $roles->delete($id_rol);
            $datos = $roles->read();
            include('views/rol/index.php');
            break;
        case 'show':
            $id_rol = $_GET['id_rol'];
            $datos = $roles->readOne($id_rol);
            include('views/rol/form.php');
            break;
        case 'update': 
            $rol = $_POST['rol'];
            $resultado = $roles->update($rol['id_rol'],$rol['rol']);
            $datos = $roles->read();
            include('views/rol/index.php');
            break;
        default:
            $datos = $roles->read();
            include('views/rol/index.php');
            break;
    }
    include('views/footer.php');