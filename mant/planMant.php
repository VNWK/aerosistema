<div id="first">
    <form id="planMant" method="POST">
    
      <h3>Datos del mantenimiento</h3>
    <img id="divider" src="img/divider.png "/>
      <input class="form-control" list="activos_3" name="activos3" id="activos3" autocomplete="on" placeholder="Serial o N&uacute;mero de Activo" data-validation="alphanumeric" data-validation-allowing="-_">
      <datalist id="activos_3">
        <?php

        foreach($dbcon->query("SELECT nro,serial FROM activo") as $row)
        {
            echo "<option value=".$row['nro'].">";
            echo "<option value=".$row['serial'].">";
        }
        ?>
      </datalist>
      <img id="divider" src="img/divider.png" >
      <textarea class="form-control" id="desc_mant" name="desc_mant" placeholder="Descripci&oacute;n del Mantenimiento" data-validation="required"></textarea>
      <img id="divider" src="img/divider.png" />

      <select class="form-control" id="prioridad" name="prioridad">
        <option value="2">Normal</option>
        <option value="1">Baja</option>
        <option value="3">Alta</option>
        <option value="4">Urgente</option>
      </select>

      <img id="divider" src="img/divider.png "/>

      <div class="text-center2">
      <input class="btn btn-info" type="submit" id="enviar" value="Planificar" />
  <input class="btn btn-danger" type="reset" id="reset" value="Limpiar" />
      </div>
</form>
</div>