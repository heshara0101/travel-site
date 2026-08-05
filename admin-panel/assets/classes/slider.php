<?php

class slider
{

    public $id;
    public $title;
    public $subtitle;
    
    public $slider_img;
    public $created_at;

    // Constructor to initialize the slider object with an ID (fetch data from the DB)
    public function __construct($id = null)
    {
        if ($id) {
            $query = "SELECT `id`, `title`, `subtitle`, `slider_img`, `created_at` FROM `slider` WHERE `id` = " . (int) $id;
            $db = Database::getInstance();
            $result = mysqli_fetch_array($db->readQuery($query));

            if ($result) {
                $this->id = $result['id'];
                $this->title = $result['title'];
                $this->subtitle = $result['subtitle'];
                $this->slider_img = $result['slider_img'];
                $this->created_at = $result['created_at'];
            }
        }
    }

    // Create a new slider record in the database
    public function slider_create()
    {
        $db = Database::getInstance();
        // 1. Handle File Upload if $_FILES array was assigned
        $imageName = "";
        if (is_array($this->slider_img) && isset($this->slider_img['name']) && !empty($this->slider_img['name'])) {
            $imageName = time() . '_' . rand(1000, 9999) . '_' . basename($this->slider_img['name']);
            $targetDir = "images/";

            // Create target folder if it doesn't exist
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Upload the file
            move_uploaded_file($this->slider_img['tmp_name'], $targetDir . $imageName);
        } else if (is_string($this->slider_img)) {
            $imageName = $this->slider_img;
        }

        // 2. Escape string variables safely
        $title    = $db->escapeString($this->title);
        $subtitle = $db->escapeString($this->subtitle);
        $imgName  = $db->escapeString($imageName);

        $query = "INSERT INTO `slider` (`title`, `subtitle`, `slider_img`, `created_at`) VALUES ('" . 
            $title . "', '" . $subtitle . "','" . $imgName . "', NOW())";
        $result = $db->readQuery($query);

        if ($result) {
            return mysqli_insert_id($db->DB_CON); // Return the ID of the newly inserted record
        } else {
            return false; // Return false if the insertion fails
        }
    }

    // Update an existing slider record
    public function slider_update()
    {
         $db = Database::getInstance();
        // 1. Handle File Upload if $_FILES array was assigned
        $imageName = "";
        if (is_array($this->slider_img) && isset($this->slider_img['name']) && !empty($this->slider_img['name'])) {
            $imageName = time() . '_' . rand(1000, 9999) . '_' . basename($this->slider_img['name']);
            $targetDir = "images/";

            // Create target folder if it doesn't exist
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Upload the file
            move_uploaded_file($this->slider_img['tmp_name'], $targetDir . $imageName);
        } else if (is_string($this->slider_img)) {
            $imageName = $this->slider_img;
        }

        // 2. Escape string variables safely
        $title    = $db->escapeString($this->title);
        $subtitle = $db->escapeString($this->subtitle);
        $imgName  = $db->escapeString($imageName);

        $query = "UPDATE `slider` SET 
            `title` = '$title',
            `subtitle` = '$subtitle',
            `slider_img` = '$imgName'
            WHERE `id` = '$this->id'";
 

        $db = Database::getInstance();
        $result = $db->readQuery($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a slider record by ID
    public function slider_delete()
    {
        $query = "DELETE FROM `slider` WHERE `id` = '" . $this->id . "'";
        $db = Database::getInstance();
        return $db->readQuery($query);
    }


    public function slider_all()
    {

        $query = "SELECT * FROM `slider` ORDER BY title ASC";
        $db = Database::getInstance();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysqli_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

 

}


?>