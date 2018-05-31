<?php
session_start();
?>
<header class="container-fluid bg-principal">
	<div id="contentHeader">
		<div id="logo">
			<a href="../index.php"><img src="../_recursos/img/Logo_Movil.jpg" alt="Logo shopsphere" title="shopsphere.S.L.U"
				class="hidden-sm hidden-md hidden-lg">
				<img src="../_recursos/img/Logo_Largo.jpg" alt="LogoShopsphere" title="shopsphere.s.l.u" class="hidden-xs">
			</a>
		</div>
		<div id="menuEscritorio" class="hidden-xs">
			
		</div>
		<div id="login">
		</div>
		<div id="menuMovil" class="hidden-sm hidden-md hidden-lg">
			<?php
			if( !(isset($_SESSION["nuevoRegistroSuscripcion"])) ||  !(isset($_SESSION["login"])) ){
				echo '<button type="button" id="btnMenuMovil" class="btn bg-secundario">';
	      echo '<span class="glyphicon glyphicon-menu-hamburger"></span>';
	    	echo '</button>';
	    	unset($_SESSION["nuevoRegistroSuscripcion"]);
			}
			?>
	  </div>
	</div>
</header>
	<div id="opcionesMovil" class="hidden-sm hidden-md hidden-lg">
		
	</div>
	<script type="text/javascript" src="_recursos/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="_recursos/js/jqueryUI.js"></script>