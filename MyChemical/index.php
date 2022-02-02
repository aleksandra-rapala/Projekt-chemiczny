<?php

/* pierwszy plik uruchamiany na serwerze */

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); /*to co podajemy w pasku url -> to wysyła nam tutaj przeglądarka */
$path = parse_url( $path, PHP_URL_PATH);

/*ustawiamy mozliwe ścieżki*/


//dla default
Routing::get('index', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('register','DefaultController');
Routing::get('account', 'DefaultController');

//dla security
Routing::post('logowanie', 'SecurityController');
Routing::post('rejestracja', 'SecurityController');
Routing::get('wylogowanie', 'SecurityController');

//dla board
Routing::get('seeBoard', 'BoardController');
Routing::get('seeUserBoard', 'BoardController');
Routing::get('seeAdminBoard', 'BoardController');


//dla tablicy
Routing::get('seeAllTables', 'TableController');
Routing::get('seeContentTable', 'TableController');
Routing::get('likeSelectTable', 'TableController');
Routing::get('dislikeSelectTable', 'TableController');


//dla kalkulatora
Routing::get('seeAllCalculators', 'CalculatorController');
Routing::get('seeMolarMass', 'CalculatorController');
Routing::get('seePercentage', 'CalculatorController');
Routing::get('likeSelectCalculator', 'CalculatorController');
Routing::get('dislikeSelectCalculator', 'CalculatorController');


//dla reaction
Routing::get('makeReaction', 'ReactionController');
Routing::get('usun_reakcje', 'ReactionController');



//dla uploadu
Routing::post('addTable', 'TableController');
Routing::post('addReaction', 'ReactionController');

//dla wyszukiwania
Routing::post('searchReactions', 'ReactionController');
Routing::post('searchTables', 'TableController');
Routing::post('searchCalculators', 'CalculatorController');



/*odpalamy właściwą scieżkę wysłaną przez przeglądarkę*/
Routing::run($path);