<?php
    include('quejaSug.controller.php');
    $quejasugs= new QuejaSug;
    $sistema -> verificarRoles('Administrador');
    $action = (isset($_GET['action']))?$_GET['action']:'read';
    include('views/header.php');
    switch($action)
    {
        case 'create':
            include('views/quejaSug/form.php');
            break;

        case 'save':
            $quejaSug=$_POST['quejasug'];
            $resultado = $quejasugs->create($quejaSug['correo'],$quejaSug['comentario']);
            $datos = $quejasugs->read();
            include('views/quejaSug/index.php');
            break;
        case 'delete':
            $id_quejaSu=$_GET['id_quejaSu'];
            $resultado = $quejasugs->delete($id_quejaSu);
            $datos = $quejasugs->read();
            include('views/quejaSug/index.php');
            break;
        case 'show':
            $id_quejaSu = $_GET['id_quejaSu'];
            $datos = $quejasugs->readOne($id_quejaSu);
            include('views/quejaSug/form.php');
            break;
        case 'update': 
            $quejaSug = $_POST['quejasug'];
            $resultado = $quejasugs->update($quejaSug['id_quejaSu'],$quejaSug['correo'],$quejaSug['comentario']);
            $datos = $quejasugs->read();
            include('views/quejaSug/index.php');
            break;
        default:
            $datos = $quejasugs->read();
            include('views/quejaSug/index.php');
            break;
    }
    include('views/footer.php');
?>