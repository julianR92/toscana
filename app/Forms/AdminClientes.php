<?php
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versi騨:         1.0
Todos los derechos reservados 2019
@copyrigth
**/

require_once '../Frame/Header.htm';
require_once 'MenuPrincipal.php';
?>

<div class="content-wrapper">
    <section class="content-header">
    <h3>Administraci贸n Clientes</h3>
</section>

<section class="content"> 
<?php if ($this->MetodoRow == "true") { ?>
   <div class="box box-primary">
      <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
         <h3 class="box-title" style="color: #FFF;"><b>Listar Clientes</b></h3></div>
           <div class="box-body">
             <div class="col-md-offset-10">
                 <!--Boton agregar Oferta-->
                 <button class="form-control btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente"><i class="glyphicon glyphicon-plus"></i><b> Nuevo Veh&iacuteculo</b> </button><br><br>
              </div>
              <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                     <thead>
                           <tr>
                               <th id="th">Nombre o raz贸n social</th>
                               <th id="th">Idetificac贸n</th>
                               <th id="th">Direcci贸n</th>
                               <th id="th">Telefonos</th>
                               <th id="th">Correo</th>
                               <th id="th">Estado</th>
                               <th id="th">Opciones</th>
                           </tr>
                     </thead>
                     
                      <?php while ($RowCli = mysqli_fetch_array($QueryCampos)){ ?>
                        <tr>
                          <td  nowrap="nowrap"><?php echo $RowCli["4"].' '.$RowCli["5"].' '.$RowCli["6"].' '.$RowCli["7"].' '.$RowCli["8"];?></td>
                          <td><?php echo $RowCli["1"].' N掳 '.$RowCli["2"];?></td>
                          <td><?php echo $RowCli["9"].' '.$RowCli["10"].' '.$RowCli["24"].' '.$RowCli["27"];?></td>
                          <td><?php echo $RowCli["12"].' '.$RowCli["13"].' '.$RowCli["14"];?></td>
                          <td><?php echo $RowCli["15"];?></td>
                          <td><?php echo $RowCli["20"];?></td>
                          <td nowrap align="center">

                          <a href="controlador.php?A=Vehiculos&C=Vehiculos&F=ListarVehiculos&ParametroID=<?php echo $RowCli[0];?>&MetodoRow2=true"><img style="width:30px;" src="../Frame/library/bower_components/Ionicons/png/512/ios7-tras.png" title="Aqu铆 podr谩 acceder al detalle de la informaci贸n del veh铆culo, as铆 como gestionar documentaci贸n y dem谩s funciones de control">
                          </a>

                          <a href="controlador.php?A=Clientes&C=Clientes&F=SelectCliente&Parametro=<?php echo $RowCli[0];?>&MetodoUpd=true">
                            <img style="width:25px;" src="../Frame/library/bower_components/Ionicons/png/512/edit.png" title="Haga clic para editar este registro">
                          </a>

                          <!--<a onclick="return confirm('Atenci贸n, realmente desea eliminar este registro?')"; href="Motor.php?A=Cultivos&C=Cultivos&F=DeleteCultivos&Parametro=<?php #echo $RowCli[0];?>">
                            <img style="width:30px;" src="../Frame/library/bower_components/Ionicons/png/512/ios7-trash.png" title="Haga clic para eliminar este registro">
                          </a>-->
                          </td> 
                        </tr><?php } ?>
               </table>
           </div>
       </div>
</div>
<?php } ?>

