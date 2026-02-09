<?php

function login($username, $password) {
    // Dummy authentication logic
    if ($username == 'user' && $password == 'pass') {
        return true;
    }
    return false;
}

function register($username, $password) {
    // Dummy registration logic
    if (!empty($username) && !empty($password)) {
        // Here you would normally save the user information to a database.
        return true;
    }
    return false;
}

?>