<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <!-- Breadcrumb Header -->
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #03362a;">Dashboard</a> / Manage Services
        </div>

        <!-- Main Card Wrapper -->
        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            
            <!-- Card Title Header with Add (+)-Btn -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <h3 class="card-title" style="margin: 0; font-size: 18px; font-weight: 600; color: #333;">Manage Services</h3>
                <a href="add-service.php" style="font-size: 20px; color: #777; text-decoration: none; line-height: 1;" title="Add New Service">+</a>
            </div>

            <?php
            // Static Services Data matching the design mockup
            $services = [
                ['title' => 'Groups', 'img' => 'assets/images/about.jpg'],
            ];
            ?>

            <!-- Services Grid Layout -->
            <div class="grid-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 25px;">
                <?php foreach($services as $service): ?>
                <div class="item-card" style="text-align: left;">
                    <!-- Image Frame -->
                    <div style="border: 1px solid #f0f0f0; border-radius: 8px; padding: 15px; display: flex; align-items: center; justify-content: center; background: #fff; height: 160px; margin-bottom: 12px;">
                        <img src="<?= $service['img'] ?>" alt="<?= $service['title'] ?>" style="max-height: 100%; max-width: 100%; object-fit: contain;" onerror="this.src='https://via.placeholder.com/120x120?text=Service';">
                    </div>
                    
                    <!-- Title -->
                    <h5 style="font-size: 14px; font-weight: 500; color: #444; margin: 0 0 10px 0;"><?= $service['title'] ?></h5>
                    
                    <!-- Action Buttons matching the circle colored styling from screenshot -->
                    <div class="action-btns" style="display: flex; gap: 8px; align-items: center;">
                        <button class="btn-icon-small btn-edit" title="Edit" style="background-color: #2ed573; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        <button class="btn-icon-small btn-transfer" title="Sort/Reorder" style="background-color: #ffa500; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-right-left"></i>
                        </button>
                        <button class="btn-icon-small btn-delete" title="Delete" style="background-color: #ff4757; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>