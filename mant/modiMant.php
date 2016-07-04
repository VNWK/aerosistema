<div id="second">
  <h3>Ingrese el n&uacute;mero de ticket de mantenimiento:</h3>
  <hr>
  <form name="consultaMant" id="consultaMant">

  <input class="form-control" list="tickets2" name="ticket2" id="ticket2" data-validation="alphanumeric" data-validation-allowing="-_" autocomplete=off>
  <datalist id="tickets2">
   <?php
     // include "dbcon.php";

      foreach($dbcon->query("SELECT id FROM mantenimiento") as $row)
      {
          echo "<option value=".$row['id'].">";
      }
   ?>
  </datalist>
  <br>
  </form>
<button type="input" form="consultaMant" class="btn btn-default center-block" type="submit" name="consulta">
  <span class="glyphicon glyphicon-search"></span> Buscar</button>
</div> 