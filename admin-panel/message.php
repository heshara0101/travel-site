<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php
require_once "assets/classes/Database.php";
require_once "assets/classes/message.php";

$MSG = new message();
$messages = $MSG->message_all();
?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <div class="breadcrumb" style="font-size: 13px; margin-bottom: 20px;">
            <a href="index.php" style="text-decoration: none; color: #03362a;">Dashboard</a> / Customer Messages
        </div>

        <div class="card" style="background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <h3 class="card-title" style="margin: 0; font-size: 18px; font-weight: 600; color: #333;">
                    Inquiries & Messages (<?= count($messages); ?>)
                </h3>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                    <thead>
                        <tr style="background: #f8f9fa; border-bottom: 2px solid #eee;">
                            <th style="padding: 12px;">#</th>
                            <th style="padding: 12px;">Sender Name</th>
                            <th style="padding: 12px;">Email</th>
                            <th style="padding: 12px;">Subject</th>
                            <th style="padding: 12px;">Date</th>
                            <th style="padding: 12px; text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($messages)): ?>
                            <?php foreach ($messages as $index => $msg): ?>
                                <tr id="msg-row-<?= $msg['id']; ?>" style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 12px; font-weight: bold;"><?= $index + 1; ?></td>
                                    <td style="padding: 12px;"><?= htmlspecialchars($msg['name']); ?></td>
                                    <td style="padding: 12px;">
                                        <a href="mailto:<?= htmlspecialchars($msg['email']); ?>" style="color: #00a8ff; text-decoration: none;">
                                            <?= htmlspecialchars($msg['email']); ?>
                                        </a>
                                    </td>
                                    <td style="padding: 12px; font-weight: 500;"><?= htmlspecialchars($msg['subject']); ?></td>
                                    <td style="padding: 12px; color: #777; font-size: 12px;">
                                        <?= date("M d, Y - h:i A", strtotime($msg['created_at'])); ?>
                                    </td>
                                    <td style="padding: 12px; text-align: center;">
                                        <div style="display: flex; gap: 8px; justify-content: center;">
                                            <button type="button" 
                                                    class="btn-read" 
                                                    data-name="<?= htmlspecialchars($msg['name']); ?>" 
                                                    data-email="<?= htmlspecialchars($msg['email']); ?>" 
                                                    data-subject="<?= htmlspecialchars($msg['subject']); ?>" 
                                                    data-message="<?= htmlspecialchars($msg['message']); ?>" 
                                                    data-date="<?= date("M d, Y - h:i A", strtotime($msg['created_at'])); ?>"
                                                    style="background-color: #00a8ff; color: #fff; border: none; border-radius: 50%; width: 30px; height: 30px; cursor: pointer;">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>

                                            <button type="button" 
                                                    class="btn-delete-msg" 
                                                    data-id="<?= $msg['id']; ?>" 
                                                    style="background-color: #ff4757; color: #fff; border: none; border-radius: 50%; width: 30px; height: 30px; cursor: pointer;">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="padding: 20px; text-center; color: #888;">No messages found.</td>
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

    // View / Read Message Modal
    $('.btn-read').on('click', function () {
        let name = $(this).data('name');
        let email = $(this).data('email');
        let subject = $(this).data('subject');
        let message = $(this).data('message');
        let date = $(this).data('date');

        Swal.fire({
            title: `<strong>${subject}</strong>`,
            html: `
                <div style="text-align: left; font-size: 14px; line-height: 1.6;">
                    <p><strong>From:</strong> ${name} (&lt;<a href="mailto:${email}">${email}</a>&gt;)</p>
                    <p><strong>Received:</strong> ${date}</p>
                    <hr>
                    <p style="white-space: pre-wrap; background: #f9f9f9; padding: 12px; border-radius: 6px; font-style: italic;">${message}</p>
                </div>
            `,
            showCloseButton: true,
            confirmButtonText: '<i class="fa-solid fa-reply"></i> Reply via Email',
            confirmButtonColor: '#00a8ff'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `mailto:${email}?subject=RE: ${encodeURIComponent(subject)}`;
            }
        });
    });

    // Delete Message Action
    $('.btn-delete-msg').on('click', function () {
        let msgId = $(this).data('id');

        Swal.fire({
            title: 'Delete Message?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff4757',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'assets/ajax/js/php/message-data.php',
                    type: 'POST',
                    data: { action: 'delete', id: msgId },
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
                            $(`#msg-row-${msgId}`).fadeOut(500, function () { $(this).remove(); });
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