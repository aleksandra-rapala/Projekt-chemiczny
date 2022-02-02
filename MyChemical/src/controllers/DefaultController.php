<?php

require_once 'AppController.php';
session_start();

class DefaultController extends AppController {


    //strona główna
    public function index(){
        if (isset($_SESSION['email'])) Routing::run('seeBoard');
        else  $this->render('home');
    }

    //logowanie
    public function login(){
        if (isset($_SESSION['email'])) Routing::run('seeBoard');
        else  $this->render('login');
    }

    //rejestracja
    public function register(){
        if (isset($_SESSION['email'])) Routing::run('seeBoard');
        else  $this->render('register');
    }

    //konto
    public function account(){
        $this->render('account');
    }

}