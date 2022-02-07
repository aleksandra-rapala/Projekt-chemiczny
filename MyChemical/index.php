<?php

/* pierwszy plik uruchamiany na serwerze */

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); /*to co podajemy w pasku url -> to wysyła nam tutaj przeglądarka */
$path = parse_url( $path, PHP_URL_PATH);


const USER = 0;
const ADMIN = 1;
const USER_ADMIN = 2;
const ALL = 3;



/*ustawiamy mozliwe ścieżki*/


//dla default
Routing::get('index', 'DefaultController', ALL);
Routing::get('login', 'DefaultController', ALL);
Routing::get('register','DefaultController', ALL);
Routing::get('account', 'DefaultController', USER_ADMIN);

//dla security
Routing::post('logowanie', 'SecurityController', ALL);
Routing::post('rejestracja', 'SecurityController', ALL);
Routing::get('wylogowanie', 'SecurityController', USER_ADMIN);

//dla board
Routing::get('seeBoard', 'BoardController', USER_ADMIN);
Routing::get('seeUserBoard', 'BoardController', USER);
Routing::get('seeAdminBoard', 'BoardController', ADMIN);


//dla tablicy
Routing::get('seeAllTables', 'TableController', USER_ADMIN);
Routing::get('seeContentTable', 'TableController', USER_ADMIN);
Routing::get('likeSelectTable', 'TableController', USER);
Routing::get('dislikeSelectTable', 'TableController', USER);


//dla kalkulatora
Routing::get('seeAllCalculators', 'CalculatorController', USER_ADMIN);
Routing::get('seeMolarMass', 'CalculatorController', USER_ADMIN);
Routing::get('seePercentage', 'CalculatorController', USER_ADMIN);
Routing::get('likeSelectCalculator', 'CalculatorController', USER);
Routing::get('dislikeSelectCalculator', 'CalculatorController', USER);


//dla reaction
Routing::get('makeReaction', 'ReactionController', USER);
Routing::get('usun_reakcje', 'ReactionController', USER);



//dla uploadu
Routing::post('addTable', 'TableController', ADMIN);
Routing::post('addReaction', 'ReactionController', USER);

//dla wyszukiwania
Routing::post('searchReactions', 'ReactionController', USER);
Routing::post('searchTables', 'TableController', USER);
Routing::post('searchCalculators', 'CalculatorController', USER);



/*odpalamy właściwą scieżkę wysłaną przez przeglądarkę*/
Routing::run($path);