<!--Formulario para editar los datos del vehiculo-->
<?php if ($this->MetodoUpd=="true") { ?>  
<div class="box box-primary">
  <form method="post" action="../controlador/controlador.php">
    <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
      <h3 class="box-title FuenteExtra" style="color: #fff;"><b>Editar Cliente</b></h3></div>
      <div style="padding-top: 20px;" class="box-body">
        <div style="padding-top: 20px;" class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="AC04" id="FuenteTexto">Constituci贸n comercial *</label>
                <select class="form-control" name="AC04" id="AC04" required="required" title="Seleccione el tipo de constitucion del Cliente">
                  <option value="<?php echo $RowCli[3];?>"><?php echo $RowCli[3];?></option>
                  <option value="">Seleccione una opci贸n</option>
                  <option value="JURIDICA">Juridica</option>
                  <option value="NATURAL">Natural</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="AC02" id="FuenteTexto">Tipo de identificaci贸n *</label>
                <select class="form-control" name="AC02" id="AC02" required="required" title="Seleccione el tipo de documento de identificacion">
                  <option value="<?php echo $RowCli[1];?>"><?php echo $RowCli[1];?></option>
                  <option value="">Elija una opci贸n</option>
                  <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                  <option value="Cedula de ciudadan脥a">Cedula de ciudadan脥a</option>
                  <option value="Cedula de extranjer韆">Cedula de extranjer脥a</option>
                  <option value="Pasaporte">Tarjeta Pasaporte</option>
                  <option value="NIT">NIT</option>option value="RUT">RUT</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="AC03" id="FuenteTexto">Identificaci贸n *</label>
                <input type="text" value="<?php echo $RowCli[2];?>" name="AC03" id="AC03" class="form-control" maxlength="10" required="required" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" title="Identificaci贸n del cliente">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label class="input-control" for="AC05" id="FuenteTexto">Raz贸n social *</label>
                <textarea type="text" name="AC05" id="AC05" minlength="6" maxlength="90" required="required" title="Raz贸n social del cliente o empresa" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)"><?php echo $RowCli[4];?></textarea>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="AC06" id="FuenteTexto">Primer nombre *</label>
                <input type="text" value="<?php echo $RowCli[5];?>" name="AC06" id="AC06" required="required" maxlength="15" title="Primer nombre" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="AC07" id="FuenteTexto">Segundo nombre</label>
                <input type="texto" value="<?php echo $RowCli[6];?>" name="AC07" id="AC07" maxlength="15" title="Segundo nombre" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="AC08" id="FuenteTexto">Primer apellido *</label>
                <input type="text" value="<?php echo $RowCli[7];?>" name="AC08" id="AC08" required="required" class="form-control" title="Primer apellido" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label class="input-control" for="AC09" id="FuenteTexto">Segundo apellido *</label>
              <input type="text" value="<?php echo $RowCli[8];?>" name="AC09" id="AC09" class="form-control" maxlength="20" title="Segundo apellido" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
             </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label class="input-control" for="AC10" id="FuenteTexto">Direcci贸n *</label>
                <textarea type="text" name="AC10" id="AC10" minlength="10" maxlength="90" required="required" title="Direcci贸n de residencia o donde desea que sea notificado" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)"><?php echo $RowCli[9];?></textarea>
              </div>
            </div>
            <div class="col-md-12">
             <div class="form-group">
              <label class="input-control" for="AC11" id="FuenteTexto">Barrio *</label>
              <input type="text" value="<?php echo $RowCli[10];?>" name="AC11" id="AC11" class="form-control" required="required" maxlength="30" title="Barrio de la direcci贸n referenciada" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
             </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="AC13" id="FuenteTexto">Telefono contacto *</label>
                <input type="text" value="<?php echo $RowCli[12];?>" name="AC13" id="AC13" class="form-control" required="required" maxlength="10" title="Telefono de contacto del cliente"  onkeypress="return Numeros(event)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="AC14" id="FuenteTexto">Tel notificaciones *</label>
                <input type="text" value="<?php echo $RowCli[13];?>" name="AC14" id="AC14" class="form-control" required="required" maxlength="10" title="Telefono que sera asociado para recibir las notificaciones y alertas generadas por el vehiculo y demas comunicaciones realizadas por la empresa" onkeypress="return Numeros(event)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="AC15" id="FuenteTexto">Telefono fijo </label>
                <input type="text" value="<?php echo $RowCli[14];?>" name="AC15" id="AC15" class="form-control" maxlength="13" title="Telefono fijo del cliente" onkeypress="return Numeros(event)">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label class="input-control" for="AC16" id="FuenteTexto">Correo *</label>
                <input type="email" value="<?php echo $RowCli[15];?>" name="AC16" id="AC16" class="form-control" required="required" maxlength="60" title="Direcci贸n de correo electronico para notificaciones, comunicaciones y gestion de envio de facturas" onkeypress="return Email(event)">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="AC17" id="FuenteTexto">Acepta t茅rminos *</label>
                <select class="form-control" name="AC17" id="AC17" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no">
                  <option value="<?php echo $RowCli[16];?>"><?php echo $RowCli[16];?></option>
                  <option value="">Elija una opci贸n</option>
                  <option value="SI">Si</option>
                  <option value="NO">No</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="AC18" id="FuenteTexto">Acepta tratamiento de datos *</label>
                <select class="form-control" name="AC18" id="AC18" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el tratamientode datos">
                  <option value="<?php echo $RowCli[17];?>"><?php echo $RowCli[17];?></option>
                  <option value="">Elija una opci贸n</option>
                  <option value="SI">Si</option>
                  <option value="NO">No</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="AC19" id="FuenteTexto">Notificaciones telefono *</label>
                <select class="form-control" name="AC19" id="AC19" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el el envio de notificaciones via correo electronico">
                  <option value="<?php echo $RowCli[18];?>"><?php echo $RowCli[18];?></option>
                  <option value="">Elija una opci贸n</option>
                  <option value="SI">Si</option>
                  <option value="NO">No</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="AC20" id="FuenteTexto">Notificaciones correo *</label>
                <select class="form-control" name="AC20" id="AC20" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el el envio de notificaciones via telefono al numero que ha autorizado">
                  <option value="<?php echo $RowCli[19];?>"><?php echo $RowCli[19];?></option>
                  <option value="">Elija una opci贸n</option>
                  <option value="SI">Si</option>
                  <option value="NO">No</option>
                </select>
              </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label class="input-control" for="AC28" id="FuenteTexto">Estado Cliente *</label>
                <select class="form-control" name="AC28" id="AC28" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el el envio de notificaciones via telefono al numero que ha autorizado">
                  <option value="<?php echo $RowCli[20];?>"><?php echo $RowCli[20];?></option>
                  <option value="">Elija una opci贸n</option>
                  <option value="ACTIVO">Activo</option>
                  <option value="INACTIVO">Inactivo</option>
                  <option value="SUSPENDIDO MORA">Suspendido Mora</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="hidden" name="Archivo" value="Clientes">
              <input type="hidden" name="Clase" value="Clientes">
              <input type="hidden" name="Funcion" value="UpDateCliente">
              <input type="hidden" name="AC27" value="<?php echo $RowCli[0];?>">
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
<!--Fin del formulario para editar vehiculos-->

