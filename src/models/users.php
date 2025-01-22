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
     * @return array
     */
    public function getUser($userId)
    {
        /** @var array $found 
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
}
