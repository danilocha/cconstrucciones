<?php 
include '../conexion/conexion.php';
$id = htmlentities($_GET['id']);
$foto = htmlentities($_GET['foto']);

$del = $con->prepare("DELETE FROM inventario WHERE propiedad=?");
$del->bind_param('s', $id);

if ($del->execute()) {
	if ($foto != "casas/foto_principal.png") {
		unlink($foto);
	}
	$sel = $con->prepare("SELECT * FROM imagenes WHERE id_propiedad = ?");
	$sel->bind_param('s', $id);
	$sel->execute();
	$res = $sel->get_result();
	while ($f =$res->fetch_assoc()) {
		$ruta_final = '../propiedades/'.$f['ruta'];
		unlink($ruta_final);
	}
	$del_img = $con->prepare("DELETE FROM imagenes WHERE id_propiedad=?");
	$del_img->bind_param('s', $id);
	$del_img->execute();
	$del_img->close();
	header('location:../extend/alerta.php?msj=propiedad eliminada&c=prop&p=can&t=success');
}else{
	header('location:../extend/alerta.php?msj=propiedad no eliminada&c=prop&p=can&t=error');
}
$del->close();
$con->close();
?>