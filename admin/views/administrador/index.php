<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!--style type="text/css"-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">usuario</th>
      <th scope="col">Modificar</i></th><!--Historial-->
      <th scope="col">Eliminar</th><!--Eliminar-->
    </tr>
  </thead>
  <tbody>
 
  <div class="d-flex flex-row-reverse">
        <form action="administrador.php" method="get">
            <input class="input-group-text" style="display:inline-block;" type="text" name="busqueda">
            <input class="btn btn-outline-secondary" type="submit" name="buscar">
        </form>
    </div>
    <a href="administrador.php?action=create" class="btn btn-success">Agregar</a>
  <?php foreach($datos as $key => $administrador):?>
    <tr>
      <th scope="row"><?=$administrador['id_usuario'] ?></th><!--id-->
      <td><a href="administrador.php?action=show&id_usuario=<?=$statusCita['id_statusCita'] ?>" class="btn btn-info">Modificar</a></td><!--modificar-->
      <td><a href="administrador.php?action=delete&id_usuario=<?=$statusCita['id_statusCita'] ?>" class="btn btn-danger">Eliminar</a></td><!--eliminar-->

    </tr>
  <?php endforeach;?>
  </tbody>
  
</table>