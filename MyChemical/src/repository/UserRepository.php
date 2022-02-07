<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
session_start();

class UserRepository extends Repository
{


    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.user WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null; //tutaj nalezy zrobić w przyszłości z try oraz catch
        }

        return new User(
            $user['id_user'],
            $user['email'],
            $user['password'],
            $user['salt'],
            $user['id_account_type']
        );
    }


    public function createNewUser(User $tmpUser)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.user (email, password, salt, id_account_type)          
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $tmpUser->getEmail(),
            $tmpUser->getPassword(),
            $tmpUser->getSalt(),
            $tmpUser->getIdAccountType()
        ]);
    }



    public function giveBoardUser(?int $idBoard, ?int $id_user)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE public.user SET "board" = :idBoard WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $id_user);
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

    }



    public function deleteCookieUser()
    {
        setcookie("currentUser", $_COOKIE['currentUser'], time() - (86400 * 40));
        $stmt = $this->database->connect()->prepare('
            UPDATE public.user SET "enabled" = false WHERE email = :email
        ');
        $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
        $stmt->execute();

    }

}