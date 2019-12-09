<?php
namespace Starwars_Test\v1;

use Starwars_Test\Database\DbManager;
use Starwars_Test\Route;
use Starwars_Test\Util\ArrayUtils;
use Starwars_Test\Objects\Vehicle as VehicleObject;

class Vehicle extends Route {
  private $collection = 'vehicles';

  public function getVehicles() {
    $db = DbManager::getInstance();
    $conn = $db->getConnection();
    $api = $this->api;

    try {
      $vehicles = $conn->{$this->collection}->find([]);

      return $api->response([
        'success' => true,
        'vehicles' => json_encode(iterator_to_array($vehicles))
      ]);

    } catch( \MongoDB\Driver\Exception\AuthenticationException $e){
      return $api->response([
        'success' => false,
        'vehicles' => array(),
        'message' => $e->getMessage()
      ]);
    }
  }
}

