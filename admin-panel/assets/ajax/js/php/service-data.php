<?php 
include '../../../classes/include.php';

header('Content-Type: application/json; charset=utf-8');

// Use isset/empty checks so PHP doesn't throw "Undefined array key" warnings
$title    = isset($_POST['service_title']) ? trim($_POST['service_title']) : '';
$short_desc = isset($_POST['service_short_desc']) ? trim($_POST['service_short_desc']) : '';
$long_desc = isset($_POST['service_description']) ? trim($_POST['service_description']) : '';
$image    = isset($_FILES['service_img']) ? $_FILES['service_img'] : null;

if (empty($title)) {
    echo json_encode([
        "status"  => "error",
        "message" => "Service title is required."
    ]);
    exit();
}

$FORMDATA = new service(NULL); 

$FORMDATA->title = $title;
$FORMDATA->short_desc = $short_desc;
$FORMDATA->long_desc = $long_desc;
$FORMDATA->img = $image;

$res = $FORMDATA->service_create();

if ($res) {
    echo json_encode([
        "status"  => "success",
        "message" => "Service created successfully!"
    ]);
} else {
    echo json_encode([
        "status"  => "error",
        "message" => "Database insert failed."
    ]);
}
exit();