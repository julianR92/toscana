<?php 
/**
Software:        Rastreo de vehiculos
Desarrollador:   Hugo Andres Pedroza Rodriguez
Versiòn:         1.0
Todos los derechos reservados 2019
@copyrigth
**/

$Campos="SELECT C.IdCliente,
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
		        C.ClienteEstado,
		        C.CliFecReg,
		        C.CliHorReg
		        FROM clientes as C
		            WHERE C.ClienteEstado='ACTIVO'";

include_once("../Motordb/conexiondb.php");
$QueryCampos = mysqli_query($conexion,$Campos);

class Clientes{

	protected $IdCliente;
	protected $CliTipDoc;
	protected $CliNumDoc;
	protected $CliTipConJur;
	protected $CliRazSoc;
	protected $CliPriNom;
	protected $CliSegNom;
	protected $CliPriApe;
	protected $CliSegApe;
	protected $CliDir;
	protected $CliBar;
	protected $MunicipioId;
	protected $CliNumTel;
	protected $CliNumTelNot;
	protected $CliTelFij;
	protected $CliEmail;
	protected $CliAceTer;
	protected $CliAceTra;
	protected $CliNotCel;
	protected $CliNotEma;
	protected $ClienteEstado;
	protected $CliFecReg;
	protected $CliHorReg;
	
	public function __construct($Parametro){

		$this->CliTipDoc = $Parametro["AC02"];
		$this->CliNumDoc = $Parametro["AC03"];
		$this->CTipConJur= $Parametro["AC04"];
		$this->CliRazSoc = $Parametro["AC05"];
		$this->CliPriNom = $Parametro["AC06"];
		$this->CliSegNom = $Parametro["AC07"];
		$this->CliPriApe = $Parametro["AC08"];
		$this->CliSegApe = $Parametro["AC09"];
		$this->CliDir    = $Parametro["AC10"];
		$this->CliBar    = $Parametro["AC11"];
		$this->MnicipioId= $Parametro["AC12"];
		$this->CliNumTel = $Parametro["AC13"];
		$this->CNumTelNot= $Parametro["AC14"];
		$this->CliTelFij = $Parametro["AC15"];
		$this->CliEmail  = $Parametro["AC16"];
		$this->CliAceTer = $Parametro["AC17"];
		$this->CliAceTra = $Parametro["AC18"];
		$this->CliNotCel = $Parametro["AC19"];
		$this->CliNotEma = $Parametro["AC20"];
		$this->MetodoRow = $Parametro["AC24"];
		$this->Usuario   = $Parametro["AC25"];
		$this->UsuarioRol= $Parametro["AC26"];
		$this->IdCliente = $Parametro["AC27"];
		$this->CliEstado = $Parametro["AC28"];
		$this->DV        = $Parametro["AC003"];
		$this->MetodoUpd = $_GET["MetodoUpd"];
		$this->Parametro = $_GET["Parametro"];
	}

	public function InsertClientes(){

		$Campos = "INSERT INTO clientes(`CliTipDoc`,
		                                `CliNumDoc`,
		                                `CliTipConJur`,
		                                `CliRazSoc`,
		                                `CliPriNom`,
		                                `CliSegNom`,
		                                `CliPriApe`,
		                                `CliSegApe`,
		                                `CliDir`,
		                                `CliBar`,
		                                `MunicipioId`,
		                                `CliNumTel`,
		                                `CliNumTelNot`,
		                                `CliTelFij`,
		                                `CliEmail`,
		                                `CliAceTer`,
		                                `CliAceTra`,
		                                `CliNotCel`,
		                                `CliNotEma`,
		                                `ClienteEstado`,
		                                `CliFecReg`,
		                                `CliHorReg`)
		                                 VALUES ('$this->CliTipDoc',
		                                         '$this->CliNumDoc$this->DV',
		                                         '$this->CTipConJur',
		                                         '$this->CliRazSoc',
		                                         '$this->CliPriNom',
		                                         '$this->CliSegNom',
		                                         '$this->CliPriApe',
		                                         '$this->CliSegApe',
		                                         '$this->CliDir',
		                                         '$this->CliBar',
		                                         '$this->MnicipioId',
		                                         '$this->CliNumTel',
		                                         '$this->CNumTelNot',
		                                         '$this->CliTelFij',
		                                         '$this->CliEmail',
		                                         '$this->CliAceTer',
		                                         '$this->CliAceTra',
		                                         '$this->CliNotCel',
		                                         '$this->CliNotEma',
		                                         'ACTIVO',
		                                          CURDATE(),
		                                          CURTIME())";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true){

