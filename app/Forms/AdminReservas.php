<?php
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2019
@copyrigth
**/

require_once '../Frame/Header.htm';
require_once 'MenuPrincipal.php';

?>
<meta charset="utf-8" /> 


<div class="content-wrapper">
    <section class="content-header">
    <h3>Administración Reservas</h3>
</section>

<section class="content"> 
<?php if ($this->MetodoRow == "true" || $this->MetodoSel=="true") { ?>
   <div class="box box-primary">
      <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
         <h3 class="box-title" style="color: #FFF;"><b>Panel de control</b></h3></div>
         <div class="row" style="padding-top: 10px;">
         <div class="col-md-3"></div>
         <div class="col-md-3">
           
         <button type="submit" class="form-control btn btn-danger"><a style="color: #FFF" href="controlador.php?A=Reservas&C=Reservas&F=SelectCancelados&Parametro=true&MetodoCancel=true"><i class="glyphicon glyphicon-remove"></i><b>Canceladas </b> </a> </button><br><br>

         </div>
         <div class="col-md-3">
                 <!--Boton agregar Oferta-->

    <button type="submit" class="form-control btn btn-success"><a style="color: #FFF" href="controlador.php?A=Reservas&C=Reservas&F=SelectAtendidos&Parametro=true&MetodoAtend=true"><i class="glyphicon glyphicon-ok"></i><b>Atendidos </b> </a> </button><br><br>
              </div>
             <div class="col-md-3">
              <!--Boton agregar Oferta-->

                 <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente"><i class="glyphicon glyphicon-plus"></i><b> Nueva Reserva</b> </button><br><br>
              </div>
            </div>
              <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                     <thead>
                           <tr>
                               <th id="th">Nombres y Apellidos</th>
                               <th id="th">Identificación</th>
                               <th id="th">Teléfono</th>
                               <th id="th">Correo</th>
                               <th id="th">Personas</th>
                               <th id="th">Observaciones</th>
                               <th id="th">Fecha</th>
                               <th id="th">Hora</th>
                               <th id="th">Estado</th>
                               <th id="th">Acciones</th>
                           </tr>
                     </thead>
                     
                      <?php while ($Row = mysqli_fetch_array($QueryCampos)){ ?>
                        <tr>
                          <td><?php echo $Row["0"].' '.$Row["1"];?></td>
                          <td><?php echo $Row["3"];?></td>
                          <td><?php echo $Row["4"];?></td>
                          <td><?php echo $Row["5"];?></td>
                          <td><?php echo $Row["6"];?></td>
                          <td><?php echo $Row["7"];?></td>
                          <td><?php echo $Row["8"];?></td>
                          <td><?php echo $Row["9"];?></td>
                          <td><?php echo $Row["10"];?></td>
                          <td nowrap align="center">

                          <a onclick="return confirm('Atención, realmente desea eliminar este registro?')"; href="controlador.php?A=Reservas&C=Reservas&F=deleteReservas&Parametro=<?php echo $Row[13];?>"><img style="width:30px;" src="../Frame/library/bower_components/Ionicons/png/512/trash-a.png" title="Haga click para eliminar esta Reserva">
                          </a>

                      <a href="controlador.php?A=Reservas&C=Reservas&F=selectReservas&Parametro=<?php echo $Row[13];?>&MetodoUpd=true">
                            <img style="width:25px;" src="../Frame/library/bower_components/Ionicons/png/512/edit.png" title="Haga clic para editar este registro">
                          </a>

                          <a href="../Forms/GestionReservas.php?Parametro=<?php echo $Row[13];?>&MetodoAdmRes=true">
                            <img style="width:35px;" src="../Frame/library/bower_components/Ionicons/png/512/gear-b.png" title="Haga clic para cambiar el estado de este registro">
                          </a>

                          <a href="controlador.php?A=Reservas&C=Reservas&F=trazabilidadReserva&Parametro=<?php echo $Row[13];?>&MetodoTra=true">
                            <img style="width:35px;" src="../Frame/library/bower_components/Ionicons/png/512/arrow-graph-up-right.png" title="Haga clic para observar la trazablidad de la reserva">
                          </a>

                          </td> 
                        </tr><?php } ?>
               </table>
           </div>
       </div>
</div>
<?php } ?>

