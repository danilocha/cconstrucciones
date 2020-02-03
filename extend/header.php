<?php include('../conexion/conexion.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
	<link rel="shortcut icon" type="image/png" href="../images/ccfav.png"/>
	<link rel="stylesheet" href="../dist/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style>
	    header, main, footer {
	      padding-left: 300px;
	    }

	    @media only screen and (max-width : 992px) {
	      header, main, footer {
	        padding-left: 0;
	      }
	    }		
	</style>
	<title>Admin C&C</title>
</head>
<body>
	<main>
		<?php include 'nav.php'; ?>