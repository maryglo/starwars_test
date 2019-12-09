<?php
namespace Starwars_Test\Objects;

class People {
    public $table_name = 'people';

    // object properties
    public $id;
    public $birth_year;
    public $created;
    public $edited;
    public $eye_color;
    public $gender;
    public $hair_color;
    public $height;
    public $homeworld;
    public $mass;
    public $name;
    public $skin_color;

    public function _construct($id = null) {
        $this->id = $id;
    }
}