<?php if ($this->MetodoTra == "true") { ?>
   <div class="box box-primary">
      <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
         <h3 class="box-title" style="color: #FFF;"><b>Trazabilidad Reserva</b></h3></div>
           <div class="box-body">
             <div class="col-md-offset-10">
                 <!--Boton agregar Oferta-->
                 <!--<button class="form-control btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente"><i class="glyphicon glyphicon-plus"></i><b> Nueva Reserva</b> </button><br><br>-->
                  <button type="submit" class="form-control btn btn-warning"><a style="color: #FFF" href="controlador.php?A=Reservas&C=Reservas&F=listarReservas&Parametro=true&MetodoSel=true"><i class="glyphicon glyphicon-arrow-left">&nbsp;</i><b>Volver </b> </a> </button><br><br>
              </div>
              <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                     <thead>
                           <tr>

                               <th id="th">ID Reserva</th>
                               <th id="th">Observaciones</th>
                               <th id="th">Fecha</th>
                               <th id="th">Hora</th>
                               <th id="th">Estados</th>
                           </tr>
                     </thead>
                     
                      <?php while ($Row = mysqli_fetch_array($QueryCampos)){ ?>
                        <tr>
                          <td><?php echo $Row["0"];?></td>
                          <td><?php echo $Row["1"];?></td>
                          <td><?php echo $Row["3"];?></td>
                          <td><?php echo $Row["4"];?></td>
                          <td><?php echo $Row["2"];?></td> 
                        </tr><?php } ?>
               </table>
           </div>
       </div>
</div>
<?php } ?>

<!--Formulario para editar los datos de una reserva-->
<?php if ($this->MetodoUpd=="true") { ?>  
<div class="box box-primary">
  <form method="post" action="../controlador/controlador.php">
    <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
      <h3 class="box-title FuenteExtra" style="color: #fff;"><b>Editar Reserva</b></h3></div>
      <div style="padding-top: 20px;" class="box-body">
        <div style="padding-top: 20px;" class="col-md-12">

          <div class="col-md-12">
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="RV01" id="FuenteTexto">Nombres *</label>
                <input type="text" value="<?php echo $Row[1];?>" name="RV01" id="RV01" required="required" maxlength="30" title="Nombres" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="RV02" id="FuenteTexto">Apellidos *</label>
                <input type="texto" value="<?php echo $Row[2];?>" name="RV02" id="RV02" maxlength="30" title="Apellidos" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
              </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
          <label class="input-control" for="RV03" id="FuenteTexto">Tipo de identificación *</label>
                <select class="form-control" name="RV03" id="RV03" required="required" title="Seleccione el tipo de documento de identificacion">
                  <option value="<?php echo $Row[3];?>"><?php echo $Row[3];?></option>
                  <option value="">Elija una opción</option>
                  <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                  <option value="Cedula de ciudadania">Cédula de ciudadanía</option>
                  <option value="Cedula de extranjería">Cédula de extranjería</option>
                  <option value="Pasaporte">Tarjeta Pasaporte</option>
                  <option value="NIT">NIT</option>
                  <option value="RUT">RUT</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="RV04" id="FuenteTexto">Identificación *</label>
                <input type="text" value="<?php echo $Row[4];?>" name="RV04" id="RV04" class="form-control" maxlength="10" required="required" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" title="IdentificaciÃ³n del cliente">
              </div>
            </div>
          </div>

          <div class="col-md-12">
             <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="RV07" id="FuenteTexto">Numero personas *</label>
                <input type="number" value="<?php echo $Row[7];?>" name="RV07" id="RV07" class="form-control" required="required" maxlength="10" title="Telefono de contacto del cliente"  onkeypress="return Numeros(event)">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="RV05" id="FuenteTexto">Telefono contacto *</label>
                <input type="text" value="<?php echo $Row[5];?>" name="RV05" id="RV05" class="form-control" required="required" maxlength="10" title="Telefono de contacto del cliente"  onkeypress="return Numeros(event)">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="RV06" id="FuenteTexto">Correo *</label>
                <input type="email" value="<?php echo $Row[6];?>" name="RV06" id="RV06" class="form-control" required="required" maxlength="60" title="" onkeypress="return Email(event)">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-12">
              <label class="input-control" for="RV10" id="FuenteTexto">Descripción de la reserva *</label>
              <textarea type="text" name="RV10" id="RV10" class="form-control" required="required" maxlength="400" title="Descripción de la reserva" onkeypress="return Observaciones(event)" onchange="aMayusculas(this.value,this.id)"><?php echo $Row[8];?></textarea>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-4"><br>
              <div class="form-group">
                <label class="input-control" for="RV08" id="FuenteTexto">Fecha de la reserva *</label>
                <input type="date" value="<?php echo $Row[9];?>" name="RV08" id="RV08" class="form-control" required="required" maxlength="60" title="">
              </div>
            </div>

            <div class="col-md-4"><br>
              <div class="form-group">
                <label class="input-control" for="RV09" id="FuenteTexto">Hora de la reserva *</label>
                <input type="time" value="<?php echo $Row[10];?>" name="RV09" id="RV09" class="form-control" required="required" title="" min="08:00" max="20:30">
              </div>
            </div>

            <div class="col-md-4"><br>
            <div class="form-group">
              <label class="input-control" for="RV11" id="FuenteTexto">Estado de la reserva *</label>
                <select class="form-control" name="RV11" id="RV11" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el el envio de notificaciones via telefono al numero que ha autorizado">
                  <option value="<?php echo $Row[11];?>"><?php echo $Row[11];?></option>
                  <option value="">Elija una opción</option>
                  <option value="RESERVADO">RESERVADO</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="hidden" name="Archivo" value="Reservas">
              <input type="hidden" name="Clase" value="Reservas">
              <input type="hidden" name="Funcion" value="UpDateReserva">
              <input type="hidden" name="RV00" value="<?php echo $Row[0];?>">
            </div>
          </div>

          <div style="padding-top: 20px;" class="col-md-12">
            <div class="col-md-3">
              <div class="form-group">
                <button type="submit" name="Boton" value="Boton" class="form-control btn btn-success"><b> Aceptar</b></button>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <div class="col-md-6">
              <div class="form-group">
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                
              </div>
            </div>
          </div><br>
      </form>
</div>
<?php }?>


