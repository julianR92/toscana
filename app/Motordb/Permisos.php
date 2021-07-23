<?php
/*
Autor:   Hugo Andres Pedroza Rodriguez
Software: Sistema de riego con técnicas de automatización y control
Versión: 1.0:
Tipo de proyecto: Tesis de grado
Todos los derechos reservados 2020
Institución: Corporación universitaria de ciencia y desarrollo Uniciencia
*/

#Funcion general que permite cargar datos de sesion
require_once("conexiondb.php");

function permission (array $TipUser){
    //valida si la sesion esta abierta
    if(!isset($_SESSION)){
        session_start();
    }
    $usuario=$_SESSION['user'];

    foreach($TipUser as $TipUser) {

        if ($TipUser == $usuario["UsuRol"]){
            
            return '';
        }
    }

    echo 'style="display:none" ';
}

#Funciones para obtener datos de los usuarios del sistema
function User(){
    if(!isset($_SESSION)){
        session_start();
    }
    $User=$_SESSION['user'];
    return ($User["User"]);
}

function User2(){
    if(!isset($_SESSION)){
        session_start();
    }
    $User=$_SESSION['user'];
    return print_r($User["User"]);
}

function UsuNom(){
    if(!isset($_SESSION)){
        session_start();
    }
    $UsuNom = $_SESSION['user'];
    return print_r($UsuNom["UsuNom"]);
}

function UsuApe(){
    if(!isset($_SESSION)){
        session_start();
    }
    $UsuApe = $_SESSION['user'];
    return print_r($UsuApe["UsuApe"]);
}

function UsuNombre(){
    if(!isset($_SESSION)){
        session_start();
    }
    $UsuNombre = $_SESSION['user'];
    return ($UsuNombre["UsuNom"]);
}

function UsuApellido(){
    if(!isset($_SESSION)){
        session_start();
    }
    $UsuApellido = $_SESSION['user'];
    return ($UsuApellido["UsuApe"]);
}

function UsuRol(){
    if(!isset($_SESSION)){
        session_start();
    }
    $UsuRol = $_SESSION['user'];
    return print_r($UsuRol["UsuRol"]);
}

function UsuRol2(){
    if(!isset($_SESSION)){
        session_start();
    }
    $UsuRol = $_SESSION['user'];
    return ($UsuRol["UsuRol"]);
}

function NomEmp(){
    if(!isset($_SESSION)){
        session_start();
    }
    $UsuOficina = $_SESSION['user'];
    return print_r($UsuOficina["EmpRazSoc"]);
}

function IdEmpresa(){
    if(!isset($_SESSION)){
        session_start();
    }
    $IdEmpresa = $_SESSION['user'];
    return print_r($IdEmpresa["IdEmpresa"]);
}

function EmpNumDoc(){
    if(!isset($_SESSION)){
        session_start();
    }
    $EmpNumDoc = $_SESSION['user'];
    return print_r($EmpNumDoc["EmpNumDoc"]);
}

function UsuEmail(){
    if(!isset($_SESSION)){
        session_start();
    }
    $UsuEmail = $_SESSION['user'];
    return ($UsuEmail["UsuEmail"]);
}

function ClienteId(){
    if(!isset($_SESSION)){
        session_start();
    }
    $ClienteId = $_SESSION['user'];
    return ($ClienteId["ClienteId"]);
}
 
function UltimaSession(){

    $User_uno = User();
    //echo $User_uno;
    
    $UltimaSession = "SELECT S.IdSession,
                             S.User,
                             S.Password,
                             S.SesFecReg,
                             S.SesHorReg,
                             S.EstadoSession
                             FROM session as S 
                                 WHERE User='$User_uno' and EstadoSession='LOGIN'
                                      ORDER BY IdSession DESC LIMIT 1,1";
    //echo "$UltimaSession";
    //require_once("../Motordb/conexiondb.php");   
    $con=mysqli_connect("localhost","root","toscana2020","toscana");                             
    $QuerySesion = mysqli_query($con,$UltimaSession);    
    $RowSes=mysqli_fetch_array($QuerySesion);

    if ($QuerySesion) {    
     echo $RowSes['SesHorReg'].'-'.$RowSes['SesFecReg'];        
  }else{
   echo "08:34:23 2020-04-13";
     
  }
    
    
   
    
}#Fin funcion ultima sesion


function Cierre(){

      if($_SESSION['user'] == null){

        session_unset();
        session_destroy();              
        echo "<script>window.location.href='../index.htm';</script>";
             exit;
      }
      
}


function Inactividad(){

    if(isset($_SESSION['tiempo']) ) {
        
        $inactivo = 1200;//Tiempo en segundos
        $vida_session = time() - $_SESSION['tiempo'];  

          if($vida_session > $inactivo){

            session_unset();
            session_destroy();              
            //header("Location:");
            echo "<script>window.location.href='../index.htm';</script>";
                 exit;
          }

    }else{

          $_SESSION['tiempo'] = time();

         }

}
?>
