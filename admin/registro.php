<?php
    include('registro.controller.php');
    include_once('colonia.controller.php');
    include_once('plan.controller.php');
    
    $clientes= new Registro;
    $colonia= new Colonia;
    $plan= new Plan;
    $action = (isset($_GET['action']))?$_GET['action']:'read';

    $colonias=$colonia->read();
    $planes=$plan->read();
    switch($action)
    {
        case 'create':
            include('views/registro/form.php');
            break;

        case 'save':
            $cliente=$_POST['cliente'];
            $resultado = $clientes->create($cliente['nombre'],$cliente['apaterno'],$cliente['amaterno'],$cliente['nacimiento'],
            $cliente['telefono'],$cliente['calle'],$cliente['numeroVivienda'],$cliente['descripcionVivienda'],$cliente['diaYHoraPref'],$cliente['correo'],$cliente['contrasena'],$cliente['id_colonia'],$cliente['id_plan']);
            $datos = $clientes->read();
            include('cita_cliente.php');
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
        default:
            $datos = $clientes->read();
            include('views/cliente/index.php');
            break;
    }
    include('views/footer.php');
?>