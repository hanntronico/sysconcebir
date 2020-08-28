<?php 
date_default_timezone_set('America/Lima');

// $fecha_ven="2020-08-29 14:05";
// $fecha_actual=date("Y-m-d H:i");

// $fecha_vencimiento = new DateTime($fecha_ven);
// $fecha_de_hoy = new DateTime($fecha_actual);
// $interval = $fecha_vencimiento->diff($fecha_de_hoy);

// $minutos = $interval->format('%I');

// echo $minutos-4;

$datetime1 = date_create("2020-08-28");
$datetime2 = date_create(date("Y-m-d"));
$interval = date_diff($datetime1, $datetime2);
   
$difanio = $interval->format("%Y");
$difmes = $interval->format("%m");
$difdia = $interval->format("%d");

if ($difanio==0 && $difmes==0 && $difdia==0) {
	echo "es hoy";
}


?>