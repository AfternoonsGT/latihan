<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand fw-bold text-primary" href="#">
      ✈ TravelKu
    </a>

    <!-- TOGGLER -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- LEFT MENU -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active fw-semibold" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Destinasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Paket</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Lainnya
          </a>
          <ul class="dropdown-menu shadow-sm border-0">
            <li><a class="dropdown-item" href="#">Tentang Kami</a></li>
            <li><a class="dropdown-item" href="#">Kontak</a></li>
            <li><a class="dropdown-item" href="#">Bantuan</a></li>
          </ul>
        </li>
      </ul>

      <!-- RIGHT MENU: SEARCH + LOGIN -->
     <div class="d-flex align-items-center">
        <form action="/destinations" method="GET" class="d-flex me-2" role="search">
          <input class="form-control rounded-pill me-2 px-3" type="search" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-primary rounded-pill px-3" type="submit">
            🔍
          </button>
        </form>


        <!-- LOGIN BUTTON -->
        <a href="#" class="btn btn-outline-primary rounded-pill px-4">
          Login
        </a>
      </div>

    </div>
  </div>
</nav>

<style>
/* Hover effect menu */
.nav-link {
    transition: 0.2s;
}

.nav-link:hover {
    color: #0d6efd !important;
}

/* Search input lebih halus */
.form-control {
    border-radius: 50px;
}

/* Dropdown lebih smooth */
.dropdown-menu {
    border-radius: 10px;
}

/* Login button hover */
.btn-outline-primary:hover {
    background-color: #0d6efd;
    color: white;
    border-color: #0d6efd;
    transition: 0.2s;
}
</style>