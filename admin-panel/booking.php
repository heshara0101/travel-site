<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php
require_once "assets/classes/Database.php";
require_once "assets/classes/booking.php";

$BOOKING = new booking();
$bookings = $BOOKING->booking_all();
?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #03362a;">Dashboard</a> / Trip Bookings
        </div>

        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <h3 class="card-title" style="margin: 0; font-size: 18px; font-weight: 600; color: #333;">
                    Trip Booking Inquiries (<?= count($bookings); ?>)
                </h3>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                    <thead>
                        <tr style="background: #f8f9fa; border-bottom: 2px solid #eee;">
                            <th style="padding: 12px;">#</th>
                            <th style="padding: 12px;">Customer Name</th>
                            <th style="padding: 12px;">Email & Phone</th>
                            <th style="padding: 12px;">Package Choice</th>
                            <th style="padding: 12px;">Travel Date</th>
                            <th style="padding: 12px;">Guests</th>
                            <th style="padding: 12px;">Date Submitted</th>
                            <th style="padding: 12px; text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($bookings)): ?>
                            <?php foreach ($bookings as $index => $booking): ?>
                                <tr id="booking-row-<?= $booking['id']; ?>" style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 12px; font-weight: bold;"><?= $index + 1; ?></td>
                                    <td style="padding: 12px; font-weight: 500;"><?= htmlspecialchars($booking['Name']); ?></td>
                                    <td style="padding: 12px;">
                                        <a href="mailto:<?= htmlspecialchars($booking['email']); ?>" style="color: #00a8ff; text-decoration: none;">
                                            <?= htmlspecialchars($booking['email']); ?>
                                        </a>
                                        <br>
                                        <small style="color: #666;"><?= htmlspecialchars($booking['Phone_no']); ?></small>
                                    </td>
                                    <td style="padding: 12px; font-weight: 500;"><?= htmlspecialchars($booking['package']); ?></td>
                                    <td style="padding: 12px; color: #333;">
                                        <?= date("M d, Y", strtotime($booking['date'])); ?>
                                    </td>
                                    <td style="padding: 12px; font-size: 13px;">
                                        <?= (int)$booking['adult']; ?> Adults
                                        <?php if (!empty($booking['child']) && $booking['child'] > 0): ?>
                                            , <?= (int)$booking['child']; ?> Children
                                        <?php endif; ?>
                                    </td>
                                    <td style="padding: 12px; color: #777; font-size: 12px;">
                                        <?= date("M d, Y - h:i A", strtotime($booking['created_at'])); ?>
                                    </td>
                                    <td style="padding: 12px; text-align: center;">
                                        <div style="display: flex; gap: 8px; justify-content: center;">
                                            <button type="button" 
                                                    class="btn-view-booking" 
                                                    data-name="<?= htmlspecialchars($booking['Name']); ?>" 
                                                    data-email="<?= htmlspecialchars($booking['email']); ?>" 
                                                    data-phone="<?= htmlspecialchars($booking['Phone_no']); ?>" 
                                                    data-country="<?= htmlspecialchars($booking['country'] ?? 'N/A'); ?>" 
                                                    data-package="<?= htmlspecialchars($booking['package']); ?>" 
                                                    data-date="<?= date("M d, Y", strtotime($booking['date'])); ?>" 
                                                    data-guests="<?= (int)$booking['adult'] . ' Adults, ' . (int)($booking['child'] ?? 0) . ' Children'; ?>" 
                                                    data-notes="<?= htmlspecialchars($booking['note'] ?? 'None'); ?>" 
                                                    data-created="<?= date("M d, Y - h:i A", strtotime($booking['created_at'])); ?>"
                                                    style="background-color: #00a8ff; color: #fff; border: none; border-radius: 50%; width: 30px; height: 30px; cursor: pointer;">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>

                                            <button type="button" 
                                                    class="btn-delete-booking" 
                                                    data-id="<?= $booking['id']; ?>" 
                                                    style="background-color: #ff4757; color: #fff; border: none; border-radius: 50%; width: 30px; height: 30px; cursor: pointer;">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" style="padding: 20px; text-align: center; color: #888;">No booking requests found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {

    // View Booking Details Modal
    $('.btn-view-booking').on('click', function () {
        let name = $(this).data('name');
        let email = $(this).data('email');
        let phone = $(this).data('phone');
        let country = $(this).data('country');
        let packageChoice = $(this).data('package');
        let travelDate = $(this).data('date');
        let guests = $(this).data('guests');
        let notes = $(this).data('notes');
        let created = $(this).data('created');

        Swal.fire({
            title: `<strong>Trip Booking Details</strong>`,
            html: `
                <div style="text-align: left; font-size: 14px; line-height: 1.6;">
                    <p><strong>Customer Name:</strong> ${name}</p>
                    <p><strong>Email:</strong> <a href="mailto:${email}">${email}</a></p>
                    <p><strong>Phone:</strong> ${phone}</p>
                    <p><strong>Country:</strong> ${country}</p>
                    <hr>
                    <p><strong>Package Choice:</strong> ${packageChoice}</p>
                    <p><strong>Travel Date:</strong> ${travelDate}</p>
                    <p><strong>Guests:</strong> ${guests}</p>
                    <p><strong>Submitted:</strong> ${created}</p>
                    <hr>
                    <p><strong>Special Requirements / Notes:</strong></p>
                    <p style="white-space: pre-wrap; background: #f9f9f9; padding: 12px; border-radius: 6px; font-style: italic;">${notes}</p>
                </div>
            `,
            showCloseButton: true,
            confirmButtonText: '<i class="fa-solid fa-envelope"></i> Contact via Email',
            confirmButtonColor: '#00a8ff'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `mailto:${email}?subject=Regarding Your Trip Booking Request (${packageChoice})`;
            }
        });
    });

    // Delete Booking Action
    $('.btn-delete-booking').on('click', function () {
        let bookingId = $(this).data('id');

        Swal.fire({
            title: 'Delete Booking Request?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff4757',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'assets/ajax/js/php/booking-data.php',
                    type: 'POST',
                    data: { action: 'delete', id: bookingId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                            $(`#booking-row-${bookingId}`).fadeOut(500, function () { $(this).remove(); });
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'Server error while deleting.', 'error');
                    }
                });
            }
        });
    });

});
</script>

<?php include 'includes/footer.php'; ?>