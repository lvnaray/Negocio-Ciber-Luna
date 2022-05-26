<?php
    include_once('statusCita.controller.php');
    include_once('sistema.controller.php');
    $statusCitas= new StatusCita;
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/statusCita/form.php');
            break;

        case 'save':
            $statusCita=$_POST['statuscita'];
            $resultado = $statusCitas->create($statusCita['statusCita']);
            $datos = $statusCitas->read();
            include('views/statusCita/index.php');
            break;
        case 'delete':
            $id_statusCita=$_GET['id_statusCita'];
            $resultado = $statusCitas->delete($id_statusCita);
            $datos = $statusCitas->read();
            include('views/statusCita/index.php');
            break;
        case 'show':
            $id_statusCita = $_GET['id_statusCita'];
            $datos = $statusCitas->readOne($id_statusCita);
            include('views/statusCita/form.php');
            break;
        case 'update': 
            $statusCita = $_POST['statuscita'];
            $resultado = $statusCitas->update($statusCita['id_statusCita'],$statusCita['statusCita']);
            $datos = $statusCitas->read();
            include('views/statusCita/index.php');
            break;
        default:
            $datos = $statusCitas->read();
            include('views/statusCita/index.php');
            break;
    }
    include('views/footer.php');