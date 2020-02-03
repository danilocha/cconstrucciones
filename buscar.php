<?php include 'includes/header.php';
include 'admin/conexion/conexion_web.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_estado = htmlentities($_POST['estado']);
    $municipio = htmlentities($_POST['municipio']);
    $operacion = htmlentities($_POST['operacion']);
    $tipo_inmueble = htmlentities($_POST['tipo_inmueble']);
    $rango1 = htmlentities($_POST['rango1']);
    $rango2 = htmlentities($_POST['rango2']);
   
    
    $sel_edo = $con->prepare("SELECT departamento FROM departamentos WHERE id_departamento = ? ");
    $sel_edo -> bind_param('i', $id_estado);
    $sel_edo -> execute();
    $res_edo = $sel_edo->get_result();
    if($f_edo = $res_edo->fetch_assoc()){
        $estado = $f_edo['departamento'];
    }
    $sel_marc = $con->prepare("SELECT foto_principal, precio, estado, municipio, fraccionamiento, propiedad, comentario_web FROM inventario WHERE estado = ? AND municipio = ? AND operacion =  ? AND tipo_inmueble = ? AND precio BETWEEN ? AND ? ");
    $sel_marc->bind_param('ssssdd', $estado, $municipio, $operacion, $tipo_inmueble, $rango1, $rango2);
    $sel_marc->execute();
    $res_marc = $sel_marc->get_result();

}else{
    header('location:index.php');
    exit;
  }
 ?>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container row">
<?php

while ($f_marc = $res_marc->fetch_assoc()) {
		    	?>
		      <div class="col s12 m6 l4">
            <a href="casa.php?id=<?php echo $f_marc['propiedad'] ?>">
            <div class="card">  
              <div class="card-image">
                <img src="admin/propiedades/<?php echo $f_marc['foto_principal'] ?>">
                  <span class="card-title center bg" style="width: 100%;"> <?php echo $f_marc['fraccionamiento']?></span>
                  <a href="casa.php?id=<?php echo $f_marc['propiedad'] ?>" class="btn-floating halfway-fab waves-effect waves-light red large"><i class="material-icons">
                  arrow_forward_ios
                  </i></a>
              </div>
                  <div class="card-content">
                    <p class=""><?php echo substr($f_marc['comentario_web'], 0, 200) ?>...</p>
                  </div>
            </div>
            </a>
          </div>
            
		      <?php } 
		      $sel_marc->close();?>
</div>

<?php include 'includes/footer.php'; ?>
</body>

<?php include 'scripts/scripts.php' ?>
