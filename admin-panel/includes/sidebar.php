<aside class="sidebar">
    <div class="brand">
        <div class="logo-icon"><i class="fa-solid fa-compass"></i></div>
        <h2>Admin</h2>
    </div>

    <div class="profile-section">
        <img src="assets/images/profile.png" alt="Profile" class="profile-img">
        <h4>Heshara</h4>
        <p>Administrator</p>
        <div class="profile-actions">
            <a href="profile.php"><i class="fa-regular fa-user"></i></a>
            <a href="#"><i class="fa-solid fa-gauge"></i></a>
            <a href="#"><i class="fa-regular fa-comment"></i></a>
            <a href="login.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li class="active"><a href="index.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li><a href="slider.php"><i class="fa-regular fa-images"></i> Slider</a></li>
            <li><a href="banner.php"><i class="fa-regular fa-flag"></i> Banners</a></li>
            <li><a href="../index.php"><i class="fa-regular fa-file"></i> Pages</a></li>
            
            <!-- Dropdown Menu Item -->
            <li class="has-submenu">
                <a href="#" class="submenu-toggle">
                    <span><i class="fa-regular fa-square-check"></i> Services</span>
                    <i class="fa-solid fa-plus toggle-icon"></i>
                </a>
                <ul class="submenu">
                    <li><a href="create-service.php">Add Service</a></li>
                    <li><a href="manage-services.php">Manage Services</a></li>
                </ul>
            </li>

            <li class="has-submenu">
                <a href="#" class="submenu-toggle">
                    <span><i class="fa-solid fa-chart-line"></i> Tour Packages</span>
                    <i class="fa-solid fa-plus toggle-icon"></i>
                </a>
                <ul class="submenu">
                    <li><a href="create-tour-package.php">Create Tour Package</a></li>
                    <li><a href="manage-tour-packages.php">Manage Tour Packages</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>