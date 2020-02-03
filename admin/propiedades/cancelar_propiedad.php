<?php 
include '../conexion/conexion.php';

$id = htmlentities($_GET['id']);
$accion = htmlentities($_GET['accion']);

$up_inv = $con->prepare("UPDATE inventario SET estatus=? WHERE propiedad=?");
$up_inv->bind_param('ss', $accion, $id);


if ($up_inv->execute()) {
	header('location:../extend/alerta.php?msj=Inmueble '.$accion.'&c=prop&p=in&t=success');
}else{
	header('location:../extend/alerta.php?msj=Inmueble no suspendido&c=prop&p=in&t=error');
}


$up_inv->close();
$con->close();
?>