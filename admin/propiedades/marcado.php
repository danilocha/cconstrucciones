<?php 
include '../conexion/conexion.php';
$id = htmlentities($_GET['id']);
$marcado = htmlentities($_GET['marcado']);

$up = $con->prepare("UPDATE inventario SET marcado=? WHERE propiedad=? ");
$up->bind_param('ss', $marcado, $id);

if ($marcado == '') {
	$marc = 'no publicado';
}else{
	$marc = 'publicado';
}

if ($up->execute()) {
	header('location:../extend/alerta.php?msj=inmueble '.$marc.'&c=prop&p=in&t=success');
}else{
	header('location:../extend/alerta.php?msj=El inmueble '.$marc.'&c=prop&p=in&t=error');
}

$up->close();
$con->close();
 ?>