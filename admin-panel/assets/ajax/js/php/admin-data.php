<?php 
include '../../../classes/include.php';

header('Content-Type: application/json; charset=utf-8');

$id           = isset($_POST['id']) ? (int)$_POST['id'] : 1;
$name         = isset($_POST['admin_name']) ? trim($_POST['admin_name']) : '';
$email        = isset($_POST['admin_email']) ? trim($_POST['admin_email']) : '';
$current_pass = isset($_POST['current_password']) ? trim($_POST['current_password']) : '';
$new_pass     = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';
$confirm_pass = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
$profile_img  = isset($_FILES['profile_picture']) ? $_FILES['profile_picture'] : null;

if (empty($name)) {
    echo json_encode(["status" => "error", "message" => "Admin name is required."]);
    exit();
}

if (empty($email)) {
    echo json_encode(["status" => "error", "message" => "Email address is required."]);
    exit();
}

$FORMDATA = new admin($id);

// Password validation
if (!empty($new_pass)) {
    if ($new_pass !== $confirm_pass) {
        echo json_encode(["status" => "error", "message" => "New password and confirm password do not match."]);
        exit();
    }
    $FORMDATA->password = $new_pass;
}

$FORMDATA->name  = $name;
$FORMDATA->email = $email;
if ($profile_img) {
    $FORMDATA->profile_img = $profile_img;
}

$res = $FORMDATA->profile_update();

if ($res) {
    echo json_encode(["status" => "success", "message" => "Profile updated successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Database update failed."]);
}
exit();
?>