<?php if ($this->MetodoAtend == "true") { ?>

   <div class="box box-primary">
      <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
         <h3 class="box-title" style="color: #FFF;"><b>Reservas Atendidas</b></h3></div>
           <div class="box-body">
             <div class="col-md-offset-10">
                 <!--Boton agregar Oferta-->
                 <button type="submit" class="form-control btn btn-warning"><a style="color: #FFF" href="controlador.php?A=Reservas&C=Reservas&F=listarReservas&Parametro=true&MetodoSel=true"><i class="glyphicon glyphicon-arrow-left">&nbsp;</i><b>Volver </b> </a> </button><br><br>
              </div>
               <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                     <thead>
                           <tr>
                               <th id="th">Nombres y Apellidos</th>
                               <th id="th">Identificación</th>
                               <th id="th">Teléfono</th>
                               <th id="th">Correo</th>
                               <th id="th">Personas</th>
                               <th id="th">Observaciones</th>
                               <th id="th">Fecha</th>
                               <th id="th">Hora</th>
                               <th id="th">Estado</th>
                               <th id="th">Acciones</th>
                           </tr>
                     </thead>
                     
                      <?php while ($Row = mysqli_fetch_array($QueryCampos)){ ?>
                        <tr>
                          <td><?php echo $Row["0"].' '.$Row["1"];?></td>
                          <td><?php echo $Row["3"];?></td>
                          <td><?php echo $Row["4"];?></td>
                          <td><?php echo $Row["5"];?></td>
                          <td><?php echo $Row["6"];?></td>
                          <td><?php echo $Row["7"];?></td>
                          <td><?php echo $Row["8"];?></td>
                          <td><?php echo $Row["9"];?></td>
                          <td><?php echo $Row["10"];?></td>
                          <td nowrap align="center">
                            
                          <a href="controlador.php?A=Reservas&C=Reservas&F=selectReservas&Parametro=<?php echo $Row[13];?>&MetodoUpd=true">
                            <img style="width:25px;" src="../Frame/library/bower_components/Ionicons/png/512/edit.png" title="Haga clic para editar este registro">
                          </a>
                                            

                          <a href="../Forms/GestionReservas.php?Parametro=<?php echo $Row[13];?>&MetodoAdmRes=true">
                            <img style="width:35px;" src="../Frame/library/bower_components/Ionicons/png/512/gear-b.png" title="Haga clic para cambiar el estado de este registro">
                          </a>

                          <a href="controlador.php?A=Reservas&C=Reservas&F=trazabilidadReserva&Parametro=<?php echo $Row[13];?>&MetodoTra=true">
                            <img style="width:35px;" src="../Frame/library/bower_components/Ionicons/png/512/arrow-graph-up-right.png" title="Haga clic para observar la trazablidad de la reserva">
                          </a>

                          </td> 
                        </tr><?php } ?>
               </table>
           </div>
       </div>





  <?php } ?>

  <?php if ($this->MetodoCancel == "true") { ?>

   <div class="box box-primary">
      <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
         <h3 class="box-title" style="color: #FFF;"><b>Reservas Canceladas</b></h3></div>
           <div class="box-body">
             <div class="col-md-offset-10">
                 <!--Boton agregar Oferta-->
                 <button type="submit" class="form-control btn btn-warning"><a style="color: #FFF" href="controlador.php?A=Reservas&C=Reservas&F=listarReservas&Parametro=true&MetodoSel=true"><i class="glyphicon glyphicon-arrow-left">&nbsp;</i><b>Volver </b> </a> </button><br><br>
              </div>
               <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                     <thead>
                           <tr>
                               <th id="th">Nombres y Apellidos</th>
                               <th id="th">Identificación</th>
                               <th id="th">Teléfono</th>
                               <th id="th">Correo</th>
                               <th id="th">Personas</th>
                               <th id="th">Observaciones</th>
                               <th id="th">Fecha</th>
                               <th id="th">Hora</th>
                               <th id="th">Estado</th>
                               <th id="th">Acciones</th>
                           </tr>
                     </thead>
                     
                      <?php while ($Row = mysqli_fetch_array($QueryCampos)){ ?>
                        <tr>
                          <td><?php echo $Row["0"].' '.$Row["1"];?></td>
                          <td><?php echo $Row["3"];?></td>
                          <td><?php echo $Row["4"];?></td>
                          <td><?php echo $Row["5"];?></td>
                          <td><?php echo $Row["6"];?></td>
                          <td><?php echo $Row["7"];?></td>
                          <td><?php echo $Row["8"];?></td>
                          <td><?php echo $Row["9"];?></td>
                          <td><?php echo $Row["10"];?></td>
                          <td nowrap align="center">
                           

                            <a href="controlador.php?A=Reservas&C=Reservas&F=selectReservas&Parametro=<?php echo $Row[13];?>&MetodoUpd=true">
                            <img style="width:25px;" src="../Frame/library/bower_components/Ionicons/png/512/edit.png" title="Haga clic para editar este registro">
                          </a>                                            

                          <a href="../Forms/GestionReservas.php?Parametro=<?php echo $Row[13];?>&MetodoAdmRes=true">
                            <img style="width:35px;" src="../Frame/library/bower_components/Ionicons/png/512/gear-b.png" title="Haga clic para cambiar el estado de este registro">
                          </a>

                          <a href="controlador.php?A=Reservas&C=Reservas&F=trazabilidadReserva&Parametro=<?php echo $Row[13];?>&MetodoTra=true">
                            <img style="width:35px;" src="../Frame/library/bower_components/Ionicons/png/512/arrow-graph-up-right.png" title="Haga clic para observar la trazablidad de la reserva">
                          </a>

                          </td> 
                        </tr><?php } ?>
               </table>
           </div>
       </div>





  <?php } ?>
