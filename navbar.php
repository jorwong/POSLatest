<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark py-0">

  <!-- button for mobile -->
  <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapse_target">
      <!-- nav branding -->
      <a class="navbar-brand text-primary" href="home.html">Tink's Bistro</a>

      <!-- nav links -->
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link" href="home.php">Dashboard</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="pos.php">POS</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">CRM</a>
          </li>
      </ul>

      <!-- dropdown -->
      <div class="dropdown">
          <button type="button" class="btn py-2 px-3 btn-light dropdown-toggle" data-toggle="dropdown">
            Settings
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="setup.html">Setup</a>
            <a class="dropdown-item" href="profile.php">Profile</a>
            <a class="dropdown-item" href="#">Tour</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" id="btnLogout">Logout</a>
          </div>
        </div>

  </div>

</nav>

<!-- breadcrumb  
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item small"><a href="home.php">home</a></li>
      <li class="breadcrumb-item small"><a href="setup.html">Setup</a></li>
      <li class="breadcrumb-item small"><a href="setup-globalSettings.html">Global Settings</a></li>
      <li class="breadcrumb-item small active" aria-current="page">Order Cancellation Reasons</li>
    </ol>
  </nav> -->
