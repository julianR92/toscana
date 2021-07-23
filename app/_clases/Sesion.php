<?php 
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2019
@copyrigth
**/


class Sesion{

protected $User;
protected $Password;
protected $PosNumDoc;
protected $TipoUser;

public function __construct($Parametros){

      $this->User      = $Parametros["SP00"];
      $this->Password  = $Parametros["SP01"];

}

#Funcion para el registro de la salida de la plataforma ocupadoor
public function Logout(){
     
     include_once("../Motordb/conexiondb.php");
     $Logout = "INSERT INTO `session`(`User`,
                                      `Password`,
                                      `SesFecReg`,
                                      `SesHorReg`,
                                      `EstadoSession`)
                                      VALUES('$this->UsuNumDoc',
                                             'Logout no registra Password',
                                              CURDATE(),
                                              CURTIME(),
                                             'LOGOUT')";

      $QueryLogout = mysqli_query($conexion,$Logout);

      if ($QueryLogout == true) {

              session_start();
              session_destroy();
              session_set_cookie_params(0);

           echo "<script>alert('Ha finalizado la sesión con éxito ¡Hasta pronto¡');</script>";
           echo "<script>window.location.href='../';</script>";
      }
}

#Funcion para el ingreso al sistema para los usuaris de tipo postulados (ciudadanos)
public function LoginExterno(){

      $User     = $this->User;
      $Password = $this->Password;

      if(empty($User)){

              echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                            swal({
                            type: "warning",
                            title: "No has digitado el usuario",
                            showConfirmButton: true,
                            confirmButtonColor: "#6300C8",
                            confirmButtonText: "Ingresar"
                            }).then(function(result){
                              if (result.value) { window.location.href = "../Forms/Main.php"; } }) }) </script>';
      }

      if(empty($Password)) {

              echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                          swal({
                          type: "warning",
                          title: "No has digitado la contraseña",
                          showConfirmButton: true,
                          confirmButtonColor: "#faa323",
                          confirmButtonText: "Ingresar"
                          }).then(function(result){
                            if (result.value) { window.location.href = "../Forms/Main.php"; } }) })</script>';
      }

      require_once("../Motordb/conexiondb.php");
      $sqlPosNumDoc ="SELECT P.PosNumDoc,
                             P.PosNom,
                             P.PosApe,
                             P.PosTipDoc,
                             P.PosFecNac,
                             P.PosEdad,
                             P.PosGen,
                             P.PosEmail,
                             P.PosNumTel,
                             P.PosNumCel,
                             P.PosNac,
                             P.PosDep,
                             P.PosCiu,
                             P.PosBar,
                             P.PostuladoEstado,
                             P.PostuladoTipo 
                             FROM postulados as P 
                                 WHERE PosNumDoc='$User' and PostuladoEstado = 'ACTIVO' and PosFecNac = '$Password'";
       $Queryuno = mysqli_query($conexion,$sqlPosNumDoc);

        
            $row = mysqli_fetch_array($Queryuno);

              session_start();
              $_SESSION["user"] = $row;

              if ($row["PosNumDoc"] == $User && $row["PosFecNac"] !== $Password) {

                   echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                                swal({
                                type: "warning",
                                title: " Ha ocurrido  un error de validacion con tu fecha de nacimiento",
                                showConfirmButton: true,
                                confirmButtonColor: "#6300C8",
                                confirmButtonText: "Siguiente"
                                }).then(function(result){
                                  if (result.value) { window.location.href = "../Externo"; } }) }) </script>';


              }else if ($row["PosFecNac"] == $Password && $row["PosNumDoc"] !== $User) {
                
                                echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                                swal({
                                type: "warning",
                                title: " Ha ocurrido un error en la validación con tu número de documento",
                                showConfirmButton: true,
                                confirmButtonColor: "#6300C8",
                                confirmButtonText: "Siguiente"
                                }).then(function(result){
                                  if (result.value) { window.location.href = "../Externo"; } }) }) </script>';


              }elseif ($row["PosFecNac"] == $Password && $row["PosNumDoc"] == $User) {
                   $Session = "INSERT INTO session(`User`,
                                        `Password`, 
                                        `SesFecReg`,
                                        `SesHorReg`,
                                        `EstadoSession`) 
                                                     VALUES('$this->User',
                                                            '$this->Password',
                                                            '$SysFecReg',
                                                            '$SysHorReg',
                                                            'LOGIN')";
                               $QuerySesion = mysqli_query($conexion,$Session);

                   /*echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                                swal({
                                type: "info",
                                title: "Por favor verifica la siguiente información: <br><br> <ul><li>Aspiración salarial</li><li>Número de teléfono</li><li>Fechas de experiencia laboral</li></ul> ",
                                showConfirmButton: true,
                                confirmButtonColor: "#6300C8",
                                confirmButtonText: "Siguiente"
                                }).then(function(result){
                                  if (result.value) { window.location.href = "../Forms/Main.php"; } }) }) </script>';*/
                               
                				echo '<script>window.location.href = "../Forms/Main.php";</script>';
              }else{
                echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                                swal({
                                type: "warning",
                                title: " Error en la validación, revisa tus credenciales",
                                showConfirmButton: true,
                                confirmButtonColor: "#6300C8",
                                confirmButtonText: "Siguiente"
                                }).then(function(result){
                                  if (result.value) { window.location.href = "../Externo/Login.php"; } }) }) </script>';

              }
            }
