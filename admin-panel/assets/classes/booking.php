<?php

class booking
{
    public $id;
    public $name;
    public $email;
    public $phone_no;
    public $country;
    public $package;
    public $date;
    public $adult;
    public $child;
    public $note;
    public $status;
    public $created_at;

    // Constructor: Fetch record if ID is supplied
    public function __construct($id = null)
    {
        if ($id) {
            $db = Database::getInstance();
            $cleanId = (int)$id;
            
            // Fixed single-quote syntax error and column mapping
            $query = "SELECT `id`, `name`, `email`, `phone_no`, `country`, `package`, `date`, `adult`, `child`, `note`, `status`, `created_at` 
                      FROM `booking` WHERE `id` = {$cleanId}";
            
            $result = mysqli_fetch_assoc($db->readQuery($query));

            if ($result) {
                $this->id         = $result['id'];
                $this->name       = $result['name'];
                $this->email      = $result['email'];
                $this->phone_no   = $result['phone_no'];
                $this->country    = $result['country'];
                $this->package    = $result['package'];
                $this->date       = $result['date'];
                $this->adult      = $result['adult'];
                $this->child      = $result['child'];
                $this->note       = $result['note'];
                $this->status     = $result['status'];
                $this->created_at = $result['created_at'];
            }
        }
    }

    // Create new booking record securely
    public function booking_create()
    {
        $db = Database::getInstance();

        // Escape string properties to prevent SQL syntax errors & SQL injection
        $name     = $db->escapeString($this->name);
        $email    = $db->escapeString($this->email);
        $phone_no = $db->escapeString($this->phone_no);
        $country  = $db->escapeString($this->country);
        $package  = $db->escapeString($this->package);
        $date     = $db->escapeString($this->date);
        $adult    = (int)$this->adult;
        $child    = (int)$this->child;
        $note     = $db->escapeString($this->note);
        $status   = !empty($this->status) ? $db->escapeString($this->status) : 'Pending';

        $query = "INSERT INTO `booking` (`name`, `email`, `phone_no`, `country`, `package`, `date`, `adult`, `child`, `note`, `status`, `created_at`) 
                  VALUES ('{$name}', '{$email}', '{$phone_no}', '{$country}', '{$package}', '{$date}', {$adult}, {$child}, '{$note}', '{$status}', NOW())";

        $result = $db->readQuery($query);

        if ($result) {
            return mysqli_insert_id($db->DB_CON);
        }
        return false;
    }

    // Update existing booking record
    public function booking_update()
    {
        $db = Database::getInstance();

        $cleanId  = (int)$this->id;
        $name     = $db->escapeString($this->name);
        $email    = $db->escapeString($this->email);
        $phone_no = $db->escapeString($this->phone_no);
        $country  = $db->escapeString($this->country);
        $package  = $db->escapeString($this->package);
        $date     = $db->escapeString($this->date);
        $adult    = (int)$this->adult;
        $child    = (int)$this->child;
        $note     = $db->escapeString($this->note);
        $status   = $db->escapeString($this->status);

        $query = "UPDATE `booking` SET 
                    `name` = '{$name}',
                    `email` = '{$email}',
                    `phone_no` = '{$phone_no}',
                    `country` = '{$country}',
                    `package` = '{$package}',
                    `date` = '{$date}',
                    `adult` = {$adult},
                    `child` = {$child},
                    `note` = '{$note}',
                    `status` = '{$status}'
                  WHERE `id` = {$cleanId}";

        return (bool)$db->readQuery($query);
    }

    // Delete booking record by ID
    public function booking_delete()
    {
        $db = Database::getInstance();
        $cleanId = (int)$this->id;
        $query = "DELETE FROM `booking` WHERE `id` = {$cleanId}";
        return (bool)$db->readQuery($query);
    }

    // Fetch all bookings sorted newest first
    public function booking_all()
    {
        $db = Database::getInstance();
        $query = "SELECT * FROM `booking` ORDER BY `created_at` DESC";
        $result = $db->readQuery($query);
        
        $array_res = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $array_res[] = $row;
            }
        }
        return $array_res;
    }

    // Get count metrics for stats dashboard
    public function getCount()
    {
        $bookings = $this->booking_all();
        
        $total = count($bookings);
        $pending = 0;
        $confirmed = 0;
        $cancelled = 0;

        foreach ($bookings as $b) {
            $status = $b['status'] ?? 'Pending';
            if ($status === 'Confirmed') $confirmed++;
            elseif ($status === 'Cancelled') $cancelled++;
            else $pending++;
        }

        return [
            'total'     => $total,
            'pending'   => $pending,
            'confirmed' => $confirmed,
            'cancelled' => $cancelled
        ];
    }
}
?>