<?php

class Promotion {

    public $name;
    public $image;
    public $start_date;
    public $end_date;

    public function __construct($name, $image, $start_date, $end_date) {
        $this->name = $name;
        $this->image = $image;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_image() {
        return $this->image;
    }

    public function get_start_date() {
        return $this->start_date;
    }

    public function get_end_date() {
        return $this->end_date;
    }

    public static function get_promotions($db) {
        $query = "SELECT * FROM promotions";
        $result = $db->query($query);
    
        $promotions = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $promotions[] = new Promotion($row["name"], $row["image"], $row["start_date"], $row["end_date"]);
            }
        }
    
        return $promotions;
    }

}
