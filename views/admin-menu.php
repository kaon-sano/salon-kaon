<nav class="navbar bg-dark navbar-expand-lg">
    <div class="container px-5">
        <a class="navbar-brand text-warning hover-effect fw-bold" href="home.php"><i class="fa-solid fa-scissors"></i> Kaon's
            Beauty Hair Salon <i class="fa-solid fa-hand-holding-heart"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link  text-warning" href="dashboard.php">
                        <h5>Dashboard</h5>
                    </a></li>
                <li class="nav-item"><a class="nav-link  text-warning" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link  text-warning" href="appo-manage.php">Appointment</a></li>
                <li class="nav-item"><a class="nav-link  text-warning" href="customerlist.php">Customer</a></li>
                <li class="nav-item"><a class="nav-link  text-warning" href="services.php">Services</a></li>
                <li class="nav-item"><a class="nav-link  text-warning" href="staff.php">Staff</a></li>
                <li class="nav-item"><a class="nav-link  text-warning" href="profile.php">
                        <?= $_SESSION['full_name'] ?>
                    </a></li>
                <li class="nav-item"><a class="nav-link  text-warning" href="logout.php">Log Out</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="https://www.facebook.com/"><i
                            class="fa-brands fa-facebook"></i></a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="https://www.instagram.com/"><i
                            class="fa-brands fa-square-instagram"></a></i></li>
                <li class="nav-item"><a class="nav-link text-warning" href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                </li>

            </ul>
        </div>
    </div>
</nav>