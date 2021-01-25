  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right w-25 mt-1" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <a href="/" class="list-group-item list-group-item-action bg-light" data-parent="#sidebar-wrapper"><i class="fas fa-chalkboard-teacher"></i><span class="ml-2">Dashboard</a>
        <a href="#collapse-funcionarios" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-funcionarios" class="list-group-item list-group-item-action bg-light">
          <i class="fas fa-user-tie"></i><span class="ml-2">Funcionários</span>
        </a>
          <div class="collapse" id="collapse-funcionarios" data-parent="#sidebar-wrapper">
            <a class="list-group-item list-group-item-action list-group-item-light border-0" href="/user_create">Cadastro</a>
            <a class="list-group-item list-group-item-action list-group-item-light border-0" href="/user_search/edit">Edição</a>
            <a class="list-group-item list-group-item-action list-group-item-light border-0" href="/user_search/search">Consulta</a>
          </div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

<?php require $content->load();?>

  <!-- Page Content -->
  <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom fixed-top">
        <a class="navbar-brand exo2-semi-bold-italic" href="#"><img class="mr-2 ml-2" src="/images/crudx_white.png" alt="" width="40" height="31">CRUDx</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars fa-small-size"></i>
        </button>

        <div class="collapse navbar-collapse m-0" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2">Estênio Mariano</span><i class="fas fa-user-circle fa-small-size"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"><i class="fas fa-address-card"></i><span class="ml-3">Perfil</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fas fa-times-circle"></i><span class="ml-3">Logout</span></a>
              </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-question-circle fa-small-size"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown2">
                <a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i><span class="ml-3">Ajuda</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fas fa-info-circle"></i><span class="ml-3">Sobre</span></a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- /#page-content-wrapper -->
  </div>

  <div id="page-content-footer" class="bg-secondary border-top fixed-bottom">
    <h6 class="text-dark text-center pt-2">CRUDx &copy; Estênio Mariano 2021</h6>
  </div>
