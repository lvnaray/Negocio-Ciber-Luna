<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!--style type="text/css"-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Fecha limite</th>
      <th scope="col">Cliente</th>
      <th scope="col">Modificar</i></th><!--Historial-->
      <th scope="col">Eliminar</th><!--Eliminar-->
    </tr>
  </thead>
  <tbody>
  <h1>Fichas de pago</h1>
  <div class="d-flex flex-row-reverse">
        <form action="fichaPago.php" method="get">
            <input class="input-group-text" style="display:inline-block;" type="text" name="busqueda">
            <input class="btn btn-outline-secondary" type="submit" name="buscar">
        </form>
    </div>
    <a href="fichaPago.php?action=create" class="btn btn-success"><i class="fas fa-user-plus"></i>Agregar</a>
  <?php foreach($datos as $key => $fichaPago):?>
    <tr>
      <th scope="row"><?=$fichaPago['id_fichaPago'] ?></th><!--id-->
      <td><?=$fichaPago['fechaLimite'] ?></td><!--apaterno-->
      <td><?=$fichaPago['nombre'] ?></td><!--apaterno-->
      <td><a href="fichaPago.php?action=show&id_fichaPago=<?=$fichaPago['id_fichaPago'] ?>" class="btn btn-info"><i class="fa fa-arrow-up p-1 icons"></i>Modificar</a></td><!--modificar-->
      <td><a href="fichaPago.php?action=delete&id_fichaPago=<?=$fichaPago['id_fichaPago'] ?>" class="btn btn-danger"><i class="fa fa-trash p-1 icons"></i>Eliminar</a></td><!--eliminar-->

    </tr>
  <?php endforeach;?>
  </tbody>
  
</table>