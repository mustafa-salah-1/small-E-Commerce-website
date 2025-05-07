<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-2">
        <a class="navbar-brand fs-4" href="index.php">
            <img src="img/ll.png" alt="Logo" height="30"
                class="d-inline-block me-2">GAME<span style="color: #00aaff">STORE</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Existing nav items -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="games.php">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                        <li><a class="dropdown-item active" href="headsetspage.php">Headsets</a></li>
                        <li><a class="dropdown-item">Mouse</a></li>
                        <li><a class="dropdown-item">Keyboards</a></li>
                        <li><a class="dropdown-item active" href="games.php">Games</a></li>
                        <li><a class="dropdown-item">Chairs</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="discount.php">Discount</a>
                </li>
            </ul>

            <!-- Search Form -->
            <form class="d-flex me-3" role="search" onsubmit="return searchRedirect(event)">
                <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            </form>

            <!-- Profile Icon as Link -->
            <div class="nav-item">
                <a class="nav-link d-flex align-items-center" href="profile.php">
                    <i class="fas fa-user-circle fa-2x me-2"></i>
                </a>
            </div>

        </div>
    </div>
</nav>