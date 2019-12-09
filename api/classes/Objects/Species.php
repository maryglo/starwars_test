<?php
namespace Starwars_Test\Objects;

class Species {
    public $table_name = 'species';

    // object properties
    public $id;
    public $average_height;
    public $average_lifespan;
    public $classfication;
    public $created;
    public $designation;
    public $edited;
    public $eye_colors;
    public $hair_colors;
    public $homeworld;
    public $language;
    public $name;
    public $people;
    public $skin_colors;

    public function _construct($id = null) {
        $this->id = $id;
    }
}