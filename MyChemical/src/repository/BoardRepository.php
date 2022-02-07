<?php
require_once 'Repository.php';

class BoardRepository extends Repository
{
    public function createNewBoard(int $id_user)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO public.board (id_user) VALUES (?)');
        $stmt->execute([$id_user]);
    }

    public function getUserBoard(int $id_user) : ?Board
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.board WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $board = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($board == false) {
            return null;
        }

        return new Board(
            $board['id_board']
            );
    }
}










