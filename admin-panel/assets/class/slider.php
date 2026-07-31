<?php

class Slider
{

    public $id;
    public $name;
    public $title;
    public $subtitle;
    
    public $slider_img;
    public $created_at;

    // Constructor to initialize the slider object with an ID (fetch data from the DB)
    public function __construct($id = null)
    {
        if ($id) {
            $query = "SELECT `id`, `name`, `title`,'subtitle','slider_img', `created_at` FROM `slider` WHERE `id` = " . (int) $id;
            $db = Database::getInstance();
            $result = mysqli_fetch_array($db->readQuery($query));

            if ($result) {
                $this->id = $result['id'];
                $this->name = $result['name'];
                $this->title = $result['title'];
                $this->subtitle = $result['subtitle'];
                $this->slider_img = $result['slider_img'];
                $this->created_at = $result['created_at'];
            }
        }
    }

    // Create a new slider record in the database
    public function create()
    {
        $query = "INSERT INTO `slider` (`name`, `title`,'subtitle'.'slider_img', `created_at`) VALUES ('" .
            $this->name . "', '" . $this->title . "', '" . $this->subtitle . "','" . $this->slider_img . "', NOW())";
        $db = Database::getInstance();
        $result = $db->readQuery($query);

        if ($result) {
            return mysqli_insert_id($db->DB_CON); // Return the ID of the newly inserted record
        } else {
            return false; // Return false if the insertion fails
        }
    }

    // Update an existing slider record
    public function update()
    {
        $query = "UPDATE `slider` SET 
            `name` = '$this->name',
            `title` = '$this->title',
            `subtitle` = '$this->subtitle',
            `slider_img` = '$this->slider_img'
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
    public function delete()
    {
        $query = "DELETE FROM `slider` WHERE `id` = '" . $this->id . "'";
        $db = Database::getInstance();
        return $db->readQuery($query);
    }


    public function all()
    {

        $query = "SELECT * FROM `slider` ORDER BY name ASC";
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