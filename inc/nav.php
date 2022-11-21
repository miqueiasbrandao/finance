<nav class="navbar navbar-expand-lg bg-dark border-bottom border-success border-bottom border-5 fade-in" style="z-index: 1;">
  <div class="container-fluid container fade-in" style="color: white;">
    <a class="navbar-brand" data-bs-toggle="modal" data-bs-target="#exampleModal" href="" onclick="loading2('home.php')" style="color: white;">
    
    <i class="fa-solid fa-hand-holding-dollar fs-1"></i>
  
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" style="color: white;" aria-current="page" href="#">Listagem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: white;">Link</a>
        </li> -->
      </ul>
        <li class="nav-item dropdown dropstart text-end d-flex">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            <?php if($_SESSION['grupo_usuario'] == 1){ ?>
              <i class="fa-solid fa-user-shield"></i>
            <?php } ?>

            <?php if($_SESSION['grupo_usuario'] == 2){ ?>
              <i class="fa-solid fa-user"></i>
            <?php } ?>


            <?php echo strtoupper($_SESSION['usuario']) ?>

          </a>
          <ul class="dropdown-menu dropdown-start">
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user-pen"></i> Alterar senha</a></li>
            
            <?php if($_SESSION['grupo_usuario'] == 1){ ?>
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-users-gear"></i> Gerenciar Usuarios</a></li>
            <?php } ?>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('controler/logoff.php')"><i style="-moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1); transform: scaleX(-1);" class="fa-solid fa-arrow-right-from-bracket"></i> Logoff</a></li>
          </ul>
        </li>
    </div>
  </div>
</nav>