<!--Ventana modal para agregar clientes-->
<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" action="../controlador/controlador.php" method="post">
        <div id="box-header" class="modal-header box-header">
        	<button style="color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title" style="color: #fff;"><b>Nuevo Cliente</b></h4>
        </div>
        <div class="modal-body">
        	<div class="col-md-12">
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="AC04" id="FuenteTexto">Tipo de constituci贸n *</label>
        				<select class="form-control" name="AC04" id="AC04" required="required" title="Seleccione el tipo de constitucion del Cliente">
        					<option value="">Seleccione una opci贸n</option>
        					<option value="JURIDICA">Juridica</option>
        					<option value="NATURAL">Natural</option>
        				</select>
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="AC02" id="FuenteTexto">Tipo de identificaci贸n *</label>
        				<select class="form-control" name="AC02" id="AC02" required="required" title="Seleccione el tipo de documento de identificacion">
        					<option value="">Elija una opci贸n</option>
        					<option value="Tarjeta de identidad">Tarjeta de identidad</option>
        					<option value="Cedula de ciudadan脥a">Cedula de ciudadan脥a</option>
        					<option value="Cedula de extranjer韆">Cedula de extranjer脥a</option>
        					<option value="Pasaporte">Tarjeta Pasaporte</option>
        					<option value="NIT">NIT</option>option value="RUT">RUT</option>
        					<option value="Otro">Otro</option>
        				</select>
        			</div>
        		</div>
        	</div>

        	<div class="col-md-12">
        		<div class="col-md-9">
        			<div class="form-group">
        				<label class="input-control" for="AC03" id="FuenteTexto">Identificaci贸n *</label>
        				<input type="text" name="AC03" id="AC03" class="form-control" maxlength="10" required="required" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" title="Identificaci贸n del cliente">
        			</div>
        		</div>
        		<div class="col-md-3">
        			<div class="form-group">
        				<label class="input-control" for="AC003" id="FuenteTexto">DV *</label>
        				<input type="number" name="AC003" id="AC003" class="form-control" min="0" max="9" required="required" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" title="Numero de verifocacion del documento de identificacion">
        			</div>
        		</div>
        	</div>

        	<div class="col-md-12">
        		<div class="col-md-12">
        			<div class="form-group">
        				<label class="input-control" for="AC05" id="FuenteTexto">Raz贸n social *</label>
        				<textarea type="text" name="AC05" id="AC05" minlength="6" maxlength="90" required="required" title="Raz贸n social del cliente o empresa" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)"></textarea>
        			</div>
        		</div>
        	</div>

        	<div class="col-md-12">
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="AC06" id="FuenteTexto">Primer nombre *</label>
        				<input type="text" name="AC06" id="AC06" required="required" maxlength="15" title="Primer nombre" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="AC07" id="FuenteTexto">Segundo nombre</label>
        				<input type="texto" name="AC07" id="AC07" maxlength="15" title="Segundo nombre" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
        			</div>
        		</div>
        	</div>

        	<div class="col-md-12">
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="AC08" id="FuenteTexto">Primer apellido *</label>
        				<input type="text" name="AC08" id="AC08" required="required" class="form-control" title="Primer apellido" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
        			</div>
        		</div>
        		<div class="col-md-6">
        		 <div class="form-group">
        		 	<label class="input-control" for="AC09" id="FuenteTexto">Segundo apellido *</label>
        		 	<input type="text" name="AC09" id="AC09" class="form-control" maxlength="20" title="Segundo apellido" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
        		 </div>
        		</div>
        	</div>

        	<div class="col-md-12">
        		<div class="col-md-12">
        			<div class="form-group">
        				<label class="input-control" for="AC10" id="FuenteTexto">Direcci贸n *</label>
        				<textarea type="text" name="AC10" id="AC10" minlength="10" maxlength="90" required="required" title="Direcci贸n de residencia o donde desea que sea notificado" class="form-control" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)"></textarea>
        			</div>
        		</div>
        		<div class="col-md-12">
        		 <div class="form-group">
        		 	<label class="input-control" for="AC11" id="FuenteTexto">Barrio *</label>
        		 	<input type="text" name="AC11" id="AC11" class="form-control" required="required" maxlength="30" title="Barrio de la direcci贸n referenciada" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)">
        		 </div>
        		</div>
        	</div>

        	<div class="col-md-12">
        		<div class="col-md-6">
        			<label class="input-control" for="AC28" id="FuenteTexto">Departamento *</label>
        			<select class="form-control" name="AC28" id="AC28" required="required" title="Elija el Departamentode residencia">
        				<option value="">Elija una opci贸n</option>
        				<?php /**include_once("../_clases/Departamento.php");
        			          while ($RowDep=mysqli_fetch_array($QueryCampos)) {**/?>
        			    <option value="<?php #echo $RowDep[0];?>"><?php #echo $RowDep[1];?></option><?php }?>
        			</select>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="AC12" id="FuenteTexto">Municipio *</label>
        				<select class="form-control" name="AC12" id="AC12" title="Selecciona el Municipio al que pertenece tu direcci髇 de correspondencia" required="required"></select>
        			</div>
        		</div>
        	</div>

	        <div class="col-md-12">
	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<label class="input-control" for="AC13" id="FuenteTexto">Telefono contacto *</label>
	        			<input type="text" name="AC13" id="AC13" class="form-control" required="required" maxlength="10" title="Telefono de contacto del cliente"  onkeypress="return Numeros(event)">
	        		</div>
	        	</div>
	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<label class="input-control" for="AC14" id="FuenteTexto">Tel notificaciones *</label>
	        			<input type="text" name="AC14" id="AC14" class="form-control" required="required" maxlength="10" title="Telefono que sera asociado para recibir las notificaciones y alertas generadas por el vehiculo y demas comunicaciones realizadas por la empresa" onkeypress="return Numeros(event)">
	        		</div>
	        	</div>
	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<label class="input-control" for="AC15" id="FuenteTexto">Telefono fijo </label>
	        			<input type="text" name="AC15" id="AC15" class="form-control" maxlength="13" title="Telefono fijo del cliente" onkeypress="return Numeros(event)">
	        		</div>
	        	</div>
	        </div>

	        <div class="col-md-12">
	        	<div class="col-md-12">
	        		<div class="form-group">
	        			<label class="input-control" for="AC16" id="FuenteTexto">Correo *</label>
	        			<input type="email" name="AC16" id="AC16" class="form-control" required="required" maxlength="60" title="Direcci贸n de correo electronico para notificaciones, comunicaciones y gestion de envio de facturas" onkeypress="return Email(event)">
	        		</div>
	        	</div>
	        </div>

	        <div class="col-md-12">
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			<label class="input-control" for="AC17" id="FuenteTexto">Acepta t茅rminos *</label>
	        			<select class="form-control" name="AC17" id="AC17" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no">
	        				<option value="">Elija una opci贸n</option>
	        				<option value="SI">Si</option>
	        				<option value="NO">No</option>
	        			</select>
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			<label class="input-control" for="AC18" id="FuenteTexto">Acepta tratamiento de datos *</label>
	        			<select class="form-control" name="AC18" id="AC18" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el tratamientode datos">
	        				<option value="">Elija una opci贸n</option>
	        				<option value="SI">Si</option>
	        				<option value="NO">No</option>
	        			</select>
	        		</div>
	        	</div>
	        </div>

	        <div class="col-md-12">
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			<label class="input-control" for="AC19" id="FuenteTexto">Notificaciones telefono *</label>
	        			<select class="form-control" name="AC19" id="AC19" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el el envio de notificaciones via correo electronico">
	        				<option value="">Elija una opci贸n</option>
	        				<option value="SI">Si</option>
	        				<option value="NO">No</option>
	        			</select>
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			<label class="input-control" for="AC20" id="FuenteTexto">Notificaciones correo *</label>
	        			<select class="form-control" name="AC20" id="AC20" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el el envio de notificaciones via telefono al numero que ha autorizado">
	        				<option value="">Elija una opci贸n</option>
	        				<option value="SI">Si</option>
	        				<option value="NO">No</option>
	        			</select>
	        		</div>
	        	</div>
	        </div>
	        <div class="col-md-4">
	        	<div class="form-group">
	        		<input type="hidden" name="Archivo" value="Clientes">
	        		<input type="hidden" name="Clase" value="Clientes">
	        		<input type="hidden" name="Funcion" value="InsertClientes">
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
"sEmptyTable":     "Ning鷑 dato disponible en esta tabla",
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
"sLast":     "趌timo",
"sNext":     "Siguiente",
"sPrevious": "Anterior"},
"oAria": {
"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
"sSortDescending": ": Activar para ordenar la columna de manera descendente"}}});

