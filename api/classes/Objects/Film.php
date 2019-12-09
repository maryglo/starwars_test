<?php
namespace Starwars_Test\Objects;

class Film {
   public $table_name = 'films';

    // object properties
    public $id;
    public $characters;
    public $created;
    public $director;
    public $edited;
    public $episode_id;
    public $opening_crawl;
    public $planets;
    public $producer;
    public $release_date;
    public $species;
    public $starships;
    public $title;
    public $vehicles;

    public function _construct($id = null) {
        $this->id = $id;
    }
}