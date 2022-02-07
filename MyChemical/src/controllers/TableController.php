<?php
require_once 'AppController.php';
require_once __DIR__ . '/../models/Table.php';
require_once __DIR__ . '/../repository/TableRepository.php';

session_start();

class TableController extends AppController
{
    private $tableRepository;
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY1 = '/../public/img/img_tables/';
    const UPLOAD_DIRECTORY2 = '/../public/img/img_content_table/';
    private $message = [];

    public function __construct()
    {
        parent::__construct();
        $this->tableRepository = new TableRepository();
    }

    public function seeAllTables()
    {
            $tables = $this->tableRepository->getAllTables();
            $user_tables = $this->tableRepository->getUserTable($_SESSION['id_board']);
            $this->render('tables', ['tables' => $tables, 'user_tables' => $user_tables]);
    }

    public function seeContentTable(int $id_table)
    {
        $tables = $this->tableRepository->getTable($id_table);
        $user_tables = $this->tableRepository->getUserTable($_SESSION['id_board']);
        $this->render('content_table', ['tables' => $tables, 'user_tables' => $user_tables]); //by widzieć serduszka
    }


    public function likeSelectTable(int $id_table)
    {
            $this->tableRepository->likeTable($id_table, $_SESSION['id']);
            http_response_code(200);
    }

    public function dislikeSelectTable(int $id_table)
    {
            $this->tableRepository->dislikeTable($id_table, $_SESSION['id']);
            http_response_code(200);
    }



// dla uploadu

    private function validate(array $file1) : bool
    {
        if($file1['size'] > self::MAX_FILE_SIZE){
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if(isset($file1['type']) && !in_array($file1['type'], self::SUPPORTED_TYPES)){
            $this->message[] = 'File type is not supported';
            return false;
        }
        return true;
    }


    public function addTable(){

        if ($this->isPost() && is_uploaded_file($_FILES['file1']['tmp_name']) && $this->validate($_FILES['file1']) && is_uploaded_file($_FILES['file2']['tmp_name']) && $this->validate($_FILES['file2'])) {   //sprawdza czy plik mozliwy do uploadu

            move_uploaded_file($_FILES['file1']['tmp_name'], dirname(__DIR__) . self::UPLOAD_DIRECTORY1 . $_FILES['file1']['name']);
            move_uploaded_file($_FILES['file2']['tmp_name'], dirname(__DIR__) . self::UPLOAD_DIRECTORY2 . $_FILES['file2']['name']);

            $table = new Table($_POST['name_table'], $_FILES['file1']['name'], null, $_FILES['file2']['name']);
            $this->tableRepository->addTable($table);
        }

        $this->message[] = 'Pomyślnie dodano nową tablicę.';
        $this->render('admin_board', ['messages' => $this->message]);
    }



    //dla wyszukiwania

    public function searchTables()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->tableRepository->getUserTablesByTitle($decoded['search']));
        }
    }
}