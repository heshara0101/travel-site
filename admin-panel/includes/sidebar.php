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
            <a href="index.php"><i class="fa-solid fa-gauge"></i></a>
            <a href="message.php "><i class="fa-regular fa-comment"></i></a>
            <a href="login.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li><a href="index.php">Dashboard<i class="fa-solid fa-gauge"></i> </a></li>
            <li><a href="slider.php">Slider<i class="fa-regular fa-images"></i> </a></li>
            <li><a href="banner.php">Banners<i class="fa-regular fa-flag"></i> </a></li>
            <li><a href="../index.php">Pages<i class="fa-regular fa-file"></i> </a></li>

            <!-- Dropdown Menu Item -->
            <li class="has-submenu">
                <a href="#" class="submenu-toggle">
                    <span> Services</span>
                    <i class="fa-solid fa-plus toggle-icon"></i>
                </a>
                <ul class="submenu">
                    <li><a href="create-service.php">Add Service</a></li>
                    <li><a href="manage-services.php">Manage Services</a></li>
                </ul>
            </li>

            <li class="has-submenu">
                <a href="#" class="submenu-toggle">
                    <span> Tour Packages</span>
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