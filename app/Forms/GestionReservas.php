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
<?php if ($_GET[MetodoAdmRes]=="true"){ ?>
  <div class="box box-primary">
 
    <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
      <h3 class="box-title FuenteExtra" style="color: #fff;"><b>Gestionar Reserva</b></h3></div>
      <div class="box-body">
        <div class="col-md-offset-10">
                 <!--Boton agregar Oferta-->
                 <!--<button class="form-control btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente"><i class="glyphicon glyphicon-plus"></i><b> Nueva Reserva</b> </button><br><br>-->
                  <button type="submit" class="form-control btn btn-warning"><a style="color: #FFF" href="../controlador/controlador.php?A=Reservas&C=Reservas&F=listarReservas&Parametro=true&MetodoSel=true"><i class="glyphicon glyphicon-arrow-left">&nbsp;</i><b>Volver </b> </a> </button><br><br>
        </div>
      <div style="padding-top: 20px;" class="box-body">
         <form method="post" action="../controlador/controlador.php">
        <div style="padding-top: 20px;" class="col-md-12">

          <div class="col-md-12">
            <div class="col-md-12">
              <label class="input-control" for="RV10" id="FuenteTexto">Observaciones *</label>
              <textarea type="text" name="RV10" id="RV10" class="form-control" required="required" maxlength="300" title="Descripción de la reserva" onkeyup="aMayusculas(this.value,this.id)"></textarea>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-4"><br>
              <div class="form-group">
                <label class="input-control" for="RV11" id="FuenteTexto">Estado de la reserva *</label>
                  <select class="form-control" name="RV11" id="RV11" required="required" title="El cliente o empresa debe haber leido los terminos y condicones y decide aceptar o no el el envio de notificaciones via telefono al numero que ha autorizado">
                    <option value="">Elija una opción</option>
                    <option value="RESERVADO">RESERVADO</option>
                    <option value="PENDIENTE">PENDIENTE</option>
                    <option value="CANCELADO">CANCELADO</option>
                    <option value="EN ATENCION">EN ATENCION</option>
                    <option value="CERRADA">CERRADA</option>
                  </select>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <input type="hidden" name="Archivo" value="Reservas">
                <input type="hidden" name="Clase" value="Reservas">
                <input type="hidden" name="Funcion" value="gestionReserva">
                <input type="hidden" name="RV00" value="<?php echo $_GET[Parametro];?>">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-3">
              <div class="form-group">
                <button type="submit" name="Boton" value="Boton" class="form-control btn btn-success"><b> Aceptar</b></button>
              </div>
            </div>
         

            <div class="col-md-9">
              <div class="form-group">
                
              </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
    
<?php }?>

</section>
<?php
require_once("../Frame/Footer.htm");
?>
<script type="text/javascript">
  function Letras(n){

          key = n.keyCode || n.which;
          tecla = String.fromCharCode(key).toLowerCase();
          numeros = "ñÑ";
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


</script>