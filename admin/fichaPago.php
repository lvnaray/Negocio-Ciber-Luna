<?php
    include_once('fichaPago.controller.php');
    include_once('cliente.controller.php');
    include_once('sistema.controller.php');
    $fichasPago= new FichaPago;
    $clientes= new Cliente;
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    $tipos3= $clientes->read();
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/fichaPago/form.php');
            break;

        case 'save':
            $fichapago=$_POST['fichapago'];
            $resultado = $fichasPago->create($fichapago['fechaLimite'],$fichapago['id_cliente']);
            $datos = $fichasPago->read();
            include('views/fichaPago/index.php');
            break;
        case 'delete':
            $id_fichaPago=$_GET['id_fichaPago'];
            $resultado = $fichasPago->delete($id_fichaPago);
            $datos = $fichasPago->read();
            include('views/fichaPago/index.php');
            break;
        case 'show':
            $id_fichaPago = $_GET['id_fichaPago'];
            $datos = $fichasPago->readOne($id_fichaPago);
            include('views/fichaPago/form.php');
            break;
        case 'update': 
            $fichapago = $_POST['fichapago'];
            $resultado = $fichasPago->update($fichapago['id_fichaPago'],$fichapago['fechaLimite'],
            $fichapago['id_cliente']);
            $datos = $fichasPago->read();
            include('views/fichaPago/index.php');
            break;
        default:
            $datos = $fichasPago->read();
            include('views/fichaPago/index.php');
            break;
    }
    include('views/footer.php');