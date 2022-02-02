<?php

require_once __DIR__.'/../../Database.php';

//klasa podstawowa //tworzenie łączenia z bazą danych
//moznaby się pokusić o wzorzec projektowy singleton, aby istaniała tylko jedna instancja

class Repository {
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }
}