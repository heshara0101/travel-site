<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
require_once "assets/classes/Database.php";
require_once "assets/classes/slider.php";
?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <!-- Breadcrumb Navigation -->
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #03362a;">Dashboard</a> / Manage Sliders
        </div>

        <!-- 1. CREATE SLIDER FORM SECTION -->
        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h3 class="card-title" style="margin: 0 0 25px 0; font-size: 18px; font-weight: 600; color: #333;">
                <span style="color: #03362a;">Create</span> Slider
            </h3>

            <!-- ADDED id="slider-data" TO FORM -->
            <form id="slider-data" action="slider.php" method="POST" enctype="multipart/form-data">
                <!-- Subtitle / Tagline Row -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 150px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Subtitle</label>
                    <div style="flex: 1;">
                        <input type="text" id="slider_subtitle" name="slider_subtitle" placeholder="Enter Subtitle (e.g. Welcome to Sri Lanka)" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Main Title Row -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 150px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Title</label>
                    <div style="flex: 1;">
                        <input type="text" id="slider_title" name="slider_title" placeholder="Enter Main Headline Title" style="width: 100%; border: none; border-bottom: 1px solid #00a8ff; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Slider Image Upload Row -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 25px;">
                    <label style="width: 150px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Slider Image</label>
                    <div style="flex: 1; display: flex; align-items: center; border-bottom: 1px solid #ccc; padding-bottom: 8px;">
                        <label for="slider_img" style="background: #20c997; color: #fff; padding: 6px 18px; border-radius: 3px; font-size: 12px; font-weight: 600; cursor: pointer; text-transform: uppercase; margin-right: 15px;">BROWSE</label>
                        <input type="file" id="slider_img" name="slider_img" style="display: none;" onchange="document.getElementById('file-name').innerText = this.files[0] ? this.files[0].name : 'No file selected.'">
                        <span id="file-name" style="font-size: 13px; color: #777;">No file selected.</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group-row" style="display: flex;">
                    <div style="width: 150px;"></div>
                    <div>
                        <button type="submit" id="save-slider" style="background: #00d2d3; color: #fff; border: none; padding: 8px 25px; border-radius: 3px; font-weight: 600; font-size: 13px; cursor: pointer; text-transform: uppercase;">
                            SAVE SLIDER
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- 2. MANAGE EXISTING SLIDERS SECTION -->
        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h3 class="card-title" style="margin: 0 0 25px 0; font-size: 18px; font-weight: 600; color: #333;">Manage Active Sliders</h3>

            <?php
            // Instantiate slider class and fetch all records from database
            $SLIDER = new slider(NULL);
            $sliders = $SLIDER->slider_all();
            ?>

            <!-- Sliders Grid Layout -->
            <div class="grid-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px;">
                <?php if (!empty($sliders)): ?>
                <?php foreach($sliders as $slider): ?>
                <div class="item-card" style="text-align: left;">
                    <div style="border-radius: 6px; overflow: hidden; height: 160px; margin-bottom: 12px; background: #f8f9fa;">
                       <?php 
                        // Image path from folder structure where images are uploaded
                        $imgPath = !empty($slider['slider_img']) ? 'assets/ajax/js/php/images/' . $slider['slider_img'] : 'assets/images/placeholder.jpg'; 
                        ?>
                        <img src="<?= htmlspecialchars($imgPath) ?>" alt="<?= htmlspecialchars($slider['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://via.placeholder.com/400x200?text=Hero+Slider+Image'">
                    </div>
                    
                    <span style="font-size: 11px; text-transform: uppercase; color: #03362a; font-weight: 600; display: block; margin-bottom: 3px;"><?= htmlspecialchars($slider['subtitle']) ?></span>
                    <h5 style="font-size: 14px; font-weight: 600; color: #333; margin: 0 0 12px 0;"><?= htmlspecialchars($slider['title']) ?></h5>

                    <div class="action-btns" style="display: flex; gap: 8px; align-items: center;">
                        <button class="btn-icon-small btn-edit" title="Edit Slider" style="background-color: #2ed573; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        <button class="btn-icon-small btn-transfer" title="Reorder" style="background-color: #ffa500; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-right-left"></i>
                        </button>
                        <button class="btn-icon-small btn-delete" title="Delete Slider" style="background-color: #ff4757; color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <p style="color: #777; grid-column: 1 / -1;">No sliders found. Create your first slider above!</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Bootstrap & JS Dependencies -->
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script> 
jQuery(document).ready(function () { 
    $("#save-slider").click(function (event) {
        event.preventDefault();

        var title = $.trim($("#slider_title").val());
        var subtitle = $.trim($("#slider_subtitle").val());
        var image = $("#slider_img").val();

        // Check if title is empty
        if (title === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a slider title!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (subtitle === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a slider subtitle!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (image === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please select a slider image!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }

        // Prepare FormData
        var formData = new window.FormData($("#slider-data")[0]);
        formData.append("save-slider", true);

        $.ajax({
            url: "assets/ajax/js/php/slider-data.php",
            type: "POST",
            data: formData,
            dataType: "json", // Automatically parse response as JSON
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: result.message || "Slider added successfully!",
                        timer: 2000,
                        showConfirmButton: false
                    });

                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: result.message || "Something went wrong.",
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Server Error!",
                    text: "Failed to process your request. Please try again.",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    });
});
</script>