<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <!-- Breadcrumb Header -->
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #03362a#00a8ff;">Dashboard</a> / Manage Tour Packages
        </div>

        <!-- Main Card Container -->
        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <h3 class="card-title" style="margin: 0; font-size: 18px; font-weight: 600; color: #333;">Manage Tour Packages</h3>
                <!-- Add New Package (+) Button -->
                <a href="create-tour-package.php" style="font-size: 20px; color: #777; text-decoration: none; line-height: 1;" title="Create New Package">+</a>
            </div>

            <?php
            // Updated static package data mirroring the Travel Lanka frontend packages
            $tour_packages = [
                ['title' => 'Cultural Triangle Wonders', 'price' => '$850 / person', 'img' => 'assets/images/pkg1.jpg'],
                ['title' => 'Tropical Southern Coastline', 'price' => '$920 / person', 'img' => 'assets/images/pkg2.jpg'],
                ['title' => 'Misty Highlands & Tea Trails', 'price' => '$780 / person', 'img' => 'assets/images/pkg3.jpg'],
                ['title' => 'Ultimate Wildlife Safari', 'price' => '$1,150 / person', 'img' => 'assets/images/pkg4.jpg'],
            ];
            ?>

            <!-- Packages Grid Container -->
            <div class="grid-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 25px;">
                <?php foreach($tour_packages as $package): ?>
                <div class="item-card" style="text-align: left;">
                    <!-- Image Box -->
                    <div style="border-radius: 8px; overflow: hidden; height: 150px; margin-bottom: 12px; background: #f8f9fa;">
                        <img src="<?= $package['img'] ?>" alt="<?= $package['title'] ?>" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://via.placeholder.com/300x200?text=Tour+Package'">
                    </div>
                    
                    <!-- Title & Price -->
                    <h5 style="font-size: 14px; font-weight: 600; color: #333; margin: 0 0 4px 0;"><?= $package['title'] ?></h5>
                    <p style="font-size: 12px; color: #00a8ff; font-weight: 500; margin: 0 0 12px 0;"><?= $package['price'] ?></p>

                    <!-- Action Buttons -->
                    <div class="action-btns" style="display: flex; gap: 8px; align-items: center;">
                        <!-- Green Pencil / Edit -->
                        <button class="btn-icon-small btn-edit" title="Edit Package" style="background-color: #2ed573; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        
                        <!-- Orange Switch / Reorder -->
                        <button class="btn-icon-small btn-transfer" title="Change Order" style="background-color: #ffa500; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-right-left"></i>
                        </button>
                        
                        <!-- Red Trash / Delete -->
                        <button class="btn-icon-small btn-delete" title="Delete Package" style="background-color: #ff4757; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        
                        <!-- Cyan Image / Gallery -->
                        <button class="btn-icon-small btn-gallery" title="Package Photos" style="background-color: #00d2d3; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-regular fa-image"></i>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>