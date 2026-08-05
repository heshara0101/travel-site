<?php

class admin
{
    public $id;
    public $name;
    public $password;
    public $email;
    public $profile_img;

    // Optional $id parameter allows instantiating with or without loading a record
    public function __construct($id = null)
    {
        if ($id) {
            $query = "SELECT * FROM `admin` WHERE `id` = " . (int)$id;
            $db = Database::getInstance();
            $result = $db->readQuery($query);

            if ($result && $row = mysqli_fetch_array($result)) {
                $this->id          = $row['id'];
                $this->name        = $row['name'];
                $this->password    = $row['password'];
                $this->email       = $row['email'];
                $this->profile_img = $row['profile_img'];
            }
        }
    }

    // Update an existing admin record
    public function profile_update()
    {
        $db = Database::getInstance();
        $imageName = "";

        // Handle File Upload
        if (is_array($this->profile_img) && isset($this->profile_img['name']) && !empty($this->profile_img['name'])) {
            $imageName = time() . '_' . rand(1000, 9999) . '_' . basename($this->profile_img['name']);
            $targetDir = __DIR__ . "images/";

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            move_uploaded_file($this->profile_img['tmp_name'], $targetDir . $imageName);
        } else if (is_string($this->profile_img)) {
            $imageName = $this->profile_img;
        }

        // Escape SQL parameters
        $name     = $db->escapeString($this->name);
        $password = $db->escapeString($this->password);
        $email    = $db->escapeString($this->email);
        $img      = $db->escapeString($imageName);
        $id       = (int)$this->id;

        if (!empty($imageName)) {
            $query = "UPDATE `admin` SET 
                `name` = '$name',
                `password` = '$password',
                `email` = '$email',
                `profile_img` = '$img'
                WHERE `id` = '$id'";
        } else {
            $query = "UPDATE `admin` SET 
                `name` = '$name',
                `password` = '$password',
                `email` = '$email'
                WHERE `id` = '$id'";
        }

        return $db->readQuery($query);
    }

    public function profile_all()
    {
        $query = "SELECT * FROM `admin`";
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