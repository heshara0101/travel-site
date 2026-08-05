<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php
require_once "assets/classes/Database.php";
require_once "assets/classes/Service.php";
?>
<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <div class="breadcrumb">
            <a href="index.php">Dashboard</a> / Create Services
        </div>

        <div class="card">
            <h3 class="card-title">Create Services</h3>

            <form id="service-data" action="service.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input id="service_title" name="service_title" type="text" class="form-control" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input id="service_img" name="service_img" type="file" class="form-control">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <input id="service_short_desc" name="service_short_desc" type="text" class="form-control" placeholder="Enter Short Description">
                </div>

                <!-- Form Row: Full Description (Rich Text Area) -->
                <div class="form-group-row" style="display: flex; margin-bottom: 30px;">
                    <label style="width: 200px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px; padding-top: 8px;">Description</label>
                    <div style="flex: 1;">
                        <textarea id="service_description" name="service_description" rows="8" style="width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 12px; outline: none; font-size: 14px;" placeholder="Enter full detailed itinerary information..."></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label></label>
                    <button type="submit" id="save_service" class="btn-submit">SAVE</button>
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
    $("#service-data").submit(function (event) {
        event.preventDefault();

        var title = $.trim($("#service_title").val());
        var service_img = $("#service_img").val();
        var shortDesc = $.trim($("#service_short_desc").val());
        var description = $.trim($("#service_description").val());

        // Check if title is empty
        if (title === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a service title!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (service_img === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please select a service image!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (shortDesc === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a short description!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (description === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a description!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }

        // Prepare FormData
        var formData = new window.FormData($("#service-data")[0]);
        formData.append("save-service", true);

        $.ajax({
            url: "assets/ajax/js/php/service-data.php",
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
                        text: result.message || "Service added successfully!",
                        timer: 2000,
                        showConfirmButton: false
                    });

                    // REDIRECT TO MANAGE SERVICES PAGE
                    window.setTimeout(function () {
                      window.location.href = "manage-services.php";
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
