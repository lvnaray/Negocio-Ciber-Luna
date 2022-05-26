<h1>Agregar/actualizar clientes</h1>
<form action="cliente.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" name="cliente[nombre]" value="<?php echo (isset($datos[0]['nombre']))?$datos[0]['nombre']:'';?>" class="form-control" id="nombre" placeholder="nombre" >

  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Apellido paterno</label>
    <input type="text" name="cliente[apaterno]" value="<?php echo (isset($datos[0]['apaterno']))?$datos[0]['apaterno']:'';?>" class="form-control" id="apaterno" placeholder="apaterno" >

  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Apellido materno</label>
    <input type="text" name="cliente[amaterno]" value="<?php echo (isset($datos[0]['amaterno']))?$datos[0]['amaterno']:'';?>" class="form-control" id="amaterno" placeholder="amaterno" >

  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nacimiento</label>
    <input type="text" name="cliente[nacimiento]" value="<?php echo (isset($datos[0]['nacimiento']))?$datos[0]['nacimiento']:'';?>" class="form-control" id="nacimiento" placeholder="nacimiento" >

  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Telefono</label>
    <input type="text" name="cliente[telefono]" value="<?php echo (isset($datos[0]['telefono']))?$datos[0]['telefono']:'';?>" class="form-control" id="telefono" placeholder="telefono" >

  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Calle</label>
    <input type="text" name="cliente[calle]" value="<?php echo (isset($datos[0]['calle']))?$datos[0]['calle']:'';?>" class="form-control" id="calle" placeholder="calle" >

  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">numero de vivienda</label>
    <input type="text" name="cliente[numeroVivienda]" value="<?php echo (isset($datos[0]['numeroVivienda']))?$datos[0]['numeroVivienda']:'';?>" class="form-control" id="numeroVivienda" placeholder="numeroVivienda" >

  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">descripcion de vivienda</label>
    <input type="text" name="cliente[descripcionVivienda]" value="<?php echo (isset($datos[0]['descripcionVivienda']))?$datos[0]['descripcionVivienda']:'';?>" class="form-control" id="descripcionVivienda" placeholder="descripcionVivienda" >

  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Fotografia</label>
    <input type="file" name="fotografia" class="form-control" id="fotografia" placeholder="fotografia">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Usuario</label>
    <select name="cliente[id_usuario]" class="form-select">
      <?php 
      foreach($tipos as $key => $tipo):
        $selected='';
        if($tipo['id_usuario']== $datos[0]['id_usuario']){
          $selected=' selected';
        }
       ?>
      <option value="<?php echo($tipo['id_usuario']) ?>" <?php echo($selected); ?> ><?php echo($tipo['correo']) ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  
    <div class="form-group">
    <label for="exampleFormControlInput1">Colonia</label>
    <select name="cliente[id_colonia]" class="form-select">
      <?php 
      foreach($colonias as $key => $colonia):
        $selected='';
        if($colonia['id_colonia']== $colonias[0]['id_colonia']){
          $selected=' selected';
        }
       ?>
      <option value="<?php echo($colonia['id_colonia']) ?>" <?php echo($selected); ?> ><?php echo($colonia['colonia']) ?></option>
      <?php endforeach; ?>
    </select>
    </div>

    <div class="form-group">
    <label for="exampleFormControlInput1">Plan</label>
    <select name="cliente[id_plan]" class="form-select">
      <?php 
      foreach($planes as $key => $plan):
        $selected='';
        if($plan['id_plan']== $datos[0]['id_plan']){
          $selected=' selected';
        }
       ?>
      <option value="<?php echo($plan['id_plan']) ?>" <?php echo($selected); ?> ><?php echo($plan['plan']) ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  
    
  </div>
  <div class="form-group">
  <input type="hidden" name="cliente[id_cliente]" value="<?php echo (isset($datos[0]['id_cliente']))?$datos[0]['id_cliente']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>