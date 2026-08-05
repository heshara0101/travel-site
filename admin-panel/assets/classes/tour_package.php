<?php

class tour_package
{

    public $id;
    public $type;
    public $title;
    public $price;
    
    public $dates;
    public $img;
    public $short_desc;
    public $map_code;
    public $web_title;
    public $web_desc;
    public $keywords;
    public $full_description;
    public $created_at;

    // Constructor to initialize the tour_package object with an ID (fetch data from the DB)
    public function __construct($id = null)
    {
        if ($id) {
            $query = "SELECT `id`, `type`, `title`, `price`, `dates`, `img`, `short_desc`, `map_code`, `web_title`, `web_desc`, `keywords`, `full_description`, `created_at` FROM `tour_package` WHERE `id` = " . (int) $id;
            $db = Database::getInstance();
            $result = mysqli_fetch_array($db->readQuery($query));

            if ($result) {
                $this->id = $result['id'];
                $this->type = $result['type'];
                $this->title = $result['title'];
                $this->price = $result['price'];
                $this->dates = $result['dates'];
                $this->img = $result['img'];
                $this->short_desc = $result['short_desc'];
                $this->map_code = $result['map_code'];
                $this->web_title = $result['web_title'];
                $this->web_desc = $result['web_desc'];
                $this->keywords = $result['keywords'];
                $this->full_description = $result['full_description'];
                $this->created_at = $result['created_at'];
            }
        }
    }

    // Create a new tour_package record in the database
    public function package_create()
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
        $type    = $db->escapeString($this->type);
        $title = $db->escapeString($this->title);
        $price    = $db->escapeString($this->price);
        $dates    = $db->escapeString($this->dates);
        $img    = $db->escapeString($imageName);
        $short_desc = $db->escapeString($this->short_desc);
        $map_code = $db->escapeString($this->map_code);
        $web_title = $db->escapeString($this->web_title);
        $web_desc = $db->escapeString($this->web_desc);
        $keywords = $db->escapeString($this->keywords);
        $full_description = $db->escapeString($this->full_description);
        

        $query = "INSERT INTO `tour_package` (`type`, `title`, `price`, `dates`, `img`, `short_desc`, `map_code`, `web_title`, `web_desc`, `keywords`, `full_description`, `created_at`) VALUES ('" .
            $type . "', '" . $title . "', '" . $price . "', '" . $dates . "', '" . $img . "', '" . $short_desc . "', '" . $map_code . "', '" . $web_title . "', '" . $web_desc . "', '" . $keywords . "', '" . $full_description . "', NOW())";

        $result = $db->readQuery($query);

        if ($result) {
            return mysqli_insert_id($db->DB_CON); // Return the ID of the newly inserted record
        } else {
            return false; // Return false if the insertion fails
        }
    }

    // Update an existing tour_package record
    public function package_update()
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
        $type    = $db->escapeString($this->type);
        $title = $db->escapeString($this->title);
        $price    = $db->escapeString($this->price);
        $dates    = $db->escapeString($this->dates);
        $img    = $db->escapeString($imageName);
        $short_desc = $db->escapeString($this->short_desc);
        $map_code = $db->escapeString($this->map_code);
        $web_title = $db->escapeString($this->web_title);
        $web_desc = $db->escapeString($this->web_desc);
        $keywords = $db->escapeString($this->keywords);
        $full_description = $db->escapeString($this->full_description);

        $query = "UPDATE `tour_package` SET 
            `type` = '$type',
            `title` = '$title',
            `price` = '$price',
            `dates` = '$dates',
            `img` = '$img',
            `short_desc` = '$short_desc',
            `map_code` = '$map_code',
            `web_title` = '$web_title',
            `web_desc` = '$web_desc',
            `keywords` = '$keywords',
            `full_description` = '$full_description'
            WHERE `id` = '$this->id'";
 

        
        $result = $db->readQuery($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a tour_package record by ID
    public function package_delete()
    {
        $query = "DELETE FROM `tour_package` WHERE `id` = '" . $this->id . "'";
        $db = Database::getInstance();
        return $db->readQuery($query);
    }


    public function package_all()
    {

        $query = "SELECT * FROM `tour_package` ORDER BY title ASC";
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