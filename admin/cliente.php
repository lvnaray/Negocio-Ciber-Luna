<?php
    include('cliente.controller.php');
    include_once('usuario.controller.php');
    include_once('colonia.controller.php');
    include_once('plan.controller.php');
    include_once('sistema.controller.php');

    $clientes= new Cliente;
    $usuario= new Usuario;
    $colonia= new Colonia;
    $plan= new Plan;
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $action = (isset($_GET['action']))?$_GET['action']:'read';

    $tipos=$usuario->read2();
    $colonias=$colonia->read();
    $planes=$plan->read();
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/cliente/form.php');
            break;

        case 'save':
            $cliente=$_POST['cliente'];
            $resultado = $clientes->create($cliente['nombre'],$cliente['apaterno'],$cliente['amaterno'],$cliente['nacimiento'],
            $cliente['telefono'],$cliente['calle'],$cliente['numeroVivienda'],$cliente['descripcionVivienda'],$cliente['id_usuario'],$cliente['id_colonia'],$cliente['id_plan']);
            $datos = $clientes->read();
            include('views/cliente/index.php');
            break;
        case 'delete':
            $id_cliente=$_GET['id_cliente'];
            $resultado = $clientes->delete($id_cliente);
            $datos = $clientes->read();
            include('views/cliente/index.php');
            break;
        case 'show':
            $id_cliente = $_GET['id_cliente'];
            $datos = $clientes->readOne($id_cliente);
            include('views/cliente/form.php');
            break;
        case 'update': 
            $cliente = $_POST['cliente'];
            $resultado = $clientes->update($cliente['id_cliente'],$cliente['nombre'],$cliente['apaterno'],$cliente['amaterno'],$cliente['nacimiento'],
            $cliente['telefono'],$cliente['calle'],$cliente['numeroVivienda'],$cliente['descripcionVivienda'],$cliente['id_usuario'],$cliente['id_colonia'],$cliente['id_plan']);
            $datos = $clientes->read();
            include('views/cliente/index.php');
            break;
        default:
            $datos = $clientes->read();
            include('views/cliente/index.php');
            break;
    }
    include('views/footer.php');
?>