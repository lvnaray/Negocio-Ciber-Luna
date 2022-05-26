<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!--style type="text/css"-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Plan</th>
      <th scope="col">Precio</th>
      <th scope="col">Referencias</th>
      <th scope="col">Modificar</i></th><!--Historial-->
      <th scope="col">Eliminar</th><!--Eliminar-->
    </tr>
  </thead>
  <tbody>
  <h1>Planes</h1>
  <div class="d-flex flex-row-reverse">
        <form action="plan.php" method="get">
            <input class="input-group-text" style="display:inline-block;" type="text" name="busqueda">
            <input class="btn btn-outline-secondary" type="submit" name="buscar">
        </form>
    </div>
    <a href="plan.php?action=create" class="btn btn-success"><i class="fas fa-user-plus"></i> Agregar</a>
  <?php foreach($datos as $key => $plan):?>
    <tr>
      <th scope="row"><?=$plan['id_plan'] ?></th><!--id-->
      <td><?=$plan['plan'] ?></td><!--nombre-->
      <td><?=$plan['precio'] ?></td><!--apaterno-->
      <td><?=$plan['referencias'] ?></td><!--apaterno-->
      <td><a href="plan.php?action=show&id_plan=<?=$plan['id_plan'] ?>" class="btn btn-info"><i class="fa fa-arrow-up p-1 icons"></i>Modificar</a></td><!--modificar-->
      <td><a href="plan.php?action=delete&id_plan=<?=$plan['id_plan'] ?>" class="btn btn-danger"><i class="fa fa-trash p-1 icons"></i>Eliminar</a></td><!--eliminar-->

    </tr>
  <?php endforeach;?>
  </tbody>
  
</table>