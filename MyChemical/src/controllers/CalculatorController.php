<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Calculator.php';
require_once __DIR__ . '/../repository/CalculatorRepository.php';
require_once __DIR__ . '/../repository/ChemicalElementsRepository.php';


class CalculatorController extends AppController
{

    //private $message = [];
    private $calculatorRepository;
    private $chemicalElementsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->calculatorRepository = new CalculatorRepository();
        $this->chemicalElementsRepository = new ChemicalElementsRepository();

    }






    public function seeAllCalculators()
    {
        //wyswietlamy widok html calculator z podanymi argumentami
        $calculators = $this->calculatorRepository->getAllCalculators();
        $user_calculators = $this->calculatorRepository->getUserCalculator($_SESSION['id_board']);

        $this->render('calculators', ['calculators' => $calculators, 'user_calculators' => $user_calculators]);
    }





//polikowanie to tak naprawde stworzenie nowego wpisu do repozytorium
//id calculatora które zostanie tak naprawde zmapowane ze ścieżki Urla //id board mozna pobrac z aktywnej sesji

    public function likeSelectCalculator(int $id_calculator) {
        $this->calculatorRepository->likeCalculator($id_calculator, $_SESSION['id']);
        http_response_code(200);
    }

    public function dislikeSelectCalculator(int $id_calculator) {
        $this->calculatorRepository->dislikeCalculator($id_calculator, $_SESSION['id']);
        http_response_code(200);
    }








    public function seeMolarMass(){

        $listChemicalElements = $this->chemicalElementsRepository->getAllChemicalElements();
        $this->render('molar_mass', ['listChemicalElements' => $listChemicalElements]);
    }

    public function seePercentage(){

        $listChemicalElements = $this->chemicalElementsRepository->getAllChemicalElements();
        $this->render('percentage', ['listChemicalElements' => $listChemicalElements]);
    }




    public function searchCalculators(){

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->calculatorRepository->getUserCalculatorsByTitle($decoded['search']));
        }

    }

}