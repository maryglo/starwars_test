<?php
namespace Starwars_Test\Objects;

class Planet {
    public $table_name = 'planets';

    // object properties
    public $id;
    public $climate;
    public $created;
    public $diameter;
    public $edited;
    public $gravity;
    public $name;
    public $orbital_period;
    public $population;
    public $rotation_period;
    public $surface_water;
    public $terrain;

    public function _construct($id = null) {
        $this->id = $id;
    }
}