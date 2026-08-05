<?php 
include '../../../classes/include.php';

header('Content-Type: application/json; charset=utf-8');

// Use isset/empty checks so PHP doesn't throw "Undefined array key" warnings
$type    = isset($_POST['tour_type']) ? trim($_POST['tour_type']) : '';
$title = isset($_POST['package_title']) ? trim($_POST['package_title']) : '';
$price = isset($_POST['package_price']) ? trim($_POST['package_price']) : '';
$dates = isset($_POST['package_duration']) ? trim($_POST['package_duration']) : '';
$short_desc = isset($_POST['short_desc']) ? trim($_POST['short_desc']) : '';
$map_code = isset($_POST['map_code']) ? trim($_POST['map_code']) : '';
$web_title = isset($_POST['web_title']) ? trim($_POST['web_title']) : '';
$web_desc = isset($_POST['web_desc']) ? trim($_POST['web_desc']) : '';
$keywords = isset($_POST['keywords']) ? trim($_POST['keywords']) : '';
$full_description = isset($_POST['full_description']) ? trim($_POST['full_description']) : '';
$image    = isset($_FILES['package_image']) ? $_FILES['package_image'] : null;

if (empty($type)) {
    echo json_encode([
        "status"  => "error",
        "message" => "Package type is required."
    ]);
    exit();
}

$FORMDATA = new tour_package(NULL); 

$FORMDATA->type = $type;
$FORMDATA->title = $title;
$FORMDATA->price = $price;
$FORMDATA->dates = $dates;
$FORMDATA->img = $image;
$FORMDATA->short_desc = $short_desc;
$FORMDATA->web_title = $web_title;
$FORMDATA->map_code = $map_code;
$FORMDATA->web_desc = $web_desc;
$FORMDATA->keywords = $keywords;
$FORMDATA->full_description = $full_description;

$res = $FORMDATA->package_create();

if ($res) {
    echo json_encode([
        "status"  => "success",
        "message" => "Package created successfully!"
    ]);
} else {
    echo json_encode([
        "status"  => "error",
        "message" => "Database insert failed."
    ]);
}
exit();