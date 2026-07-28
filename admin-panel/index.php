<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <div class="breadcrumb">
            <a href="index.php">Dashboard</a> / Home Overview
        </div>

        <!-- Quick Stats Overview Widget Grid matching Travel Lanka Frontend -->
        <div class="dashboard-stats" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 25px;">
            <div class="card" style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <h3 style="font-size: 24px; color: #00a8ff;">3</h3>
                    <p style="font-size: 12px; color: #777;">Hero Banners</p>
                </div>
                <i class="fa-solid fa-images" style="font-size: 30px; color: #00a8ff;"></i>
            </div>
            
            <div class="card" style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <h3 style="font-size: 24px; color: #2ed573;">4</h3>
                    <p style="font-size: 12px; color: #777;">Tour Packages</p>
                </div>
                <i class="fa-solid fa-suitcase-rolling" style="font-size: 30px; color: #2ed573;"></i>
            </div>

            <div class="card" style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <h3 style="font-size: 24px; color: #ffa500;">6</h3>
                    <p style="font-size: 12px; color: #777;">Destinations</p>
                </div>
                <i class="fa-solid fa-location-dot" style="font-size: 30px; color: #ffa500;"></i>
            </div>

            <div class="card" style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <h3 style="font-size: 24px; color: #00d2d3;">0</h3>
                    <p style="font-size: 12px; color: #777;">Booking Inquiries</p>
                </div>
                <i class="fa-solid fa-envelope-open-text" style="font-size: 30px; color: #00d2d3;"></i>
            </div>
        </div>

        <!-- Welcome Banner -->
        <div class="card" style="margin-bottom: 25px;">
            <h3 class="card-title">Welcome back, Heshara!</h3>
            <p style="font-size: 13px; color: #666;">
                Use the sidebar menu to manage tour packages, regional destinations, hero sliders, and booking inquiries for your <strong>Travel Lanka</strong> website.
            </p>
        </div>

        <!-- Quick Access to Tour Packages matching frontend data -->
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 class="card-title" style="margin-bottom: 0;">Featured Tour Packages</h3>
                <a href="manage-tour-packages.php" style="font-size: 13px; color: #00a8ff; text-decoration: none;">View All &rarr;</a>
            </div>

            <?php
            // Static data matching the Travel Lanka frontend website
            $recent_packages = [
                ['title' => 'Cultural Triangle Wonders', 'img' => 'assets/images/pkg1.jpg'],
                ['title' => 'Tropical Southern Coastline', 'img' => 'assets/images/pkg2.jpg'],
                ['title' => 'Misty Highlands & Tea Trails', 'img' => 'assets/images/pkg3.jpg'],
                ['title' => 'Ultimate Wildlife Safari', 'img' => 'assets/images/pkg4.jpg']
            ];
            ?>

            <div class="grid-container">
                <?php foreach($recent_packages as $item): ?>
                <div class="item-card">
                    <img src="<?= $item['img'] ?>" alt="<?= $item['title'] ?>" onerror="this.src='assets/images/pkg1.jpg'">
                    <h5><?= $item['title'] ?></h5>
                    <div class="action-btns">
                        <button class="btn-icon-small btn-edit" title="Edit"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn-icon-small btn-transfer" title="Sort/Reorder"><i class="fa-solid fa-right-left"></i></button>
                        <button class="btn-icon-small btn-delete" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        <button class="btn-icon-small btn-gallery" title="Photos"><i class="fa-regular fa-image"></i></button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>