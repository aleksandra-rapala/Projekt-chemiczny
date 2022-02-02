<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Reaction.php';
require_once __DIR__ . '/../repository/ReactionRepository.php';


class ReactionController extends AppController
{

    private $reactionRepository;

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES =['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY1 = '/../public/img/img_reaction/';


    public function __construct()
    {
        parent::__construct();
        $this->reactionRepository = new ReactionRepository();
    }



    public function makeReaction(){
        $this->render('add_reaction');
    }




    public function addReaction(){

        if($this->isPost() && is_uploaded_file($_FILES['file1']['tmp_name']) && $this->validate($_FILES['file1'])){   //sprawdza czy plik mozliwy do uploadu

            move_uploaded_file($_FILES['file1']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY1.$_FILES['file1']['name']);

            $reaction = new Reaction($_POST['name_reaction'],$_POST['chemical_formula'], null, $_POST['description'], $_FILES['file1']['name'] );
            $this->reactionRepository->addReaction($reaction);
        }

        $this->message[] = 'Pomyślnie dodano nową reakcję chemiczną.';
        $this->render('add_reaction', ['messages' => $this->message]);
    }




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



    public function usun_reakcje(int $id_reaction) {
        $this->reactionRepository->deleteReaction($id_reaction);
        http_response_code(200);
    }




    public function searchReactions(){

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->reactionRepository->getUserReactionsByTitle($decoded['search']));
        }

    }


}