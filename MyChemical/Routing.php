<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/TableController.php';
require_once 'src/controllers/CalculatorController.php';
require_once 'src/controllers/BoardController.php';
require_once 'src/controllers/ReactionController.php';

session_start();

class Routing{

    public static $routes;
    public static $routes_possible_account;


    public static function get($url, $view, $possible_account){
        self::$routes[$url] = $view;
        self::$routes_possible_account[$url] = $possible_account;
    }

    public static function post($url, $view, $possible_account) {
        self::$routes[$url] = $view;
        self::$routes_possible_account[$url] = $possible_account;
      }

      

    public static function run($url){
        $urlParts = explode("/", $url);  //tu są wszystkie części urla, które zostały przedzielone za pomocą /
        $action = $urlParts[0]; //akcją zawsze bedzie pierwsza część
        $id = $urlParts[1] ?? ''; //jeśli jest null to jest przypisana wartosc pusta //to drugi argument w url po akcji


        if(!array_key_exists($action, self::$routes)){
            die("Wrong url!");
        }


        //Sprawdzanie dostepności dla danego użytkownika

        if(self::$routes_possible_account[$action]==USER){
            if (!(self::ifIsLog() && self::ifIsUser())) $action = "login";
        }

        else if(self::$routes_possible_account[$action]==ADMIN) {
            if (!(self::ifIsLog() && self::ifIsAdmin())) $action = "login";
        }

        else if(self::$routes_possible_account[$action]==USER_ADMIN){
            if (!(self::ifIsLog() && (self::ifIsUser() || self::ifIsAdmin()))) $action = "login";
        }


        $controller = self::$routes[$action];  // pobieramy go z tablicy routingu
        $object = new $controller; //tworzenie obiektu na podstawie stringa
        $object->$action($id);   //przekazujemy ewentualny drugi argument do metody-akcji
    }



    //prywatne


    private static function ifIsLog()
    {
        return isset($_SESSION['email']);
    }

    private static function ifIsUser(){
        return ($_SESSION['account_type'] == 1);
    }

    private static function ifIsAdmin(){
        return ($_SESSION['account_type'] == 2);
    }
}