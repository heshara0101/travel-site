<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <!-- Breadcrumb Navigation -->
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #00a8ff;">Dashboard</a> / Create Banner
        </div>

        <!-- 1. CREATE BANNER FORM SECTION -->
        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h3 class="card-title" style="margin: 0 0 25px 0; font-size: 18px; font-weight: 600; color: #333;">
                <span style="color: #00a8ff;">Create</span> Banner
            </h3>

            <form action="banner.php" method="POST" enctype="multipart/form-data">
                <!-- Title Row -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 150px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Title</label>
                    <div style="flex: 1;">
                        <input type="text" name="title" placeholder="Enter Title" style="width: 100%; border: none; border-bottom: 1px solid #00a8ff; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Image Upload Row -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 25px;">
                    <label style="width: 150px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Image</label>
                    <div style="flex: 1; display: flex; align-items: center; border-bottom: 1px solid #ccc; padding-bottom: 8px;">
                        <label for="banner_img" style="background: #20c997; color: #fff; padding: 6px 18px; border-radius: 3px; font-size: 12px; font-weight: 600; cursor: pointer; text-transform: uppercase; margin-right: 15px;">BROWS</label>
                        <input type="file" id="banner_img" name="banner_image" style="display: none;" onchange="document.getElementById('file-name').innerText = this.files[0] ? this.files[0].name : 'No file selected.'">
                        <span id="file-name" style="font-size: 13px; color: #777;">No file selected.</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group-row" style="display: flex;">
                    <div style="width: 150px;"></div>
                    <div>
                        <button type="submit" style="background: #00d2d3; color: #fff; border: none; padding: 8px 25px; border-radius: 3px; font-weight: 600; font-size: 13px; cursor: pointer; text-transform: uppercase;">
                            SAVE
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <!-- 2. MANAGE BANNER GRID SECTION -->
        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h3 class="card-title" style="margin: 0 0 25px 0; font-size: 18px; font-weight: 600; color: #333;">Manage Banner</h3>

            <?php
            // Static Banners Data matching all categories from your screenshots
            $banners = [
                ['title' => 'About Us', 'img' => 'assets/images/about.jpg'],
            ];
            ?>

            <!-- Banner Card Grid -->
            <div class="grid-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 25px;">
                <?php foreach($banners as $banner): ?>
                <div class="item-card" style="text-align: left;">
                    <!-- Image Banner Container -->
                    <div style="border-radius: 6px; overflow: hidden; height: 130px; margin-bottom: 10px; background: #f8f9fa;">
                        <img src="<?= $banner['img'] ?>" alt="<?= $banner['title'] ?>" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://via.placeholder.com/300x150?text=Banner+Image'">
                    </div>
                    
                    <!-- Title -->
                    <h5 style="font-size: 13px; font-weight: 500; color: #444; margin: 0 0 10px 0;"><?= $banner['title'] ?></h5>

                    <!-- Action Buttons matching the screenshot (Edit green, Delete red) -->
                    <div class="action-btns" style="display: flex; gap: 8px; align-items: center;">
                        <button class="btn-icon-small btn-edit" title="Edit Banner" style="background-color: #2ed573; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        <span style="color: #ddd;">|</span>
                        <button class="btn-icon-small btn-delete" title="Delete Banner" style="background-color: #ff4757; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
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