<?php 
include '../../../classes/include.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'create';

    // 1. DELETE ACTION
    if ($action === 'delete') {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        
        if ($id > 0) {
            $BOOKING = new booking($id);
            if ($BOOKING->booking_delete()) {
                echo json_encode([
                    "status"  => "success",
                    "message" => "Booking request deleted successfully!"
                ]);
            } else {
                echo json_encode([
                    "status"  => "error",
                    "message" => "Failed to delete booking request."
                ]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid Booking ID."]);
        }
        exit();
    }

    // 2. CREATE BOOKING ACTION (Default)
    $name     = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone_no = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $country  = isset($_POST['country']) ? trim($_POST['country']) : '';
    $package  = isset($_POST['package_choice']) ? trim($_POST['package_choice']) : '';
    $date     = isset($_POST['date']) ? trim($_POST['date']) : '';
    $adult    = isset($_POST['adult']) ? intval($_POST['adult']) : 1;
    $child    = isset($_POST['child']) ? intval($_POST['child']) : 0;
    $note     = isset($_POST['note']) ? trim($_POST['note']) : '';
    $status   = isset($_POST['status']) ? trim($_POST['status']) : 'Pending';

    $FORMDATA = new booking(); 
    $FORMDATA->name     = $name;
    $FORMDATA->email    = $email;
    $FORMDATA->phone_no = $phone_no;
    $FORMDATA->country  = $country;
    $FORMDATA->package  = $package;
    $FORMDATA->date     = $date;
    $FORMDATA->adult    = $adult;
    $FORMDATA->child    = $child;
    $FORMDATA->note     = $note;
    $FORMDATA->status   = $status;

    $res = $FORMDATA->booking_create();

    if ($res) {
        echo json_encode([
            "status"  => "success",
            "message" => "Booking created successfully!"
        ]);
    } else {
        echo json_encode([
            "status"  => "error",
            "message" => "Database insert failed."
        ]);
    }
    exit();
}

echo json_encode(["status" => "error", "message" => "Invalid Request"]);
exit();