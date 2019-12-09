<?php
namespace Starwars_Test\v1;

use Starwars_Test\Database\DbManager;
use Starwars_Test\Route;
use Starwars_Test\Util\ArrayUtils;
use Starwars_Test\Objects\Film as FilmObject;

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
        'films' => json_encode(iterator_to_array($people))
      ]);

    } catch( \MongoDB\Driver\Exception\AuthenticationException $e){
      return $api->response([
        'success' => false,
        'films' => array(),
        'message' => $e->getMessage()
      ]);
    }
  }
}

