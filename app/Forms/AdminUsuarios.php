<?php
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
VersiÚn:         1.0
Todos los derechos reservados 2019
@copyrigth
**/

require_once '../Frame/Header.htm';
require_once 'MenuPrincipal.php';
?>

<div class="content-wrapper">
    <section class="content-header">
    <h3>Administraci√≥n Usuarios</h3>
</section>

<section class="content"> 
<?php if ($this->MetodoRow == "true") { ?>
   <div class="box box-primary">
      <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
         <h3 class="box-title" style="color: #FFF;"><b>Listar Usuarios</b></h3></div>
           <div class="box-body">
             <div class="col-md-offset-10">
                 <!--Boton agregar Oferta-->
                 <button class="form-control btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="glyphicon glyphicon-plus"></i><b> Nuevo Usuario</b> </button><br><br>
              </div>
              <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                     <thead>
                           <tr>
                               <th id="th">Nombres y Apellidos</th>
                               <th id="th">Idetificaci√≥n</th>
                               <th id="th">Direcci√≥n</th>
                               <th id="th">Telefonos</th>
                               <th id="th">Correo</th>
                               <th id="th">Usuario</th>
                               <th id="th">Cliente</th>
                               <th id="th">Estado</th>
                               <th id="th">Opciones</th>
                           </tr>
                     </thead>
                     
                      <?php while ($RowUsu = mysqli_fetch_array($QueryCampos)){ ?>
                        <tr>
                          <td nowrap="nowrap"><?php echo $RowUsu["2"].' '.$RowUsu["3"];?></td>
                          <td><?php echo $RowUsu["5"];?></td>
                          <td><?php echo $RowUsu["6"];?></td>
                          <td><?php echo $RowUsu["8"];?></td>
                          <td><?php echo $RowUsu["7"];?></td>
                          <td><?php echo $RowUsu["13"];?></td>
                          <td><?php echo $RowUsu["17"].' '.$RowUsu["18"].' '.$RowUsu["19"].' '.$RowUsu["20"].' '.$RowUsu["21"];?></td>
                          <td><?php echo $RowUsu["15"];?></td>
                          <td nowrap align="center">

                          <!--<a href="controlador.php?A=Vehiculos&C=Vehiculos&F=ListarVehiculos&ParametroID=<?php echo $RowUsu[0];?>&MetodoRow2=true"><img style="width:30px;" src="../Frame/library/bower_components/Ionicons/png/512/model-s.png" title="Aqu√≠ podr√° acceder al detalle de la informaci√≥n del veh√≠culo, as√≠ como gestionar documentaci√≥n y dem√°s funciones de control">
                          </a>-->

                          <a href="controlador.php?A=Usuarios&C=Usuarios&F=SelectUsuario&Parametro=<?php echo $RowUsu[0];?>&MetodoUpd=true">
                            <img style="width:25px;" src="../Frame/library/bower_components/Ionicons/png/512/edit.png" title="Haga clic para editar este registro">
                          </a>

                          <a onclick="return confirm('Atenci√≥n, realmente desea eliminar este registro?')"; href="controlador.php?A=Usuarios&C=Usuarios&F=DeleteUsuario&Parametro=<?php echo $RowUsu[0];?>">
                            <img style="width:30px;" src="../Frame/library/bower_components/Ionicons/png/512/ios7-trash.png" title="Haga clic para eliminar este registro">
                          </a>
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
      <h3 class="box-title FuenteExtra" style="color: #fff;"><b>Editar Usuario</b></h3></div>
      <div style="padding-top: 20px;" class="box-body">
        <div style="padding-top: 20px;" class="col-md-12">

            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="US02" id="FuenteTexto">Nombres *</label>
                <input type="text" value="<?php echo $RowUsu[2];?>" name="US02" id="US02" class="form-control" maxlength="30" required="required" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" title="Nombres del usuario">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="US03" id="FuenteTexto">Apellidos *</label>
                <input type="text" value="<?php echo $RowUsu[3];?>" name="US03" id="US03" class="form-control" maxlength="30" required="required" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" title="Apellidos del usuario">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="US04" id="FuenteTexto">Tipo de identificaci√≥n *</label>
                <select class="form-control" name="US04" id="US04" required="required" title="Seleccione el tipo de documento de identificacion">
                  <option value="<?php echo $RowUsu[4];?>"><?php echo $RowUsu[4];?></option>
                  <option value="">Elija una opci√≥n</option>
                  <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                  <option value="Cedula de ciudadan√ça">Cedula de ciudadan√ça</option>
                  <option value="Cedula de extranjerÌa">Cedula de extranjer√ça</option>
                  <option value="Pasaporte">Tarjeta Pasaporte</option>
                  <option value="NIT">NIT</option>option value="RUT">RUT</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="US05" id="FuenteTexto">Identificaci√≥n *</label>
                <input type="text" value="<?php echo $RowUsu[5];?>" name="US05" id="US05" class="form-control" maxlength="10" required="required" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" title="Identificaci√≥n del usuario">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="input-control" for="US06" id="FuenteTexto">Direcci√≥n *</label>
                <textarea type="text" name="US06" id="US06" minlength="10" maxlength="90" required="required" title="Direcci√≥n de residencia o donde desea que sea notificado" class="form-control" onkeypress="return Direccion(event)" onkeyup="aMayusculas(this.value,this.id)"><?php echo $RowUsu[6];?></textarea>
              </div>
            </div>
          </div>

          <div class="col-md-12">
             <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="US07" id="FuenteTexto">Correo *</label>
                <input type="email" value="<?php echo $RowUsu[7];?>" name="US07" id="US07" class="form-control" required="required" maxlength="60" title="Direcci√≥n de correo electronico para notificaciones, comunicaciones y gestiÛn">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="US08" id="FuenteTexto">Telefono fijo *</label>
                <input type="text" value="<?php echo $RowUsu[8];?>" name="US08" id="US08" class="form-control" required="required" maxlength="10" title="Telefono de contacto del usuario"  onkeypress="return Numeros(event)">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="US09" id="FuenteTexto">Celular *</label>
                <input type="text" value="<?php echo $RowUsu[9];?>" name="US09" id="US09" class="form-control" required="required" maxlength="10" title="Telefono que sera asociado para recibir las notificaciones" onkeypress="return Numeros(event)">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="" id="FuenteTexto">Usuario *</label>
                <input type="text" value="<?php echo $RowUsu[11];?>" name="" id="" readonly="readonly" class="form-control" maxlength="20" title="ContraseÒa de acceso a la aplicaciÛn" onkeypress="return Numeros(event)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="US12" id="FuenteTexto">Contrase√±a *</label>
                <input type="password" value="<?php echo $RowUsu[12];?>" name="US12" id="US12" class="form-control" required="required" maxlength="20" title="ContraseÒa de acceso a la aplicaciÛn">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="input-control" for="" id="FuenteTexto">Validar Contrase√±a *</label>
                <input type="password" name="" id="" class="form-control" maxlength="20" title="ValidaciÛn de la contraseÒa de acceso">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="US10" id="FuenteTexto">Rol *</label>
                <select class="form-control" name="US10" id="US10" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no">
                  <option value="<?php echo $RowUsu[10];?>"><?php echo $RowUsu[10];?></option>
                  <option value="">Elija una opci√≥n</option>
               <?php if ((UsuRol2()==="DESARROLLADOR")) { ?> 
	        				  	<option value="DESARROLLADOR">Desarrollador</option>
	        	                <option value="ADMIN">Admin</option>
	        		             <option value="TECNICO">Tecnico</option>


	        				  <?php }else {  ?>

	        				  	<!--<option value="DESARROLLADOR">Desarrollador</option>-->
	        	                <option value="ADMIN">Admin</option>
	        		            <option value="TECNICO">Tecnico</option>




	        				  	  <?php }  ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-control" for="US13" id="FuenteTexto">Estado *</label>
                <select class="form-control" name="US13" id="US13" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no">
                  <option value="<?php echo $RowUsu[13];?>"><?php echo $RowUsu[13];?></option>
                  <option value="">Elija una opci√≥n</option>
                  <option value="ACTIVO">Activo</option>
                  <option value="INACTIVO">Inactivo</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <input type="hidden" name="Archivo" value="Usuarios">
              <input type="hidden" name="Clase" value="Usuarios">
              <input type="hidden" name="Funcion" value="UpDateUsuario">
              <input type="hidden" name="US00" value="<?php echo $RowUsu[0];?>">
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
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" action="../controlador/controlador.php" method="post">
        <div id="box-header" class="modal-header box-header">
        	<button style="color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title" style="color: #fff;"><b>Nuevo Usuario</b></h4>
        </div>
        <div class="modal-body">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div id="resultado"></div>
        </div>

        <?php if ((UsuRol2()==="DESARROLLADOR")) { ?> 
          <div style="padding-top: 20px;" class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label class="input-control" for="US01" id="FuenteTexto">Cliente o empresa *</label>
                <select class="form-control" name="US01" id="US01" required="required" title="Seleccione Cliente al que pertenece el Usuario de la lista de opciones">
                  <option value="">Seleccione una opci√≥n</option>
                  <?php include_once("../_clases/Clientes.php");
                        while ($RowCli = mysqli_fetch_array($QueryCampos)){?>
                  <option value="<?php echo $RowCli[0];?>"><?php echo $RowCli["4"].' '.$RowCli["5"].' '.$RowCli["6"].' '.$RowCli["7"].' '.$RowCli["8"];?></option><?php }?>
                </select>
              </div>
            </div>
          </div><?php }else{?>
            <input type="hidden" value="<?php ClienteId();?>" name="US01" id="" class="form-control" maxlength="30" required="required" title="Id de la empresa padre del usuario">
          <?php }?>

        	<div class="col-md-12"><br>
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="US02" id="FuenteTexto">Nombres *</label>
        				<input type="text" name="US02" id="US02" class="form-control" maxlength="30" required="required" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" title="Nombres del usuario">
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="US03" id="FuenteTexto">Apellidos *</label>
        				<input type="text" name="US03" id="US03" class="form-control" maxlength="30" required="required" onkeypress="return Letras(event)" onkeyup="aMayusculas(this.value,this.id)" title="Apellidos del usuario">
        			</div>
        		</div>
        	</div>

        	<div class="col-md-12">
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="US04" id="FuenteTexto">Tipo de identificaci√≥n *</label>
                <select class="form-control" name="US04" id="US04" required="required" title="Seleccione el tipo de documento de identificacion">
                  <option value="">Elija una opci√≥n</option>
                  <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                  <option value="Cedula de ciudadan√ça">Cedula de ciudadan√ça</option>
                  <option value="Cedula de extranjerÌa">Cedula de extranjer√ça</option>
                  <option value="Pasaporte">Tarjeta Pasaporte</option>
                  <option value="NIT">NIT</option>option value="RUT">RUT</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>
        		<div class="col-md-6">
        			<div class="form-group">
        				<label class="input-control" for="US05" id="FuenteTexto">Identificaci√≥n *</label>
        				<input type="text" name="US05" id="US05" class="form-control" maxlength="10" required="required" onkeypress="return NumDoc(event)" onkeyup="aMayusculas(this.value,this.id)" title="Identificaci√≥n del usuario">
        			</div>
        		</div>
        		<div class="col-md-12">
        			<div class="form-group">
        				<label class="input-control" for="US06" id="FuenteTexto">Direcci√≥n *</label>
                <textarea type="text" name="US06" id="US06" minlength="10" maxlength="90" required="required" title="Direcci√≥n de residencia o donde desea que sea notificado" class="form-control" onkeypress="return Direccion(event)" onkeyup="aMayusculas(this.value,this.id)"></textarea>
        			</div>
        		</div>
        	</div>

        	<div class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label class="input-control" for="US07" id="FuenteTexto">Correo *</label>
                <input type="email" name="US07" id="US07" class="form-control" required="required" maxlength="60" title="Direcci√≥n de correo electronico para notificaciones, comunicaciones y gestiÛn" onkeypress="return Email(event)">
              </div>
            </div>
          </div>

	        <div class="col-md-12">
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			<label class="input-control" for="US08" id="FuenteTexto">Telefono fijo *</label>
	        			<input type="text" name="US08" id="US08" class="form-control" required="required" maxlength="10" title="Telefono de contacto del usuario"  onkeypress="return Numeros(event)">
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			<label class="input-control" for="US09" id="FuenteTexto">Celular *</label>
	        			<input type="text" name="US09" id="US09" class="form-control" required="required" maxlength="10" title="Telefono que sera asociado para recibir las notificaciones y alertas generadas por el vehiculo y demas comunicaciones realizadas por la empresa" onkeypress="return Numeros(event)">
	        		</div>
	        	</div>
	        </div>

          <div class="col-md-12">
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="US12" id="FuenteTexto">Contrase√±a *</label>
                <input type="password" name="US12" id="US12" class="form-control" required="required" maxlength="20" title="ContraseÒa de acceso a la aplicaciÛn">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="US1212" id="FuenteTexto">Validar Contrase√±a *</label>
                <input type="password" name="" id="US1212" class="form-control" required="required" maxlength="20" title="ValidaciÛn de la contraseÒa de acceso">
              </div>
            </div>
          </div>

	        <div class="col-md-12">
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			<label class="input-control" for="US10" id="FuenteTexto">Rol *</label>
	        			<select class="form-control" name="US10" id="US10" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no">
	        				<option value="">Elija una opci√≥n</option>
	        				  <?php if ((UsuRol2()==="DESARROLLADOR")) { ?> 
	        				  	<option value="DESARROLLADOR">Desarrollador</option>
	        	                <option value="ADMIN">Admin</option>
	        		             <option value="TECNICO">Tecnico</option>


	        				  <?php }else {  ?>

	        				  	<!--<option value="DESARROLLADOR">Desarrollador</option>-->
	        	                <option value="ADMIN">Admin</option>
	        		            <option value="TECNICO">Tecnico</option>




	        				  	  <?php }  ?>

                  
	        			</select>
	        		</div>
	        	</div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-control" for="US13" id="FuenteTexto">Estado *</label>
                <select class="form-control" name="US13" id="US13" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no">
                  <option value="">Elija una opci√≥n</option>
                  <option value="ACTIVO">Activo</option>
                  <option value="INACTIVO">Inactivo</option>
                </select>
              </div>
            </div>
	        </div>

	        <div class="col-md-4">
	        	<div class="form-group">
	        		<input type="hidden" name="Archivo" value="Usuarios">
	        		<input type="hidden" name="Clase" value="Usuarios">
	        		<input type="hidden" name="Funcion" value="InsertUsuario">

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
"sEmptyTable":     "Ning˙n dato disponible en esta tabla",
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
"sLast":     "⁄ltimo",
"sNext":     "Siguiente",
"sPrevious": "Anterior"},
"oAria": {
"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
"sSortDescending": ": Activar para ordenar la columna de manera descendente"}}});
//$("#US01").select2({width:'100%', placeholder: "Elija una opcion",});
//$("#US04").select2({width:'100%', placeholder: "Elija una opcion",});

