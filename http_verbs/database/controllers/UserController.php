<?php

class UserController
{
    public function index()
    {
        require_once "models/User.php";
        $user = new User();
        $users = $user->index();
        require_once "views/users.php";
    }

    public function show($userId)
    {
        require_once "models/User.php";
        $user = new User();
        $users = $user->show($userId);
        require_once "views/user.php";
    }

    public function edit($userId)
    {
        require_once "models/User.php";
        $user = new User();
        $users = $user->show($userId);
        require_once "views/userEdit.php";
    }

    public function update($userId)
    {
        require_once "models/User.php";
        $user = new User();
        $user->put($userId, $_POST);
        $users = $user->show($userId);
    }

    public function delete($userId)
    {
        require_once "models/User.php";
        $user = new User();
        $user->delete($userId);
    }

    public function new()
    {
        require_once "views/newUser.php";
    }

    public function store()
    {
        require_once "models/User.php";
        $user = new User();
        $user->store($_POST);
    }
}