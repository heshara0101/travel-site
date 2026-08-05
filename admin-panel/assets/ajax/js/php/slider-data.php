<?php 
include '../../../classes/include.php';

header('Content-Type: application/json; charset=utf-8');

// Use isset/empty checks so PHP doesn't throw "Undefined array key" warnings
$title    = isset($_POST['slider_title']) ? trim($_POST['slider_title']) : '';
$subtitle = isset($_POST['slider_subtitle']) ? trim($_POST['slider_subtitle']) : '';
$image    = isset($_FILES['slider_img']) ? $_FILES['slider_img'] : null;

if (empty($title)) {
    echo json_encode([
        "status"  => "error",
        "message" => "Slider title is required."
    ]);
    exit(); 
}

$FORMDATA = new slider(NULL); 

$FORMDATA->title = $title;
$FORMDATA->subtitle = $subtitle;
$FORMDATA->slider_img = $image; 

$res = $FORMDATA->slider_create();

if ($res) {
    echo json_encode([
        "status"  => "success",
        "message" => "Slider created successfully!"
    ]);
} else {
    echo json_encode([
        "status"  => "error",
        "message" => "Database insert failed."
    ]);
}
exit();