$(document).ready(function(){
  $('#US05').blur(function(){
    var cedula = $("#US05").val();
    var dataString = 'cedula='+cedula;
    console.log(cedula);


    $.ajax({
      type: "POST",
      url: "../Forms/getUsuario.php",
      data: "Parametro="+cedula,
      dataType: "html",
      beforeSend: function(){
        $("#resultado").html("<p align='center'><img src='loader.gif'/></p>");
      },
      error: function(){
        alert("error peticiÛn ajax");
      },
      success: function(data){
        $("#resultado").empty();
        $("#resultado").append(data);}
      });
  });
});

function Direccion(n){

          key = n.keyCode || n.which;
          tecla = String.fromCharCode(key).toLowerCase();
          numeros = "0123456789-#Ò—.";
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
          numeros = "0123456789-Ò—";
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
          numeros = "0123456789-Ò—,.@:_ ";
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
          numeros = "Ò";
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

 $(document).ready(function() {

  $('#US02').change(function(){       
        var input1 = document.getElementById('US02').value;       
        var ValInput1 = input1.match(/^[a-zA-Z·ÈÌÛ˙‡ËÏÚ˘¿»Ã“Ÿ¡…Õ”⁄Ò—¸‹ ]{4,20}$/);
        if (ValInput1 == null) {         
          
          alert("No se permiten numeros, caracteres especiales, espacios o menos de cuatro(4) letras ni mas de veinte(20) letras");
          $('#US02').focus();
          $('#US02').val('');

        }             
      })


    $('#US03').change(function(){       
        var input1 = document.getElementById('US03').value;       
        var ValInput1 = input1.match(/^[a-zA-Z·ÈÌÛ˙‡ËÏÚ˘¿»Ã“Ÿ¡…Õ”⁄Ò—¸‹ ]{4,20}$/);
        if (ValInput1 == null) {         
          
          alert("No se permiten numeros, caracteres especiales, espacios o menos de cuatro(4) letras ni mas de veinte(20) letras");
          $('#US03').focus();
          $('#US03').val('');

        }             
      })

    $('#US06').change(function(){

        var inputdd09 = document.getElementById('US06').value;
        var ValInputdd09 = inputdd09.match(/^[a-zA-Z0-9\-#\s]{5,100}$/);
        if (ValInputdd09 == null) {
          
          
    alert("Solo se permiten los caracteres especiales (#) (-)");
          $('#US06').focus();
          $('#US06').val('');

        }             
      });

       $('#US07').change(function(){

     var input10 = document.getElementById('US07').value;
 var ValInput10 = input10.match(/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{4,}[.][a-zA-Z0-9\.]{2,12}$/);
        if (ValInput10 == null) {
          
          
    alert("Correo no valido, por favor revise");
          $('#US07').focus();
          $('#US07').val('');

        }             
      });

       $('#US08').change(function(){

        var input8 = document.getElementById('US08').value;
        var ValInput8 = input8.match(/^[0-9]{7,10}$/);
        if (ValInput8 == null) {
          
          
        alert("Solo permiten numeros, minimo 6(seis) digitos maximo 10(diez)");
          $('#US08').focus();
          $('#US08').val('');

        }             
      });

       $('#US09').change(function(){

        var input8 = document.getElementById('US09').value;
        var ValInput8 = input8.match(/^[0-9]{7,10}$/);
        if (ValInput8 == null) {
          
          
        alert("Solo permiten numeros, minimo 6(seis) digitos maximo 10(diez)");
          $('#US09').focus();
          $('#US09').val('');

        }             
      });

       $('#US1212').change(function(){

        var input8 = document.getElementById('US1212').value;
        var input9 = document.getElementById('US12').value;
        
        if (input8 != input9) {
          
          
        alert("Contrasenias no coinciden");
          $('#US12').focus();
          $('#US12').val('');
          $('#US1212').val('');

        }             
      });





 })
</script>