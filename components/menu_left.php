
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">

        <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Bienvenido: <b><?php echo $_SESSION['user']; ?></b></a></li>
        <?php if($_SESSION['admin'] == 1){ ?>
        <li><a href="#"><i class="fa fa-users"  aria-hidden="true"></i> Administración</a>
            <ul>
              <li><a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> Ingresar Personas</a></li>
              <li><a href="entrenamientos.php"><i class="fa fa-search" aria-hidden="true"></i> Ingresar Entrenamientos</a></li>
            </ul>
        </li>
        <li><a href="horarios.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Horarios</a></li>
        <?php }else{ ?>
          <li><a href="horarios.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Horarios</a></li>
        <?php } ?>

	</ul>

  <ul class="nav nav-sidebar">
  	<li><a class="logout"><i class="fa fa-power-off" aria-hidden="true"></i> Cerrar sesión</span></a></li>
  </ul>
</div>