<?php

class service
{

    public $id;
    public $title;
    public $img;
    public $short_desc;
    public $long_desc;
    public $created_at;

    // Constructor to initialize the service object with an ID (fetch data from the DB)
    public function __construct($id = null)
    {
        if ($id) {
            $query = "SELECT `id`, `title`, `img`, `short_description`, `description`, `created_at` FROM `service` WHERE `id` = " . (int) $id;
            $db = Database::getInstance();
            $result = mysqli_fetch_array($db->readQuery($query));

            if ($result) {
                $this->id = $result['id'];
                $this->title = $result['title'];
                $this->img = $result['img'];
                $this->short_desc = $result['short_description'];
                $this->long_desc = $result['description'];
                $this->created_at = $result['created_at'];
            }
        }
    }

    // Create a new service record in the database
    public function service_create()
    {
         $db = Database::getInstance();
        // 1. Handle File Upload if $_FILES array was assigned
        $imageName = "";
        if (is_array($this->img) && isset($this->img['name']) && !empty($this->img['name'])) {
            $imageName = time() . '_' . rand(1000, 9999) . '_' . basename($this->img['name']);
            $targetDir = "images/";

            // Create target folder if it doesn't exist
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Upload the file
            move_uploaded_file($this->img['tmp_name'], $targetDir . $imageName);
        } else if (is_string($this->img)) {
            $imageName = $this->img;
        }

        // 2. Escape string variables safely
        $title    = $db->escapeString($this->title);
        $short_desc = $db->escapeString($this->short_desc);
        $long_desc = $db->escapeString($this->long_desc);
        $imgName  = $db->escapeString($imageName);

        $query = "INSERT INTO `service` (`title`, `img`, `short_description`, `description`, `created_at`) VALUES ('" .
            $title . "', '" . $imgName . "', '" . $short_desc . "', '" . $long_desc . "', NOW())";
        
        $result = $db->readQuery($query);

        if ($result) {
            return mysqli_insert_id($db->DB_CON); // Return the ID of the newly inserted record
        } else {
            return false; // Return false if the insertion fails
        }
    }

    // Update an existing service record
    public function service_update()
    {
         $db = Database::getInstance();
        // 1. Handle File Upload if $_FILES array was assigned
        $imageName = "";
        if (is_array($this->img) && isset($this->img['name']) && !empty($this->img['name'])) {
            $imageName = time() . '_' . rand(1000, 9999) . '_' . basename($this->img['name']);
            $targetDir = "images/";

            // Create target folder if it doesn't exist
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Upload the file
            move_uploaded_file($this->img['tmp_name'], $targetDir . $imageName);
        } else if (is_string($this->img)) {
            $imageName = $this->img;
        }

        // 2. Escape string variables safely
        $title    = $db->escapeString($this->title);
        $short_desc = $db->escapeString($this->short_desc);
        $long_desc = $db->escapeString($this->long_desc);
        $imgName  = $db->escapeString($imageName);

        $query = "UPDATE `service` SET 
            `title` = '$title',
            `img` = '$imgName',
            `short_description` = '$short_desc',
            `description` = '$long_desc'
            WHERE `id` = '$this->id'";
 

        $result = $db->readQuery($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a service record by ID
    public function service_delete()
    {
        $query = "DELETE FROM `service` WHERE `id` = '" . $this->id . "'";
        $db = Database::getInstance();
        return $db->readQuery($query);
    }


    public function service_all()
    {

        $query = "SELECT * FROM `service` ORDER BY title ASC";
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