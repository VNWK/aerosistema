<div id="third">
<form id="finish_mant">
<h3>Datos del mantenimiento</h3>
<img id="divider" src="img/divider.png "/>
<input class="form-control" list="ids" name="ticket" id="ticket" autocomplete="off" placeholder="Ticket" data-validation="alphanumeric" data-validation-allowing="-_" required>
<datalist id="ids">
  <?php
  foreach($dbcon->query("SELECT id FROM mantenimiento") as $row2)
  {
      echo "<option value=".$row2['id'].">";                
  }
  ?>
</datalist>
<img id="divider" src="img/divider.png "/>
<textarea class="form-control" placeholder="Comentarios" id="comentarios" name="comentarios" required /></textarea>
<img id="divider" src="img/divider.png "/>
<div class="text-center2">
<input class="btn btn-info" type="submit" id="enviar" value="Completar" />
<input class="btn btn-danger" type="reset" id="reset" value= "Limpiar" />
</div>
</form>
</div>