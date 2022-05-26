<?php
    include('cliente.controller.php');
    $sistema = new Sistema;
    //$sistema->verificarRoles('Doctor');
    $clientes = new Cliente;
    //$action = (isset($_GET['action']))?$_GET['action']:'read';
    $action=$_SERVER['REQUEST_METHOD'];
   
    switch($action)
    {
        case 'DELETE':
            if(isset($_GET['id_cliente']))
            {
                $id_cliente=$_GET['id_cliente'];
                $datos=$clientes->deleteJson($id_cliente);
            }
            break;

            case 'POST':
                if(isset($_GET['id_cliente']))
                {
                    /*Update*/
                    $id_cliente=$_GET['id_cliente'];
                    //print_r($_GET);
                    $data = @file_get_contents('php://input');
                    //print_r($data);
                    $datos=$clientes->updateJson($data,$id_cliente);
                }
                else
                {
                    /*insert*/
                    $data = @file_get_contents('php://input');
                    $resultado=$clientes->insert($data);
                }
            break;

        case 'GET':
        default:
        if(isset($_GET['id_cliente'])){
            $id_cliente = $_GET['id_cliente'];
            $datos = $clientes->exportarOne($id_cliente);
        }else{
            $datos =$clientes->exportar();
        }

    
    }

?>