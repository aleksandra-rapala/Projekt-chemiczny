<?php
require_once 'AppController.php';
session_start();

class DefaultController extends AppController {


    //strona główna
    public function index(){
        if ($this->ifIsLog()) Routing::run('seeBoard');
        else  $this->render('home');
    }

    //logowanie
    public function login(){
        if ($this->ifIsLog()) Routing::run('seeBoard');
        else  $this->render('login');
    }

    //rejestracja
    public function register(){
        if ($this->ifIsLog()) Routing::run('seeBoard');
        else  $this->render('register');
    }

    //konto
    public function account(){
        if ($this->ifIsLog()) $this->render('account');
        else  $this->render('login');
    }



    //prywatna

    private function ifIsLog(){
        return isset($_SESSION['email']);
    }
}