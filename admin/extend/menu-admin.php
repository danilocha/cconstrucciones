<!-- <nav>
	<a href="" data-activates="menu" class="button-collpase"><i class="material-icons">menu</i></a>
</nav>
<ul id="menu" class="sidenav sidenav-fixed"> 
	
</ul> -->
<div class="navbar-fixed"> 
  <nav>
    <div class="nav-wrapper menu white">
      
      <a href="index" class=""><img src="images/logo.png" alt=""></a>
      <a href="">algo</a>
      <a href="#" data-target="slide-out" class="sidenav-trigger button-collpase">
        <i class="material-icons" style="color: black;">menu</i>
      </a>
        
    
        <ul  class="sidenav sidenav-fixed" id="slide-out">
         <li>
		<div class="user-view">
			<div class="background">
				<img src="../img/fondo.jpg" alt="">
			</div>
			<a href="../perfil/index.php"><img src="../usuarios/<?php echo $_SESSION['foto'] ?>" class="circle" alt=""></a>
			<a href="../perfil/perfil.php" class="white-text"><?php echo $_SESSION['nombre'] ?></a>
			<a href="" class="white-text"><?php echo $_SESSION['correo'] ?></a>
			
		</div>
	</li>
	<li><a href="../inicio"><i class="material-icons">home</i>Incio</a></li>
	<li><div class="divider"></div></li>
		<li><a href="../usuarios"><i class="material-icons">contacts</i>Usuarios</a></li>
	<li><div class="divider"></div></li>
			<li><a href="../clientes"><i class="material-icons">contact_phone</i>Clientes</a></li>
			<li><div class="divider"></div></li>
			<li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons">work</i>Propiedades <i class="material-icons right">arrow_drop_down</i></a></li>
	<li><div class="divider"></div></li>
	<li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i>Salir</a></li>
	<li><div class="divider"></div></li>

        </ul>

<ul id="dropdown1" class="dropdown-content">
	<li><a href="../propiedades/index.php">General</a></li>
	<li><a href="../propiedades/index.php?ope=VENTA">Venta</a></li>
	<li><a href="../propiedades/index.php?ope=RENTA">Renta</a></li>
	<li><a href="../propiedades/index.php?ope=TRASPASO">Traspaso</a></li>
	<li><a href="../propiedades/index.php?ope=OCUPADO">Ocupado</a></li>
	<li><a href="../propiedades/cancelados.php">Suspendidos</a></li>
</ul>
    </div>
  </nav>
</div>   