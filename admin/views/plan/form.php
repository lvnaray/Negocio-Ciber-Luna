<h1>Agregar/actualizar planes</h1>
<form action="plan.php?action=<?php echo(isset($datos))? 'update': 'save';?>" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Plan</label>
    <input type="text" name="plan[plan]" value="<?php echo (isset($datos[0]['plan']))?$datos[0]['plan']:'';?>" class="form-control" id="plan" placeholder="plan" >
  
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Precio</label>
    <input type="text" name="plan[precio]" value="<?php echo (isset($datos[0]['precio']))?$datos[0]['precio']:'';?>" class="form-control" id="precio" placeholder="precio">
  
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Referencias</label>
    <input type="text" name="plan[referencias]" value="<?php echo (isset($datos[0]['referencias']))?$datos[0]['referencias']:'';?>" class="form-control" id="referencias" placeholder="referencias">
  
  </div>
    
  </div>
  <div class="form-group">
  <input type="hidden" name="plan[id_plan]" value="<?php echo (isset($datos[0]['id_plan']))?$datos[0]['id_plan']:'';?>">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-success" />
  </div>