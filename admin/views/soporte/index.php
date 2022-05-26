<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!--style type="text/css"-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Descripcion problema</th>
      <th scope="col">Dia y hora Preferido</th>
      <th scope="col">Cliente</th>
      <th scope="col">Status de soporte</th>
      <th scope="col">Modificar</i></th><!--Historial-->
      <th scope="col">Eliminar</th><!--Eliminar-->
    </tr>
  </thead>
  <tbody>
  <h1>Soportes</h1>
  <div class="d-flex flex-row-reverse">
        <form action="soporte.php" method="get">
            <input class="input-group-text" style="display:inline-block;" type="text" name="busqueda">
            <input class="btn btn-outline-secondary" type="submit" name="buscar">
        </form>
    </div>
    <a href="soporte.php?action=create" class="btn btn-success"><i class="fas fa-user-plus"></i> Agregar</a>
  <?php foreach($datos as $key => $soporte):?>
    <tr>
      <th scope="row"><?=$soporte['id_soporte'] ?></th><!--id-->
      <td><?=$soporte['descripProblem'] ?></td><!--nombre-->
      <td><?=$soporte['diaYHoraPref'] ?></td><!--apaterno-->
      <td><?=$soporte['nombre'] ?></td><!--apaterno-->
      <td><?=$soporte['id_statusSoporte'] ?></td><!--apaterno-->
      <td><a href="soporte.php?action=show&id_soporte=<?=$soporte['id_soporte'] ?>" class="btn btn-info"><i class="fa fa-arrow-up p-1 icons"></i>Modificar</a></td><!--modificar-->
      <td><a href="soporte.php?action=delete&id_soporte=<?=$soporte['id_soporte'] ?>" class="btn btn-danger"><i class="fa fa-trash p-1 icons"></i>Eliminar</a></td><!--eliminar-->

    </tr>
  <?php endforeach;?>
  </tbody>
  
</table>