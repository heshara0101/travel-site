<?php 
include '../../../classes/include.php';

header('Content-Type: application/json; charset=utf-8');

// Use isset/empty checks so PHP doesn't throw "Undefined array key" warnings
$title    = isset($_POST['banner_title']) ? trim($_POST['banner_title']) : '';
$image    = isset($_FILES['banner_img']) ? $_FILES['banner_img'] : null;

if (empty($title)) {
    echo json_encode([
        "status"  => "error",
        "message" => "Banner title is required."
    ]);
    exit();
}

$FORMDATA = new banner(NULL); 

$FORMDATA->title = $title;
$FORMDATA->banner_img = $image; 

$res = $FORMDATA->banner_create();

if ($res) {
    echo json_encode([
        "status"  => "success",
        "message" => "Banner created successfully!"
    ]);
} else {
    echo json_encode([
        "status"  => "error",
        "message" => "Database insert failed."
    ]);
}
exit();