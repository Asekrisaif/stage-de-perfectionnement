<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
  
    

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="welcome" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Consommation Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="welcome" class="d-block">Asekri Seif Eddine</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
            <a href="/" class="nav-link active">
              
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
              
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/utilisateurs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/regions" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>regions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/type_compteurs" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>type_compteurs</p>
                </a>
              </li>
              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/familles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>familles</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/compteurs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>compteurs</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/locals" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>locals</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/factures" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>factures</p>
                </a>
              </li>
              </ul> 
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="/graphe" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>compteur graphe</p>
                </a>
          </li>
            </ul>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="/moyconsommation" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>moyconsommation graphe</p>
                </a>
          </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="/login" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
              </li>
              
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</body>
</html> 