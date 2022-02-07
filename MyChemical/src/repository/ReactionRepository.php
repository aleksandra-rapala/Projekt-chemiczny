<?php
require_once 'Repository.php';
session_start();

class ReactionRepository extends Repository
{
    public function addReaction(Reaction $reaction)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "reaction" (name_reaction, chemical_formula, description, id_board, img_reaction)          
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $reaction->getNameReaction(),
            $reaction->getChemicalFormula(),
            $reaction->getDescription(),
            $_SESSION['id_board'],
            $reaction->getImgReaction()
        ]);
    }


    public function deleteReaction(int $id_reaction)
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM "reaction" WHERE id_reaction=:id_reaction
        ');

        $stmt->bindParam(':id_reaction', $id_reaction, PDO::PARAM_INT);
        $stmt->execute();
    }



    public function getUserReaction(int $id_board): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "reaction" WHERE "id_board" = :id_board
        ');
        $stmt->bindParam(':id_board', $id_board, PDO::PARAM_INT);
        $stmt->execute();
        $reactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($reactions as $reaction) {
            $result[] = new Reaction(
                $reaction['name_reaction'],
                $reaction['chemical_formula'],
                $reaction['id_reaction'],
                $reaction['description'],
                $reaction['img_reaction']
            );
        }
        return $result;
    }


    public function getUserReactionsByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';
        $stm = $this->database->connect()->prepare('
                SELECT * FROM "reaction" WHERE id_board = :id_board and (LOWER(name_reaction) LIKE :search or LOWER(description) LIKE :search)
        ');
        $stm->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stm->bindParam(':id_board', $_SESSION['id_board'], PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}