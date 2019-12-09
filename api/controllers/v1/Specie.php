<?php
namespace Starwars_Test\v1;

use Starwars_Test\Database\DbManager;
use Starwars_Test\Route;
use Starwars_Test\Util\ArrayUtils;
use Starwars_Test\Objects\Species as SpecieObject;

class Specie extends Route {
  private $collection = 'species';

  public function getSpecies() {
    $db = DbManager::getInstance();
    $conn = $db->getConnection();
    $api = $this->api;

    try {
      $species = $conn->{$this->collection}->find([]);

      return $api->response([
        'success' => true,
        'species' => json_encode(iterator_to_array($species))
      ]);

    } catch( \MongoDB\Driver\Exception\AuthenticationException $e){
      return $api->response([
        'success' => false,
        'species' => array(),
        'message' => $e->getMessage()
      ]);
    }
  }
}

