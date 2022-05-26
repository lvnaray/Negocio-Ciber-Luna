<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!--style type="text/css"-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Foto de perfil</th>
      <th scope="col">nombre</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">Nacimiento</th>
      <th scope="col">Telefono</th>
      <th scope="col">Calle</th>
      <th scope="col">Numero de vivienda</th>
      <th scope="col">Descripcion de vivienda</th>
      <th scope="col">id_usuario</th>
      <th scope="col">id_colonia</th>
      <th scope="col">id_plan</th>
      <th scope="col">Modificar</i></th><!--Historial-->
      <th scope="col">Eliminar</th><!--Eliminar-->
    </tr>
  </thead>
  <tbody>
  <h1>Clientes</h1>
  <div class="d-flex flex-row-reverse">
        <form action="cliente.php" method="get">
            <input class="input-group-text" style="display:inline-block;" type="text" name="busqueda">
            <input class="btn btn-outline-secondary" type="submit" name="buscar">
        </form>
    </div>
    <a href="cliente.php?action=create" class="btn btn-success"><i class="fas fa-user-plus"></i> Agregar</a>
  <?php foreach($datos as $key => $cliente):?>
    <tr>
      <th scope="row"><?=$cliente['id_cliente'] ?></th><!--id-->
      <td><img src="<?php echo (isset($cliente['fotografia']))? 'archivos/'.$cliente['fotografia']: 'archivos/default.jpg'; ?>" alt="foto cliente" class="rounded-circle img-fluid" width="100px"></td>
      <td><?=$cliente['nombre'] ?></td><!--nombre-->
      <td><?=$cliente['apaterno'] ?></td><!--apaterno-->
      <td><?=$cliente['amaterno'] ?></td><!--apaterno-->
      <td><?=$cliente['nacimiento'] ?></td><!--apaterno-->
      <td><?=$cliente['telefono'] ?></td><!--apaterno-->
      <td><?=$cliente['calle'] ?></td><!--apaterno-->
      <td><?=$cliente['numeroVivienda'] ?></td><!--apaterno-->
      <td><?=$cliente['descripcionVivienda'] ?></td><!--apaterno-->
      <td><?=$cliente['correo'] ?></td><!--apaterno-->
      <td><?=$cliente['colonia'] ?></td><!--apaterno-->
      <td><?=$cliente['plan'] ?></td><!--apaterno-->
      <td><a href="cliente.php?action=show&id_cliente=<?=$cliente['id_cliente'] ?>" class="btn btn-info"><i class="fa fa-arrow-up p-1 icons"></i>Modificar</a></td><!--modificar-->
      <td><a href="cliente.php?action=delete&id_cliente=<?=$cliente['id_cliente'] ?>" class="btn btn-danger"><i class="fa fa-trash p-1 icons"></i>Eliminar</a></td><!--eliminar-->

    </tr>
  <?php endforeach;?>
  </tbody>
  
</table>