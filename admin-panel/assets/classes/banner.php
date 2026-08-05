<?php

class banner
{

    public $id;
    public $title;
    public $banner_img;
    public $created_at;

    // Constructor to initialize the banner object with an ID (fetch data from the DB)
    public function __construct($id = null)
    {
        if ($id) {
            $query = "SELECT `id`, `title`, `banner_img`, `created_at` FROM `banner` WHERE `id` = " . (int) $id;
            $db = Database::getInstance();
            $result = mysqli_fetch_array($db->readQuery($query));

            if ($result) {
                $this->id = $result['id'];
                $this->title = $result['title'];
                $this->banner_img = $result['banner_img'];
                $this->created_at = $result['created_at'];
            }
        }
    }

    // Create a new banner record in the database
    public function banner_create()
    {
        $db = Database::getInstance();
        // 1. Handle File Upload if $_FILES array was assigned
        $imageName = "";
        if (is_array($this->banner_img) && isset($this->banner_img['name']) && !empty($this->banner_img['name'])) {
            $imageName = time() . '_' . rand(1000, 9999) . '_' . basename($this->banner_img['name']);
            $targetDir = "images/";

            // Create target folder if it doesn't exist
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Upload the file
            move_uploaded_file($this->banner_img['tmp_name'], $targetDir . $imageName);
        } else if (is_string($this->banner_img)) {
            $imageName = $this->banner_img;
        }

        // 2. Escape string variables safely
        $title    = $db->escapeString($this->title);
        $imgName  = $db->escapeString($imageName);

        $query = "INSERT INTO `banner` (`title`, `banner_img`, `created_at`) VALUES ('" .
            $title . "', '" . $imgName . "', NOW())";
        $result = $db->readQuery($query);

        if ($result) {
            return mysqli_insert_id($db->DB_CON); // Return the ID of the newly inserted record
        } else {
            return false; // Return false if the insertion fails
        }
    }

    // Update an existing banner record
    public function banner_update()
    {
        $db = Database::getInstance();
        // 1. Handle File Upload if $_FILES array was assigned
        $imageName = "";
        if (is_array($this->banner_img) && isset($this->banner_img['name']) && !empty($this->banner_img['name'])) {
            $imageName = time() . '_' . rand(1000, 9999) . '_' . basename($this->banner_img['name']);
            $targetDir = "images/";

            // Create target folder if it doesn't exist
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Upload the file
            move_uploaded_file($this->banner_img['tmp_name'], $targetDir . $imageName);
        } else if (is_string($this->banner_img)) {
            $imageName = $this->banner_img;
        }

        // 2. Escape string variables safely
        $title    = $db->escapeString($this->title);
        $imgName  = $db->escapeString($imageName);

        $query = "UPDATE `banner` SET 
            `title` = '$title',
            `banner_img` = '$imgName'
            WHERE `id` = '$this->id'";
 

        $db = Database::getInstance();
        $result = $db->readQuery($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a banner record by ID
    public function banner_delete()
    {
        $query = "DELETE FROM `banner` WHERE `id` = '" . $this->id . "'";
        $db = Database::getInstance();
        return $db->readQuery($query);
    }


    public function banner_all()
    {

        $query = "SELECT * FROM `banner` ORDER BY title ASC";
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