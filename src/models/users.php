<?php

class Users
{
    private $users;
    public function __construct()
    {
        $pathname = __DIR__ . '/../../db/users.json';
        $this->users = json_decode(file_get_contents($pathname), true);
    }

    public function getUser($userId)
    {
        $found = array_filter($this->users, function ($user) use ($userId) {
            return $user['id'] === $userId;
        });

        $user = array_values($found);
        if (!empty($user)) {
            unset($user[0]['password']);
        }

        return $user;
    }
}
