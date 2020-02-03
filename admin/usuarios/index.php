<?php include('../extend/header.php'); 
include('../extend/permiso.php'); ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Alta de usuarios</span>
				<form action="ins_usuarios.php" class="form" method="post" enctype="multipart/form-data">
					<div class="input-field">
						<input type="text" name="nick" required autofocus title="DEBE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)">
						<label for="nick">Nick</label>
					</div>
					<div class="validacion"></div>
					<div class="input-field">
						<input type="password" name="pass1" required autofocus title="DEBE CONTENER ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" >
						<label for="pass1">Contraseña</label>
					</div>
					<div class="input-field">
						<input type="password" name="pass2" required autofocus title="DEBE CONTENER ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" >
						<label for="pass2">Repetir Contraseña</label>
					</div>

					<select name="nivel" required>
						<option value="" disabled selected>Elige un nivel de usuario</option>
						<option value="ADMINISTRADOR">Administrador</option>
						<option value="ASESOR">Asesor</option>
					</select>

					<div class="input-field">
						<input type="text" name="nombre" required autofocus title="Nombre completo del usuario" pattern="[A-Zs ]+" id="nombre" onblur="may(this.value, this.id)">
						<label for="nombre">Nombre</label>
					</div>
					<div class="input-field">
						<input type="email" name="correo" required autofocus title="Correo electronico" id="correo" >
						<label for="correo">Correo</label>
					</div>
					<div class="input-field file-field">
						<div class="btn">
							<span>Foto:</span>
							<input type="file" name="foto">
						</div>
						<div class="file-path-wrapper">
							<input type="text" class="file-path-validate">
						</div>
					</div>
					<button id="btn_guardar" type="submit" class="btn">Guardar <i class="material-icons">send</i></button>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col s12">
		<nav class="grey">
			<div class="nav-wrapper">
				<div class="input-field">

					<input type="search" id="buscar">
					
					<label for="buscar"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>
			</div>
		</nav>
	</div>
</div>

<?php 
$sel = $con->query("SELECT * FROM usuario");
$row = mysqli_num_rows($sel);
 ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Usuarios <?php echo $row; ?></span>
				<table>
					
					<thead>
						<tr class="cabecera">
							<th>nick</th>
							<th>nombre</th>
							<th>correo</th>
							<th>nivel</th>
							<th></th>
							<th>foto</th>
							<th>bloqueo</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					
					<?php while($f = $sel->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $f['nick']; ?></td>
							<td><?php echo $f['nombre']; ?></td>
							<td><?php echo $f['correo']; ?></td>
							<td>
								<form action="up_nivel.php" method="post">
									<input type="hidden" name="id" value="<?php echo $f['id']?>">
									<select name="nivel" required>
										<option value="" selected><?php echo $f['nivel']; ?></option>
										<option value="ADMINISTRADOR">Administrador</option>
										<option value="ASESOR">Asesor</option>
									</select>
							</td>
							<td>
								
								<button type="submit" class="btn-floating"><i class="material-icons">repeat</i></button></form>
							</td>
							<td><img src="<?php echo $f['foto']; ?>" width="50" class="circle" alt=""></td>
							<td>
								<?php if ($f['bloqueo']==1): ?>
									<a href="bloqueo_manual.php?us=<?php echo $f['id']; ?>&bl=<?php echo $f['bloqueo']; ?>"><i class="material-icons">toggle_on</i></a>
									<?php else: ?>
										<a href="bloqueo_manual.php?us=<?php echo $f['id']; ?>&bl<?php echo $f['bloqueo']; ?>"><i class="material-icons grey-text">toggle_off</i></a>
								<?php endif ?>
							</td>
							<td>
								<a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar al usuario?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {  location.href='eliminar_usuario.php?id=<?php echo $f['id'] ?>'; })"><i class="material-icons">clear</i></a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>


<?php include('../extend/scripts.php') ?>
<script src="../js/validacion.js"></script>

</body>
</html>