$("#AC28").change(function(){
  $("#AC28 option:selected").each(function(){
    var DepartamentoId = $(this).val();
    console.log(DepartamentoId);
    $.ajax({
      type: "POST",
      url : "../_clases/Municipio.php",
      data: "DepartamentoId="+DepartamentoId,
      success:function(data){
        $("#AC12").html(data);
      }
    });
  });
});

$("#AC04").change(function(){
  var input = document.getElementById("AC04").value;
  if (input == "JURIDICA") {
    $("#AC003").attr('disabled', false)
    $("#AC05").attr('disabled', false)
    $("#AC06").attr('disabled', true)
    $("#AC07").attr('disabled', true)
    $("#AC08").attr('disabled', true)
    $("#AC09").attr('disabled', true)
    $("#AC003").attr('required', true)
    $("#AC05").attr('required', true)
    $("#AC06").attr('required', false)
    $("#AC07").attr('required', false)
    $("#AC08").attr('required', false)
    $("#AC09").attr('required', false);
  }else{
    $("#AC003").attr('disabled', true)
    $("#AC05").attr('disabled', true)
    $("#AC06").attr('disabled', false)
    $("#AC07").attr('disabled', false)
    $("#AC08").attr('disabled', false)
    $("#AC09").attr('disabled', false)
    $("#AC003").attr('required', false)
    $("#AC05").attr('required', false)
    $("#AC06").attr('required', true)
    $("#AC07").attr('required', true)
    $("#AC08").attr('required', true)
    $("#AC09").attr('required', true);

  }
});

$("#AC12").select2({width:'100%', placeholder: "Elija una opcion",});
$("#AC28").select2({width:'100%', placeholder: "Elija una opcion",});
</script>