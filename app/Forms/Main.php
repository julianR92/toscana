<?php
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2020
@copyrigth
**/
session_set_cookie_params(0,"/");
ini_set('session.cookie_lifetime', 0); 
session_start();
//echo $_SESSION['iniciosesion'];


if (!$_SESSION["iniciosesion"]) {

     $url = "../index.htm";
     header("Location: $url");
 }
include_once("../Frame/Header.htm");
include_once("MenuPrincipal.php");
?>

<div class="content-wrapper">
    <section class="content-header">
    <h3>Página Inicial</h3>
</section>

  <section class="content"> 
    <div class="box box-primary">
      <div id="box-header" class="box-header with-border bg-success collapsed-box-active">
        <h3 class="box-title FuenteExtra" style="color: #fff;"><b>Información general</b></h3></div>
        <div class="box-body">

            <h3>Bienvenido al panel de administración del Restaurante LA TOSCANA </h3>

            <ul>
              <li>Si desea crear, Borrar o editar usuarios oprimir la opción <em><strong> Admin Usuarios </strong></em> en el menú lateral izquierdo</li>
                <li>Si desea crear, borrar o editar reservas oprimir la opción <em> <strong> Admin Reservas </strong></em> en el menú lateral izquierdo</li>
            </ul>
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          </table>
        </div>
      </div>
    </section>
  </div>
<?php
require_once '../Frame/Footer.htm';
?>