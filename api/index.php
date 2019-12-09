<?php

// Namespaces
define('API_NAMESPACE',          'Starwars_Test');
define('API_DIR_ROOT',            dirname(__FILE__));
define('API_DIR_CLASSES',         API_DIR_ROOT . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR);
define('API_DIR_CONTROLLERS',     API_DIR_ROOT . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR);
require_once API_DIR_ROOT . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require_once API_DIR_ROOT . DIRECTORY_SEPARATOR . 'autoload.php';


use Starwars_Test\Api;

/**
 * mongo db config
 */
$config = array(
    'db_host' => 'candidate:PrototypeRocks123654@ds345028.mlab.com',
    'db_port' => '45028',
    'db_name'=> 'star-wars',
    /** API CORS */
    'cors' => [
        'enabled' => true,
        'origin' => '*', // can be a comma separated value or array of hosts
        'headers' => [
            'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Authorization, Cache-Control, Content-Type, Access-Control-Allow-Origin',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Allow-Methods' => 'GET,PUT,POST,DELETE,OPTIONS,PATCH'
        ]
    ]
);

define('_DB_SERVER_', $config['db_host']);
define('_DB_PORT_', $config['db_port']);
define('_DB_NAME_', $config['db_name']);

/** API Construct */
$api = new Api([
    'mode' => 'development',
    'debug' => true
]);

$api->add(new \Starwars_Test\Slim\CorsMiddleware());
$api->config('debug', true);

/**
 * Request Payload
 */
$params = $api->request->get();
$requestPayload = $api->request->post();
$api->group('/api', function () use ($api) {
    $api->group('/v1', function () use ($api) {
        /** Get all Films*/
        $api->get('/films?', '\Starwars_Test\v1\Film:getFilms')->name('get_films');
        //all people
        $api->get('/people?', '\Starwars_Test\v1\People:getPeople')->name('get_people');
        //all planets
        $api->get('/planets?', '\Starwars_Test\v1\Planet:getPlanets')->name('get_planets');
        //all species
        $api->get('/species?', '\Starwars_Test\v1\Specie:getSpecies')->name('get_species');
        //all starships
        $api->get('/starships?', '\Starwars_Test\v1\Starship:getStarships')->name('get_starships');
        //all transports
        $api->get('/transports?', '\Starwars_Test\v1\Transport:getTransports')->name('get_transports');
        //all vehicles
        $api->get('/vehicles?', '\Starwars_Test\v1\Vehicle:getVehicles')->name('get_vehicles');
    });
});

$api->notFound(function () use ($api) {
    $api->response([
        'success' => false,
        'error' => 'Resource Not Found'
    ]);
    return $api->stop();
});

$api->response()->header('Content-Type', 'application/json; charset=utf-8');
$api->run();


