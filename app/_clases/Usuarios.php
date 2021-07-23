<?php 
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2019
@copyrigth
**/

#include_once("../Motordb/conexiondb.php");

/**
$Parametro = $_POST["Parametro"];
$Campos = "SELECT U.UsuNumDoc FROM `usuarios` as U WHERE U.UsuNumDoc='$Parametro'";

$QueryCampos = mysqli_query($conexion,$Campos);   
$ContadorQuery=mysqli_num_rows($QueryCampos);

if ($ContadorQuery>0) {

	     echo "<script>alert('El documento $Parametro ya se encuentra registrado en el sistema');</script>";
         echo "<script>window.location.href='../Forms/MenuPrincipal.php?USU=Retroceso';</script>";

}
**/

class Usuarios{

	Protected $IdUsuario;
	Protected $ClienteId;
	Protected $UsuNom;
	Protected $UsuApe;
	Protected $UsuTipDoc;
	Protected $UsuNumDoc;
	Protected $UsuDirRes;
	Protected $UsuEmail;
	Protected $UsuTelFij;
	Protected $UsuTelMov;
	Protected $UsuRol;
	Protected $UsuFecReg;
	Protected $UsuHorReg;
	Protected $User;
	Protected $Password;
	Protected $UsuEstado;
	
	public function __construct($Parametro){

		$this->IdUsuario = $Parametro["US00"];
		$this->ClienteId = $Parametro["US01"];
		$this->UsuNom    = $Parametro["US02"];
		$this->UsuApe    = $Parametro["US03"];
		$this->UsuTipDoc = $Parametro["US04"];
		$this->UsuNumDoc = $Parametro["US05"];
		$this->UsuDirRes = $Parametro["US06"];
		$this->UsuEmail  = $Parametro["US07"];
		$this->UsuTelFij = $Parametro["US08"];
		$this->UsuTelMov = $Parametro["US09"];
		$this->UsuRol    = $Parametro["US10"];
		$this->User      = $Parametro["US11"];
		$this->Password  = $Parametro["US12"];
		$this->UsuEstado = $Parametro["US13"];
		$this->UsuarioRol= $Parametro["US14"];
		$this->MetodoRow = $Parametro["US15"];
		$this->Parametro = $_GET["Parametro"];
		$this->MetodoUpd = $_GET["MetodoUpd"];
	}

