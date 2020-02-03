<?php include 'includes/header.php';
include 'admin/conexion/conexion_web.php';

 ?>

<body>
<?php include 'includes/nav.php'; ?>

  <div class="container row">
    
  <div class="col s12">
        <div class="card">
          <span class="card-title">Buscador de inmuebles</span>
            <form action="buscar.php" method="post">
              <div class="col s6">
                <select id="estado" name="estado" required>
                  <option value="" disabled selected>Selecciona un departamento</option>
                  <?php 
                  $sel_estado = $con->prepare("SELECT * FROM departamentos");
                  $sel_estado->execute();
                  $res_estado = $sel_estado->get_result();
                  while ($f_estado =$res_estado->fetch_assoc()) {?>
                    <option value="<?php echo $f_estado['id_departamento'] ?>"><?php echo $f_estado['departamento'] ?></option>
                  <?php }
                  $sel_estado->close(); ?>
                </select>
            </div>
            <div class="col s6">
              <div class="res_estado"></div>
            </div>
            

            <div class="row">
              <div class="col s6">
                <select name="tipo_inmueble" required >
                  <option value="" disabled selected  >ELIGE EL TIPO DE INMUEBLE</option>
                  <option value="CASA">CASA</option>
                  <option value="TERRENO">TERRENO</option>
                  <option value="LOCAL">LOCAL</option>
                  <option value="DEPARTAMENTO">DEPARTAMENTO</option>
                </select>
              </div>
              <div class="col s6">
                <select name="operacion" required  >
                  <option value="" disabled selected  >ELIGE LA OPERACION</option>
                  <option value="VENTA">VENTA</option>
                  <option value="RENTA">RENTA</option>
                  <option value="TRASPASO">TRASPASO</option>
                  <option value="OCUPADO">OCUPADO</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col s6">
                <div class="input-field">
                  <input type="number" name="rango1" id="rango1" required>
                  <label for="rango1">Precio minimo</label>
                </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <input type="number" name="rango2" id="rango2" required>
                  <label for="rango2">Precio maximo</label>
                </div>
              </div>
            </div>
            <button type="submit" class="btn">Buscar inmueble</button>
          </form>
          
        </div>
      </div>

  <?php 
		    	$sel_marc = $con->prepare("SELECT foto_principal, precio, estado, municipio, fraccionamiento, propiedad,comentario_web FROM inventario WHERE marcado = 'SI' AND operacion = 'VENTA'");
		    	$sel_marc->execute();
		    	$res_marc = $sel_marc->get_result();
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
