<?php
require_once 'AppController.php';
require_once __DIR__ . '/../models/Board.php';
require_once __DIR__ . '/../repository/BoardRepository.php';
require_once __DIR__ . '/../models/Calculator.php';
require_once __DIR__ . '/../models/Table.php';
require_once __DIR__ . '/../models/Reaction.php';
require_once __DIR__ . '/../repository/CalculatorRepository.php';
require_once __DIR__ . '/../repository/TableRepository.php';
require_once __DIR__ . '/../repository/ReactionRepository.php';

session_start();

class BoardController extends AppController
{
    private $boardRepository;

    public function __construct()
    {
        parent::__construct();
        $this->boardRepository = new BoardRepository();
    }


    public function seeBoard(){
        if($_SESSION['account_type'] == 1) $this->seeUserBoard();
        else if($_SESSION['account_type'] == 2) $this->seeAdminBoard();
    }



    public function seeUserBoard()
    {
        $calculatorRepository = new CalculatorRepository();
        $tableRepository = new TableRepository();
        $reactionRepository = new ReactionRepository();

        $calculators = $calculatorRepository->getUserCalculator($_SESSION['id_board']);
        $tables = $tableRepository->getUserTable($_SESSION['id_board']);
        $reactions = $reactionRepository->getUserReaction($_SESSION['id_board']);

        $this->render('board', ['calculators' => $calculators, 'tables' => $tables, 'reactions' => $reactions]);
    }


    public function seeAdminBoard(){
        $this->render('admin_board');
    }

}