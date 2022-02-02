<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/TableController.php';
require_once 'src/controllers/CalculatorController.php';
require_once 'src/controllers/BoardController.php';
require_once 'src/controllers/ReactionController.php';

class Routing{

    public static $routes;


    public static function get($url, $view){
        self::$routes[$url] = $view;
    }

    public static function post($url, $view) {
        self::$routes[$url] = $view;
      }

      

    public static function run($url){
        $urlParts = explode("/", $url);  //tu są wszystkie części urla, które zostały przedzielone za pomocą /
        $action = $urlParts[0]; //akcją zawsze bedzie pierwsza część

        if(!array_key_exists($action, self::$routes)){
            die("Wrong url!");
        }

        /* TU WYWOŁUJEMY KONTROLER*/

        $controller = self::$routes[$action];  // pobieramy go z tablicy routingu
        $object = new $controller; //tworzenie obiektu na podstawie stringa
        $action = $action ?: 'index';

        $id = $urlParts[1] ?? ''; //jeśli jest null to jest przypisana wartosc pusta //to drugi argument w url po akcji

        //tu może być ewentualnie walidacja ale nie trzeba

        $object->$action($id);  //przekazujemy ewentualny drugi argument do metody-akcji
    }
}