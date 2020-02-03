<?php include 'includes/header.php'; ?>
<body>
<?php include 'includes/nav.php'; ?>
<?php include 'admin/conexion/conexion_web.php';
$id = htmlentities($_GET['id']);
$sel = $con->prepare("SELECT * FROM inventario WHERE propiedad = ? ");
$sel->bind_param('s', $id);
$sel->execute();
$res = $sel->get_result();
if ($f =$res->fetch_assoc()) {
}
?>
<div class="row">
  <div class="contenido col s12 m12 l4" style="margin-top: -30px;">
    
      
        <div class="card row wow animated fadeInLeft">
          
          <div class="card-stacked col s12">
            <div class="card-content">
              <div class="row">

                  <div class="swiper-container row">
                    <!--  -->

                    <div class="swiper-wrapper">
                      <?php $sel_img = $con->prepare("SELECT * FROM imagenes WHERE id_propiedad = ? ");
           $sel_img->bind_param('s', $id);
           $sel_img->execute();
           $res_img = $sel_img->get_result();
           while ($f_img =$res_img->fetch_assoc()) {?>
            <div class="swiper-slide">
            <img src="admin/propiedades/<?php echo $f_img['ruta'] ?>" width="200" class="imagen-slide">
          </div>
            <?php }
             ?>
                      
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
                </div>
            </div>

          </div>

        

      </div>
      <div class="card row s12 iconos" style="text-align:center">
        <div class="col s2">
          <p><img src="images/iconos/1.png" alt="" width="100%"><b>CUARTOS:</b> <?php echo $f['recamaras'] ?></p>
        </div>
        <div class="col s2">
          <p><img src="images/iconos/2.png" alt="" width="100%"><b>BAÑOS:</b> <?php echo $f['banos'] ?></p>
        </div>
                <div class="col s2"> 
          <p><img src="images/iconos/5.png" alt="" width="100%"><b>PISOS:</b> <?php echo $f['plantas'] ?></p>
        </div>
        <div class="col s2"> 
          <p><img src="images/iconos/6.png" alt="" width="100%"><b>Lote:</b> <?php echo $f['m2t'] ?> mt2</p>
        </div>
        <div class="col s2"> 
          <p><img src="images/iconos/7.png" alt="" width="100%"><b>Contruido:</b> <?php echo $f['m2c'] ?> mt2</p>
        </div>
        <div class="col s2">
          <p><img src="images/iconos/3.png" alt="" width="100%"><b>PARQUEADEROS:</b> <?php echo $f['cocheras'] ?></p>
        </div>
      </div>
  </div>



  <div class="col s12 m12 l8 card">
    <h4 class="white-text teal darken-3 center s12 pad">CASA CAMPESTRE D44</h4>
    <p class="comentario-web"><?php echo nl2br($f['comentario_web']) ?> </p>
    <h5 class="center pad" style="border: solid 4px #940606;">VALOR DE LA INVERSIÓN: $ <?php echo number_format($f['precio']) ?> (NEGOCIABLES)</h5>
  </div>

	

		
	
	
</div>






<?php include 'includes/footer.php'; ?>
</body>
<?php include 'scripts/scripts.php' ?>