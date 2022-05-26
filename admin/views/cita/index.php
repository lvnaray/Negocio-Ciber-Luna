<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!--style type="text/css"-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Dia y Hora Preferido</th>
      <th scope="col">Cliente</th>
      <th scope="col">Status de cita</th>
      <th scope="col">Modificar</i></th><!--Historial-->
      <th scope="col">Eliminar</th><!--Eliminar-->
    </tr>
  </thead>
  <tbody>
  <h1>Citas</h1>
  <div class="d-flex flex-row-reverse">
        <form action="cita.php" method="get">
            <input class="input-group-text" style="display:inline-block;" type="text" name="busqueda">
            <input class="btn btn-outline-secondary" type="submit" name="buscar">
        </form>
    </div>
    <a href="cita.php?action=create" class="btn btn-success"><i class="fas fa-user-plus"></i> Agregar</a>
  <?php foreach($datos as $key => $cita):?>
    <tr>
      <th scope="row"><?=$cita['id_cita'] ?></th><!--id-->
      <td><?=$cita['diaYHoraPref'] ?></td><!--apaterno-->
      <td><?=$cita['nombre'] ?></td><!--apaterno-->
      <td><?=$cita['statusCita'] ?></td><!--apaterno-->
      <td><a href="cita.php?action=show&id_cita=<?=$cita['id_cita'] ?>" class="btn btn-info"><i class="fa fa-arrow-up p-1 icons"></i>Modificar</a></td><!--modificar-->
      <td><a href="cita.php?action=delete&id_cita=<?=$cita['id_cita'] ?>" class="btn btn-danger"><i class="fa fa-trash p-1 icons"></i>Eliminar</a></td><!--eliminar-->

    </tr>
  <?php endforeach;?>
  </tbody>
  
</table>