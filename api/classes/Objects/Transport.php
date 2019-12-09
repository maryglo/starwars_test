<?php
namespace Starwars_Test\Objects;

class Transport {
    public $table_name = 'transport';

    // object properties
    public $id;
    public $cargo_capacity;
    public $consumables;
    public $cost_in_credits;
    public $created;
    public $crew;
    public $edited;
    public $length;
    public $manufacturer;
    public $max_atmospheric_speed;
    public $model;
    public $name;
    public $passengers;

    public function _construct($id = null) {
        $this->id = $id;
    }
}