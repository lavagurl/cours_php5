<?php

class UserManager extends Manager {

    public function __construct()
    {
        parent::__construct(User::class, 'users');
    }

    public function getUserAdmin()
    {

    }
}
