<?php
 date_default_timezone_set('America/Bogota');
setlocale(LC_ALL, 'es_ES');
setlocale(LC_TIME , 'es_ES.UTF-8'); 
$hoy = strftime("%A %d de %B de %Y");
//$Fecha = '2020-10-01';
//$Hora = '16:00';
//$date_1  = date_create($Fecha);
$hour_1  = date_create($Row[10]);
//$date_2 = date_format($date_1,"l, j F Y");
$hour_2 = date_format($hour_1,"g: i A");
$Fecha = str_replace("/", "-", $Row[9]);			
$Nueva_Fecha = date("d-m-Y", strtotime($Fecha));
$date_2 = strftime("%A, %d de %B de %Y", strtotime($Nueva_Fecha));

$correo='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Reservas La Toscana</title>
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
						   
						  <p>Recordatorio de reserva</p>
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
								<td>
								<div style="border-radius: 5px;">
				
				</div>
				</td>
								</tr>
								<tr>
				
				<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    <small><strong> Bucaramanga, '.$hoy.'</strong></small><br><br><br><br>

                    <h2 align="justify"><b>Cordial Saludo '.$Row[1].', </b><br><br></h2>

                    <p align="justify">Estamos siempre pendiente de ti por eso queremos recordarte tu reserva para la fecha de:<p>
                    <div style="border: 3px solid #faa323;background-color:#191716; border-radius: 50px 20px;">

              <p align="justify" style="padding-left: 15px;
                                        padding-right:15px;
                                        color: #ffffff;
                                        font-size: 15px;
                                        font-weight: bold;">Dia:'.$date_2.'<br><br>

             Hora:&nbsp;'.$hour_2.'<br><br>

             Para:&nbsp;'.$Row[7].' Personas.
                        </p></div>

                        <p align="justify">	Es importante que recuerdes ingresar a nuestro establecimiento con todos tus elementos de bioseguridad y auto-cuidado de esta manera puedas cuidar a los tuyos y a los demás. </p>

                           <p align="justify">Si deseas cancelar esta reserva debes hacerlo con un mínimo de 3 horas de anterioridad a tu reserva comunicándote a los números <a  href="tel:3133503063">313 3503063</a> <a href="tel:0376476666">6476666</a></p>


                    
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
										© 2021 Restaurante la Toscana Bucaramanga.<br/>
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