				echo "<script>alert('Ha sido registrado el cliente de manera exitosa en el sistema');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADC=Retroceso';</script>";
				
			}else{

				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función crear clientes');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?VEH=Retroceso';</script>";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
		


	}#Fin de la funcion InsertClinetes

	public function ListarClientes(){

		if ($this->UsuarioRol=='DESARROLLADOR') {
			$this->IdCliente="%";
		}else{
			$this->IdCliente=$this->IdCliente;
		}

		$Campos = "SELECT C.IdCliente,
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
		                  C.ClienteEstado,
		                  C.CliFecReg,
		                  C.CliHorReg,
		                  M.IdMunicipio,
		                  M.MunNom,
		                  M.DepartamentoId,
		                  D.IdDepartamento,
		                  D.DepNom
		                  FROM clientes as C
		                      INNER JOIN municipios as M ON M.IdMunicipio=C.MunicipioId
		                           INNER JOIN departamentos as D ON M.DepartamentoId=D.IdDepartamento
		                                WHERE C.IdCliente LIKE '$this->IdCliente'";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);
		$QueryCount  = mysqli_num_rows($QueryCampos);

		try {

			if ($QueryCampos==true && $this->MetodoRow=="true"){

				include_once("../Forms/AdminClientes.php");
				while ($RowCli = mysqli_fetch_array($QueryCampos)) {
					return;
				}
				
			}else{

				#echo "<script>alert('¡Vaya¡ Ocurrio un error en la función listar clientes');</script>";
				#echo "<script>window.location.href='../Forms/MenuPrincipal.php?VEH=Retroceso';</script>";
				echo "$Campos";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	}#Fin de la funcion listar clientes

	public function SelectCliente(){

		$Campos="SELECT C.IdCliente,
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
				        C.ClienteEstado,
				        C.CliFecReg,
				        C.CliHorReg
				        FROM clientes as C
				            WHERE C.IdCliente='$this->Parametro'";

	    include_once("../Motordb/conexiondb.php");
	    $QueryCampos = mysqli_query($conexion,$Campos);

	    try {

			if ($QueryCampos==true && $this->MetodoUpd=="true"){

				while ($RowCli = mysqli_fetch_array($QueryCampos)) {

					include_once("../Forms/AdminClientes.php");
				}
				
			}else{
				echo "<script>alert('¡Vaya¡ Ocurrio un error en la función listar clientes para editar');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADC=Retroceso';</script>";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	    
	}#Fin de la funcion SelectCliente

	public function UpDateCliente(){

		$Campos = "UPDATE `clientes` SET `CliTipDoc`   ='$this->CliTipDoc',
		                                 `CliNumDoc`   ='$this->CliNumDoc',
		                                 `CliTipConJur`='$this->CTipConJur',
		                                 `CliRazSoc`   ='$this->CliRazSoc',
		                                 `CliPriNom`   ='$this->CliPriNom',
		                                 `CliSegNom`   ='$this->CliSegNom',
		                                 `CliPriApe`   ='$this->CliPriApe',
		                                 `CliSegApe`   ='$this->CliSegApe',
		                                 `CliDir`      ='$this->CliDir',
		                                 `CliBar`      ='$this->CliBar',
		                                 `CliNumTel`   ='$this->CliNumTel',
		                                 `CliNumTelNot`='$this->CNumTelNot',
		                                 `CliTelFij`   ='$this->CliTelFij',
		                                 `CliEmail`    ='$this->CliEmail',
		                                 `CliAceTer`   ='$this->CliAceTer',
		                                 `CliAceTra`   ='$this->CliAceTra',
		                                 `CliNotCel`   ='$this->CliNotCel',
		                                 `CliNotEma`   ='$this->CliNotEma',
		                                 `ClienteEstado`   ='$this->CliEstado'
		                                  WHERE IdCliente=$this->IdCliente";

		include_once("../Motordb/conexiondb.php");
		$QueryCampos = mysqli_query($conexion,$Campos);

		try {

			if ($QueryCampos==true){

				echo "<script>alert('Se ha actualizado el cliente de manera exitosa en el sistema $QueryCount');</script>";
				echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADC=Retroceso';</script>";
				
			}else{
				#echo "<script>alert('¡Vaya¡ Ocurrio un error en la función para actualizar clientes');</script>";
				#echo "<script>window.location.href='../Forms/MenuPrincipal.php?ADC=Retroceso';</script>";
				echo "$Campos";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	}

}#Fin de la clase Clientes