<div id="second">
  <h3>Ingrese el email del Usuario:</h3>
    <br>
    <form  name="consultarUsuarios" id="consultarUsuarios">
    <input class="form-control" list="usuarios2" name="usuario" id="usuario" data-validation="email" autocomplete=off>
    <datalist id="usuarios2">
    <?php
    
            foreach($dbcon->query("SELECT email FROM user") as $row)
            {
                echo "<option value=".$row['email'].">";
            }
    ?>
    </datalist>
    <br>
    </form>
    <button form="consultarUsuarios" class="btn btn-default center-block" type="submit">
    <span class="glyphicon glyphicon-search"></span> Consultar</button>
</div> 