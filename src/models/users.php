<?php

class Users
{
    /** @var array $users */
    private $users;
    public function __construct()
    {
        /** @var string $pathname */
        $pathname = __DIR__ . '/../../db/users.json';
        $this->users = json_decode(file_get_contents($pathname), true);
    }

    /**
     * @param int $userId
     *
     * @return array
     *
     * @psalm-return list<mixed>
     */
    public function getUser($userId): array
    {
        /** 
         * @var array $user
         */
        $found = array_filter($this->users, function ($user) use ($userId) {
            return $user['id'] == $userId;
        });

        $user = array_values($found);
        if (!empty($user)) {
            unset($user[0]['password']);
        }

        return $user;
    }

    /**
     * @return never
     */
    public function login(string $email, string $password)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (isset($_SESSION['user'])) {
        header('Location: /');
        exit();
    }

    if (!$email || !$password) {
        header('Location: /login?error=missing-fields');
        exit();
    }

    $found = array_filter($this->users, function ($user) use ($email) {
        return $user['email'] === $email;
    });

    $user = array_values($found);

    if (empty($user)) {
        header('Location: /login?error=no-user');
        exit();
    }

    if (password_verify($password, $user[0]['password'])) {
        $_SESSION['user'] = $user[0];
        header('Location: /');
        exit();
    }
    
    header('Location: /login?error=invalid-password');
    exit();
}
}
