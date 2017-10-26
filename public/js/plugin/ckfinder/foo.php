<?php

namespace MyProject;

class User {
    private $authenticated = false;

    function login() {
        $this->authenticated = true;
    }

    function logout() {
        $this->authenticated = false;
    }

    public function isLoggedIn() {
        return $this->authenticated;
    }
}

$user = new User();
$user->login();