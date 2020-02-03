<?php include 'includes/header.php'; 
include 'admin/conexion/conexion_web.php';
?>
<body>
<?php include 'includes/nav.php'; ?>
<style>


</style>
<!-- Seccion de bienvenida -->
<div class="row">
	<h1 class="col s12 center animated slideInDown grey2-text">
	<img src="images/logo.png" class="titulo" alt="">
	</h1>

		<div class="col s12 m3">
	    	<div class="card hoverable animated fadeInUp">
	      		<div class="card-action teal darken-2 center">
	         	 <a href="diseño" class="white-text">Diseño</a>
	        	</div>
	       <!--  <div class="card-image"><a href="">
	          <img src="images/proyecto.png">
	          <span class="card-title">Card Title</span></a>
	        </div> -->
			 </div>
	    </div>
		<div class="col s12 m3">
	    	<div class="card hoverable animated fadeInUp">
	      		<div class="card-action teal darken-2 center">
	         	 <a href="construccion" class="white-text">Construccion</a>
	        	</div>
	       <!--  <div class="card-image"><a href="">
	          <img src="images/proyecto.png">
	          <span class="card-title">Card Title</span></a>
	        </div> -->
			 </div>
	    </div>



	    <div class="col s12 m3">
	      	<div class="card hoverable animated fadeInUp">
		      	<div class="card-action teal darken-2 center">
		          <a href="inmobiliaria" class="white-text">inmobiliaria
		        </div>
	        <!-- <div class="card-image"><a href="">
	          <img src="images/proyecto.png">
	          <span class="card-title">Card Title</span></a>
	        </div> -->
		      </div>
		</div>
	    
	    
	    <div class="col s12 m3">
		    <div class="card hoverable animated fadeInUp">
		      	<div class="card-action teal darken-2 center">
		          <a href="nosotros" class="white-text">Nosotros</a>
		        </div>
	       <!--  <div class="card-image"><a href="">
	          <img src="images/proyecto.png">
	          <span class="card-title">Card Title</span></a>
	        </div> -->
			</div>
	    </div>
	

  </div>
<!-- 
Seccion del slider -->

<div class="row">

	<div class="swiper-container row">
		<!--  -->
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="images/1.jpg" class="imagen-slide" alt=""></div>
      <div class="swiper-slide"><img src="images/2.jpg" class="imagen-slide" alt=""></div>
      <div class="swiper-slide"><img src="images/3.jpg" class="imagen-slide" alt=""></div>
      <div class="swiper-slide"><img src="images/4.jpg" class="imagen-slide" alt=""></div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</div>
<!-- 
Seccion de Construimos a tu medida -->
<div class="row">
	<div class="container" style="width:100%" >
		<div class="card">
			<div class="card-contend col s12 l8"><iframe width="100%" height="400px" src="https://www.youtube-nocookie.com/embed/VzHtEpvOiys?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>

			<div class="card-panel col l4 s12 valign-wrapper teal" width="100%">

		        <span class="white-text pad">En Condominios y Construcciones, planificamos, diseñamos, construimos y comercializamos CONDOMINIOS TURISTICOS y RESIDENCIALES, ofreciendo a los clientes diseños personalizados y con valores de obra fijos. Nuestro grupo de profesionales tiene como su principal función buscar la mejor rentabilidad para los inversionistas y la satisfacción total de los clientes. Lo invitamos a que sea uno de nuestros clientes satisfechos. Permítanos disesñarle un anteproyecto sin ningún costo 
		        </span>
	     	 </div>
	     	 <div class="card-action col l4 s12 animated fadeInUp wow center #b71c1c ">
          <a href="nosotros" class="white-text btn red darken-3">Conocenos</a>
           <a href="contacto" class="white-text btn red darken-3">Contactanos</a>
        </div>
 
		</div>
	</div>

</div>


<!-- Slides de casas y arriendos  -->

