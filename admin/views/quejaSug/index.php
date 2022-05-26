<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!--style type="text/css"-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">correo</th>
      <th scope="col">comentario</th>
      <th scope="col">Modificar</i></th><!--Historial-->
      <th scope="col">Eliminar</th><!--Eliminar-->
    </tr>
  </thead>
  <tbody>
 
  <div class="d-flex flex-row-reverse">
        <form action="quejaSug.php" method="get">
            <input class="input-group-text" style="display:inline-block;" type="text" name="busqueda">
            <input class="btn btn-outline-secondary" type="submit" name="buscar">
        </form>
    </div>
    <a href="quejaSug.php?action=create" class="btn btn-success"><i class="fas fa-user-plus"></i> Agregar</a>
  <?php foreach($datos as $key => $quejaSug):?>
    <tr>
      <th scope="row"><?=$quejaSug['id_quejaSu'] ?></th><!--id-->
      <td><?=$quejaSug['correo'] ?></td><!--nombre-->
      <td><?=$quejaSug['comentario'] ?></td><!--apaterno-->
      <td><a href="quejaSug.php?action=show&id_quejaSu=<?=$quejaSug['id_quejaSu'] ?>" class="btn btn-info"><i class="fa fa-arrow-up p-1 icons"></i>Modificar</a></td><!--modificar-->
      <td><a href="quejaSug.php?action=delete&id_quejaSu=<?=$quejaSug['id_quejaSu'] ?>" class="btn btn-danger"><i class="fa fa-trash p-1 icons"></i>Eliminar</a></td><!--eliminar-->

    </tr>
  <?php endforeach;?>
  </tbody>
  
</table>