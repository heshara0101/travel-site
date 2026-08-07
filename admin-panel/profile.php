<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php
require_once "assets/classes/Database.php";
require_once "assets/classes/admin.php";

// Fetch current admin (ID = 1 or active session ID)
$ADMIN = new admin(1);
?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #03362a;">Dashboard</a> / Admin Profile Settings
        </div>

        <div class="card" style="background: #fff; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); max-width: 800px;">
            
            <div style="border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 25px;">
                <h3 class="card-title" style="margin: 0; font-size: 20px; font-weight: 600; color: #333;">
                    <span style="color: #00a8ff;">Admin</span> Profile Settings
                </h3>
            </div>

            <form id="profile-data" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $ADMIN->id ?? 1; ?>">
                
                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 25px;">
                    <label style="width: 180px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Profile Picture</label>
                    <div style="flex: 1; display: flex; align-items: center; gap: 20px;">
                        <?php 
                        // Image path from folder structure where images are uploaded
                        $imgPath = !empty($ADMIN->profile_img) ? 'assets/classesimages/' . $ADMIN->profile_img : 'assets/images/placeholder.png'; 
                        ?>
                        <img src="<?= $imgPath; ?>" alt="Admin Avatar" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; border: 2px solid #00a8ff;" onerror="this.src='https://via.placeholder.com/150?text=Admin'">
                        
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <label for="profile_picture" style="background: #20c997; color: #fff; padding: 6px 18px; border-radius: 3px; font-size: 12px; font-weight: 600; cursor: pointer; text-transform: uppercase;">BROWSE</label>
                            <input type="file" id="profile_picture" name="profile_picture" style="display: none;" onchange="document.getElementById('file-name').innerText = this.files[0] ? this.files[0].name : 'No file selected.'">
                            <span id="file-name" style="font-size: 13px; color: #777;">No file selected.</span>
                        </div>
                    </div>
                </div>

                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 180px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Admin Name</label>
                    <div style="flex: 1;">
                        <input type="text" name="admin_name" value="<?= htmlspecialchars($ADMIN->name ?? ''); ?>" placeholder="Enter Full Name" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 180px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Email Address</label>
                    <div style="flex: 1;">
                        <input type="email" name="admin_email" value="<?= htmlspecialchars($ADMIN->email ?? ''); ?>" placeholder="Enter Email Address" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <hr style="border: none; border-top: 1px dashed #eee; margin: 25px 0;">

                <p style="font-size: 13px; color: #888; margin-bottom: 20px; font-weight: 500;">Change Password (Leave blank to keep current password)</p>

                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 180px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Current Password</label>
                    <div style="flex: 1;">
                        <input type="password" name="current_password" placeholder="Enter Current Password" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <label style="width: 180px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">New Password</label>
                    <div style="flex: 1;">
                        <input type="password" name="new_password" placeholder="Enter New Password" style="width: 100%; border: none; border-bottom: 1px solid #00a8ff; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 30px;">
                    <label style="width: 180px; text-align: right; padding-right: 25px; font-weight: 500; color: #555; font-size: 14px;">Confirm Password</label>
                    <div style="flex: 1;">
                        <input type="password" name="confirm_password" placeholder="Confirm New Password" style="width: 100%; border: none; border-bottom: 1px solid #ccc; padding: 8px 0; outline: none; font-size: 14px;">
                    </div>
                </div>

                <div class="form-group-row" style="display: flex;">
                    <div style="width: 180px;"></div>
                    <div>
                        <button type="submit" style="background: #2ed573; color: #fff; border: none; padding: 10px 30px; border-radius: 4px; font-weight: 600; font-size: 13px; cursor: pointer; text-transform: uppercase;">
                            UPDATE PROFILE
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
jQuery(document).ready(function ($) {
    $("#profile-data").on("submit", function (e) {
        e.preventDefault();
        

        var formData = new FormData(this);

        $.ajax({
            url: "assets/ajax/js/php/admin-data.php",
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: res.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 1500);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: res.message
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Server Error",
                    text: "Something went wrong while updating profile."
                });
            }
        });
    });
});
</script>