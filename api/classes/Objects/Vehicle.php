<?php
namespace Starwars_Test\Objects;

class Vehicle {
    public $table_name = 'vehicles';

    // object properties
    public $id;
    public $pilots;
    public $vehicle_class;

    public function _construct($id = null) {
        $this->id = $id;
    }
}