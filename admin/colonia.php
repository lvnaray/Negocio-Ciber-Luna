<?php
    include('colonia.controller.php');
    include_once('sistema.controller.php');
    $colonias= new Colonia;
    $sistema = new Sistema;
    $sistema -> verificarRoles('Administrador');
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/colonia/form.php');
            break;

        case 'save':
            $colonia=$_POST['colonia'];
            $resultado = $colonias->create($colonia['colonia']);
            $datos = $colonias->read();
            include('views/colonia/index.php');
            break;
        case 'delete':
            $id_colonia=$_GET['id_colonia'];
            $resultado = $colonias->delete($id_colonia);
            $datos = $colonias->read();
            include('views/colonia/index.php');
            break;
        case 'show':
            $id_colonia = $_GET['id_colonia'];
            $datos = $colonias->readOne($id_colonia);
            include('views/colonia/form.php');
            break;
        case 'update': 
            $colonia = $_POST['colonia'];
            $resultado = $colonias->update($colonia['id_colonia'],$colonia['colonia']);
            $datos = $colonias->read();
            include('views/colonia/index.php');
            break;
        default:
            $datos = $colonias->read();
            include('views/colonia/index.php');
            break;
    }
    include('views/footer.php');
?>