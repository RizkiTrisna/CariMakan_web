  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rest Client Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>css/simple-sidebar.css" rel="stylesheet">

  </head>

  <body>

    <div class="d-flex" id="wrapper">

      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
          <h3>GoTake Coffee </h3>
          <h6>Admin Dashboard</h6>
        </div>
        <div class="list-group list-group-flush">
          <a href="<?= base_url(); ?>admin/adminUser" class="list-group-item list-group-item-action bg-light">Konfigurasi User</a>
          <a href="<?= base_url(); ?>admin/adminCafe" class="list-group-item list-group-item-action bg-light">Konfigurasi Cafe</a>
          <a href="<?= base_url(); ?>admin/index" class="list-group-item list-group-item-action bg-light">Overview</a>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->
  
      <!-- Page Content -->
      <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <button class="btn btn-light" id="menu-toggle">
            <</button> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
              </li>

            </ul>
          </div>
        </nav>

        <div class="container-fluid">