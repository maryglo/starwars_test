<?php
namespace Starwars_Test\v1;

use Starwars_Test\Database\DbManager;
use Starwars_Test\Route;
use Starwars_Test\Util\ArrayUtils;
use Starwars_Test\Objects\Transport as TransportObject;

class Transport extends Route {
  private $collection = 'transport';

  public function getTransports() {
    $db = DbManager::getInstance();
    $conn = $db->getConnection();
    $api = $this->api;

    try {
      $transports = $conn->{$this->collection}->find([]);

      return $api->response([
        'success' => true,
        'transports' => json_encode(iterator_to_array($transports))
      ]);

    } catch( \MongoDB\Driver\Exception\AuthenticationException $e){
      return $api->response([
        'success' => false,
        'transports' => array(),
        'message' => $e->getMessage()
      ]);
    }
  }
}

