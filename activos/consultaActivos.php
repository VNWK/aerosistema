<div id="third">
  <div class="form-label">
  <label>Ver listado de Activos:</label>
  </div>
  <div class="form-group">
  <select class="form-control" name="selectActivos" id="selectActivos">
  <option value="I">Incorporados</option>
  <option value="D">Desincorporados</option>
  </select>
  <br>
  <button class="btn btn-default center-block" id="buscarActivos" name="buscarActivos"><span class="glyphicon glyphicon-search"></span> Listado</button>
  </div>

  <div class="form-label">
  <label>O Ingrese el n&uacute;mero o serial del activo:</label>
  </div>
  <div class="form-group">
  <form name="consultaActivos2" id="consultaActivos2">  
  <input class="form-control" list="activos" name="activos" id="consultaActivos" data-validation="alphanumeric" data-validation-allowing="-_" autocomplete=off>
  <datalist id="activos">
   <?php
     
      foreach($dbcon->query("SELECT nro,serial FROM activo") as $row)
      {
          echo "<option value=".$row['nro'].">";
          echo "<option value=".$row['serial'].">";
      }
  ?>
  </datalist>
  <br>
  </form>
  <button type="input" form="consultaActivos2" class="btn btn-default center-block" type="submit" name="consulta">
  <span class="glyphicon glyphicon-search"></span> Consultar</button>
  </div>

</div>