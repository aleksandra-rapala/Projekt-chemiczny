<?php

require_once 'Repository.php';




class BoardRepository extends Repository
{

    public function createNewBoard(int $id_user){

        //nie trzeba id_board
        $stmt = $this->database->connect()->prepare('INSERT INTO public.board (id_user) VALUES (?)');

                //wykonanie zapytania
        $stmt->execute([$id_user]);

    }

    public function getUserBoard(int $id_user) : ?Board{

        $stmt = $this->database->connect()->prepare('SELECT * FROM public.board WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $board = $stmt->fetch(PDO::FETCH_ASSOC);

        //jeśli nie ma board o danym emailu to zwracamy wartość pustą null
        if ($board == false) {
            return null; //tutaj nalezy zrobić w przyszłości z try oraz catch
        }

        //zwracamy użytkownika
        return new Board(
            $board['id_board']
            );


    }

}










