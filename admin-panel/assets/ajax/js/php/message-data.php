<?php 
include '../../../classes/include.php';

header('Content-Type: application/json; charset=utf-8');

// Read input values safely
$name    = isset($_POST['name']) ? trim($_POST['name']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';
$action = isset($_POST['action']) ? $_POST['action'] : '';

// Handle delete action
if ($action === 'delete') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($id > 0) {
        $MSG = new message($id);
        $res = $MSG->message_delete();

        if ($res) {
            echo json_encode([
                "status"  => "success",
                "message" => "Message deleted successfully."
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Failed to delete message from database."
            ]);
        }
    } else {
        echo json_encode([
            "status"  => "error",
            "message" => "Invalid message ID."
        ]);
    }
    exit();
}

// Store record in database using message class
$MSG_OBJ = new message(NULL);
$MSG_OBJ->name    = $name;
$MSG_OBJ->email   = $email;
$MSG_OBJ->subject = $subject;
$MSG_OBJ->message = $message;

$res = $MSG_OBJ->message_create();

if ($res) {
    echo json_encode([
        "status"  => "success",
        "message" => "Thank you! Your message has been sent successfully."
    ]);
} else {
    echo json_encode([
        "status"  => "error",
        "message" => "Failed to save message. Please try again."
    ]);
}
exit();