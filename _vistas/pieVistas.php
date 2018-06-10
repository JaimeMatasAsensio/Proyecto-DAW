<footer class="container-fluid">
	<div id="contPie">
		<div id="enlacesPie" class="col-xs-4">
				<?php
		if( isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) ){
			$nivelAcc = $_SESSION["nivelAcceso"];
			//Enlaces de navegacion para un usuario con el nivel de acceso de administrador
			if ($nivelAcc == "adm") {
				echo "<ul>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=tiendas'>Tiendas</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=usuarios'>Usuarios</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=productos'>Productos</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=proveedores'>Proveedores</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=empleados'>Empleados</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=alertas'>Alertas</a></li>";
				echo "</ul>";
			}
			//Enlaces de navegacion para un usuario con el nivel de acceso de gerente
			if ($nivelAcc == "gen") {
				echo "<ul>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=productos'>Productos</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=proveedores'>Proveedores</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=empleados'>Empleados</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=alertas'>Alertas</a></li>";
				echo "</ul>";
			}
			//Enlaces de navegacion para un usuario con el nivel de acceso de empleado
			if ($nivelAcc == "emp") {
				echo "<ul>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=productos'>Productos</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=proveedores'>Proveedores</a></li>";
				echo "<li><a href='../_web/controller.php?accion=move&operacion=alertas'>Alertas</a></li>";
				echo "</ul>";
			}
		}
		?>
		</div>
		<div id="redesSociales" class="col-xs-5">
			<div>
				<a href="https://es-es.facebook.com/"><img src="../_recursos/img/facebook.png" alt="logo facebook"></a>
				<a href="https://www.instagram.com/?hl=es"><img src="../_recursos/img/instagram.png" alt="logo instagram"></a>	
			</div>
			<div>
				<a href="https://www.pinterest.es/"><img src="../_recursos/img/pinterest.png" alt="logo pinterest"></a>
				<a href="https://twitter.com/?lang=es"><img src="../_recursos/img/twitter.png" alt="logo twitter"></a>
			</div>
		</div>
		<div id="logoPie" class="col-xs-3">
			<a href="index.php"><img src="../_recursos/img/Logo_Movil.jpg"  class="border-shopShpere-xs hidden-sm hidden-md hidden-lg" alt="Logo shopsphere" title="shopsphere.S.L.U"></a>
			<a href="../index.php"><img src="../_recursos/img/Logo_Largo.jpg"  class="border-shopShpere-xs hidden-xs" alt="Logo shopsphere" title="shopsphere.S.L.U"></a>
		</div>
	</div>

</footer>