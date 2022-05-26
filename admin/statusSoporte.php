<?php
    include_once('statusSoporte.controller.php');
    include_once('sistema.controller.php');
    $statusSoportes= new StatusSoporte;
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/statusSoporte/form.php');
            break;

        case 'save':
            $statusSoporte=$_POST['statussoporte'];
            $resultado = $statusSoportes->create($statusSoporte['statusSoporte']);
            $datos = $statusSoportes->read();
            include('views/statusSoporte/index.php');
            break;
        case 'delete':
            $id_statusSoporte=$_GET['id_statusSoporte'];
            $resultado = $statusSoportes->delete($id_statusSoporte);
            $datos = $statusSoportes->read();
            include('views/statusSoporte/index.php');
            break;
        case 'show':
            $id_statusSoporte = $_GET['id_statusSoporte'];
            $datos = $statusSoportes->readOne($id_statusSoporte);
            include('views/statusSoporte/form.php');
            break;
        case 'update': 
            $statusSoporte=$_POST['statussoporte'];
            $resultado = $statusSoportes->update($statusSoporte['id_statusSoporte'],$statusSoporte['statusSoporte']);
            $datos = $statusSoportes->read();
            include('views/statusSoporte/index.php');
            break;
        default:
            $datos = $statusSoportes->read();
            include('views/statusSoporte/index.php');
            break;
    }
    include('views/footer.php');