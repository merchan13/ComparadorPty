<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="#">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ComparadorPty - Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="resources/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="resources/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="resources/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<?php
	session_start();
	if(!$_SESSION['logged']){
    	header("Location: compty-admin.php");
    	exit;
	}

	$usuario = $_SESSION['user'];
	$password = $_SESSION['password'];
	$id = $_SESSION['id'];
	$logo = $_SESSION['logo'];
 ?>

<div class="wrapper">
    <div class="sidebar" data-color="banesco-blue" data-image="resources/assets/img/sidebar-7.png">

    	<div class="sidebar-wrapper">
            <div class="logo">
				<?php
					echo '
						<img src="'.$logo.'" alt="" />
						<a href="compty-admin-perfil_usuario.php?id='.$id.'&password='.$password.'" class="simple-text">
						'.$usuario.'
						</a>';
				?>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="compty-admin-user_dashboard.php">
                        <i class="pe-7s-diamond"></i>
                        <p>Productos</p>
                    </a>
                </li>
				<li class="active">
                    <a href="compty-admin-agregar_producto.php">
                        <i class="pe-7s-plus"></i>
                        <p>Agregar Nuevo</p>
                    </a>
                </li>
				<li class="active">
                    <a href="compty-admin-perfil_usuario.php">
                        <i class="pe-7s-id"></i>
                        <p>Perfil</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only" style="color:white">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="resources/images/logo.png" alt=""
						style="max-width: 150px; max-height: 150px; float: left; margin: auto;"/></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="compty-admin.php" style="color: white">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Productos</h4>
                                <p class="category">Tarjetas de Créditos</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Producto</th>
                                    	<th>Marca</th>
                                    	<th>Tasa</th>
                                    	<th>Cargos X Mes</th>
                                    	<th>Beneficios</th>
										<th>Acciones</th>
                                    </thead>
                                    <tbody>
										<?php getInfoProductosUsuario($id); //Hacer que tome el valor!?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                © Javier Merchán - UCAB 2016
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="resources/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="resources/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="resources/assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="resources/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="resources/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="resources/assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="resources/assets/js/demo.js"></script>


</html>

<?php

	//Informacion de los Productos
	//Recibe el id del usuario dueño de los productos
	function getInfoProductosUsuario($usuario_id){

		include ("conexion.php");

		$sql = "SELECT * FROM comparador_producto_tdc WHERE usuario_admin_id = '$usuario_id'";
		$result = mysqli_query($mysqli, $sql);

		while($row = mysqli_fetch_array($result))
		{

			//Atributos
			$id = $row["producto_tdc_id"];
			$nombre = $row["producto_tdc_nombre"];
			$descripcion = $row["producto_tdc_descripcion"];
			$ingresoMin = $row["producto_tdc_ingresoMin"];
			$tasaInteres = $row["producto_tdc_tasaInteres"];
			$cargosMes = $row["producto_tdc_cargosMes"];
			$seguroVida = $row["producto_tdc_seguroVida"];
			$tasaMora = $row["producto_tdc_tasaMora"];
			$imagenUrl = $row["producto_tdc_imagenUrl"];
			//Foreign Keys
			$marca_id = $row["fk_marca_tdc_id"];

			//[0]: nombre
			//[1]: imagenUrl
			$marca = getMarcaProducto($marca_id);

			//[...] beneficio1, beneficio2, ...
			$beneficios = getBeneficiosProducto($id);

			//Imprimir tabla
			printInformacionProducto($nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,$tasaMora,
			$imagenUrl,$marca,$beneficios);
		}

		mysqli_close($mysqli);

		return true;
	}


	//Marca de la TDC
	//Recibe el id de la marca.
	function getMarcaProducto($marca_id){

		include ("conexion.php");
		$sql = "SELECT * FROM comparador_marca_tdc WHERE marca_tdc_id = $marca_id";
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_array($result);

		return array($row["marca_tdc_nombre"], $row["marca_tdc_imagenUrl"]);
	}


	//Beneficios de la TDC
	//Recibe el id del producto.
	function getBeneficiosProducto($producto_id){

		include ("conexion.php");
		$sql = "SELECT B.beneficio_tdc_nombre
				FROM comparador_beneficio_tdc B, comparador_producto_beneficio PB
				WHERE B.beneficio_tdc_id = PB.beneficio_tdc_id AND PB.producto_tdc_id = '$producto_id'";
		$result = mysqli_query($mysqli, $sql);

		$beneficios = array();

		while($row = mysqli_fetch_array($result))
		{
			$beneficios[] = $row["beneficio_tdc_nombre"];
		}

		return $beneficios;
	}


	//Imprimir HTML
	//Recibe toda la informacion de la tarjeta
	function printInformacionProducto($nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,$tasaMora,
	$imagenUrl,$marca,$beneficios){
		echo'
		<tr>
			<td>
				<p>'.$nombre.'</p>
				<img src="'.$imagenUrl.'"
					alt="" class="imagen-producto" />
			</td>
			<td><img src="'.$marca[1].'" alt="" /></td>
			<td>'.$tasaInteres.'</td>
			<td>'.$cargosMes.'</td>
			<td>
				<ul>';
					foreach ($beneficios as &$beneficio) {
						echo '<li>'.$beneficio.'</li>';
					}
		echo'
				</ul>
			</td>
			<td>
				<ul class="actions">
					<li><a title="Modificar"
						class="btn btn-primary glyphicon glyphicon-pencil"
						style=""
						href="#"></a>
					</li>
					<li><a title="Eliminar"
						class="btn btn-danger glyphicon glyphicon-remove"
						style=""
						href="#"></a>
					</li>
				</ul>
			</td>
		</tr>';
	}
 ?>