	public function ListarUsuarios(){

		if ($this->UsuarioRol==="DESARROLLADOR" || $this->UsuarioRol==="ADMIN") {
			$this->ClienteId = "%"; 
		}else{

			$this->ClienteId=$this->ClienteId;
		}

		if ($this->UsuarioRol==="DESARROLLADOR") {
			
			$valor1 = '%';
			$valor2 = '%';
		}
		if ($this->UsuarioRol==="ADMIN") {
			
			$valor1 = 'ADMIN';
			$valor2 = 'TECNICO';
		}




		$Campos = "SELECT U.IdUsuario,
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
		                  U.UsuFecReg,
		                  U.UsuHorReg,
		                  U.User,
		                  U.Password,
		                  U.UsuarioEstado,
		                  C.IdCliente,
		                  C.CliRazSoc,
		                  C.CliPriNom,
		                  C.CliSegNom,
		                  C.CliPriApe,
		                  C.CliSegApe
		                  FROM usuarios as U
		                      INNER JOIN clientes as C ON U.ClienteId=C.IdCliente
		                           WHERE U.ClienteId LIKE '$this->ClienteId'
		                            AND  U.UsuRol LIKE '$valor1'
                                           OR U.UsuRol LIKE '$valor2'";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);
		$QueryCount  = mysqli_num_rows($QueryCampos);

		try {

			if ($QueryCampos==true && $this->MetodoRow=="true"){

				include_once("../Forms/AdminUsuarios.php");
				while ($RowUsu = mysqli_fetch_array($QueryCampos)) {
					return;
				}
				
			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error con la función ListarUsuarios');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?MAP=Retroceso';</script>";
				//echo "$Campos";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	}#Fin de la funcbion ListarUsuarios

	public function InsertUsuario(){

		if ($this->ClienteId == null) {
			
			$this->ClienteId = '1';
		}

		$Campos = "INSERT INTO `usuarios`(`ClienteId`,
		                                  `UsuNom`,
		                                  `UsuApe`,
		                                  `UsuTipDoc`,
		                                  `UsuNumDoc`,
		                                  `UsuDirRes`,
		                                  `UsuEmail`,
		                                  `UsuTelFij`,
		                                  `UsuTelMov`,
		                                  `UsuRol`,
		                                  `UsuFecReg`,
		                                  `UsuHorReg`,
		                                  `User`,
		                                  `Password`,
		                                  `UsuarioEstado`)
		                                   VALUES ('$this->ClienteId',
		                                           '$this->UsuNom',
		                                           '$this->UsuApe',
		                                           '$this->UsuTipDoc',
		                                           '$this->UsuNumDoc',
		                                           '$this->UsuDirRes',
		                                           '$this->UsuEmail',
		                                           '$this->UsuTelFij',
		                                           '$this->UsuTelMov',
		                                           '$this->UsuRol',
		                                            CURDATE(),
		                                            CURTIME(),
		                                           '$this->UsuNumDoc',
		                                           '$this->Password',
		                                           '$this->UsuEstado')";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true){

				echo "<script>alert('Se he creado el Usuario exitosamente en el sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?USU=Retroceso';</script>";
				//echo "Campos";

				}else{

				echo "<script>alert('¡Vaya¡ Ocurrió un error con la creación del Usuario, comuníquese con el administrador del sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?USU=Retroceso';</script>";
				//echo "$Campos";
			}

		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	}#Fin de la funcion InsertUsuario

	public function SelectUsuario(){

		$Campos = "SELECT U.IdUsuario,
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
		                  U.UsuarioEstado
		                  FROM usuarios as U
		                      WHERE U.IdUsuario=$this->Parametro";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true && $this->MetodoUpd=="true"){

				while ($RowUsu = mysqli_fetch_array($QueryCampos)) {
					include_once("../Forms/AdminUsuarios.php");
				}
				
			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error con la función Select Usuarios');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?USU=Retroceso';</script>";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
	}

	public function UpDateUsuario(){

		$Campos = "UPDATE `usuarios` SET `UsuNom`   ='$this->UsuNom',
		                                 `UsuApe`   ='$this->UsuApe',
		                                 `UsuTipDoc`='$this->UsuTipDoc',
		                                 `UsuNumDoc`='$this->UsuNumDoc',
		                                 `UsuDirRes`='$this->UsuDirRes',
		                                 `UsuEmail` ='$this->UsuEmail',
		                                 `UsuTelFij`='$this->UsuTelFij',
		                                 `UsuTelMov`='$this->UsuTelMov',
		                                 `UsuRol`   ='$this->UsuRol',
		                                 `Password` ='$this->Password',
		                                 `UsuarioEstado`='$this->UsuEstado'
		                                  WHERE `IdUsuario`=$this->IdUsuario";

        include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true){

				echo "<script>alert('Se he editado el Usuario exitosamente en el sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?USU=Retroceso';</script>";

				}else{

				echo "<script>alert('¡Vaya¡ Ocurrió un error con la edición del Usuario, comuníquese con el administrador del sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?USU=Retroceso';</script>";
			}

		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
	}#Fin de la funcion UpDtaeUsuario

	public function DeleteUsuario(){

		$Campos = "DELETE FROM `usuarios`  WHERE IdUsuario=$this->Parametro";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true){

				echo "<script>alert('Se he eliminado el Usuario exitosamente en el sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?USU=Retroceso';</script>";

				}else{

				echo "<script>alert('¡Vaya¡ Ocurrió un error con la funcion eliminar Usuario, comuníquese con el administrador del sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?USU=Retroceso';</script>";
			}

		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
	}#Fin de la funcion DeleteUsuario
}
?>