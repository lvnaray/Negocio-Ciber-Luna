<h1>Agregar/actualizar soportes</h1>
<form action="soporte.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Descripcion del probelma</label>
    <input type="text" name="soporte[descripProblem]" value="<?php echo (isset($datos[0]['descripProblem']))?$datos[0]['descripProblem']:'';?>" class="form-control" id="descripProblem" placeholder="descripProblem" >
  
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Dia y hora preferido</label>
    <input type="text" name="soporte[diaYHoraPref]" value="<?php echo (isset($datos[0]['diaYHoraPref']))?$datos[0]['diaYHoraPref']:'';?>" class="form-control" id="diaYHoraPref" placeholder="diaYHoraPref">
  
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Cliente</label>
    <select name="soporte[id_cliente]" class="form-select">
      <?php 
      foreach($tipos5 as $key => $tipo):
        $selected='';
        if($tipo['id_cliente']== $datos[0]['id_cliente']){
          $selected=' selected';
        }
       ?>
      <option value="<?php echo($tipo['id_cliente']) ?>" <?php echo($selected); ?> ><?php echo($tipo['nombre']) ?></option>
      <?php endforeach; ?>
    </select>
    </div>

    <div class="form-group">
    <label for="exampleFormControlInput1">Status de soporte</label>
    <select name="soporte[id_statusSoporte]" class="form-select">
      <?php 
      foreach($tipos6 as $key => $tipo):
        $selected='';
        if($tipo['id_statusSoporte']== $datos[0]['id_statusSoporte']){
          $selected=' selected';
        }
       ?>
      <option value="<?php echo($tipo['id_statusSoporte']) ?>" <?php echo($selected); ?> ><?php echo($tipo['statusSoporte']) ?></option>
      <?php endforeach; ?>
    </select>
    </div>
    
  </div>
  <div class="form-group">
  <input type="hidden" name="soporte[id_soporte]" value="<?php echo (isset($datos[0]['id_soporte']))?$datos[0]['id_soporte']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>