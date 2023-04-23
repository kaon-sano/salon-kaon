<nav class="navbar navbar-primary navbar-expand-lg" style="background-color:#9370DB">
    <div class="container px-5">
        <a class="navbar-brand text-warning" href="home.php"><i class="fa-solid fa-scissors"></i> Kaon's Beauty Hair Salon <i
                class="fa-solid fa-hand-holding-heart"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-warning" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="customer-servicelist.php">Services and
                        Price</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="make-appo.php">Booking</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="view-myappo.php">View Appoinement</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="profile.php">
                        <?= $_SESSION['full_name'] ?>
                    </a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="logout.php">Log Out</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="#!"><i
                            class="fa-brands fa-facebook"></i></a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="#!"><i
                            class="fa-brands fa-square-instagram"></a></i></li>
                <li class="nav-item"><a class="nav-link text-warning" href="#!"><i class="fa-brands fa-twitter"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>