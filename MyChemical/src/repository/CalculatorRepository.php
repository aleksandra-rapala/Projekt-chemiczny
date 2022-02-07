<?php
require_once 'Repository.php';

class CalculatorRepository extends Repository
{
    public function likeCalculator(int $id_calculator, int $id_user)
    {
        $boardRepository = new BoardRepository();
        $user_board = $boardRepository->getUserBoard($id_user);
        $id_board = $user_board->getIdBoard();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "board-calculator" (id_board, id_calculator)          
            VALUES (?, ?)
        ');

        $stmt->execute([
            $id_board,
            $id_calculator
        ]);
    }

        public function dislikeCalculator(int $id_calculator, int $id_user)
        {
            $boardRepository = new BoardRepository();
            $user_board = $boardRepository->getUserBoard($id_user);
            $id_board = $user_board->getIdBoard();
            $stmt = $this->database->connect()->prepare('
                DELETE FROM "board-calculator" WHERE "id_board" = :id_board and "id_calculator" = :id_calculator
            ');

            $stmt->bindParam(':id_board', $id_board, PDO::PARAM_INT);
            $stmt->bindParam(':id_calculator', $id_calculator, PDO::PARAM_INT);
            $stmt->execute();
    }



    public function getAllCalculators(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM calculator;
        ');
        $stmt->execute();
        $calculators = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($calculators as $calculator) {
            $result[] = new Calculator(
                $calculator['name_calculator'],
                $calculator['img_calculator'],
                $calculator['id_calculator'],
                $calculator['endpoint_calculator']
            );
        }
        return $result;
    }



    public function getUserCalculator(int $id_board): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "calculator_user" WHERE "id_board" = :id_board
        ');
        $stmt->bindParam(':id_board', $id_board, PDO::PARAM_INT);
        $stmt->execute();
        $calculators = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($calculators as $calculator) {
            $result[] = new Calculator(
            $calculator['name_calculator'],
            $calculator['img_calculator'],
                $calculator['id_calculator'],
                $calculator['endpoint_calculator']
            );
        }
        return $result;
    }


    public function getUserCalculatorsByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';
        $stm = $this->database->connect()->prepare('
                SELECT * FROM "calculator_user" WHERE id_board = :id_board and LOWER(name_calculator) LIKE :search
        ');

        $stm->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stm->bindParam(':id_board', $_SESSION['id_board'], PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}



