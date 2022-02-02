<?php

require_once 'Repository.php';

class TableRepository extends Repository
{


    public function likeTable(int $id_table, int $id_user)
    {

        //dzieki id_user czyli wczesniej wstawionego user session + odnalezc tablice board dla niego

        $boardRepository = new BoardRepository();
        $user_board = $boardRepository->getUserBoard($id_user);

        $id_board = $user_board->getIdBoard();


        $stmt = $this->database->connect()->prepare('
            INSERT INTO "board-table" (id_board, id_table)          
            VALUES (?, ?)
        ');


        //wykonanie zapytania //za pytajniki podstawiamy wartości konkretne
        $stmt->execute([
            $id_board,
            $id_table
        ]);
    }


    public function dislikeTable(int $id_table, int $id_user)
    {

        $boardRepository = new BoardRepository();
        $user_board = $boardRepository->getUserBoard($id_user);


        $id_board = $user_board->getIdBoard();


        $stmt = $this->database->connect()->prepare('
            DELETE FROM "board-table" WHERE "id_board" = :id_board AND "id_table" = :id_table
        ');

        //DELETE FROM "board-table" bu WHERE bu.id_board=:id_board and bu.id_table=:id_table)

        $stmt->bindParam(':id_board', $id_board, PDO::PARAM_INT);
        $stmt->bindParam(':id_table', $id_table, PDO::PARAM_INT);

        //wykonanie zapytania //za pytajniki podstawiamy wartości konkretne
        $stmt->execute();


    }


    //zwraca wszystkie obiekty kalkulatorów jako (nazwa kalkulatora + nazwa zdjęcia)
    public function getAllTables(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "table";
        ');
        $stmt->execute();
        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $result[] = new Table(
                $table['name_table'],
                $table['img_table'],
                $table['id_table'],
                $table['img_content_table']
            );

        }
        return $result;
    }


    public function getTable($id_table): ?array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "table" WHERE id_table=:id_table
        ');


        $stmt->bindParam(':id_table', $id_table, PDO::PARAM_INT);

        $stmt->execute();
        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $result[] = new Table(
                $table['name_table'],
                $table['img_table'],
                $table['id_table'],
                $table['img_content_table']);
        }

        return $result;


    }


    public function getUserTable(int $id_board): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "table" t NATURAL JOIN "board-table" bc WHERE id_board=:id_board
        ');


        $stmt->bindParam(':id_board', $id_board, PDO::PARAM_INT);

        $stmt->execute();
        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $result[] = new Table(

                $table['name_table'],
                $table['img_table'],
                $table['id_table'],
                $table['img_content_table']

            );
        }

        return $result;
    }


    public function addTable(Table $table)
    {


        $stmt = $this->database->connect()->prepare('
            INSERT INTO "table" (name_table, img_table, img_content_table)          
            VALUES (?, ?, ?)
        ');


        //wykonanie zapytania //za pytajniki podstawiamy wartości konkretne
        $stmt->execute([
            $table->getNameTable(),
            $table->getImageTable(),
            $table->getImageContentTable()
        ]);


    }


    public function getUserTablesByTitle(string $searchString)
    {

        $searchString = '%' . strtolower($searchString) . '%';

        $stm = $this->database->connect()->prepare('
                SELECT * FROM "table" t natural join "board-table" b WHERE b.id_board = :id_board and LOWER(t.name_table) LIKE :search
        ');

        $stm->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stm->bindParam(':id_board', $_SESSION['id_board'], PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

}