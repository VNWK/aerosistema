<div id="first">
          <h3>Datos del Activo</h3>
          <hr>
    <!--formulario crear activos-->
          <form name="creacion_datos" id="creacion_datos">
            <input type="hidden" name="username" value="<?php echo $_SESSION['userid'] ?>">

          <div class="form-group">
            <label for="nro" class=control-label>N&uacute;mero de Activo:</label>
            <input type=text class="form-control" name="nro" id="nro" maxlength="5" data-validation="alphanumeric">
          </div>
          <div class="form-group">
            <label for="serial" class=control-label>Serial:</label>
            <input type=text class="form-control" name="serial" id="serial" data-validation="alphanumeric" data-validation-allowing="-_" >
          </div>
          <div class="form-group">
            <label for=funcion class=control-label>Funci&oacute;n:</label>
            <input class="form-control" list="funcionl" name="funcion" id="funcion" data-validation="alphanumeric" data-validation-allowing="-_"  >
               <datalist id="funcionl">
                    <?php
                   
                            foreach($dbcon->query("SELECT funcion FROM activo") as $row)
                            {
                                    echo "<option value=".$row['funcion'].">";
                             
                            }
                    ?>
                </datalist>
            </div>
          <div class="form-group">
            <label for=descripcion class=control-label>Descripci&oacute;n:</label>
            <input type=text class="form-control" name="descripcion" id="descripcion" data-validation="required">
            </div>
            <div class="form-group">
            <label for="marca" class=control-label>Marca:</label>
            <input class="form-control" list="marca" name="marca" autocomplete=off data-validation="alphanumeric">
                <datalist id="marca">
                    <?php
                           include "dbcon.php";

                            foreach($dbcon->query("SELECT nombre FROM marca") as $row)
                            {
                                    echo "<option value=".$row['nombre'].">";
                             
                            }
                    ?>
                </datalist>
            </div>
            <div class="form-group">
            <label for=modelo class=control-label>Modelo:</label>
            <input class="form-control" list="modelo" name="modelo" autocomplete=off data-validation="alphanumeric">
                <datalist id="modelo">
                    <?php
                           include "dbcon.php";

                            foreach($dbcon->query("SELECT nombre FROM modelo") as $row)
                            {
                                    echo "<option value=".$row['nombre'].">";
                             
                            }
                    ?>
                </datalist>
            </div> 
            <div class="form-group">
            <label for="ubicacion" class=control-label>Ubicacion:</label>
            <input class="form-control" list="ubicacion" name="ubicacion" autocomplete=off data-validation="alphanumeric">
                <datalist id="ubicacion">
                    <?php
                           include "dbcon.php";

                            foreach($dbcon->query("SELECT nombre FROM ubicacion") as $row)
                            {
                                    echo "<option value=".$row['nombre'].">";
                             
                            }
                    ?>
                </datalist>
            </div>  

          <div class="form-group">
            <label for=cargo class=control-label>¿Se le puede dar Mantenimineto?:</label>
            <select class=form-control name="mantenible" id="mantenible">                
                <option value="S">Si</option>
                <option value="N">No</option>
           </select>
            </div>
          
    <hr><button type="submit" form="creacion_datos" class="btn btn-default center-block"><span class="glyphicon glyphicon-plus"></span> Incorporar</button>
    </form>
    </div>
