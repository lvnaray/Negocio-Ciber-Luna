<?php
    include('plan.controller.php');
    include_once('sistema.controller.php');
    $planes= new Plan;
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/plan/form.php');
            break;

        case 'save':
            $plan=$_POST['plan'];
            $resultado = $planes->create($plan['plan'],$plan['precio'],$plan['referencias']);
            $datos = $planes->read();
            include('views/plan/index.php');
            break;
        case 'delete':
            $id_plan=$_GET['id_plan'];
            $resultado = $planes->delete($id_plan);
            $datos = $planes->read();
            include('views/plan/index.php');
            break;
        case 'show':
            $id_plan = $_GET['id_plan'];
            $datos = $planes->readOne($id_plan);
            include('views/plan/form.php');
            break;
        case 'update': 
            $plan = $_POST['plan'];
            $resultado = $planes->update($plan['id_plan'],$plan['plan'],$plan['precio'],$plan['referencias']);
            $datos = $planes->read();
            include('views/plan/index.php');
            break;
        default:
            $datos = $planes->read();
            include('views/plan/index.php');
            break;
    }
    include('views/footer.php');
?>