<!--Fin del formulario para editar vehiculos-->

<!--Ventana modal para agregar clientes-->
<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" action="../controlador/controlador.php" method="post">
        <div id="box-header" class="modal-header box-header">
        	<button style="color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title" style="color: #fff;"><b>Nueva Reserva</b></h4>
        </div>
        <div class="modal-body">


            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="RV01" id="FuenteTexto">Nombres *</label>
                <input type="text" name="RV01" id="RV01" required="required" maxlength="30" title="Nombres" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="RV02" id="FuenteTexto">Apellidos *</label>
                <input type="texto" name="RV02" id="RV02" maxlength="30" title="Apellidos" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" required="required">
              </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
              <label class="input-control" for="RV03" id="FuenteTexto">Tipo de identificación *</label>
                <select class="form-control" name="RV03" id="RV03" required="required" title="Seleccione el tipo de documento de identificacion">
                  <option value="">Elija una opción</option>
                  <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                  <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                  <option value="Cedula de extranjería">Cédula de extranjería</option>
                  <option value="Pasaporte">Tarjeta Pasaporte</option>
                  <option value="NIT">NIT</option>
                  <option value="RUT">RUT</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="RV04" id="FuenteTexto">Identificacion *</label>
                <input type="text" name="RV04" id="RV04" class="form-control" maxlength="10" required="required" onkeypress="return NumDoc(event)" title="Identificacion del cliente">
              </div>
            </div>
     
             <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="RV07" id="FuenteTexto">Numero personas *</label>
                <input type="number" name="RV07" id="RV07" class="form-control" required="required" maxlength="10" title="Numero de perosnas que asistiran a la reserva">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="RV05" id="FuenteTexto">Telefono contacto *</label>
                <input type="text" name="RV05" id="RV05" class="form-control" required="required" maxlength="10" title="Telefono de contacto del cliente"  onkeypress="return Numeros(event)">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="input-control" for="RV06" id="FuenteTexto">Correo *</label>
                <input type="email" name="RV06" id="RV06" class="form-control" required="required" maxlength="60" title="Direccion de correo electronico para notificaciones, comunicaciones y gestion de envio de facturas" onkeypress="return Email(event)">
              </div>
            </div>

            

            <div class="col-md-6">
              <div class="form-group"><br>
                <label class="input-control" for="RV08" id="FuenteTexto">Fecha de la reserva *</label>
                <input type="date" name="RV08" id="RV08" class="form-control" required="required" maxlength="60" title="Fecha de la reserva">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group"><br>
                <label class="input-control" for="RV09" id="FuenteTexto">Hora de la reserva *</label>
                <input type="time" name="RV09" id="RV09" class="form-control" required="required" title="Hora de la reserva" min="08:30"  max="20:30">
              </div>
            </div>

            <div class="col-md-12">
              <label class="input-control" for="RV10" id="FuenteTexto">Descripcion de la reserva *</label>
              <textarea type="text" name="RV10" id="RV10" class="form-control" required="required" maxlength="300" title="Descripción de la reserva" onkeyup="aMayusculas(this.value,this.id)"></textarea>
            </div>
          </div>

	        <div class="col-md-4">
	        	<div class="form-group">
	        		<input type="hidden" name="Archivo" value="Reservas">
	        		<input type="hidden" name="Clase" value="Reservas">
	        		<input type="hidden" name="Funcion" value="insertReserva">
              <input type="hidden" name="RV15" value="true">
	        	</div>
	        </div>

	        <div class="col-md-12">
	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<button type="submit" name="Boton" value="Boton" class="form-control btn btn-success"><b> Aceptar</b></button>
	        		</div>
	        	</div>
	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<button type="button" name="Boton" class="form-control btn btn-danger" data-dismiss="modal"><b> Cancelar</b></button>
	        		</div>
	        	</div>
	        </div>

	        <div class="modal-footer">
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			
	        		</div>
	        	</div>
	        </div><br>
	    </form>
	</div>
