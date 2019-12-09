<?php
namespace Starwars_Test\v1;

use Starwars_Test\Database\DbManager;
use Starwars_Test\Route;
use Starwars_Test\Util\ArrayUtils;
use Starwars_Test\Objects\People as PeopleObject;

class People extends Route {
  private $collection = 'people';

  public function getPeople() {
    $db = DbManager::getInstance();
    $conn = $db->getConnection();
    $api = $this->api;

    try {
      $people = $conn->{$this->collection}->find([]);

      return $api->response([
        'success' => true,
        'people' => json_encode(iterator_to_array($people))
      ]);

    } catch( \MongoDB\Driver\Exception\AuthenticationException $e){
      return $api->response([
        'success' => false,
        'people' => array(),
        'message' => $e->getMessage()
      ]);
    }
  }
}