/**Fin de la fucncion loginExterno**/


/**Funcion para el ingreso al sistema para los usuarios del sistema**/
public function Login(){

      $User     = $this->User;
      $Password = $this->Password;

      if(empty($User)){

              echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                            swal({
                            type: "error",
                            title: "No has digitado tu usuario",
                            showConfirmButton: true,
                            confirmButtonColor: "#faa323",
                            confirmButtonText: "Ingresar"
                            }).then(function(result){
                              if (result.value) { window.location.href = "../index.htm"; } }) }) </script>';
      }

      if(empty($Password)) {

              echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                          swal({
                          type: "error",
                          title: "No has digitado tu  contraseña",
                          showConfirmButton: true,
                          confirmButtonColor: "#faa323",
                          confirmButtonText: "Ingresar"
                          }).then(function(result){
                            if (result.value) { window.location.href = "../index.htm"; } }) })</script>';
      }

      require_once("../Motordb/conexiondb.php");
      $Campos = "SELECT  U.IdUsuario,
                         U.ClienteId,
                         U.UsuNom,
                         U.UsuApe,
                         U.UsuTipDoc,
                         U.UsuNumDoc,
                         U.UsuDirRes,
                         U.UsuEmail,
                         U.UsuTelFij,
                         U.UsuTelMov,
                         U.UsuRol,
                         U.User,
                         U.Password,
                         U.UsuarioEstado,
                         C.IdCliente,
                         C.CliTipDoc,
                         C.CliNumDoc,
                         C.CliTipConJur,
                         C.CliRazSoc,
                         C.CliPriNom,
                         C.CliSegNom,
                         C.CliPriApe,
                         C.CliSegApe,
                         C.CliDir,
                         C.CliBar,
                         C.MunicipioId,
                         C.CliNumTel,
                         C.CliNumTelNot,
                         C.CliTelFij,
                         C.CliEmail,
                         C.CliAceTer,
                         C.CliAceTra,
                         C.CliNotCel,
                         C.CliNotEma,
                         C.ClienteEstado
                         FROM usuarios as U
                             INNER JOIN clientes as C ON C.IdCliente=U.ClienteId
                                  WHERE User='$User' and Password='$Password'";

            $QueryCampos = mysqli_query($conexion,$Campos);

            $row = mysqli_fetch_array($QueryCampos);

              session_start();
              $_SESSION["user"] = $row;

              if ($row["User"] == $User && $row["Password"] !== $Password) {

                   echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                                swal({
                                type: "warning",
                                title: " Ha Ocurrido un error de validación de tu contraseña",
                                showConfirmButton: true,
                                confirmButtonText: "Regresar"
                                }).then(function(result){
                                  if (result.value) { window.location.href = "../index.htm"; } }) }) </script>';


              }else if ($row["Password"] == $Password && $row["User"] !== $User) {
                
                                echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                                swal({
                                type: "warning",
                                title: " Ha ocurrido un error en la validación con tu número de documento",
                                showConfirmButton: true,
                                confirmButtonText: "Regresar"
                                }).then(function(result){
                                  if (result.value) { window.location.href = "../index.htm"; } }) }) </script>';


              }elseif ($row["Password"] == $Password && $row["User"] == $User) {
                require_once("../Motordb/conexiondb.php");
                   $Session = "INSERT INTO session(`User`,
                                        `Password`, 
                                        `SesFecReg`,
                                        `SesHorReg`,
                                        `EstadoSession`) 
                                                     VALUES('$this->User',
                                                            '$this->Password',
                                                             CURDATE(),
                                                             CURTIME(),
                                                            'LOGIN')";
                     $QuerySesion = mysqli_query($conexion,$Session);
                              /**
                              echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                                swal({
                                type: "success",
                                title: "Bienvenido<br><br> Has iniciado sesión en la plataforma Ocupadoor",
                                showConfirmButton: true,
                                confirmButtonColor: "#6300C8",
                                confirmButtonText: "Ingresar"
                                }).then(function(result){
                                  if (result.value) { window.location.href = "../Forms/Main.php"; } }) }) </script>';
                              **/
              session_set_cookie_params(0);
              session_start();              
              $_SESSION['iniciosesion']='OK';

                      		  echo '<script>window.location.href = "../Forms/Main.php";</script>';
                
              }else{
                echo '<script>document.addEventListener("DOMContentLoaded", function(event) {
                                swal({
                                type: "warning",
                                title: " Error en la validación, revisa tus credenciales",
                                showConfirmButton: true,
                                confirmButtonColor: "#faa323",
                                confirmButtonText: "Regresar"
                                }).then(function(result){
                                  if (result.value) { window.location.href = "../index.htm"; } }) }) </script>';

              }
              
      }

}#Fin de la fucncion login

?>