</div>
</div>
</section>
<?php
require_once("../Frame/Footer.htm");
?>
<script type="text/javascript">
$(".tablas").DataTable({
"language":{
"sProcessing":     "Procesando...",
"sLengthMenu":     "Mostrar _MENU_ registros",
"sZeroRecords":    "No se encontraron resultados",
"sEmptyTable":     "Ningún dato disponible en esta tabla",
"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
"sInfoPostFix":    "",
"sSearch":         "Buscar:",
"sUrl":            "",
"sInfoThousands":  ",",
"sLoadingRecords": "Cargando...",
"oPaginate": {
"sFirst":    "Primero",
"sLast":     "Último",
"sNext":     "Siguiente",
"sPrevious": "Anterior"},
"oAria": {
"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
"sSortDescending": ": Activar para ordenar la columna de manera descendente"}}});

function Direccion(n){

          key = n.keyCode || n.which;
          tecla = String.fromCharCode(key).toLowerCase();
          numeros = "0123456789-#ñÑ.";
          especiales = [14,15,32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
          84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
          110,111,112,113,114,115,116,117,118,119,120,121,122,130,160,161,162,163,164,165,239];
          tecla_especial = false
              for(var i in especiales){
                  if(key == especiales[i]){
                    tecla_especial = true;
                  break;
                    } 
                }
                               
              if(numeros.indexOf(tecla)==-1 && !tecla_especial)
                return false;
}

    function NumDoc(n){

          key = n.keyCode || n.which;
          tecla = String.fromCharCode(key).toLowerCase();
          numeros = "0123456789-ñÑ";
          especiales = [14,15,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
          84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
          110,111,112,113,114,115,116,117,118,119,120,121,122,130,160,161,162,163,164,165,];
          tecla_especial = false
              for(var i in especiales){
                  if(key == especiales[i]){
                    tecla_especial = true;
                  break;
                    } 
                }
                               
              if(numeros.indexOf(tecla)==-1 && !tecla_especial)
                return false;
}

  function Observaciones(n){

          key = n.keyCode || n.which;
          tecla = String.fromCharCode(key).toLowerCase();
          numeros = "0123456789-ñÑ,.@:_ ";
          especiales = [14,15,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
          84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
          110,111,112,113,114,115,116,117,118,119,120,121,122,130,160,161,162,163,164,165,];
          tecla_especial = false
              for(var i in especiales){
                  if(key == especiales[i]){
                    tecla_especial = true;
                  break;
                    } 
                }
                               
              if(numeros.indexOf(tecla)==-1 && !tecla_especial)
                return false;
}


