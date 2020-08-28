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

(isset($_GET['e'])) ? $getespecialidad=$_GET['e'] :$getespecialidad='';
(isset($_GET['s'])) ? $getsede=$_GET['s'] :$getsede='';


$conexion = new ConexionBd();

if ($getespecialidad!=""){
	$whereespecialidad = " and usuarioespecialidad.usuario_id = '$getespecialidad' ";

	$arrresultado = $conexion->doSelect("
		especialidad.especialidad_id, especialidad.especialidad_nombre, especialidad.especialidad_codigoexterno, 
		especialidad.especialidad_img, especialidad.especialidad_activo, 
		especialidad.especialidad_eliminado, 
		DATE_FORMAT(especialidad.especialidad_fechareg,'%d/%m/%Y %H:%i:%s') as especialidad_fechareg	
	    ",
		"especialidad				
		",
		"especialidad_activo = '1' and especialidad.especialidad_id = '$getespecialidad'");
	foreach($arrresultado as $i=>$valor){

		$especialidad_id = utf8_encode($valor["especialidad_id"]);
		$especialidad_nombre = utf8_encode($valor["especialidad_nombre"]);
		$especialidad_codigoexterno = utf8_encode($valor["especialidad_codigoexterno"]);
		$especialidad_img = utf8_encode($valor["especialidad_img"]);
		$especialidad_activo = utf8_encode($valor["especialidad_activo"]);
		$especialidad_fechareg = utf8_encode($valor["especialidad_fechareg"]);	

		$titulo = "<br><span style='font-weight: 600'>Especialidad:</span> <span style='font-weight:400'>$especialidad_nombre</span>";

	}

	$arrresultado = $conexion->doSelect("
	usuario.usuario_id, usuario.usuario_nombre, usuario.usuario_apellido, usuario.usuario_email, usuario.usuario_clave, 
	usuario.usuario_dni, usuario.usuario_celular, usuario.usuario_img, usuario.perfil_id, usuario.usuario_activo,
	usuario.usuario_eliminado, usuario.usuario_idreg,
	DATE_FORMAT(usuario_fechareg,'%d/%m/%Y %H:%i:%s') as usuario_fechareg,
	usuario_precio	
    ",
	"usuario	
		inner join usuarioespecialidad on usuarioespecialidad.usuario_id = usuario.usuario_id		
	",
	"usuario_activo = '1' and perfil_id = '2' and usuarioespecialidad_activo = '1' and usuarioespecialidad.especialidad_id = '$getespecialidad' ");

}
elseif ($getsede!=""){
	$wheresede= " and usuariosede.usuario_id = '$getsede' ";

	$arrresultado = $conexion->doSelect("
		sede.sede_id, sede.sede_nombre, sede.sede_nombrecorto, 
		sede.sede_img, sede.sede_activo, 
		sede.sede_eliminado
	    ",
		"sede				
		",
		"sede_activo = '1' and sede_id = '$getsede'");
	foreach($arrresultado as $i=>$valor){

		$sede_id = utf8_encode($valor["sede_id"]);
		$sede_nombre = utf8_encode($valor["sede_nombre"]);
		$sede_img = utf8_encode($valor["sede_img"]);
		$sede_activo = utf8_encode($valor["sede_activo"]);

		$titulo = "<br><span style='font-weight: 600'>Sede:</span> <span style='font-weight:400'>$sede_nombre</span>";

	}

	$arrresultado = $conexion->doSelect("
	usuario.usuario_id, usuario.usuario_nombre, usuario.usuario_apellido, usuario.usuario_email, usuario.usuario_clave, 
	usuario.usuario_dni, usuario.usuario_celular, usuario.usuario_img, usuario.perfil_id, usuario.usuario_activo,
	usuario.usuario_eliminado, usuario.usuario_idreg,
	DATE_FORMAT(usuario_fechareg,'%d/%m/%Y %H:%i:%s') as usuario_fechareg
    ",
	"usuario	
		inner join usuariosede on usuariosede.usuario_id = usuario.usuario_id		
	",
	"usuario_activo = '1' and perfil_id = '2' and usuariosede_activo = '1' and usuariosede.sede_id = '$getsede' ");

}
else{



	$arrresultado = $conexion->doSelect("
	usuario.usuario_id, usuario.usuario_nombre, usuario.usuario_apellido, usuario.usuario_email, usuario.usuario_clave, 
	usuario.usuario_dni, usuario.usuario_celular, usuario.usuario_img, usuario.perfil_id, usuario.usuario_activo,
	usuario.usuario_eliminado, usuario.usuario_idreg,
	DATE_FORMAT(usuario_fechareg,'%d/%m/%Y %H:%i:%s') as usuario_fechareg, 
	usuario_precio
    ",
	"usuario			
	",
	"usuario_activo = '1' and perfil_id = '2'");

}




foreach($arrresultado as $i=>$valor){

	$usuario_id = utf8_encode($valor["usuario_id"]);

	// $usuario_nombre = utf8_encode($valor["usuario_nombre"]);
	$usuario_nombre = $valor["usuario_nombre"];
	// $usuario_apellido = utf8_encode($valor["usuario_apellido"]);
	$usuario_apellido = $valor["usuario_apellido"];
	$usuario_email = utf8_encode($valor["usuario_email"]);
	$usuario_clave = utf8_encode($valor["usuario_clave"]);
	$usuario_dni = utf8_encode($valor["usuario_dni"]);
	$usuario_celular = utf8_encode($valor["usuario_celular"]);
	$usuario_img = utf8_encode($valor["usuario_img"]);
	$perfil_id = utf8_encode($valor["perfil_id"]);
	$usuario_activo = utf8_encode($valor["usuario_activo"]);
	$usuario_precio = utf8_encode($valor["usuario_precio"]);
	$usuario_fechareg = utf8_encode($valor["usuario_fechareg"]);

	if ($usuario_precio==""){$usuario_precio=0;}

	$usuario_precio = number_format($usuario_precio,2,",","."). " PEN";

	if ($usuario_img==""){$usuario_img="1.png";}

	$divmedicos .= "
		<div class='col-md-6' style='margin-top: 15px'>
		    <div style='background: #FFF; padding: 10px'>              
		      <div class='row'>
		        <div class='col-md-6 col-xs-6'>
		        	<div style='height: 200px'>
			            <a href='medico?e=5&id=$usuario_id'>
			              <img src='arch/$usuario_img' style='max-width: 100%; max-height: 200px; border-radius: 50%' alt='$usuario_nombre $usuario_apellido' title='$usuario_nombre $usuario_apellido'>
			            </a>	
		            </div>
		        </div>
		        <div class='col-md-6 col-xs-6'>
		          <a href='medico?e=5&id=$usuario_id'>
		            <h4 style='font-size: 22px'>$usuario_nombre $usuario_apellido</h4>
		          </a>
		          <hr>
		          <div class='row'>
		            <div class='col-md-6' style='margin-top: 10px'>
		              <a href='reservar?e=5&id=$usuario_id'>
		                <button type='button' class='btn btn-primary' style='font-size: 17px'><i class='fa fa-calendar'></i> Reservar</button>
		              </a>
		            </div>
		            <div class='col-md-6' style='margin-top: 10px'>
		              <a href='medico?e=5&id=$usuario_id'>
		                <button type='button' class='btn btn-success' style='font-size: 17px'><i class='fa fa-list'></i> Ver Más</button>
		              </a>
		            </div>
		            
		          </div>
		        </div>
		      </div>
		    </div>
		   
		  </div>
	";

}



require_once "views/buscar-medicos.php";

?>