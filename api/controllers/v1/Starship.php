<?php
namespace Starwars_Test\v1;

use Starwars_Test\Database\DbManager;
use Starwars_Test\Route;
use Starwars_Test\Util\ArrayUtils;
use Starwars_Test\Objects\Starship as StarshipObject;

class Starship extends Route {
  private $collection = 'starships';

  public function getStarship() {
    $db = DbManager::getInstance();
    $conn = $db->getConnection();
    $api = $this->api;

    try {
      $starships = $conn->{$this->collection}->find([]);

      return $api->response([
        'success' => true,
        'starships' => json_encode(iterator_to_array($starships))
      ]);

    } catch( \MongoDB\Driver\Exception\AuthenticationException $e){
      return $api->response([
        'success' => false,
        'starships' => array(),
        'message' => $e->getMessage()
      ]);
    }
  }
}

