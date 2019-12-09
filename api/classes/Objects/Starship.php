<?php
namespace Starwars_Test\Objects;

class Starship {
    public $table_name = 'starships';

    // object properties
    public $id;
    public $MGLT;
    public $hyperdrive_rating;
    public $pilots;
    public $starship_class;

    public function _construct($id = null) {
        $this->id = $id;
    }
}