<div class="row">
	
	<div class="col s12 m8 ">
		<h3 class="center grey2-text">Casas en Venta</h3>
		<div class="slider">
		    <ul class="slides">
		    	<?php 
		    	$sel_marc = $con->prepare("SELECT foto_principal, precio, estado, municipio, fraccionamiento, propiedad,comentario_web FROM inventario WHERE marcado = 'SI' AND operacion = 'VENTA' AND tipo_inmueble = 'CASA'");
		    	$sel_marc->execute();
		    	$res_marc = $sel_marc->get_result();
		    	while ($f_marc = $res_marc->fetch_assoc()) {
		    	?>
		      <li>
		        <img src="admin/propiedades/<?php echo $f_marc['foto_principal'] ?>">
		        <div class="caption center-align bg">
		          <h3> <?php echo $f_marc['fraccionamiento']?></h3>
		          <h5 class="light grey-text text-lighten-3" style="font-size: 20px;" ><?php echo substr($f_marc['comentario_web'], 0, 200) ?>...</h5>
		          <a href="casa.php?id=<?php echo $f_marc['propiedad'] ?>" class="btn">Mas informacion</a>
		        </div>
		      </li>
		      <?php } 
		      $sel_marc->close();?>
		      
		    </ul>
		  </div>
	</div>
	<div class="col s12 m4 ">
		<h3 class="center grey2-text">Lotes en Venta</h3>
		<div class="slider">
		    <ul class="slides">
		    	<?php 
		    	$sel_marc = $con->prepare("SELECT foto_principal, precio, estado, municipio, fraccionamiento, propiedad,comentario_web FROM inventario WHERE marcado = 'SI' AND operacion = 'VENTA' AND tipo_inmueble = 'LOTE'");
		    	$sel_marc->execute();
		    	$res_marc = $sel_marc->get_result();
		    	while ($f_marc = $res_marc->fetch_assoc()) {
		    	?>
		      <li>
		        <img src="admin/propiedades/<?php echo $f_marc['foto_principal'] ?>">
		        <div class="caption center-align bg">
		          <h3> <?php echo $f_marc['fraccionamiento']?></h3>
		          <h5 class="light grey-text text-lighten-3" style="font-size: 20px;" ><?php echo substr($f_marc['comentario_web'], 0, 200) ?>...</h5>
		          <a href="casa.php?id=<?php echo $f_marc['propiedad'] ?>" class="btn">Mas informacion</a>
		        </div>
		      </li>
		      <?php } 
		      $sel_marc->close();?>
		      
		    </ul>
		  </div>
	</div>
</div>

<!-- Seccion de quienes somos y cometarios -->
<div class="row ">
	<div class="col l6 wow animated fadeInLeft">
		<div class="card-panel teal">
			<h3 class="center white-text lighten-3">Nuestra empresa</h3>
        <span class="white-text">Contamos con una gran trayectoria haciendo sus sueños y proyectos realidad. Nos destacamos en el mercado de la construcción gracias al dinamismo de nuestros colaboradores, a la receptividad y al empeño que ponemos al materializar sus ideas y llevarlas a la realidad de forma creativa e innovadora. 
Nuestro excelente equipo de profesionales en diseño, construcción, comercialización y administración, estarán siempre dispuestos a servirle y a garantizar el mejor diseño, precio, calidad y cumplimiento. 
      </div>
	</div>
	<div class="col l6 wow animated fadeInRight">
		<div class="card-panel white">
			<h3 class="center algo grey2-text">Testimonios</h3>
			<img src="images/usuario.png" alt="" class="circle pe col s2">
        <span class="black-text col s10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos voluptate, eius recusandae laborum corrupti, illum doloremque? Inventore doloribus magni blanditiis maiores eius officiis ullam ratione porro, perspiciatis dolores maxime soluta?
        </span>
        <div style="clear: both;"></div>
      </div>

	</div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
<?php include 'scripts/scripts.php' ?>