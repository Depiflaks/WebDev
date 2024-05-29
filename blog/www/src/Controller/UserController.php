<?php

class UserController
{
    public function __construct(private $table)
    {
    }

    public function compareLogin(string $email, string $pass): bool
    {
        return ($pass == $this->table->findUserByEmail($email)["password"]);
    }

    public function authByCookie(): bool 
    {
        if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
            return false;
        }
        if (!$this->compareLogin($_SESSION['email'], $_SESSION['password'])) {
            return false;
        }
        return true;
    }
}

?>