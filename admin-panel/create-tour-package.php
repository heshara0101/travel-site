<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
require_once "assets/classes/Database.php";
require_once "assets/classes/tour_package.php";
?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <!-- Breadcrumb Header -->
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #03362a;">Dashboard</a> / Create Tour Package
        </div>

        <!-- Main Form Wrapper Card -->
        <div class="card" style="background: #fff; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <h3 class="card-title" style="margin: 0; font-size: 20px; font-weight: 600; color: #333;">
                    <span style="color: #03362a;">Create</span> Tour Package
                </h3>
                <a href="manage-tour-packages.php" title="View List" style="color: #777; text-decoration: none;">
                    <i class="fa-solid fa-list-ul"></i>
                </a>
            </div>

            <form id="tour-package-data" action="create-tour-package.php" method="POST" enctype="multipart/form-data">
                
                <!-- Form Row: Tour Type -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Tour Type</label>
                    <div style="flex: 1;">
                        <select id="tour_type" type="text" name="tour_type" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; background: transparent; font-size: 14px; color: #555;">
                            <option value="">-- Please Select Tour Type --</option>
                            <option value="cultural">Cultural Triangle</option>
                            <option value="coastal">Coastal & Beach</option>
                            <option value="highlands">Highlands & Nature</option>
                            <option value="safari">Wildlife & Safari</option>
                        </select>
                    </div>
                </div>

                <!-- Form Row: Title -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Title</label>
                    <div style="flex: 1;">
                        <input type="text" id="package_title" name="package_title" placeholder="Enter Title (e.g. Cultural Triangle Wonders)" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Form Row: Price -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Price</label>
                    <div style="flex: 1;">
                        <input type="text" id="package_price" name="package_price" placeholder="Enter Price (e.g. $850 / person)" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Form Row: Duration / Dates -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Dates / Duration</label>
                    <div style="flex: 1;">
                        <input type="text" id="package_duration" name="package_duration" placeholder="Enter Duration (e.g. 6 Days / 5 Nights)" style="width: 100%; border: none; border-bottom: 1px solid #00a8ff; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Form Row: Image Upload -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Image</label>
                    <div style="flex: 1; display: flex; align-items: center; gap: 15px; border-bottom: 1px solid #ccc; padding-bottom: 8px;">
                        <label for="package_image" style="background: #20c997; color: #fff; padding: 6px 18px; border-radius: 3px; font-size: 12px; font-weight: 600; cursor: pointer; text-transform: uppercase;">BROWSE</label>
                        <input type="file" id="package_image" name="package_image" style="display: none;" onchange="document.getElementById('file-name').innerText = this.files[0] ? this.files[0].name : 'No file selected.'">
                        <span id="file-name" style="font-size: 13px; color: #777;">No file selected.</span>
                    </div>
                </div>

                <!-- Form Row: Short Description -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Short Description</label>
                    <div style="flex: 1;">
                        <input type="text" id="short_desc" name="short_desc" placeholder="Enter Short Description (e.g. Explore ancient fortress citadels...)" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Form Row: Map Code -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Map Code</label>
                    <div style="flex: 1;">
                        <input type="text" id="map_code" name="map_code" placeholder="Enter Map Code" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Form Row: Web Page Title -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Web Page Title</label>
                    <div style="flex: 1;">
                        <input type="text" id="web_title" name="web_title" placeholder="Enter Web Title" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Form Row: Web Page Description -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Web Page Description</label>
                    <div style="flex: 1;">
                        <input type="text" id="web_desc" name="web_desc" placeholder="Enter Description" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Form Row: Keyword -->
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 25px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Keyword</label>
                    <div style="flex: 1;">
                        <input type="text" id="keywords" name="keywords" placeholder="Enter Keyword" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <!-- Form Row: Full Description (Rich Text Area) -->
                <div class="form-group-row" style="display: flex; margin-bottom: 30px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px; padding-top: 8px;">Description</label>
                    <div style="flex: 1;">
                        <textarea id="full_description" name="full_description" rows="8" style="width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 12px; outline: none; font-size: 14px;" placeholder="Enter full detailed itinerary information..."></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group-row" style="display: flex; justify-content: flex-end;">
                    <div style="width: calc(100% - 200px);">
                        <button type="submit" id="save-package" style="background: #2ed573; color: #fff; border: none; padding: 10px 30px; border-radius: 4px; font-weight: 600; font-size: 14px; cursor: pointer; transition: 0.2s;">
                            Save Tour Package
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Bootstrap JS -->
 <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script> 
jQuery(document).ready(function () { 
    $("#tour-package-data").submit(function (event) {
        event.preventDefault();

        var type = $.trim($("#tour_type").val());
        var title = $.trim($("#package_title").val());
        var image = $("#package_image").val();
        var price = $.trim($("#package_price").val());
        var duration = $.trim($("#package_duration").val());
        var shortDesc = $.trim($("#short_desc").val());
        var mapCode = $.trim($("#map_code").val());
        var webTitle = $.trim($("#web_title").val());
        var webDesc = $.trim($("#web_desc").val());
        var keywords = $.trim($("#keywords").val());
        var full_Description = $.trim($("#full_description").val());

        // Check if title is empty
        if (type === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a tour package type!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (title === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a tour package Title!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (image === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please select a tour package image!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (price === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a tour package price!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (duration === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a tour package duration!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (keywords === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a tour package keyword!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }

        // Prepare FormData
        var formData = new window.FormData($("#tour-package-data")[0]);
        formData.append("save-tour-package", true);

        $.ajax({
            url: "assets/ajax/js/php/package-data.php",
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
                        text: result.message || "Tour package added successfully!",
                        timer: 2000,
                        showConfirmButton: false
                    });

                    window.setTimeout(function () {
                        window.location.href = "manage-tour-packages.php";
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
