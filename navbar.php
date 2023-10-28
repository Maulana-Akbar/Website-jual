

<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fs-1 fw-bold" href="index.php" >Qumarang Garden</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-3">
          <li class="nav-item">
            <a class="nav-link active text-dark fw-bold" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle active text-dark fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori Barang
            </a>
            <ul class="dropdown-menu bg-success text-dark" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-dark" href="media.php">Media Tanam</a></li>
              <li><a class="dropdown-item text-dark" href="pot.php">Pot</a></li>
              <li><a class="dropdown-item text-dark" href="tanaman.php">Tanaman Hias</a></li>
              <li><a class="dropdown-item text-dark" href="lain.php">Barang Lainnya</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-dark fw-bold" href="about.php">Tentang Kami</a>
          </li>
        </ul>
        <form action="pencarian.php" class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari Barang" aria-label="Search" name="keyword">
            <button  type="submit" class="btn btn-light">Search</button>
        </form>
    </div>
  </div>
</nav>