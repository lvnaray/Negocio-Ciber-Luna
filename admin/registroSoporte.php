<?php
    include_once('registroSoporte.controller.php');
    include_once('cliente.controller.php');
    include_once('statusSoporte.controller.php');
    include_once('sistema.controller.php');
    $sistema= new Sistema;
    $soportes= new Soporte;
    $clientes= new Cliente;
    $status= new StatusSoporte;
    $sistema ->verificarSesion();
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    $tipos5= $clientes->read();
    $tipos6 = $status->read();
    switch($action)
    {
        case 'create':
            include('views/registroSoporte/form.php');
            break;

        case 'save':
            $soporte=$_POST['soporte'];
            $resultado = $soportes->create($soporte['descripProblem'],$soporte['diaYHoraPref']);
            $datos = $soportes->read();
            include('soporte_cliente.php');
            break;
        case 'delete':
            $id_soporte=$_GET['id_soporte'];
            $resultado = $soportes->delete($id_soporte);
            $datos = $soportes->read();
            include('views/soporte/index.php');
            break;
        case 'show':
            $id_soporte = $_GET['id_soporte'];
            $datos = $soportes->readOne($id_soporte);
            include('views/soporte/form.php');
            break;
        case 'update': 
            $soporte = $_POST['soporte'];
            $resultado = $soportes->update($soporte['id_soporte'],$soporte['descripProblem'],$soporte['diaYHoraPref'],
            $soporte['id_cliente'],$soporte['id_statusSoporte']);
            $datos = $soportes->read();
            include('views/soporte/index.php');
            break;
        default:
            $datos = $soportes->read();
            include('views/soporte/index.php');
            break;
    }
    include('views/footer.php');
?>