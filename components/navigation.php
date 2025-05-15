<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-2">
        <a class="navbar-brand fs-4" href="index.php">
            <img src="public/img/ll.png" alt="Logo" height="30"
                class="d-inline-block me-2">
                <span class="d-none d-md-inline">
                    GAME<span style="color: #00aaff">STORE</span>
                </span>
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
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">Product</a>
                    </li>
                </li>
                <?php if(isset($_SESSION['customer_name'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                <?php } ?>
            </ul>


            <!-- Profile Icon as Link -->
            <div class="nav-item d-flex align-items-center">
                <?php

                if (isset($_SESSION['customer_name'])) {
                ?>
                    <a class="nav-link d-flex align-items-center" href="profile.php">
                        <i class="fas fa-user-circle fa-2x me-2"></i>
                        <?php echo htmlspecialchars($_SESSION['customer_name']); ?>
                    </a>
                    <a class="btn btn-danger" onclick="confirm('Are you sure you want to logout?')" href="logout.php">Logout</a>
                <?php
                } else {
                ?>
                    <a class="btn btn-warning me-2" href="login.php">Login</a>
                    <a class="btn btn-warning" href="register.php">Register</a>
                <?php
                }
                ?>
            </div>

        </div>
    </div>
</nav>