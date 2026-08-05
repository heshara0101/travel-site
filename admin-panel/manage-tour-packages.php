<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php
require_once "assets/classes/Database.php";
require_once "assets/classes/tour_package.php"; // Adjust class path as needed

$PACKAGE = new tour_package();
$tour_packages = $PACKAGE->package_all(); // Fetch all tour packages from DB
?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #03362a;">Dashboard</a> / Manage Tour Packages
        </div>

        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <h3 class="card-title" style="margin: 0; font-size: 18px; font-weight: 600; color: #333;">
                    <span style="color: #03362a;">Manage</span> Tour Packages
                </h3>
                
                <a href="create-tour-package.php" class="btn-add-new" style="background: #03362a; color: #fff; text-decoration: none; padding: 8px 16px; border-radius: 4px; font-size: 13px; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;">
                    <i class="fa-solid fa-plus"></i> Add New Package
                </a>
            </div>

            <?php if (!empty($tour_packages)): ?>
                <div class="grid-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 25px;">
                    <?php foreach ($tour_packages as $package): ?>
                        <?php 
                            $img_src = !empty($package['package_image']) 
                                ? '../images/tour-packages/' . $package['package_image'] 
                                : 'assets/images/placeholder.jpg';
                        ?>
                        <div class="item-card" style="border: 1px solid #f0f0f0; border-radius: 8px; padding: 12px; background: #fafafa; transition: transform 0.2s;" id="package-card-<?= $package['id']; ?>">
                            
                            <div style="border-radius: 6px; overflow: hidden; height: 140px; margin-bottom: 12px; background: #e9ecef; position: relative;">
                                <img src="<?= $img_src; ?>" alt="<?= htmlspecialchars($package['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://via.placeholder.com/300x200?text=Tour+Package'">
                                
                                <?php if (!empty($package['tour_type'])): ?>
                                    <span style="position: absolute; top: 8px; left: 8px; background: rgba(3, 54, 42, 0.85); color: #fff; font-size: 10px; padding: 3px 8px; border-radius: 3px; text-transform: uppercase; font-weight: 600;">
                                        <?= htmlspecialchars($package['tour_type']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <h5 style="font-size: 14px; font-weight: 600; color: #333; margin: 0 0 4px 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?= htmlspecialchars($package['title']); ?>">
                                <?= htmlspecialchars($package['title']); ?>
                            </h5>

                            <p style="font-size: 12px; color: #00a8ff; font-weight: 600; margin: 0 0 4px 0;">
                                <?= htmlspecialchars($package['price']); ?>
                            </p>

                            <?php if (!empty($package['duration'])): ?>
                                <p style="font-size: 11px; color: #777; margin: 0 0 12px 0;">
                                    ⏱ <?= htmlspecialchars($package['duration']); ?>
                                </p>
                            <?php endif; ?>

                            <div class="action-btns" style="display: flex; gap: 8px; align-items: center; border-top: 1px solid #eee; padding-top: 10px;">
                                <a href="edit-tour-package.php?id=<?= $package['id']; ?>" class="btn-icon-small btn-edit" title="Edit Package" style="background-color: #2ed573; color: #fff; border: none; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 11px;">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                
                                <a href="arrange-tour-packages.php" class="btn-icon-small btn-transfer" title="Change Order" style="background-color: #ffa500; color: #fff; border: none; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 11px;">
                                    <i class="fa-solid fa-right-left"></i>
                                </a>
                                
                                <a href="manage-tour-package-photos.php?id=<?= $package['id']; ?>" class="btn-icon-small btn-gallery" title="Package Photos" style="background-color: #00d2d3; color: #fff; border: none; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 11px;">
                                    <i class="fa-regular fa-image"></i>
                                </a>

                                <button type="button" class="btn-icon-small btn-delete delete-package" data-id="<?= $package['id']; ?>" title="Delete Package" style="background-color: #ff4757; color: #fff; border: none; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 11px;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 40px 20px; color: #888;">
                    <i class="fa-solid fa-box-open" style="font-size: 40px; margin-bottom: 12px; color: #ccc;"></i>
                    <p style="font-size: 14px; margin: 0;">No tour packages found. <a href="create-tour-package.php" style="color: #03362a; font-weight: 600;">Create one now</a>.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
jQuery(document).ready(function ($) {
    // Delete Package Handler
    $(".delete-package").click(function (e) {
        e.preventDefault();
        var id = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ff4757",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "assets/ajax/js/php/tour-package-data.php",
                    type: "POST",
                    data: { action: "delete", id: id },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Deleted!",
                                text: response.message || "Package deleted successfully.",
                                timer: 1500,
                                showConfirmButton: false
                            });

                            // Fade out and remove card element
                            $("#package-card-" + id).fadeOut(300, function () {
                                $(this).remove();
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: response.message || "Failed to delete package."
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: "error",
                            title: "Server Error",
                            text: "Failed to process request."
                        });
                    }
                });
            }
        });
    });
});
</script>