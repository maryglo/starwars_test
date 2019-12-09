<?php
namespace Starwars_Test\v1;

use Starwars_Test\Database\DbManager;
use Starwars_Test\Route;
use Starwars_Test\Util\ArrayUtils;
use Starwars_Test\Objects\Film as FilmObject;

class Film extends Route {
    private $collection = 'films';

    public function getFilms() {
      $db = DbManager::getInstance();
      $conn = $db->getConnection();
      $api = $this->api;

      try {
        $films = $conn->{$this->collection}->find([]);

        return $api->response([
          'success' => true,
          'films' => json_encode(iterator_to_array($films))
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

