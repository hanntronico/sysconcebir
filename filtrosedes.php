<?php
include_once 'lib/config.php';

session_start();
$login=$_SESSION[login];
$imguser=$_SESSION[imguser];
$iniuser=$_SESSION[iniuser];
$perfil=$_SESSION[perfil];

if ($iniuser==""){
	echo "<script language='JavaScript'>alert('Error: No se encuentra conectado al sistema, por favor inicie sesion nuevamente');</script>";
	echo "<script language='JavaScript'>window.location = './'; </script>";
	exit();
}


$conexion = new ConexionBd();

$arrresultado = $conexion->doSelect("
	sede.sede_id, sede.sede_nombre, sede.sede_nombrecorto, sede.sede_img
    ",
	"sede				
	",
	"sede_activo = '1' ", null, "sede_nombre asc");
foreach($arrresultado as $i=>$valor){

	$sede_id = utf8_encode($valor["sede_id"]);
	$sede_nombre = utf8_encode($valor["sede_nombre"]);
	$sede_nombrecorto = utf8_encode($valor["sede_nombrecorto"]);
	$sede_img = utf8_encode($valor["sede_img"]);

	if ($especialidad_img==""){$especialidad_img="0.jpg";}

	$divsedes .= "
		<div class='col-md-4 col-sm-6' style='margin-top: 20px'>
			<a href='buscar-medicos?s=$sede_id'>
				<img src='arch/".$sede_img."' style='width: 100%; max-height: 180px' alt='$sede_nombre' title='$sede_nombre'>
				<h4>$sede_nombre</h4>
			</a>
		</div>
	";

}


require_once "views/filtrosedes.php";

?>