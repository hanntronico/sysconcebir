<?php

include_once 'lib/config.php';
session_start();
$login=$_SESSION[login];
$imguser=$_SESSION[imguser];

(isset($_GET['i'])) ? $getinfo=$_GET['i'] :$getinfo='';

if ($_SESSION[iniuser]==""){
	echo "<script language='JavaScript'>alert('Error: No se encuentra conectado al sistema, por favor inicie sesion nuevamente');</script>";
	echo "<script language='JavaScript'>window.location = '../'; </script>";
	exit();
}

$xajax->registerFunction('cambiarestatussede');
$xajax->registerFunction('eliminarsede');

if(isset($_GET["id"])){
	
	$sede_id_usuario_consultar = ($_GET["id"]);;
	
	//var_dump($sede_id_usuario_consultar);
	
	//echo "consultar $sede_id_usuario_consultar";
}


$conexion = new ConexionBd();

$result = $conexion->doSelect("
    sede_id,
    sede_nombre,
    sede_nombrecorto,
    sede_activo
	"
	,
	"
	sede
	", "sede_eliminado = '0'");

foreach($result as $i=>$valor){
	

	$sede_id = utf8_encode($valor["sede_id"]);
	$sede_nombre = utf8_encode($valor["sede_nombre"]);
	$sede_nombrecorto = utf8_encode($valor["sede_nombrecorto"]);
	$sede_activo = utf8_encode($valor["sede_activo"]);
	
	
	$acciones = "<a href='modificarsede?id=$sede_id'><i title='Ver/Editar' class='fa fa-edit btn-modificar'></i></a>";
	
	$acciones .= "<i onclick='eliminarsede(\"".$sede_id."\",0)' title='Eliminar?' class='fa fa-trash btn-eliminar'></i>";
	
	$acciones .= ($sede_activo == "1")? 
	("<i onclick='cambiarestatussede(\"".$sede_id."\",0)'  title='Deshabilitar' class='fa fa-check btn-habilitar'></i>") : 
	("<i onclick='cambiarestatussede(\"".$sede_id."\",1)' title='Habilitar' class='fa fa-minus btn-deshabilitar'></i>");
	
    $sede_activo = ($sede_activo == "1")? ("Activo") : ("Inactivo");
    
	$html .= "
                <tr style='font-size: 14px'>			          									
                    <td>$sede_id</td>
                    <td>$sede_nombre</td>
                    <td>$sede_nombrecorto</td>
                    <td>$sede_activo</td>
                    <td>$acciones</td>
                </tr>
			";

}


require_once "views/sedes.php";
?>