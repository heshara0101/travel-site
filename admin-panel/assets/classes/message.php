<?php

class message
{
    public $id;
    public $name;
    public $email;
    public $subject;
    public $message;
    public $created_at;

    // Constructor to fetch record by ID if needed
    public function __construct($id = null)
    {
        if ($id) {
            $query = "SELECT `id`, `name`, `email`, `subject`, `message`, `created_at` FROM `message` WHERE `id` = " . (int) $id;
            $db = Database::getInstance();
            $result = mysqli_fetch_array($db->readQuery($query));

            if ($result) {
                $this->id         = $result['id'];
                $this->name       = $result['name'];
                $this->email      = $result['email'];
                $this->subject    = $result['subject'];
                $this->message    = $result['message'];
                $this->created_at = $result['created_at'];
            }
        }
    }

    // Insert new message into database
    public function message_create()
    {
        $db = Database::getInstance();

        $name    = $db->escapeString($this->name);
        $email   = $db->escapeString($this->email);
        $subject = $db->escapeString($this->subject);
        $msg     = $db->escapeString($this->message);

        $query = "INSERT INTO `message` (`name`, `email`, `subject`, `message`, `created_at`) 
                  VALUES ('{$name}', '{$email}', '{$subject}', '{$msg}', NOW())";

        $result = $db->readQuery($query);

        if ($result) {
            return mysqli_insert_id($db->DB_CON);
        } else {
            return false;
        }
    }

    // Get total count of messages for topbar badge
    public function get_total_count()
    {
        $query = "SELECT COUNT(*) as total FROM `message`";
        $db = Database::getInstance();
        $res = mysqli_fetch_array($db->readQuery($query));
        return $res ? (int)$res['total'] : 0;
    }

    // Retrieve all messages for admin panel display
    public function message_all()
    {
        $query = "SELECT * FROM `message` ORDER BY created_at DESC";
        $db = Database::getInstance();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysqli_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    // Delete a message by ID
    public function message_delete()
    {
        $query = "DELETE FROM `message` WHERE `id` = '" . (int)$this->id . "'";
        $db = Database::getInstance();
        return $db->readQuery($query);
    }
}