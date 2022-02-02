<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

session_start();

class UserRepository extends Repository
{

    //zwraca użytkownika o danym emailu

    public function getUser(string $email): ?User //bedziemy zwracać albo null albo obiekt użytkownika
    {
        //zmienna do której przypisujemy nowe połączenie z bazą danych
        //prepare jako argument dostaje zapytanie sql
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.user WHERE email = :email');

        //podłączenie parametrów pod połączenie, klucz pod któy chcemy podstawic zmienną, trzeci arg to typ
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        //wykonanie
        $stmt->execute();

        //dane zapisujemy jako tabela asocjacyjna //nazwy kolumn w tabeli bazy danych
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        //jeśli nie ma użytkownika o danym emailu to zwracamy wartość pustą null
        if ($user == false) {
            return null; //tutaj nalezy zrobić w przyszłości z try oraz catch
        }

        //zwracamy użytkownika
        return new User(
            $user['id_user'],
            $user['email'],  //nazwy kolumn w tabeli bazy danych
            $user['password'],
            $user['salt'],
            $user['id_account_type']
                    );
    }






    public function createNewUser(User $tmpUser){

        //nie trzeba id_user
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.user (email, password, salt, id_account_type)          
            VALUES (?, ?, ?, ?)
        ');



        //wykonanie zapytania //za pytajniki podstawiamy wartości konkretne
        $stmt->execute([
            $tmpUser->getEmail(),
            $tmpUser->getPassword(),
            $tmpUser->getSalt(),
            $tmpUser->getIdAccountType()
        ]);


    }




    public function giveBoardUser(?int $idBoard, ?int $id_user){

        $stmt = $this->database->connect()->prepare('
            UPDATE public.user SET "board" = :idBoard WHERE id_user = :id_user
        ');

        //podłączenie parametrów pod połączenie, klucz pod któy chcemy podstawic zmienną, trzeci arg to typ
        $stmt->bindParam(':id_user', $id_user);
        //podłączenie parametrów pod połączenie, klucz pod któy chcemy podstawic zmienną, trzeci arg to typ
        $stmt->bindParam(':idBoard', $idBoard, PDO::PARAM_INT);

        $stmt->execute();

    }





    public function setCookieUser(string $email)
    {
        setcookie("currentUser", $email,  time() + (86400 * 30), "/");

        $stmt = $this->database->connect()->prepare('
            UPDATE public.user SET "enabled" = true WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION['email'] = $email;
    }



    public function deleteCookieUser()
    {
        setcookie("currentUser", $_COOKIE['currentUser'], time() - (86400 * 40));

        $stmt = $this->database->connect()->prepare('
            UPDATE public.user SET "enabled" = false WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        unset($_SESSION['id']);
        unset($_SESSION['id_board']);
        unset($_SESSION['email']);

        session_destroy();
    }


}