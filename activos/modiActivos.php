<div id="second">
  <h3>Ingrese el n&uacute;mero o serial del activo:</h3>
  <hr>
  <form name="consultaActivos" id="consultaActivos">

  <input class="form-control" list="activos" name="activos" id="conActivos" data-validation="alphanumeric" data-validation-allowing="-_" autocomplete=off>
  <datalist id="activos">
   <?php
     include "dbcon.php";

      foreach($dbcon->query("SELECT nro,serial FROM activo") as $row)
      {
          echo "<option value=".$row['nro'].">";
          echo "<option value=".$row['serial'].">";
      }
  ?>
  </datalist>
  <br>
  </form>
  
<button type="input" form="consultaActivos" class="btn btn-default center-block" type="submit" name="consulta">
  <span class="glyphicon glyphicon-search"></span> Buscar</button>
</div> 