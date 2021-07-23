<?php
 date_default_timezone_set('America/Bogota');
setlocale(LC_ALL, 'es_ES');
setlocale(LC_TIME , 'es_ES.UTF-8'); 
$hoy = strftime("%A %d de %B de %Y");
//$Fecha = '2020-10-01';
//$Hora = '16:00';
//$date_1  = date_create($Fecha);
$hour_1  = date_create($Hora);
//$date_2 = date_format($date_1,"l, j F Y");
$hour_2 = date_format($hour_1,"g: i A");
$Fecha = str_replace("/", "-", $Fecha);			
$Nueva_Fecha = date("d-m-Y", strtotime($Fecha));
$date_2 = strftime("%A, %d de %B de %Y", strtotime($Nueva_Fecha));

$correo='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Avisos La Toscana</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<style>


div#texto_uno{



}

 </style>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">	
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" style="padding: 20px 0 0 0; background-color: #faa323; font-size: 20px; font-weight: bold; font-family: Arial, sans-serif;">
						   
						  <p>Aviso de reserva</p>
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 30px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px;"></b>
									</td>
								</tr>
							
								<tr>
				
				<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    <small><strong> Bucaramanga, '.$hoy.'</strong></small><br><br>

                    
                    <p align="justify">Esto es un servicio programado automatico para dar aviso sobre un nuevo registro de reserva en la página de <a href="http://toscanarestaurante.com" target="_blank"> http://toscanarestaurante.com</a></p>


                      <p align="justify" style="font-weight:bold; font-size:17px;">Datos de la reserva:</p>
                    <div style="border: 1px solid #0000;background-color:#F5F5F5;">

              <p align="justify" style=" padding-left: 5px;
                                        color: #00000;
                                        font-size: 15px;
                                        font-weight: bold;">


              Reservado por: <em>'.$NombresMail.'</em><br><br>

              Numero de telefono: <em>'.$NumTel.'</em><br><br>

              Dia de reserva: <em>'.$date_2.'</em><br><br>

             Hora de reserva:&nbsp; <em>'.$hour_2.'</em><br><br>

             Numero de personas:&nbsp; <em>'.$Personas.' Personas.</em>
                        </p></div>

                        <p align="justify">No olvides ingresar a la plataforma <a href="http://toscanarestaurante.com/app/#no-back-button" target="_blank"> http://toscanarestaurante.com/app/#no-back-button</a> y administrar las reservas adecuadamente</p> 


                    
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#191716" style="padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
										© 2020 Restaurante la Toscana Bucaramanga.<br/>
                    &reg;  Todos los derechos reservados.
									</td>
									<td align="right" width="25%">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
													
														
													</a>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
												<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
													
														
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>';

//echo $correo;

  ?>