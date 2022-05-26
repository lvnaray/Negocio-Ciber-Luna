<?php
    include_once('cita.controller.php');
    include_once('statusCita.controller.php');
    include_once('cliente.controller.php');
    include_once('sistema.controller.php');
    $citas= new Cita;
    $status= new StatusCita;
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $clientes= new Cliente;
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    $tipos=$clientes->read();
    $tipos1=$status->read();
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/cita/form.php');
            break;

        case 'save':
            $cita=$_POST['cita'];
            $resultado = $citas->create($cita['diaYHoraPref'],$cita['id_cliente'],$cita['id_statusCita']);
            $datos = $citas->read();
            include('views/cita/index.php');
            break;
        case 'delete':
            $id_cita=$_GET['id_cita'];
            $resultado = $citas->delete($id_cita);
            $datos = $citas->read();
            include('views/cita/index.php');
            break;
        case 'show':
            $id_cita = $_GET['id_cita'];
            $datos = $citas->readOne($id_cita);
            include('views/cita/form.php');
            break;
        case 'update': 
            $cita = $_POST['cita'];
            $resultado = $citas->update($cita['id_cita'],$cita['diaYHoraPref'],$cita['id_cliente'],
            $cita['id_statusCita']);
            $datos = $citas->read();
            include('views/cita/index.php');
            break;
        default:
            $datos = $citas->read();
            include('views/cita/index.php');
            break;
    }
    include('views/footer.php');
?>