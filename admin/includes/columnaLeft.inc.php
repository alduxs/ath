<?php
if (isset($_GET["seccion"])) {
	$seccion = $objContenido->dataCleaner($_GET["seccion"],'AN');
} else {
	$seccion = "inicio";
}
if (isset($_GET["subseccion"])) {
	$subseccion = $objContenido->dataCleaner($_GET["subseccion"],'AN');
} else {
	$subseccion = "";
}
?>
<li <?php if ($seccion=="inicio"): ?>class="active"<?php endif; ?>>
	<a href="home.php?seccion=inicio"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span>  </a>
</li>
<li <?php if ($seccion=="email"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">E-mail</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstEmail.php?seccion=email">Listar </a></li>
	</ul>
</li>
<!--
<li <?php if ($seccion=="home"): ?>class="active"<?php endif; ?>>
	<a href="lstSecciones.php?seccion=home&page=1"><i class="fa fa-tasks"></i> <span class="nav-label">Home</span> <span class="fa arrow"></span></a>
</li>

<li <?php if ($seccion=="chischaca"): ?>class="active"<?php endif; ?>>
	<a href="lstSecciones.php?seccion=chischaca&page=2"><i class="fa fa-tasks"></i> <span class="nav-label">Chischaca Lodge</span> <span class="fa arrow"></span></a>
</li>

<li <?php if ($seccion=="amakela"): ?>class="active"<?php endif; ?>>
	<a href="lstSecciones.php?seccion=amakela&page=3"><i class="fa fa-tasks"></i> <span class="nav-label">Amakela Lodge</span> <span class="fa arrow"></span></a>
</li>

<li <?php if ($seccion=="charity"): ?>class="active"<?php endif; ?>>
	<a href="lstSecciones.php?seccion=charity&page=4"><i class="fa fa-tasks"></i> <span class="nav-label">Charity Program</span> <span class="fa arrow"></span></a>
</li>
-->
<li <?php if ($seccion=="disenioemail"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-user"></i> <span class="nav-label">Diseño E-mail</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstDemail.php?seccion=disenioemail">Listar </a></li>
		<li><a href="addDemail.php?seccion=disenioemail">Agregar </a></li>
	</ul>
</li>

<li <?php if ($seccion=="envioemail"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-user"></i> <span class="nav-label">Envio E-mail</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstEnvemail.php?seccion=envioemail">Listar Envios</a></li>
		<li><a href="addEnvemail.php?seccion=envioemail">Enviar </a></li>
	</ul>
</li>

<li <?php if ($seccion=="feedback"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">Comentarios</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstFeedback.php?seccion=feedback">Listar</a></li>
		<li><a href="addFeedback.php?seccion=feedback">Agregar </a></li>
	</ul>
</li>



<li <?php if ($seccion=="galerias"): ?>class="active"<?php endif; ?>>
    <a href="#"><i class="fa fa-file-photo-o"></i> <span class="nav-label">Galerias</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="lstGalerias.php?seccion=galerias">Listar </a></li>
        <li><a href="addGaleria.php?seccion=galerias">Agregar </a></li>
    </ul>
</li>

<li <?php if ($seccion=="patagonia"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">Patagonia</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstPatagonia.php?seccion=patagonia">Listar</a></li>
	</ul>
</li>


<li <?php if ($seccion=="usuarios"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstUsuarios.php?seccion=usuarios">Listar </a></li>
		<li><a href="addUsuario.php?seccion=usuarios">Agregar </a></li>
	</ul>
</li>
