<?php
namespace Starwars_Test\v1;

use Starwars_Test\Database\DbManager;
use Starwars_Test\Route;
use Starwars_Test\Util\ArrayUtils;
use Starwars_Test\Objects\Planet as PlanetObject;

class Planet extends Route {
  private $collection = 'planets';

  public function getPeople() {
    $db = DbManager::getInstance();
    $conn = $db->getConnection();
    $api = $this->api;

    try {
      $planets = $conn->{$this->collection}->find([]);

      return $api->response([
        'success' => true,
        'planets' => json_encode(iterator_to_array($planets))
      ]);

    } catch( \MongoDB\Driver\Exception\AuthenticationException $e){
      return $api->response([
        'success' => false,
        'planets' => array(),
        'message' => $e->getMessage()
      ]);
    }
  }
}