/** Esta funcion me permite controlar los caracteres que se van a diguitar en el campo Nombres y Apellidos **/
function Letras(n){

          key = n.keyCode || n.which;
          tecla = String.fromCharCode(key).toLowerCase();
          numeros = "ñ";
          especiales = [14,15,32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,
          84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,
          110,111,112,113,114,115,116,117,118,119,120,121,122,130,160,161,162,163,164,165,239];
          tecla_especial = false
              for(var i in especiales){
                  if(key == especiales[i]){
                    tecla_especial = true;
                  break;
                    } 
                }
                               
              if(numeros.indexOf(tecla)==-1 && !tecla_especial)
                return false;
}


/**Esta funcion me permite convertir los textos digitados a mayusculas **/
function aMayusculas(obj,id){
      
          obj = obj.toUpperCase();
          document.getElementById(id).value = obj;
}


/** Esta funcion me devuelve solo los numeros se usa para las cajas varchar con opcion numerica o campos time y date**/
function Numeros(e){

          key = e.keyCode || e.which;
          tecla = String.fromCharCode(key).toLowerCase();
          letras = "0123456789-";
          especiales = [8,37];
          tecla_especial = false
              for(var i in especiales){
                  if(key == especiales[i]){
                    tecla_especial = true;
                  break;
                    } 
                }
                               
              if(letras.indexOf(tecla)==-1 && !tecla_especial)
                return false;
}




/// fecha de hoy EN CAMPO DATE
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //
    var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("RV08").setAttribute("min", today);


      // funcion de hora actual
    var hora_actual = new Date();
    var hora = hora_actual.getHours()+':'+ hora_actual.getMinutes();

    //document.getElementById("RV09").setAttribute("min",hora);

    // INICIO JQUERY

    $(document).ready(function() {
      
      $('#RV01').change(function(){       
        var input1 = document.getElementById('RV01').value;       
        var ValInput1 = input1.match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{4,20}$/);
        if (ValInput1 == null) {         
          
          alert("No se permiten números, caracteres especiales, espacios o menos de cuatro(4) letras ni más de veinte(20) letras");
          $('#RV01').focus();
          $('#RV01').val('');

        }             
      })

       $('#RV02').change(function(){       
        var input1 = document.getElementById('RV02').value;       
        var ValInput1 = input1.match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{4,20}$/);
        if (ValInput1 == null) {         
          
          alert("No se permiten números, caracteres especiales, espacios o menos de cuatro(4) letras ni más de veinte(20) letras");
          $('#RV02').focus();
          $('#RV02').val('');

        }             
      })

         $('#RV05').change(function(){

        var input8 = document.getElementById('RV05').value;
        var ValInput8 = input8.match(/^[0-9]{7,10}$/);
        if (ValInput8 == null) {
          
          
        alert("Solo se permiten números, no se permiten menos de siete(7) dígitos ni más de diez(10) dígitos");
          $('#RV05').focus();
          $('#RV05').val('');

        }             
      });


      $('#RV06').change(function(){

        var input10 = document.getElementById('RV06').value;
        var ValInput10 = input10.match(/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{4,}[.][a-zA-Z0-9\.]{2,12}$/);
        if (ValInput10 == null) {
          
          
    alert("Correo no valido, por favor revise");
          $('#RV06').focus();
          $('#RV06').val('');

        }             
      });

       $('#RV07').change(function(){

        var input8 = document.getElementById('RV07').value;
        var ValInput8 = input8.match(/^[0-9]{1,3}$/);
        if (ValInput8 == null) {
          
          
        alert("Solo permiten números");
          $('#RV07').focus();
          $('#RV07').val('');

        }             
      });


        $('#RV08').change(function(){

        var input8 = document.getElementById('RV08').value;
       
        if (input8 == today) {
          
          $("#RV09").attr('min', hora);
        
        }else{

          $("#RV09").attr('min', '08:00');

        }           
      });

    })

</script>