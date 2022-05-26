<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!--style type="text/css"-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Rol</th>
      <th scope="col">Modificar</i></th><!--Historial-->
      <th scope="col">Eliminar</th><!--Eliminar-->
    </tr>
  </thead>
  <tbody>
  <h1>Roles</h1>
  <div class="d-flex flex-row-reverse">
        <form action="rol.php" method="get">
            <input class="input-group-text" style="display:inline-block;" type="text" name="busqueda">
            <input class="btn btn-outline-secondary" type="submit" name="buscar">
        </form>
    </div>
    <a href="rol.php?action=create" class="btn btn-success"><i class="fas fa-user-plus"></i> Agregar</a>
  <?php foreach($datos as $key => $rol):?>
    <tr>
      <th scope="row"><?=$rol['id_rol'] ?></th><!--id-->
      <td><?=$rol['rol'] ?></td><!--apaterno-->
      <td><a href="rol.php?action=show&id_rol=<?=$rol['id_rol'] ?>" class="btn btn-info"><i class="fa fa-arrow-up p-1 icons"></i>Modificar</a></td><!--modificar-->
      <td><a href="rol.php?action=delete&id_rol=<?=$rol['id_rol'] ?>" class="btn btn-danger"><i class="fa fa-trash p-1 icons"></i>Eliminar</a></td><!--eliminar-->

    </tr>
  <?php endforeach;?>
  </tbody>
  
</table>